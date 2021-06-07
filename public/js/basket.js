const alifeBasket = localStorage.getItem('alife_basket');

if(alifeBasket) {
    const mealkits = JSON.parse(alifeBasket);
    const basketList = document.querySelector('.basket__list');
    mealkits.forEach(data => {
        const basketItem = document.createElement('div');
        basketItem.classList.add('basket__item');
        basketItem.innerHTML = `
            <div class="basket__checkbox">
                <input class="basket__checkbox" type="checkbox">
            </div>
            <div class="basket__img"><img src='mealkits/${data.mealkit_id}/title_img.jpg'></div>
            <div class="basket__info">
                <div class="basket__label--small">${data.mealkit_cname}</div>
                <div class="basket__label--middle">${data.mealkit_name}</div>
            </div>
            <div class="basket__number"><input class='amount' type="number" value=1 min=1></div>
            <div class="basket__label--bold">${parseInt(data.mealkit_price).toLocaleString()}원</div>
            <div class="basket__delete"><img src="public/images/icon/close.svg"></div>
        `
        basketItem.querySelector('.amount').addEventListener('click', function() {
            this.parentElement.nextElementSibling.innerText = `${(data.mealkit_price*this.value).toLocaleString()}원`;
        })
        basketList.append(basketItem);
    })
}