const thumbsup = document.querySelector('.thumbsup');
const basket = document.querySelector('.basket');
const payment = document.querySelector('.payment');
const local = JSON.parse(localStorage.getItem('alife_basket'));
const mealkitId = {'url': new URL(window.location).pathname.split('/')[2]};

if(!local) {
    localStorage.setItem('alife_basket', '[]');
}

thumbsup.addEventListener('click', function() {
    const formData = new FormData();
    formData.append('id', this.getAttribute('data-id'));
    fetch('/controller/mealkit/setThumbsup', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        const heart = thumbsup.querySelector('svg > path');
        if(msg.status === 'A200') {
            heart.style.fill = '#fff';
        } else if(msg.status === 'A401') {
            heart.style.fill = 'transparent';
        } else {
            alert('오류가 발생하였습니다.');
        }
    })
})

basket.addEventListener('click', function() {
    try {
        const mealkit = JSON.parse(document.querySelector('.mealkit__json').value);
        const basketArr = JSON.parse(localStorage.getItem('alife_basket'));
        const filtering = basketArr.filter(json => json.mealkit_id === mealkit.mealkit_id);
        
        if(filtering.length) {
            alert('이미 장바구니에 존재합니다!');
        } else {
            basketArr.push(mealkit);
            localStorage.setItem('alife_basket', JSON.stringify(basketArr));
            if(confirm('장바구니에 담겼습니다. 이동하시겠습니까?')) {
                location.href = '/basket';
            }
        }
    } catch(e) {
        console.error(e);
    }
})
    
payment.onclick = () => location.href = '/basket';

fetch('/controller/mealkit/isThumbsup', {
    method: 'POST',
    body: JSON.stringify(mealkitId)
})
.then(msg => msg.json())
.then(msg => {
    const heart = thumbsup.querySelector('svg > path');
    if(msg.status === 'A200') {
        heart.style.fill = '#fff';
    } else {
        heart.style.fill = 'transparent';
    }
})