const form = document.getElementById('booking-form');
const message = document.getElementById('form-message');

form.addEventListener('submit', function (event) {
  event.preventDefault();

  const name = document.getElementById('name').value;
  const service = document.getElementById('service').value;
  const date = document.getElementById('date').value;

  console.log('Booking request:', { name, service, date });

  message.textContent = `Thanks, ${name}! We'll call you to confirm your ${service.replace('-', ' ')} appointment.`;

  form.reset();
});