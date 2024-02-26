
import { initBurgerMenu } from './modules/burger-menu.js';
import { stickyheader } from './modules/stickyheader.js';
import { player } from './modules/player.js';
//import { gsapScroll } from './modules/scrollAnimation.js';
import { cursorgsap } from './modules/gsapcursor.js';

//
initBurgerMenu();
stickyheader();
cursorgsap();


//Depending of the page

if (document.body.dataset.page === "home") {
    player();
    stickyheader();

}




