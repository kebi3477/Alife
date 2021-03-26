const mainMonsterWrap = document.querySelector(".main__monster-wrap");
const mainMonster = document.querySelector(".main__monster")
const mainMonsterEye = document.querySelectorAll(".main__monster--eye");

window.onmousemove = e => {
    const boxPositionX = mainMonsterWrap.offsetLeft + mainMonsterWrap.offsetWidth/2;
    const boxPositionY = mainMonsterWrap.offsetTop + mainMonsterWrap.offsetHeight/2;
    const range = 15;
    const left = (e.clientX-boxPositionX)/(range+10)+1068.94;
    const top = (e.clientY-boxPositionY)/range-522.49;
    const left2 = (e.clientX-boxPositionX)/(range+10)+907.736;
    const top2 = (e.clientY-boxPositionY)/range-522.49;
    // const cx = mainMonsterEye[0].cx.baseVal.value;  
    // const cy = mainMonsterEye[0].cy.baseVal.value;

    // console.log(e.clientX)
    // mainMonsterEye[0].cx.baseVal.value = (e.clientX-mainMonsterWrap.offsetWidth)/20;
    mainMonsterEye[0].style.transform = `translate(${left}px, ${top}px)`;
    mainMonsterEye[1].style.transform = `translate(${left2}px, ${top2}px)`;
}