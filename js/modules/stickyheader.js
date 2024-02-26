export function stickyheader() {

    const header = document.querySelector("header");

    // Header
    function toggleStickyHeader() {
        if (window.scrollY > 100) {
            header.classList.add("sticky-header");
        } else {
            header.classList.remove("sticky-header");
        }
    }

    //Event Listeners

    window.addEventListener("scroll", toggleStickyHeader);

    toggleStickyHeader();

}
