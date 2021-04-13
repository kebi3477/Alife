const main = document.querySelector("#main");
window.onload = () => {
    const monster = document.querySelector(".monster");
    const monsterDoc = monster.contentDocument;
    const monsterEye = monsterDoc.querySelectorAll(".monster__eye");

    window.onmousemove = e => {
        const boxPositionX = monster.offsetLeft + monster.offsetWidth/2;
        const boxPositionY = monster.offsetTop + monster.offsetHeight/2;
        const range = 30;
        const left = (e.clientX-boxPositionX)/(range+10)+1066.769;
        const top = (e.clientY-boxPositionY)/range+705.373;
        const left2 = (e.clientX-boxPositionX)/(range+10)+905.376;
        const top2 = (e.clientY-boxPositionY)/range+705.373;
        
        monsterEye[0].style.transform = `translate(${left}px, ${top}px)`;
        monsterEye[1].style.transform = `translate(${left2}px, ${top2}px)`;
    }

    const mealClasses = [new Meal('chicken'), new Meal('cabbage'), new Meal('carrot'), new Meal('green_onion')];
    mealClasses.forEach(obj => {
        obj.start();
    })
}

class Meal {
    constructor(imgName) {
        this.object = `<object data="public/images/object/${imgName}.svg" type="image/svg+xml"></object>`;
        this.x = Math.floor(Math.random() * 1800);
        this.y = Math.floor(Math.random() * 800);
        this.reverseX = Math.floor(Math.random() * 2) ? true : false;
        this.reverseY = false;
        this.speed = Math.random() * 1 + .5;

        const mealSVG = document.createElement("div");
        mealSVG.innerHTML = this.object;
        mealSVG.style.position = "absolute";
        mealSVG.style.width = 'fit-content';
        this.mealSVG = mealSVG;
        main.append(this.mealSVG);
    }
    moveObject() {
        this.mealSVG.style.left = `${this.x}px`;
        this.mealSVG.style.top = `${this.y}px`;
        if(this.mealSVG.offsetLeft + this.mealSVG.offsetWidth > document.body.offsetWidth) {
            this.reverseX = true;
        } else if(this.mealSVG.offsetLeft <= 0) {
            this.reverseX = false;
        }
        if(this.mealSVG.offsetTop + this.mealSVG.offsetHeight > window.innerHeight) {
            this.reverseY = true;
        } else if(this.mealSVG.offsetTop <= 0) {
            this.reverseY = false;
        }
        this.x = this.reverseX ? this.x - this.speed : this.x + this.speed;
        this.y = this.reverseY ? this.y - this.speed : this.y + this.speed;
    }
    start() {
        setInterval(() => this.moveObject(), 1);
    }
}
