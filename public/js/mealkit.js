import appendMealkitItem from './mealkitModule.js';

fetch('controller/mealkit/getMealkitByFridge')
.then(mealkits => mealkits.json())
.then(mealkits => {
    appendMealkitItem(mealkits, 'fridge');
})