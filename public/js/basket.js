import { getPoint } from './point.js';
const alifeBasket = localStorage.getItem('alife_basket');
let state = 0, total = 0, sale = 0;

if(alifeBasket) {
    const mealkits = JSON.parse(alifeBasket);
    const basketList = document.querySelector('.basket__list');
    const basketButton = document.querySelector('.basket__button');

    mealkits.forEach(data => {
        const basketItem = document.createElement('div');
        data.checked = false;
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
            <div class="basket__number"><input class='amount' type="number" value=${data.amount} min=1></div>
            <div class="basket__label--bold">${(parseInt(data.mealkit_price)-parseInt(data.mealkit_sprice)).toLocaleString()}원</div>
            ${data.mealkit_sprice !== '0' ? `<div class='basket__label--small basket__label--sale'>${parseInt(data.mealkit_price).toLocaleString()}원</div>` : ""}
            <div class="basket__delete"><img src="public/images/icon/close.svg"></div>
        `
        basketItem.querySelector('.amount').addEventListener('change', function() {
            data.amount = this.value;
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
    setPriceData(); 
    basketButton.addEventListener('click', function() {
        stateButton();
    })

    function setPriceData() {
        let prices = 0, sprices = 0, sfees = 0, psfees = 0;
        const amounts = document.querySelectorAll(".amount");
        mealkits.forEach((data, index) => {
            if(data.checked) {
                prices += parseInt(data.mealkit_price)*data.amount;
                sprices += parseInt(data.mealkit_sprice)*data.amount;
                sfees = Math.max(parseInt(data.mealkit_sfee), sfees);
                psfees = Math.max(parseInt(data.mealkit_psfree), psfees);
            }
            amounts[index].parentElement.nextElementSibling.innerText = `${(parseInt(data.mealkit_price)*amounts[index].value-parseInt(data.mealkit_sprice)*amounts[index].value).toLocaleString()}원`;
            if(data.mealkit_sprice !== '0') 
                amounts[index].parentElement.nextElementSibling.nextElementSibling.innerText = `${parseInt(data.mealkit_price*amounts[index].value).toLocaleString()}원`;
        })

        if(sale) sprices = prices / 100 * sale;
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
                document.querySelector('.basket__title').innerText = '주문서 작성';
                document.querySelector('.order').style.display = 'block';
                document.querySelectorAll('.basket__item').forEach(el => el.remove());
                mealkits.forEach(data => {
                    if(data.checked) {
                        const basketItem = document.createElement('div');
                        const prices = ((parseInt(data.mealkit_price)-parseInt(data.mealkit_sprice))*data.amount);
                        basketItem.classList.add('basket__item');
                        basketItem.innerHTML = `
                            <div></div>
                            <div class="basket__img"><img src='mealkits/${data.mealkit_id}/title_img.jpg'></div>
                            <div class="basket__info">
                                <div class="basket__label--small">${data.mealkit_cname}</div>
                                <div class="basket__label--middle">${data.mealkit_name}</div>
                            </div>
                            <div class="basket__number">${data.amount}</div>
                            <div class="basket__label--bold">${prices.toLocaleString()}원</div>
                            <div></div>
                            <input type='hidden' name='id[]' value=${data.mealkit_id}>
                            <input type='hidden' name='amount[]' value=${data.amount}>
                            <input type='hidden' name='price[]' value=${prices}>
                        `
                        basketList.append(basketItem);
                    }
                })
                
                getPoint().then(json => {
                    sale = parseInt(json.benefit);
                    setPriceData();
                    document.querySelector('.order__point').innerText = `${json.name} ${json.benefit}`;
                })
                state++;
            } else {
                alert('한 개 이상은 선택하셔야 합니다!');
            }
        } else if(state === 1) {
            const pg = document.querySelector('input[name=pg]:checked').value;
            const IMP = window.IMP; // 생략가능
            const user = {
                name : document.querySelector('.order__name').textContent,
                phone : document.querySelector('.order__phone').textContent,
                email : document.querySelector('.order__email').textContent,
                address : document.querySelector('.order__address').textContent,
            }
            IMP.init('imp74513661');
            IMP.request_pay({
                pg: pg, // version 1.1.0부터 지원.
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
                if (rsp.success) {
                    // 고유ID : rsp.imp_uid;
                    // 상점 거래ID : rsp.merchant_uid;
                    // 결제 금액 : rsp.paid_amount;
                    // 카드 승인번호 : rsp.apply_num;
                    const formData = new FormData(document.querySelector('.basket__wrap'));
                    formData.append('uid', rsp.imp_uid);
                    fetch('controller/mealkit/setPayment', {
                        method: 'POST',
                        body: formData
                    })
                    .then(msg => msg.json())
                    .then(msg => {
                        if(msg.status === 'A200') {
                            const dom = document.createElement('form');
                            
                            dom.classList.add('basket__wrap', 'payment');
                            dom.innerHTML = ` 
                                <div class='basket__title'>주문완료</div>
                                <div class="basket__navs">
                                <div class="basket__nav">장바구니 ></div>
                                    <div class="basket__nav">주문서 작성 ></div>
                                    <div class="basket__nav">결제 ></div>
                                    <div class="basket__nav basket__active">주문완료</div>
                                </div>
                                <img src='public/images/icon/payment.svg'>
                                <div class='payment__label'>주문이 완료되었습니다.</div>
                                <div class="payment__list">
                                    <div class="payment__item--title">주문번호 :</div>
                                    <div class="payment__item--value">${rsp.imp_uid}</div>
                                    <div class="payment__item--title">결제수단 :</div>
                                    <div class="payment__item--value">${rsp.merchant_uid}</div>
                                    <div class="payment__item--title">주문일자 :</div>
                                    <div class="payment__item--value">${new Date()}</div>
                                    <div class="payment__item--title">주문상품 :</div>
                                    <div class="payment__item--value"></div>
                                    <div class="payment__item--title">결제금액 :</div>
                                    <div class="payment__item--value">${total}</div>
                                </div>
                                <div class='payment__buttons'>
                                    <div class='payment__button'>마이페이지</div>
                                    <div class='payment__button'>계속 쇼핑하기</div>
                                </div>
                            `;
                            dom.querySelector('.payment__button:first-child').onclick = () => location.href = '/mypage';
                            dom.querySelector('.payment__button:last-child').onclick = () => location.href = '/mealkit';
                            document.querySelector('.basket').append(dom);
                            document.querySelector('.basket__wrap').remove();
                            
                        } else {
                            alert('장난 치지 마시길 바랍니다.');
                        }
                    })
                } else {
                    const msg = `결제에 실패하였습니다.`;
                    alert(msg);
                }
            });
        }
    }
}