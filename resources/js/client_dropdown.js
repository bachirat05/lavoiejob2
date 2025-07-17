document.addEventListener('DOMContentLoaded', function () {
  const radioClient = document.getElementById('radioClient');
  const clientTypeContainer = document.getElementById('clientTypeContainer');
  const dropdownButton = document.getElementById('dropdownClientType');
  const clientTypeInput = document.getElementById('client_type');
  const clientTypeItems = document.querySelectorAll('.client-type-item');

  // Affiche ou cache le menu selon la sélection
  const radios = document.querySelectorAll('input[name="type"]');
  radios.forEach(radio => {
    radio.addEventListener('change', function () {
      if (radioClient.checked) {
        clientTypeContainer.style.display = 'block';
      } else {
        clientTypeContainer.style.display = 'none';
        clientTypeInput.value = '';
        dropdownButton.innerText = 'Sélectionnez le type';
      }
    });
  });

  // Mise à jour du bouton et champ caché
  clientTypeItems.forEach(item => {
    item.addEventListener('click', function (e) {
      e.preventDefault();
      const value = this.getAttribute('data-value');
      const text = this.innerText;

      clientTypeInput.value = value;
      dropdownButton.innerText = text;
    });
  });
});
