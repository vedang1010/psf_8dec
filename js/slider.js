
  const slider = document.querySelector('.slider');
  const slides = document.querySelector('.slides');
  const dots = document.querySelectorAll('.dot');

  let currentSlide = 0;

  function updateSlider() {
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;

    dots.forEach((dot, index) => {
      dot.classList.toggle('active', index === currentSlide);
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % 3;
    updateSlider();
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + 3) % 3;
    updateSlider();
  }

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      currentSlide = index;
      updateSlider();
    });
  });

  setInterval(nextSlide, 5000); // Auto-scroll every 5 seconds
