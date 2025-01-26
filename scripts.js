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
    let isPlaying = false;

    if (playPauseBtn) {
        playPauseBtn.addEventListener('click', function() {
            isPlaying = !isPlaying;
            if (isPlaying) {
                playPauseBtn.textContent = "Pause";
                // Add your audio playing functionality here (e.g., play the audio)
                console.log("Playing audio...");
            } else {
                playPauseBtn.textContent = "Play";
                // Add your audio pausing functionality here (e.g., pause the audio)
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
