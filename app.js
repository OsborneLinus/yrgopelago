const button = document.getElementById('showCalendar');
const calendarContainer = document.getElementById('calendar');
button.addEventListener('click', function () {
  calendarContainer.style.display =
    calendarContainer.style.display === 'none' ? 'block' : 'none';
});
