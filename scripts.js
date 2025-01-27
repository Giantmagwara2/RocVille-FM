document.addEventListener("DOMContentLoaded", function() {
    // Add active class to the current page in the navigation
    const currentPage = window.location.pathname.split("/").pop();
    const navLinks = document.querySelectorAll("nav ul li a");

    navLinks.forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("active");
        }
    });

    // Smooth scrolling for anchor links
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            const targetId = this.getAttribute("href").slice(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            } else {
                console.warn(`Target element #${targetId} not found.`);
            }
        });
    });

    // Play/Pause button functionality for live stream
    const playPauseBtn = document.getElementById('playPauseBtn');
    const audioPlayer = document.getElementById('audioPlayer'); // Audio player reference
    let isPlaying = false;

    if (playPauseBtn) {
        playPauseBtn.addEventListener('click', function() {
            isPlaying = !isPlaying;

            if (isPlaying) {
                audioPlayer.play();  // Play the audio stream
                playPauseBtn.textContent = "Pause";  // Update button text
                console.log("Playing audio...");
            } else {
                audioPlayer.pause();  // Pause the audio stream
                playPauseBtn.textContent = "Play";  // Update button text
                console.log("Pausing audio...");
            }
        });
    }

    // Interactive behavior for hero section (hover effect)
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        heroSection.style.transition = 'transform 0.3s ease'; // Ensure transition is set up outside of event listeners

        heroSection.addEventListener('mouseenter', () => {
            heroSection.style.transform = 'scale(1.05)';
        });

        heroSection.addEventListener('mouseleave', () => {
            heroSection.style.transform = 'scale(1)';
        });
    }

    // Form handling - validation and submission
    const forms = document.querySelectorAll("form");

    forms.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form from submitting by default

            let isValid = true;
            const formInputs = form.querySelectorAll("input, textarea, select");

            formInputs.forEach(input => {
                if (input.required && !input.value.trim()) {
                    input.style.borderColor = "red"; // Highlight invalid inputs
                    isValid = false;
                } else {
                    input.style.borderColor = ""; // Remove any previous highlight
                }
            });

            // Custom validation for email input
            const emailInput = form.querySelector("input[type='email']");
            if (emailInput && emailInput.required && !validateEmail(emailInput.value)) {
                emailInput.style.borderColor = "red"; // Highlight invalid email
                isValid = false;
            }

            if (isValid) {
                // Perform the form submission (this could be an AJAX request, or form action)
                console.log("Form is valid! Submitting...");
                form.reset(); // Reset form after submission
                alert('Form submitted successfully!');
            } else {
                console.warn("Form is invalid!");
            }
        });
    });

    // Helper function to validate email format
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zAZ0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(String(email).toLowerCase());
    }

    // Poll and survey sidebar functionality
    const sidebar = document.querySelector('.sidebar');
    const pollButton = document.querySelector('#pollButton');
    const pollCloseButton = document.querySelector('#pollCloseButton');

    if (pollButton) {
        pollButton.addEventListener('click', () => {
            sidebar.classList.add('active');  // Show sidebar when button is clicked
        });
    }

    if (pollCloseButton) {
        pollCloseButton.addEventListener('click', () => {
            sidebar.classList.remove('active');  // Hide sidebar when close button is clicked
        });
    }

    // Submit poll/survey results
    const pollForm = document.querySelector('.sidebar form');
    if (pollForm) {
        pollForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const selectedOption = pollForm.querySelector('input[type="radio"]:checked');
            if (selectedOption) {
                console.log("Poll submitted: " + selectedOption.value); // Simulate poll submission
                alert('Thank you for voting!');
                sidebar.classList.remove('active'); // Hide sidebar after submission
            } else {
                alert('Please select an option!');
            }
        });
    }
});

// Countdown timer logic
const eventDate = new Date('2025-02-15T00:00:00').getTime();
const countdownElement = document.getElementById('countdown-timer');

function updateCountdown() {
    const now = new Date().getTime();
    const distance = eventDate - now;

    if (distance < 0) {
        countdownElement.innerHTML = "The event is live!";
    } else {
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }
}

setInterval(updateCountdown, 1000);

// Simulate form submission for now
function simulateFormSubmission() {
    const form = document.getElementById('contactForm');
    const isValid = form.checkValidity();

    if (isValid) {
        document.getElementById('formFeedback').style.display = 'block';
        document.getElementById('formFeedback').innerHTML = 'Thank you for your message! We will get back to you soon.';
        form.reset(); // Reset form after submission
    } else {
        document.getElementById('formFeedback').style.display = 'block';
        document.getElementById('formFeedback').innerHTML = 'Please fill in all required fields correctly.';
    }
}

// Attach the form submission simulation to the submit button
document.getElementById('contactForm').addEventListener('submit', simulateFormSubmission);
