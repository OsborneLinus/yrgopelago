// Adding scrolling animation for the room selection section

const theAnimation = document.querySelectorAll('.custom');

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('scroll-animation');
      } else {
        entry.target.classList.remove('scroll-animation');
      }
    });
  },
  { threshold: 0.2 }
);
for (let i = 0; i < theAnimation.length; i++) {
  const elements = theAnimation[i];
  observer.observe(elements);
}

// Code to make sure that the hamburger menu will be activated on click

const toggleMenu = document.querySelector('#toggleMenu');
const navbar = document.querySelector('#navbar');

toggleMenu.onclick = () => {
  toggleMenu.classList.toggle('hamburger-toggle');
  navbar.classList.toggle('hidden');
  navbar.classList.toggle('flex');
};

// Create a URLSearchParams object with the query string of the current page
document.addEventListener('DOMContentLoaded', function () {
  if (window.location.pathname == '/input.php') {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    const span = document.createElement('span');
    span.textContent = `Totalcost: $0`;

    const bookbtn = document.getElementById('book-btn').parentNode;
    bookbtn.appendChild(span);

    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('change', () => {
        const checkedCount = document.querySelectorAll(
          'input[type="checkbox"]:checked'
        ).length;

        const roomType = new URLSearchParams(window.location.search);
        // Check if a query parameter exists
        if (roomType.has('roomType')) {
          console.log('Parameter exists');
        }

        // Get the value of a query parameter
        const value = roomType.get('roomType');
        console.log(value);

        let costPerCheckbox;
        if (value === 'superior') {
          costPerCheckbox = 15;
        } else if (value === 'deluxe') {
          costPerCheckbox = 12;
        } else if (value === 'standard') {
          costPerCheckbox = 8;
        }

        const totalCost = checkedCount * costPerCheckbox;
        span.textContent = `Totalcost: $${totalCost}`;
      });
    });
  }
});
