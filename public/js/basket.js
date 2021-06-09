import getPoint from './point.js';
const alifeBasket = localStorage.getItem('alife_basket');
let state = 0, total = 0;

if(alifeBasket) {
    const mealkits = JSON.parse(alifeBasket);
    const basketList = document.querySelector('.basket__list');
    const basketButton = document.querySelector('.basket__button');

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
            <div class="basket__label--bold">${(parseInt(data.mealkit_price)-parseInt(data.mealkit_sprice)).toLocaleString()}원</div>
            ${data.mealkit_sprice !== '0' ? `<div class='basket__label--small basket__label--sale'>${parseInt(data.mealkit_price).toLocaleString()}원</div>` : ""}
            <div class="basket__delete"><img src="public/images/icon/close.svg"></div>
        `
        basketItem.querySelector('.amount').addEventListener('change', function() {
            data.amount = this.value;
                this.parentElement.nextElementSibling.innerText = `${(parseInt(data.mealkit_price)*this.value-parseInt(data.mealkit_sprice)*this.value).toLocaleString()}원`;
            if(data.mealkit_sprice !== '0') {
                this.parentElement.nextElementSibling.nextElementSibling.innerText = `${parseInt(data.mealkit_price*this.value).toLocaleString()}원`;
            }
            setPriceData();
        })
        basketItem.querySelector('.basket__delete').addEventListener('click', function() {
            if(confirm('삭제하시겠습니까?')) {
                const filtering = mealkits.filter(mealkit => mealkit.mealkit_id !== data.mealkit_id);
                basketItem.remove();
                localStorage.setItem('alife_basket', JSON.stringify(filtering));
                data.checked = false;
                setPriceData();
            }
        })
        basketItem.querySelector('input.basket__checkbox').addEventListener('change', function() {
            data.checked = this.checked;
            setPriceData();
        })
        basketList.append(basketItem);
    })

    basketButton.addEventListener('click', function() {
        stateButton();
    })

    function setPriceData() {
        let prices = 0, sprices = 0, sfees = 0, psfees = 0;
        mealkits.forEach(json => {
            if(json.checked) {
                prices += parseInt(json.mealkit_price)*json.amount;
                sprices += parseInt(json.mealkit_sprice)*json.amount;
                sfees = Math.max(parseInt(json.mealkit_sfee), sfees);
                psfees = Math.max(parseInt(json.mealkit_psfree), psfees);
            }
        })
        total = prices - sprices + sfees + psfees;

        document.querySelector('.price').innerText = `${prices.toLocaleString()}원`;
        document.querySelector('.sprice').innerText = `${sprices.toLocaleString()}원`;
        document.querySelector('.tprice').innerText = `${(prices-sprices).toLocaleString()}원`;
        document.querySelector('.sfee').innerText = `${sfees.toLocaleString()}원`;
        document.querySelector('.psfee').innerText = `${psfees.toLocaleString()}원`;
        document.querySelector('.tsfee').innerText = `${(sfees+psfees).toLocaleString()}원`;
        document.querySelector('.total').innerText = `${total.toLocaleString()}원`;
    }

    function stateButton() {
        if(state === 0) {
            let flag = false;
            mealkits.forEach(data => data.checked && !flag ? flag = true : '');
            if(flag) {
                basketButton.innerText = '결제하기';
                document.querySelector('.order').style.display = 'block';
                document.querySelectorAll('.basket__item').forEach(el => el.remove());
                mealkits.forEach(data => {
                    if(data.checked) {
                        const basketItem = document.createElement('div');
                        basketItem.classList.add('basket__item');
                        basketItem.innerHTML = `
                            <div></div>
                            <div class="basket__img"><img src='mealkits/${data.mealkit_id}/title_img.jpg'></div>
                            <div class="basket__info">
                                <div class="basket__label--small">${data.mealkit_cname}</div>
                                <div class="basket__label--middle">${data.mealkit_name}</div>
                            </div>
                            <div class="basket__number">${data.amount}</div>
                            <div class="basket__label--bold">${((parseInt(data.mealkit_price)-parseInt(data.mealkit_sprice))*data.amount).toLocaleString()}원</div>
                            <div></div>
                        `
                        basketList.append(basketItem);
                    }
                })
                getPoint()
                .then(json => {
                    document.querySelector('.order__point').innerText = `${json.name} ${json.benefit}`;
                })
                state++;
            } else {
                alert('한 개 이상은 선택하셔야 합니다!');
            }
        } else if(state === 1) {
            const IMP = window.IMP; // 생략가능
            const user = {
                name : document.querySelector('.order__name').textContent,
                phone : document.querySelector('.order__phone').textContent,
                email : document.querySelector('.order__email').textContent,
                address : document.querySelector('.order__address').textContent,
            }
            IMP.init('imp74513661');
            IMP.request_pay({
                pg: 'toss', // version 1.1.0부터 지원.
                pay_method: 'card',
                merchant_uid: 'merchant_' + new Date().getTime(),
                name: `ALife`,
                amount: total,
                buyer_email: user.email,
                buyer_name: user.name,
                buyer_tel: user.phone,
                buyer_addr: user.address,
                buyer_postcode: '123-456',
            }, function (rsp) {
                console.log(rsp);
                if (rsp.success) {
                    var msg = '결제가 완료되었습니다.';
                    msg += '고유ID : ' + rsp.imp_uid;
                    msg += '상점 거래ID : ' + rsp.merchant_uid;
                    msg += '결제 금액 : ' + rsp.paid_amount;
                    msg += '카드 승인번호 : ' + rsp.apply_num;
                } else {
                    var msg = '결제에 실패하였습니다.';
                    msg += '에러내용 : ' + rsp.error_msg;
                }
                alert(msg);
            });
        }
    }
}