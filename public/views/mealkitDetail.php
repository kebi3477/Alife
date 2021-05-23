<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/mealkitDetail.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
    <title>ALife</title>
</head>
<body>
    <?php include('header.php') ?>
    <div class="show padding">
        <div class="show--left">
            <div class="show__image"></div>
            <div class="show__remocon">
                <img src="public/images/icon/arrow_left.svg" alt="">
                <img src="public/images/icon/arrow_right.svg" alt="">
            </div>
        </div>
        <div class="show--right">
            <div class="show__title">상품명을 입력해주세요</div>
            <div class="show__wrap">
                <div class="show__label">가격</div>
                <div class="show__text">10,000원</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">업체명</div>
                <div class="show__text">어라이프</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">인분</div>
                <div class="show__text">1 인분</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">중량</div>
                <div class="show__text">300g</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">배송비</div>
                <div class="show__text">3,000원</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">추가배송비</div>
                <div class="show__text">3,000원</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">구매수량</div>
                <div class="show__text"><input type="number"></div>
            </div>
            <div class="show__wrap show__wrap--right">
                <div class="show__label show__label--light">총 상품금액 :</div>
                <div class="show__label show__label--won">10,000원</div>
            </div>
            <div class="show__buttons">
                <div class="show__button show__button--reversal">장바구니</div>
                <div class="show__button">바로구매</div>
                <div class="show__button"><img src="public/images/icon/heart_w.svg"></div>
            </div>
        </div>
    </div>
</body>
</html>
