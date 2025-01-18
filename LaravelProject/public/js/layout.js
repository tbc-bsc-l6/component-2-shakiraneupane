
//For home Page
let currentSlide = 0;
const slides = document.querySelectorAll('.slider-item');
const totalSlides = slides.length;
const dots = document.querySelectorAll('.dot');

// Function to move the slide
function moveSlide(step) {
    currentSlide += step;
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    updateSlidePosition();
}

// Function to update the slider position
function updateSlidePosition() {
    const slider = document.querySelector('.slider');
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;

    // Update the active dot
    dots.forEach((dot, index) => {
        dot.classList.remove('active');
        if (index === currentSlide) {
            dot.classList.add('active');
        }
    });
}

// Function to set current slide manually via dots
function currentSlideFunc(index) {
    currentSlide = index - 1;
    updateSlidePosition();
}

// Automatic sliding every 5 seconds
setInterval(() => {
    moveSlide(1);
}, 5000);

// Initialize the first dot as active
updateSlidePosition();


//Registration page
// Function to toggle password visibility
function togglePassword(id) {
    var passwordField = document.getElementById(id);
    var icon = passwordField.nextElementSibling;
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Change to 'eye-slash' when password is visible
    } else {
        passwordField.type = "password";
        icon.innerHTML = '<i class="fas fa-eye"></i>'; // Change back to 'eye' when password is hidden
    }
}

