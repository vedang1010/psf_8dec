// Function to wrap words in <span> elements with animation
function wrapWordsInSpans() {
  const paragraph = document.querySelector('.theme-para');
  const words = paragraph.textContent.split(/\s+/);

  paragraph.innerHTML = ''; // Clear existing content

  words.forEach((word, index) => {
    const span = document.createElement('span');
    span.textContent = word;
    span.style.opacity = 0;
    span.style.filter = 'blur(4px)';
    span.style.animation = `fade-in 0.8s ${index * 0.05}s forwards cubic-bezier(0.11, 0, 0.5, 0)`;
    paragraph.appendChild(span);

    // If the word does not end with punctuation or it's not the last word, add a space after it
    const space = document.createElement('span');
    space.textContent = ' ';
    paragraph.appendChild(space);
  });
}

// Function to check if the top of an element is in the viewport
function isTopInViewport(element) {
  const rect = element.getBoundingClientRect();
  return rect.top <= (window.innerHeight || document.documentElement.clientHeight);
}

// Function to handle scroll events
function handleScroll() {
  const paragraph = document.querySelector('.theme-para');

  if (isTopInViewport(paragraph)) {
    wrapWordsInSpans(); // Call the function to wrap words in spans
    window.removeEventListener('scroll', handleScroll); // Remove the scroll event listener once it's done
  }
}

// Add a scroll event listener
window.addEventListener('scroll', handleScroll);

// Trigger the check once on page load (in case the element is already in the viewport)
handleScroll();
