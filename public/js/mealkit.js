import appendMealkitItem from './mealkitModule.js';

fetch('controller/mealkit/getMealkitByPayment')
.then(mealkits => mealkits.json())
.then(mealkits => {
    appendMealkitItem(mealkits, 'payment');
})

fetch('controller/mealkit/getMealkitByCompany')
.then(json => json.json())
.then(json => {
    document.querySelector('.company').previousElementSibling.innerText = `${json.company}의 상품을 더 보고 싶다면?`;
    appendMealkitItem(json.mealkits, 'company');
})

fetch('controller/mealkit/getMealkitByDiscount')
.then(mealkits => mealkits.json())
.then(mealkits => {
    appendMealkitItem(mealkits, 'discount');
})