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
                    <div class="basket__list"></div>
                    <div class="order">
                        <div class="order__title">주문자 정보</div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">보내는 분</div>
                            <div class="order__label"><?=$_SESSION['alife_user_name']?></div>
                        </div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">휴대폰</div>
                            <div class="order__label"><?=$_SESSION['alife_user_phone']?></div>
                        </div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">이메일</div>
                            <div class="order__label"><?=$_SESSION['alife_user_email']?></div>
                        </div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">배송지 정보</div>
                            <div class="order__label"><?=$_SESSION['alife_user_address']?></div>
                        </div>
                    </div>
                </div>
                <div class="basket__right">
                    <div class="basket__wrap basket__wrap--right">
                        <div class="basket__row">
                            <div class="basket__text basket__text--big">총 상품금액</div>
                            <div class="basket__text basket__text--big tprice">0원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">주문금액</div>
                            <div class="basket__text basket__text--middle price">0원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">할인금액</div>
                            <div class="basket__text basket__text--middle sprice">0원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--big">배송비</div>
                            <div class="basket__text basket__text--big tsfee">0원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">배송비</div>
                            <div class="basket__text basket__text--middle sfee">0원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--middle">추가배송비</div>
                            <div class="basket__text basket__text--middle psfee">0원</div>
                        </div>
                        <div class="basket__row">
                            <div class="basket__text basket__text--big">결제예상금액</div>
                            <div class="basket__text basket__text--bbig total">0원</div>
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