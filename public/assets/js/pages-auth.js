'use strict';

document.addEventListener('DOMContentLoaded', function () {
  (() => {
    const formAuthentication = document.querySelector('#formAuthentication');

    if (formAuthentication && typeof FormValidation !== 'undefined') {
      // Dynamically build the fields config
      const fieldsConfig = {};

      if (formAuthentication.querySelector('[name="username"]')) {
        fieldsConfig.username = {
          validators: {
            notEmpty: {
              message: 'Veuillez saisir votre nom d\'utilisateur'
            },
            stringLength: {
              min: 6,
              message: 'Le nom d\'utilisateur doit comporter plus de 6 caractères'
            }
          }
        };
      }

      if (formAuthentication.querySelector('[name="email"]')) {
        fieldsConfig.email = {
          validators: {
            notEmpty: {
              message: 'Veuillez saisir votre adresse e-mail'
            },
            emailAddress: {
              message: 'S\'il vous plaît, mettez une adresse email valide'
            }
          }
        };
      }

      if (formAuthentication.querySelector('[name="email-username"]')) {
        fieldsConfig['email-username'] = {
          validators: {
            notEmpty: {
              message: 'Veuillez saisir votre adresse e-mail / nom d\'utilisateur'
            },
            stringLength: {
              min: 6,
              message: 'Le nom d\'utilisateur doit comporter plus de 6 caractères'
            }
          }
        };
      }

      if (formAuthentication.querySelector('[name="password"]')) {
        fieldsConfig.password = {
          validators: {
            notEmpty: {
              message: 'Veuillez saisir votre mot de passe'
            },
            stringLength: {
              min: 6,
              message: 'Le mot de passe doit comporter plus de 6 caractères'
            }
          }
        };
      }

      if (formAuthentication.querySelector('[name="confirm-password"]')) {
        fieldsConfig['confirm-password'] = {
          validators: {
            notEmpty: {
              message: 'Veuillez confirmer votre mot de passe'
            },
            identical: {
              compare: () => formAuthentication.querySelector('[name="password"]').value,
              message: 'Le mot de passe et sa confirmation ne correspondent pas'
            },
            stringLength: {
              min: 6,
              message: 'Le mot de passe doit comporter plus de 6 caractères'
            }
          }
        };
      }

      if (formAuthentication.querySelector('[name="terms"]')) {
        fieldsConfig.terms = {
          validators: {
            notEmpty: {
              message: 'Veuillez accepter les conditions générales'
            }
          }
        };
      }

      // Initialize validation
      FormValidation.formValidation(formAuthentication, {
        fields: fieldsConfig,
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          /* bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: '',
            rowSelector: '.form-control-validation'
          }), */
          submitButton: new FormValidation.plugins.SubmitButton(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        },
        init: instance => {
          instance.on('plugins.message.placed', e => {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      });
    }

    if (formAuthentication) {
      formAuthentication.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        const formData = new FormData(formAuthentication);
        const notyf = new Notyf({ duration: 10000 });

        const submitButton = formAuthentication.querySelector('button');
        const originalButtonText = submitButton.innerHTML;

        // Show loading
        submitButton.disabled = true;
        submitButton.innerHTML = `<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>`;

        fetch(formAuthentication.action, {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          },
          body: formData
        })
        .then(async (response) => {
          if (response.ok) {
            const data = await response.json();
            notyf.success(data.message);
            setTimeout(() => {
              window.location.href = data.redirect || '/dashboard';
            }, 1500);
          } else {
            const errorData = await response.json();
            
            // First check if there are errors
            if (errorData.errors) {
              // Loop through all the error messages and show individual Notyf notifications
              Object.values(errorData.errors).flat().forEach(errorMessage => {
                notyf.error(errorMessage);
              });
            } else if (errorData.message) {
              // If there is a generic error message, show it as a single Notyf notification
              notyf.error(errorData.message);
            } else {
              notyf.error('Une erreur est survenue.');
            }
          }
        })
        .catch((error) => {
          console.error(error);
          notyf.error('Erreur de connexion au serveur.');
        })        
          .finally(() => {
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
          });
      });
    }

    // Input mask for numeric fields
    const numeralMaskElements = document.querySelectorAll('.numeral-mask');
    const formatNumeral = value => value.replace(/\D/g, '');

    if (numeralMaskElements.length > 0) {
      numeralMaskElements.forEach(numeralMaskEl => {
        numeralMaskEl.addEventListener('input', event => {
          numeralMaskEl.value = formatNumeral(event.target.value);
        });
      });
    }
  })();
});
