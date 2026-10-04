const navbar = document.querySelector('.navbar');

window.onscroll = () => {
    if(window.scrollY > 0){
        navbar.classList.add('scrollNav');
    }else{
        navbar.classList.remove('scrollNav');
    }
}

const galleryModal = document.getElementById('lightboxModal');
const galleryLightboxImage = document.getElementById('lightboxImage');

galleryModal?.addEventListener('show.bs.modal', (event) => {
    const imageUrl = event.relatedTarget?.dataset.src;

    if (imageUrl && galleryLightboxImage) {
        galleryLightboxImage.src = imageUrl;
    }
});

const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightbox-img');
const lightboxDownload = document.getElementById('lightbox-download');

document.querySelectorAll('[data-lightbox-src]').forEach((trigger) => {
    trigger.addEventListener('click', () => {
        const imageUrl = trigger.dataset.lightboxSrc;

        if (imageUrl && lightbox && lightboxImage && lightboxDownload) {
            lightboxImage.src = imageUrl;
            lightboxDownload.href = imageUrl;
            lightbox.style.display = 'flex';
        }
    });
});

lightbox?.querySelector('.lightbox-close')?.addEventListener('click', () => {
    lightbox.style.display = 'none';
});

lightbox?.addEventListener('click', (event) => {
    if (event.target === lightbox) {
        lightbox.style.display = 'none';
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && lightbox) {
        lightbox.style.display = 'none';
    }
});
