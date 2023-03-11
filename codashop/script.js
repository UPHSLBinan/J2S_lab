var slides = document.getElementsByClassName('slide');
var currentSlide = 0;

function showSlide() {
  // Hide all slides
  for (var i = 0; i < slides.length; i++) {
    slides[i].classList.remove('active');
  }
  
  // Show the current slide
  slides[currentSlide].classList.add('active');
  
  // Move to the next slide
  currentSlide++;
  if (currentSlide >= slides.length) {
    currentSlide = 0;
  }
  
  // Repeat the process after a delay
  setTimeout(showSlide, 3000);
}

showSlide();
