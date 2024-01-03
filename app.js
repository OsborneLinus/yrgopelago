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
