const thumbsup = document.querySelector('.thumbsup');
const basket = document.querySelector('.basket');
const local = JSON.parse(localStorage.getItem('alife_basket'));

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
        console.log(msg);
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
        }
    } catch(e) {
        console.error(e);
    }
})
    