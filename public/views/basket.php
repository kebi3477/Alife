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
    <script src="public/js/basket.js"></script>
</body>
</html>