document.addEventListener('DOMContentLoaded', function () {
    console.log("clientData:", window.clientData);
    if (window.clientData) {
        initProfileForm(window.clientData);
    }
});

function initProfileForm(clientData) {
    const fields = Object.keys(clientData);

    fields.forEach(field => {
        const input = document.getElementById(field);
        const btn = document.querySelector(`.btn-edit[data-field="${field}"]`);

        if (input && btn) {
            btn.addEventListener('click', function () {
                if (input.disabled) {
                    input.disabled = false;
                    input.focus();
                    btn.textContent = 'Sauvegarder';
                    addCancelButton(input, field, clientData);
                } else {
                    input.disabled = true;
                    btn.textContent = 'Modifier';
                    removeCancelButton(field);
                }
            });
        }
    });

    const form = document.getElementById('profileForm');
    form.addEventListener('submit', function () {
        form.querySelectorAll(':disabled').forEach(input => input.disabled = false);
    });
}

function addCancelButton(input, field, clientData) {
    if (document.getElementById(`cancel-${field}`)) return;

    const cancelBtn = document.createElement('button');
    cancelBtn.type = 'button';
    cancelBtn.className = 'btn-cancel';
    cancelBtn.textContent = 'Annuler';
    cancelBtn.id = `cancel-${field}`;

    input.parentElement.parentElement.appendChild(cancelBtn);

    cancelBtn.addEventListener('click', function () {
        input.value = clientData[field] ?? '';
        input.disabled = true;
        const editBtn = document.querySelector(`.btn-edit[data-field="${field}"]`);
        if (editBtn) editBtn.textContent = 'Modifier';
        cancelBtn.remove();
    });
}

function removeCancelButton(field) {
    const cancelBtn = document.getElementById(`cancel-${field}`);
    if (cancelBtn) cancelBtn.remove();
}
