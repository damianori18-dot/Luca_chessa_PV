let navbar = document.querySelector('.navbar');

window.onscroll = () => {
    if(window.scrollY > 0){
        navbar.classList.add('scrollNav');
    }else{
        navbar.classList.remove('scrollNav');
    }
}