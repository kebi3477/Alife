const monster = document.querySelector(".monster")
const monsterEye = document.querySelectorAll(".monster__eye");

window.onmousemove = e => {
    const boxPositionX = monster.offsetLeft + monster.offsetWidth/2;
    const boxPositionY = monster.offsetTop + monster.offsetHeight/2;
    const range = 15;
    const left = (e.clientX-boxPositionX)/(range+10)+1068.94;
    const top = (e.clientY-boxPositionY)/range-522.49;
    const left2 = (e.clientX-boxPositionX)/(range+10)+907.736;
    const top2 = (e.clientY-boxPositionY)/range-522.49;

    monsterEye[0].style.transform = `translate(${left}px, ${top}px)`;
    monsterEye[1].style.transform = `translate(${left2}px, ${top2}px)`;
}