// Make sure that the calendar is shown when you click on the "date" button
const button = document.getElementById('showCalendar');
const calendarContainer = document.getElementById('calendar');
button.addEventListener('click', function () {
  calendarContainer.style.display =
    calendarContainer.style.display === 'block' ? 'none' : 'block';
});

// Adding a scrolling animation to the pictures that show the different rooms.

/* document.addEventListener('DOMContentLoaded', function () {
  const scrollingSection = document.getElementById('scrolling-section');
  const pictures = [
    document.getElementById('picture1'),
    document.getElementById('picture2'),
    document.getElementById('picture3'),
  ];

  window.addEventListener('scroll', function () {
    const scrollPosition = window.scrollY;
    const sectionHeight = scrollingSection.getBoundingClientRect().height;

    pictures.forEach((picture, index) => {
      const opacity = Math.min(
        1,
        Math.max(0, (scrollPosition - index * sectionHeight) / sectionHeight)
      );
      picture.style.opacity = opacity;
      picture.style.transform = `translateY(${scrollPosition / 2}px)`; // Adjust this for parallax effect
    });
  });
}); */
