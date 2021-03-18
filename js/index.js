const slides = document.querySelectorAll(".slide");
const eyeBox = document.querySelector(".eye-box");
const eye = document.querySelector(".eye");
const eyeIn = eye.querySelector(".eye-in");
let scrolling = true;
let preScroll = 0;
let now = 0;
let x=0, y=0, reverseX=false, reverseY=false;
setInterval(function() {
    eyeBox.style.left = `${x}px`;
    if(eyeBox.offsetLeft + eyeBox.offsetWidth > window.innerWidth) {
        reverseX = true;
    } else if(eyeBox.offsetLeft <= 0) {
        reverseX = false;
    }
    if(reverseX) {
        x-=2;
    } else {
        x+=2; 
    }
} ,1);
// window.scroll(0, 0);
window.onmousemove = e => {
    const boxPositionX = eyeBox.offsetLeft+eyeBox.offsetWidth/2;
    const boxPositionY = eyeBox.offsetTop+eyeBox.offsetHeight/2;
    const range = 30;
    const left = (e.clientX-boxPositionX)/range;
    const top = (e.clientY-boxPositionY)/range;
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