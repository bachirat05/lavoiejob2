$(document).ready(function () {

    //new forms hundling
    $('.hundle-form').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        const form = this;
        const formData = new FormData(form);
        const notyf = new Notyf({ duration: 10000, position: {
        x: 'right',
        y: 'top',
        },});

        const submitButton = $(form).find('button[type="submit"]');
        const originalButtonText = submitButton.html();

        // Show loading
        submitButton.prop('disabled', true).html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>');

        fetch(form.action, {
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
                window.location.href = data.redirect || window.location.href;
            }, 2500);
            } else {
            const errorData = await response.json();
            if (errorData.errors) {
                Object.values(errorData.errors).flat().forEach(errorMessage => {
                notyf.error(errorMessage);
                });
            } else if (errorData.message) {
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
            submitButton.prop('disabled', false).html(originalButtonText);
        });
    });

    //edit forms
    $(document).on('click', '.edit-button', function () {

        const button = $(this);
        const modal = $(button.data('modal'));
        const form = modal.find(button.data('form'));
    
        // Set action and method
        const action = button.data('action');
        const method = button.data('method') || 'POST';
    
        form.attr('action', action);
        if (method !== 'POST') {
          if (!form.find('input[name="_method"]').length) {
            form.append(`<input type="hidden" name="_method" value="${method}">`);
          } else {
            form.find('input[name="_method"]').val(method);
          }
        }
    
        // Set fields
        const fields = button.data('fields');
        if (fields) {
          /* Object.entries(fields).forEach(([name, value]) => {
            const field = form.find(`[name="${name}"]`);
            if (field.is('input, textarea, select')) {
              field.val(value);
            }
          }); */
          Object.entries(fields).forEach(([name, value]) => {
            const field = form.find(`[name="${name}"]`);
            
            if (field.is('input[type="text"], input[type="email"], textarea, select')) {
                // For text, email, textarea, and select fields
                field.val(value);
            } 
            else if (field.is('input[type="checkbox"]')) {
                if (Array.isArray(value)) {
                    value.forEach(val => {
                        field.filter(`[value="${val.trim()}"]`).prop('checked', true);
                    });
                } else {
                    field.prop('checked', value);
                }
            } 
            else if (field.is('input[type="radio"]')) {
                // For radio buttons
                field.filter(`[value="${value}"]`).prop('checked', true);
            }
          });
        }
    
        // Set title, message, button
        modal.find('h4').text(button.data('title') || 'Modifier');
        modal.find('p').text(button.data('message') || '');
        form.find('button[type="submit"]').text(button.data('submit') || 'Mettre à jour');
    
        // Show image preview if needed
        const avatarUrl = button.data('avatar');
        if (avatarUrl) {
          if (!form.find('.image-preview').length) {
            form.find('input[type="file"]').parent().after(`
              <div class="mt-2 image-preview">
                <img src="${avatarUrl}" alt="Aperçu" class="img-thumbnail" style="max-width: 100px;">
              </div>
            `);
          } else {
            form.find('.image-preview img').attr('src', avatarUrl);
          }
        }
    });

    // Reset modal on close (general)
    $('.modal').on('hidden.bs.modal', function () {
    const modal = $(this);
    const form = modal.find('form')[0];
    if (form) {
        form.reset();
        $(form).find('input[name="_method"]').remove();
        $(form).attr('action', $(modal).find('[data-reset-action]').data('reset-action') || form.action);
        $(modal).find('h4').text('Ajouter');
        $(modal).find('p').text('');
        $(form).find('button[type="submit"]').text('Enregistrer');
        $(form).find('.image-preview').remove();
    }
    });
    
    //delete buttons hundling
    $(document).on('click', '.delete-button', function (e) {
        e.preventDefault();
    
        const button = $(this);
        const url = button.data('url');
        const notyf = new Notyf({ duration: 10000 , position: {
            x: 'right',
            y: 'top',
            },});
    
        Swal.fire({
          title: "Êtes-vous sûr ?",
          text: "Cette action est irréversible.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Oui, supprimer !",
          cancelButtonText: "Annuler"
        }).then((result) => {
          if (result.isConfirmed) {
            fetch(url, {
              method: 'POST',
              headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
              }
            })
              .then(async (response) => {
                const data = await response.json();
                if (response.ok) {
                  Swal.fire("Supprimé !", data.message || "L'élément a été supprimé.", "success");
                  setTimeout(() => {
                    if (data.redirect) {
                      window.location.href = data.redirect;
                    } else {
                      window.location.reload();
                    }
                  }, 2500);
                } else {
                  notyf.error(data.message || 'Une erreur est survenue.');
                }
              })
              .catch((error) => {
                console.error(error);
                notyf.error('Erreur de connexion au serveur.');
              });
          }
        });
    });
});
  