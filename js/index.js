const slides = document.querySelectorAll(".slide");
const eye = document.querySelector(".eye");
const eyeIn = eye.querySelector(".eye-in");
let scrolling = true;
let preScroll = 0;
let now = 0;

// window.scroll(0, 0);
window.onmousemove = e => {
    const innerWidth = window.innerWidth/2;
    const innerHeight = window.innerHeight/2;
    const range = 30;
    const left = (e.clientX-innerWidth)/range;
    const top = (e.clientY-innerHeight)/range;
    eyeIn.style.transform = `translate(${left}px, ${top}px)`;
}
window.onscroll = () => {
    const scrollY = window.scrollY;
    const height = window.innerHeight;
    console.log(scrollY, height, preScroll)
    if(preScroll > scrollY) {
        preScroll = scrollY;
        if(scrolling) {
            console.log("up", `now : ${now}`);
            scrolling = false;
            upperScroll(height);
            setTimeout(() => scrolling = true, 800);
        }
    } else {
        preScroll = scrollY;
        if(scrolling) {
            console.log("down", `now : ${now}`);
            scrolling = false;
            downScroll(height);
            setTimeout(() => scrolling = true, 800);
        }
    }
}

function upperScroll(height) {
    now--;
    window.scroll(0, height*now);
    console.log(now);
}

function downScroll(height) {
    now++;
    window.scroll(0, height*now);
    console.log(now);
}