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
        heroSection.addEventListener('mouseenter', () => {
            heroSection.style.transform = 'scale(1.05)';
            heroSection.style.transition = 'transform 0.3s ease';
        });

        heroSection.addEventListener('mouseleave', () => {
            heroSection.style.transform = 'scale(1)';
        });
    }
});
