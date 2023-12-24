
 let valueDisplays = document.querySelectorAll(".num");
let interval = 4000;

function startCounterAnimation(entries, observer) {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      let valueDisplay = entry.target;
      let startValue = 0;
      let endValue = parseInt(valueDisplay.getAttribute("data-val"));
      if(endValue===15000){
        duration=12;
        let counter = setInterval(function () {
        startValue += 50;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
          clearInterval(counter);
          observer.unobserve(valueDisplay);
        }
      }, duration);
      }
      else{
        duration=Math.floor(interval/endValue);
      
      let counter = setInterval(function () {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
          clearInterval(counter);
          observer.unobserve(valueDisplay);
        }
      }, duration);
    }
  }
  });
}

// Create an Intersection Observer
let observer = new IntersectionObserver(startCounterAnimation, { threshold: 0.5 });

// Observe each .num element
valueDisplays.forEach((valueDisplay) => {
  observer.observe(valueDisplay);
});


