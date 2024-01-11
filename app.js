// Animation for the slides to come in from the left

const theAnimation = document.querySelectorAll('.custom');

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (
        entry.isIntersecting &&
        !entry.target.classList.contains('scroll-animation')
      ) {
        if (entry.target.classList.contains('second-slide')) {
          entry.target.classList.add('scroll-animation-right');
        } else {
          entry.target.classList.add('scroll-animation');
        }
      } else {
        entry.target.classList.remove('scroll-animation');
        entry.target.classList.remove('scroll-animation-right');
      }
    });
  },
  { threshold: 0.08 }
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
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  const dropdown = document.getElementById('features');
  const span = document.createElement('span');
  span.textContent = `Totalcost: $0`;

  const bookbtn = document.getElementById('book-btn').parentNode;
  bookbtn.appendChild(span);

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', updateTotalCost);
  });

  dropdown.addEventListener('change', updateTotalCost);

  function updateTotalCost() {
    const checkedCount = document.querySelectorAll(
      'input[type="checkbox"]:checked'
    ).length;
    const roomType = new URLSearchParams(window.location.search);
    // Check if a query parameter exists
    if (roomType.has('roomType')) {
    }

    // Get the value of a query parameter
    const value = roomType.get('roomType');

    let costPerCheckbox;
    if (value === 'superior') {
      costPerCheckbox = 15;
    } else if (value === 'deluxe') {
      costPerCheckbox = 12;
    } else if (value === 'standard') {
      costPerCheckbox = 8;
    }
    const dropdownValue = dropdown.value;
    let dropdownCost = 0;
    if (dropdownValue === 'vineyard') {
      dropdownCost = 8;
    } else if (dropdownValue === 'skydiving') {
      dropdownCost = 6;
    } else if (dropdownValue === 'massage') {
      dropdownCost = 5;
    }

    const totalCost = checkedCount * costPerCheckbox + dropdownCost;
    span.textContent = `Totalcost: $${totalCost}`;
  }
});
