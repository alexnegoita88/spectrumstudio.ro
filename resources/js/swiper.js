// Import Swiper styles
import '/node_modules/swiper/swiper-bundle.min.css';

// core version + navigation, pagination, zoom, and thumbs modules:
import Swiper from 'swiper';
import { Autoplay, EffectCards, EffectCoverflow, EffectCreative, EffectCube, EffectFade, EffectFlip, Navigation, Pagination, Zoom } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/zoom';

// Initialize Swiper instances
const mainSwiper = new Swiper('.swiper-container-main', {
    modules: [Navigation, Pagination, Zoom],
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    thumbs: {
        swiper: {
            el: '.swiper-container-thumbs',
            slidesPerView: 4,
            spaceBetween: 10,
        },
    },
    zoom: {
        maxRatio: 3, // Maximum zoom ratio
    },
});

const modalSwiper = new Swiper('.swiper-container-modal', {
    modules: [Navigation, Pagination, Zoom],
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    zoom: {
        maxRatio: 3, // Maximum zoom ratio
    },
});

// Function to open modal
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('show');
    modalSwiper.update(); // Ensure the modal swiper is updated
}

// Function to close modal
function closeModal() {
    document.getElementById('modal').classList.remove('show');
    document.getElementById('modal').classList.add('hidden');
}

// Event listener for opening modal
document.querySelectorAll('.swiper-slide img').forEach((image) => {
    image.addEventListener('click', openModal);
});

// Event listener for closing modal
const closeModalBtn = document.getElementById('close-modal');
if (closeModalBtn) {
    closeModalBtn.addEventListener('click', closeModal);
}



// Optional: Close the modal when clicking outside the gallery
const modal = document.getElementById('modal');
if (modal) {
    modal.addEventListener('click', (event) => {
        if (event.target === event.currentTarget) {
            closeModal();
        }
    });
}


const swiperContainer = document.querySelector('.header-swiper');
if(swiperContainer) {
    const effectType = swiperContainer.getAttribute('data-effect') || 'slide'; // Fallback: 'slide' dacă nu există valoare
    
    // Initialize Swiper instances
    const headerSwiper = new Swiper(swiperContainer, {
        modules: [Navigation, Pagination, Zoom, Autoplay, EffectFade, EffectCreative, EffectCube, EffectCoverflow, EffectFlip, EffectCards],
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        autoplay: true,
        effect: effectType, // Setează efectul din baza de date, /* 'slide', 'fade', 'cube', 'coverflow', 'flip', 'creative', 'cards' */
        keyboard: {
            enabled: true,
        },
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
}