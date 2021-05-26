<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/basket.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
    <title>ALife</title>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="basket padding">
        <div class="basket__wrap">
            <div class="basket__title">장바구니</div>
            <div class="basket__row">
                <div class="basket__left">
                    <div class="basket__navs">
                        <div class="basket__nav">장바구니 ></div>
                        <div class="basket__nav">주문서 작성 ></div>
                        <div class="basket__nav">결제 ></div>
                        <div class="basket__nav">주문완료</div>
                    </div>
                    <div class="basket__list">
                        <div class="basket__item">
                            <div class="basket__checkbox">
                                <input class="basket__checkbox" type="checkbox">
                            </div>
                            <div class="basket__img"></div>
                            <div class="basket__info">
                                <div class="basket__label--small">어라이프</div>
                                <div class="basket__label--middle">상품명을 입력해주세요</div>
                            </div>
                            <div class="basket__number"><input type="number" value=1 min=1></div>
                            <div class="basket__label--bold">10,000원</div>
                            <div class="basket__delete"><img src="public/images/icon/close.svg"></div>
                        </div>
                    </div>
                </div>
                <div class="basket__right">
                    <div class="basket__wrap basket__wrap--right">
                        <div class="basket__row">
                            <div class="basket__text basket__text--big">총 상품금액</div>
                            <div class="basket__text basket__text--big">30,000원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">주문금액</div>
                            <div class="basket__text basket__text--middle">53,700원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">할인금액</div>
                            <div class="basket__text basket__text--middle">23,700원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--big">배송비</div>
                            <div class="basket__text basket__text--big">5,500원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">배송비</div>
                            <div class="basket__text basket__text--middle">3,000원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">추가배송비</div>
                            <div class="basket__text basket__text--middle">2,500원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--big">결제예상금액</div>
                            <div class="basket__text basket__text--bbig">35,500원</div>
                        </div>
                    </div>
                    <div class="basket__button">주문하기</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>