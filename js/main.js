//Variables

const player = new Plyr('video');

const header = document.querySelector("header");

const hamburgerOpenIcon = document.querySelector("#hamburger-open"),
    hamburgerCloseIcon = document.querySelector("#hamburger-close"),
    hamburgerMenu = document.querySelector("#hamburger-menu");



// Header
function toggleStickyHeader() {
    if (window.scrollY > 100) {
        header.classList.add("sticky-header");
    } else {
        header.classList.remove("sticky-header");
    }
}

//Hamburger Menu

function openHamburgerMenu() {
    //Show the hamburger menu
    hamburgerMenu.style.visibility = "visible";
}

function closeHamburgerMenu() {
    //Hide the hamburger menu
    hamburgerMenu.style.visibility = "hidden";
}


//Event Listeners

window.addEventListener("scroll", toggleStickyHeader);

hamburgerOpenIcon.addEventListener("click", openHamburgerMenu);
hamburgerCloseIcon.addEventListener("click", closeHamburgerMenu);



// GSAP Animations
(() => {

    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);

    const navLinks = document.querySelectorAll("#main-nav nav ul li a");

    function scrollLink(e) {
        e.preventDefault();
        console.log(e.currentTarget.hash);
        let selectedLink = e.currentTarget.hash;
        gsap.to(window, { duration: 1, scrollTo: { y: `${selectedLink}`, offsetY: 100 } });
    }

    navLinks.forEach((link) => {
        link.addEventListener("click", scrollLink);
    });

})();