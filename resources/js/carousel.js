document.addEventListener('DOMContentLoaded', function() {
    const carouselInner = document.querySelector('.carousel-inner');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const items = document.querySelectorAll('.carousel-item');
    const itemsPerPage = 3;
    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * (100 / itemsPerPage);
        carouselInner.style.transform = `translateX(${offset}%)`;
    }

    nextButton.addEventListener('click', () => {
        if (currentIndex < items.length - itemsPerPage) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCarousel();
    });

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = items.length - itemsPerPage;
        }
        updateCarousel();
    });

    // Optional: Handle swipe gestures on mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carouselInner.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    carouselInner.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        if (touchEndX < touchStartX) {
            nextButton.click();
        } else if (touchEndX > touchStartX) {
            prevButton.click();
        }
    }
});