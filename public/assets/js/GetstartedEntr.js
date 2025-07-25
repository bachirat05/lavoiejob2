/**
 *  Form Wizard
 */

'use strict';

(function () {
  // Init custom option check
  window.Helpers.initCustomOptionCheck();

  $("#language").select2({
    tags: true,
    placeholder: 'Veuillez choisir une option',
  });
  
  const flatpickrDate = document.querySelectorAll('.date-input'),
    flatpickrRange = document.querySelector('.flatpickr'),
    phoneMask = document.querySelector('.contact-number-mask'),
    plCountry = $('#plCountry'),
    sliderPips = document.getElementById('rate'),
    plFurnishingDetailsSuggestionEl = document.querySelector('#plFurnishingDetails');

    if (flatpickrDate.length > 0) {
      flatpickrDate.forEach(function(element) {
        flatpickr(element, {
          monthSelectorType: 'static',
          static: true
        });
      });
    }
    
    if (sliderPips) {
      noUiSlider.create(sliderPips, {
        start: [90],
        behaviour: 'tap-drag',
        step: 10,
        tooltips: true,
        range: {
          min: 0,
          max: 100
        },
        pips: {
          mode: 'steps',
          stepped: true,
          density: 5
        },
        direction: isRtl ? 'rtl' : 'ltr'
      });
    }
  // Phone Number Input Mask
  if (phoneMask) {
    phoneMask.addEventListener('input', event => {
      const cleanValue = event.target.value.replace(/\D/g, '');
      phoneMask.value = formatGeneral(cleanValue, {
        blocks: [1, 2, 2, 2, 2],
        delimiters: [' ', ' ']
      });
    });
    registerCursorTracker({
      input: phoneMask,
      delimiter: ' '
    });
  }

  // select2 (Country)

  fetch('/assets/json/cities.json')
    .then(response => response.json())
    .then(cities => {
      // Sélectionner tous les <select> dont le nom est "city" ou "birth_city"
      const selects = document.querySelectorAll('select[name="city"], select[name="birth_city"], select[name="mobility"]');

      // Remplir chaque <select> avec les options
      selects.forEach(select => {
        cities.forEach(city => {
          const option = document.createElement('option');
          option.value = city;
          option.textContent = city;
          select.appendChild(option);
        });
      });
    })
    .catch(error => {
      console.error('Erreur lors du chargement des villes :', error);
    });
  
  if ($('#industry')) {
    $('#industry').wrap('<div class="position-relative"></div>');
    $('#industry').select2({
      placeholder: 'Veuillez choisir une option',
      dropdownParent: $('#industry').parent()
    });
  }
  if ($('#activity')) {
    $('#activity').wrap('<div class="position-relative"></div>');
    $('#activity').select2({
      placeholder: 'Veuillez choisir une option',
      dropdownParent: $('#activity').parent()
    });
  }
  if ($('#country')) {
    $('#country').wrap('<div class="position-relative"></div>');
    $('#country').select2({
      placeholder: 'Veuillez choisir une option',
      dropdownParent: $('#country').parent()
    });
  }
  if ($('#city')) {
    $('#city').wrap('<div class="position-relative"></div>');
    $('#city').select2({
      placeholder: 'Veuillez choisir une option',
      dropdownParent: $('#city').parent()
    });
  }
  if ($('#type_local')) {
    $('#type_local').wrap('<div class="position-relative"></div>');
    $('#type_local').select2({
      placeholder: 'Veuillez choisir une option',
      dropdownParent: $('#type_local').parent()
    });
  }
  if (plCountry) {
    plCountry.wrap('<div class="position-relative"></div>');
    plCountry.select2({
      placeholder: 'Veuillez choisir une option',
      dropdownParent: plCountry.parent()
    });
  }
  // select2 (Property type)
  const plPropertyType = $('#plPropertyType');
  if (plPropertyType.length) {
    plPropertyType.wrap('<div class="position-relative"></div>');
    plPropertyType
      .select2({
        placeholder: 'Veuillez choisir une option',
        dropdownParent: plPropertyType.parent()
      })
      .on('change', function () {
        // Revalidate the color field when an option is chosen
        FormValidation2.revalidateField('plPropertyType');
      });
  }

  /* if (flatpickrRange) {
    flatpickrRange.flatpickr();
  } */

  // Tagify (Furnishing details)
  const furnishingList = [
    'Fridge',
    'TV',
    'AC',
    'WiFi',
    'RO',
    'Washing Machine',
    'Sofa',
    'Bed',
    'Dining Table',
    'Microwave',
    'Cupboard'
  ];
  if (plFurnishingDetailsSuggestionEl) {
    const plFurnishingDetailsSuggestion = new Tagify(plFurnishingDetailsSuggestionEl, {
      whitelist: furnishingList,
      maxTags: 10,
      dropdown: {
        maxItems: 20,
        classname: 'tags-inline',
        enabled: 0,
        closeOnSelect: false
      }
    });
  }




  
  
  // Vertical Wizard
  // --------------------------------------------------------------------

  const wizardPropertyListing = document.querySelector('#wizard-property-listing');
  if (typeof wizardPropertyListing !== undefined && wizardPropertyListing !== null) {
    // Wizard form
    const wizardPropertyListingForm = wizardPropertyListing.querySelector('#wizard-property-listing-form');
    // Wizard steps
    //const wizardPropertyListingFormStep1 = wizardPropertyListingForm.querySelector('#personal-details');
    const wizardPropertyListingFormStep2 = wizardPropertyListingForm.querySelector('#property-details');
    const wizardPropertyListingFormStep3 = wizardPropertyListingForm.querySelector('#property-features');
    //const wizardPropertyListingFormStep4 = wizardPropertyListingForm.querySelector('#price-details');
    // Wizard next prev button
    const wizardPropertyListingNext = [].slice.call(wizardPropertyListingForm.querySelectorAll('.btn-next'));
    const wizardPropertyListingPrev = [].slice.call(wizardPropertyListingForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardPropertyListing, {
      linear: true
    });

    // Personal Details
   /*  const FormValidation1 = FormValidation.formValidation(wizardPropertyListingFormStep1, {
      fields: {

        name: {
          validators: {
            notEmpty: {
              message: 'Veuillez entrer le nom de l\'entreprise'
            }
          }
        },
        email: {
          validators: {
            notEmpty: {
              message: 'Veuillez entrer l\'email de l\'entreprise'
            },
            emailAddress: {
              message: 'Veuillez entrer une adresse email valide'
            },
            callback: {
              message: 'Cet email est déjà utilisé',
              callback: function(input) {
                return new Promise((resolve) => {
                  fetch('/check-email', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email: input.value })
                  })
                  .then(response => response.json())
                  .then(data => {
                    resolve({
                      valid: !data.exists,  // if exists = true => valid = false
                      message: 'Cet email existe déjà'
                    });
                  })
                  .catch(() => {
                    resolve({
                      valid: true
                    });
                  });
                });
              }
            }
          }
        },
        "projets[]": {
          validators: {
            notEmpty: {
              message: 'Veuillez choisir au moins un projet.'
            }
          }
        },
        status: {
          validators: {
            notEmpty: {
              message: 'Veuillez choisir un statut.'
            }
          }
        },
      },

      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          //* Move the error message out of the `input-group` element
          if (e.element.parentElement.classList.contains('input-group')) {
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
    }); */

    // Property Details
    const FormValidation2 = FormValidation.formValidation(wizardPropertyListingFormStep2, {
      fields: {
        // * Validate the fields here based on your requirements

        gsm: {
          validators: {
            notEmpty: {
              message: 'Veuillez entrer un numéro de tél'
            }
          }
        },
        address: {
          validators: {
            notEmpty: {
              message: 'Veuillez entrer une adresse avec les indications de proximité'
            },
            /* stringLength: {
              min: 10,
              message: 'L\'adresse doit contenir au moins 10 characters.'
            } */
          }
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: function (field, ele) {
            // field is the field name & ele is the field element
            switch (field) {
              case 'plAddress':
                return '.form-control-validation';
              default:
                return '.form-control-validation';
            }
          }
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
    });

    

    // Property Features
    const FormValidation3 = FormValidation.formValidation(wizardPropertyListingFormStep3, {
      fields: {
        // * Validate the fields here based on your requirements
        language: {
          validators: {
            notEmpty: {
              message: 'Veuillez entrer les langues parlés par l\'entreprise.'
            }
          }
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      //validationStepper.next();
    });

   

    // Price Details
   /*  const FormValidation4 = FormValidation.formValidation(wizardPropertyListingFormStep4, {
      fields: {
        // * Validate the fields here based on your requirements
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.form-control-validation'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // You can submit the form
      // wizardPropertyListingForm.submit()
      // or send the form data to server via an Ajax request
      // To make the demo simple, I just placed an alert
      alert('Submitted..!!');
    }); */

    wizardPropertyListingNext.forEach(item => {
      item.addEventListener('click', event => {
        // When click the Next button, we will validate the current step
        switch (validationStepper._currentIndex) {
          /* case 0:
            FormValidation1.validate();
            break; */

          case 0:
            FormValidation2.validate();
            break;

          case 1:
            FormValidation3.validate();
            break;

          case 2:
            FormValidation4.validate();
            break;

         /*  case 3:
            FormValidation5.validate();
            break;
 */
          default:
            break;
        }
      });
    });

    wizardPropertyListingPrev.forEach(item => {
      item.addEventListener('click', event => {
        switch (validationStepper._currentIndex) {
      case 2:
      case 1:
        validationStepper.previous();
        break;
      default:
        break;
    }
      });
    });
  }
})();
