let navbar = document.querySelector('.navbar');

const lightboxModal = document.getElementById('lightboxModal');
const lightboxImage = document.getElementById('lightboxImage');

lightboxModal?.addEventListener('show.bs.modal', (event) => {
    const imageUrl = event.relatedTarget?.dataset.src;

    if (imageUrl && lightboxImage) {
        lightboxImage.src = imageUrl;
    }
});

window.onscroll = () => {
    if(window.scrollY > 0){
        navbar.classList.add('scrollNav');
    }else{
        navbar.classList.remove('scrollNav');
    }
}