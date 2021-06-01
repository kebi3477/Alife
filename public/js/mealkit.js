fetch('controller/mealkit/getMealkitByFridge')
.then(mealkits => mealkits.json())
.then(mealkits => {
    appendMealkitItem(mealkits, 'fridge');
})

function appendMealkitItem(mealkits, listName) {
    const list = document.querySelector(`.${listName}`);
    mealkits.forEach(data => {
        const item = document.createElement('div');
        item.classList.add('mealkit__item');
        item.innerHTML = `
            <div class="mealkit__image"></div>
            <div class="mealkit__wrap">
                <div class="mealkit__tag"></div>
                <div class="mealkit__text--small">${data.mealkit_cname}</div>
                <div class="mealkit__text--big">${data.mealkit_name}</div>
                <div class="mealkit__text--right">
                    <div class="mealkit__text--won">${Number(data.mealkit_price).toLocaleString()}</div>
                    원
                </div>
            </div>
        `;
        item.querySelector('.mealkit__image').style.backgroundImage = `url(mealkits/${data.mealkit_id}/title_img.jpg)`;
        item.onclick = () => location.href = `mealkitDetail/${data.mealkit_id}`;
        list.append(item);
    })  
}