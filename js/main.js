//I try hard modules but end but end up not working :(

//3d model
import { Application } from '@splinetool/runtime';

(() => {

    gsap.registerPlugin(ScrollToPlugin);
    gsap.registerPlugin(ScrollTrigger);

    // scroll to projects
    const navLinks = document.querySelectorAll("#main-header nav ul li a");

    function scrollLink(e) {
        e.preventDefault();
        console.log(e.currentTarget.hash);
        let selectedLink = e.currentTarget.hash;
        gsap.to(window, { duration: 3, scrollTo: { y: `${selectedLink}`, offsetY: 100 }, ease: "power4.out" });
    }

    navLinks.forEach((link) => {
        link.addEventListener("click", scrollLink);
    });

    //cursor gsap
    const cursor = document.querySelector('.cursor');
    const cursorScale = document.querySelectorAll('.cursor-scale');
    let mouseX = 0;
    let mouseY = 0;

    gsap.to({}, 0.016, {
        repeat: -1,
        onRepeat: function () {
            gsap.set(cursor, {
                css: {
                    left: mouseX,
                    top: mouseY
                }
            });
        }
    });

    window.addEventListener('mousemove', function (e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    cursorScale.forEach(link => {
        link.addEventListener('mouseleave', () => {
            cursor.classList.remove('grow', 'grow-small');
        });

        link.addEventListener('mousemove', () => {
            cursor.classList.add('grow');
            if (link.classList.contains('small')) {
                cursor.classList.remove('grow');
                cursor.classList.add('grow-small');
            }
        });
    });


    //3d model
    const canvas = document.getElementById('canvas3d');
    //this one i took it from spline
    const app = new Application(canvas);
    app.load('https://prod.spline.design/oJLyiBfOP6yLw2MP/scene.splinecode');

    //player

    const player = new Plyr('video');



    //hambuger menu
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






    // All lightbox js

    // Constants
    const body = document.body;
    const closeBtn = document.querySelector('.close-btn');

    // Open lightbox function
    function openLightbox(lightbox) {
        if (lightbox) {
            lightbox.style.display = 'flex';
            body.style.overflow = 'hidden';
        }
    }

    // Close lightbox function
    function closeLightbox(lightbox) {
        console.log('Close button clicked'); // Check if this message appears in the console
        if (lightbox) {
            lightbox.style.display = 'none';
            body.style.overflow = 'auto';
        }
    }

    // Event delegation for close buttons and lightbox
    document.body.addEventListener('click', (event) => {
        const closeBtn = event.target.closest('.close-btn');
        if (closeBtn) {
            const lightboxId = closeBtn.getAttribute('data-lightbox-id');
            const lightbox = document.querySelector(`#${lightboxId}`);
            if (lightbox) {
                closeLightbox(lightbox);
            }
        }
    });

    // Open lightbox when the anchor link is clicked
    document.querySelectorAll('.thumb').forEach((thumb) => {
        thumb.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent the default behavior of the anchor tag
            const lightboxId = thumb.getAttribute('href').substring(1); // Remove the '#' from href
            const lightbox = document.querySelector(`#${lightboxId}`);
            openLightbox(lightbox);
        });
    });

    // Open lightbox when the anchor link in your HTML is clicked
    document.querySelector('.box-left a.thumb').addEventListener('click', (event) => {
        event.preventDefault();
        const lightbox = document.querySelector('#lightbox-1'); // Adjust the ID as needed
        openLightbox(lightbox);
    });

})();