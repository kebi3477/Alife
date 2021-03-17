const slides = document.querySelectorAll(".slide");
const eyeIn = document.querySelector(".eye__in");
let scrolling = true;
let preScroll = 0;
let now = 0;

// window.scroll(0, 0);
window.onmousemove = e => {
    const width = window.innerWidth / 2;
    const height = window.innerHeight / 2;
    const left = e.clientX/10;
    const top = e.clientY/10;
    console.log(left, top);
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