const alifeBasket = localStorage.getItem('alife_basket');

if(alifeBasket) {
    const mealkits = JSON.parse(alifeBasket);
    const basketList = document.querySelector('.basket__list');
    mealkits.forEach(data => {
        const basketItem = document.createElement('div');
        data.checked = false;
        data.amount = 1;
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
            ${data.mealkit_sprice !== '0' ? `<div class='basket__label--small basket__label--sale'>${(parseInt(data.mealkit_sprice)+parseInt(data.mealkit_price)).toLocaleString()}원</div>` : ""}
            <div class="basket__delete"><img src="public/images/icon/close.svg"></div>
        `
        basketItem.querySelector('.amount').addEventListener('change', function() {
            data.amount = this.value;
            this.parentElement.nextElementSibling.innerText = `${(data.mealkit_price*this.value).toLocaleString()}원`;
            if(data.mealkit_sprice !== '0') {
                this.parentElement.nextElementSibling.nextElementSibling.innerText = `${((data.mealkit_price*this.value)+(parseInt(data.mealkit_sprice)*this.value)).toLocaleString()}원`;
            }
            setPriceData();
        })
        basketItem.querySelector('.basket__delete').addEventListener('click', function() {
            if(confirm('삭제하시겠습니까?')) {
                const filtering = mealkits.filter(mealkit => mealkit.mealkit_id !== data.mealkit_id);
                basketItem.remove();
                localStorage.setItem('alife_basket', JSON.stringify(filtering));
            }
        })
        basketItem.querySelector('input.basket__checkbox').addEventListener('change', function() {
            data.checked = this.checked;
            setPriceData();
        })        
        basketList.append(basketItem);
    })

    function setPriceData() {
        let prices = 0, sprices = 0, sfees = 0, psfees = 0, total;
        mealkits.forEach(json => {
            if(json.checked) {
                prices += parseInt(json.mealkit_price)*json.amount;
                sprices += parseInt(json.mealkit_sprice)*json.amount;
                sfees = Math.max(parseInt(json.mealkit_sfee), sfees);
                psfees = Math.max(parseInt(json.mealkit_psfree), psfees);
            }
        })
        total = prices + sprices + sfees + psfees;

        document.querySelector('.price').innerText = `${prices.toLocaleString()}원`;
        document.querySelector('.sprice').innerText = `${sprices.toLocaleString()}원`;
        document.querySelector('.tprice').innerText = `${(prices-sprices).toLocaleString()}원`;
        document.querySelector('.sfee').innerText = `${sfees.toLocaleString()}원`;
        document.querySelector('.psfee').innerText = `${psfees.toLocaleString()}원`;
        document.querySelector('.tsfee').innerText = `${(sfees+psfees).toLocaleString()}원`;
        document.querySelector('.total').innerText = `${total.toLocaleString()}원`;
    }
}
