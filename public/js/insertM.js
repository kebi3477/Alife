import loading from './loading.js';
const insert = document.querySelector('.insert');
const files = document.querySelectorAll('input[type=file]');
const submit = document.querySelector('.insert__submit');
const reset = document.querySelector('.insert__button[type=reset]');

files.forEach(file => {
    file.addEventListener('change', function() {
        const insertImg = this.nextElementSibling;
        if(this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                insertImg.innerText = "";
                insertImg.style.backgroundImage = `url("${e.target.result}")`;
            }
            reader.readAsDataURL(this.files[0]);
        }
    })
})
submit.addEventListener('click', function() {
    loading.start();
    fetch('controller/mealkit/setMealkit', {
        method: 'POST',
        body: new FormData(insert)    
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A400') {
            alert('값이 비어 있습니다!');
        } else if(msg.status === 'A200') {
            alert('등록 성공');
            location.href = '/mealkit';
        }
        loading.end();
    })
})
reset.onclick = () => history.back();