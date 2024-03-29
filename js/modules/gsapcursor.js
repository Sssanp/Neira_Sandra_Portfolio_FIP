
export function cursorgsap() {

    //gsap 
    gsap.registerPlugin(ScrollToPlugin);
    gsap.registerPlugin(ScrollTrigger);

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
    })


}

