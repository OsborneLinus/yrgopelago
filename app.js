/* document.addEventListener('DOMContentLoaded', function () {
  const forms = document.querySelectorAll('form');

  forms.forEach(function (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      const email = prompt('Please enter your email:');
      const name = prompt('Please enter your name:');

      const formData = new FormData(form);
      formData.append('email', email);
      formData.append('name', name);

      fetch('/save-booking', {
        method: 'POST',
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            const message = document.createElement('p');
            message.textContent = 'Form submitted successfully!';
            document.body.appendChild(message);
          }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    });
  });
}); */
