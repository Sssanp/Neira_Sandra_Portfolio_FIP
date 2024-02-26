export function gsapscroll() {
    //gsap 
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

        scrollLink();
    });


}
