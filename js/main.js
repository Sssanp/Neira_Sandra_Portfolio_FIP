//Variables

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


