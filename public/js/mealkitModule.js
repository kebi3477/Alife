function appendMealkitItem(mealkits, listName) {
    const list = document.querySelector(`.${listName}`);
    if(mealkits.length === 0) {
        list.innerHTML = `<a href="/mealkit"><div class="mypage__button">밀키트 찾아보기</div></a>`;
    } else {
        mealkits.forEach(data => {
            const item = document.createElement('div');
            item.classList.add('mealkit__item');
            item.innerHTML = `
                <div class="mealkit__image"></div>
                <div class="mealkit__wrap">
                    <div class="mealkit__tag ${data.mealkit_tag}">${data.mealkit_tag}</div>
                    <div class="mealkit__text--small">${data.mealkit_cname}</div>
                    <div class="mealkit__text--big">${data.mealkit_name}</div>
                    <div class="mealkit__text--right">
                        <div class='mealkit__text--swon'>${+data.mealkit_sprice !== 0 ? Number(data.mealkit_price).toLocaleString() + "원" : ''}</div>
                        <div class="mealkit__text--won">${Number(+data.mealkit_price-data.mealkit_sprice).toLocaleString()}</div>
                        원
                    </div>
                </div>
            `;
            item.querySelector('.mealkit__image').style.backgroundImage = `url(/mealkits/${data.mealkit_id}/title_img.jpg)`;
            item.onclick = () => location.href = `/mealkitDetail/${data.mealkit_id}`;
            list.append(item);
        })  
    }
}

export default appendMealkitItem;