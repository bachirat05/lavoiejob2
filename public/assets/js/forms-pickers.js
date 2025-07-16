/**
 * Form Picker
 */

'use strict';



// color picker (pickr)
// --------------------------------------------------------------------
(function () {
  document.querySelectorAll('.color-picker-group').forEach(group => {
    const pickerEl = group.querySelector('.colorpicker');
    const inputEl = group.querySelector('input[name="color"]');

    const pickr = new Pickr({
        el: pickerEl,
        theme: 'nano',
        default: 'rgba(13, 172, 3, 1)',
        swatches: [
            'rgba(102, 108, 232, 1)',
            'rgba(40, 208, 148, 1)',
            'rgba(255, 73, 97, 1)',
            'rgba(255, 145, 73, 1)',
            'rgba(30, 159, 242, 1)'
        ],
        components: {
            preview: true,
            opacity: false,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                input: true,
                clear: true,
                save: true
            }
        }
    });

    // Sync color value into the input on "save"
    pickr.on('save', (color) => {
        const hexColor = color.toHEXA().toString();
        inputEl.value = hexColor;
    });
});

})();
