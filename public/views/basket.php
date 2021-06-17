<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/basket.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
    <title>장바구니 - ALife</title>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="basket padding">
        <form class="basket__wrap">
            <div class="basket__title">장바구니</div>
            <div class="basket__row">
                <div class="basket__left">
                    <div class="basket__navs">
                        <div class="basket__nav basket__active">장바구니 ></div>
                        <div class="basket__nav">주문서 작성 ></div>
                        <div class="basket__nav">결제 ></div>
                        <div class="basket__nav">주문완료</div>
                    </div>
                    <div class="basket__list"></div>
                    <div class="order">
                        <div class="order__title">주문자 정보</div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">보내는 분</div>
                            <div class="order__label order__name"><?=$_SESSION['alife_user_name']?></div>
                            <div class="order__label order__label--right">휴대폰</div>
                            <div class="order__label order__phone"><?=$_SESSION['alife_user_phone']?></div>
                            <div class="order__label order__label--right">이메일</div>
                            <div class="order__label order__email"><?=$_SESSION['alife_user_email']?></div>
                            <div class="order__label order__label--right">배송지 정보</div>
                            <div class="order__label order__address"><?=$_SESSION['alife_user_address']?></div>
                            <div class="order__label order__label--right">배송 요청사항</div>
                            <select name="" class="order__select">
                                <option value="">배송기사에서 전달되는 메시지입니다.  - 선택해주세요 -</option>
                            </select>
                        </div>
                        <div class="order__title">회원멤버십 / 쿠폰</div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">회원멤버십</div>
                            <div class="order__label order__point">옐로우 그린 3%</div>
                            <div class="order__label order__label--right">쿠폰</div>
                            <select name="" class="order__select">
                                <option value="">- 쿠폰을 선택해주세요 -</option>
                            </select>
                        </div>
                        <div class="order__title">결제수단</div>
                        <div class="order__grid">
                            <div class="order__label order__label--right">일반결제</div>
                            <div class="order__label order__label--flex">
                                <input type="radio" name="pg" value="html5_inicis" checked>신용카드
                                <input type="radio" name="pg" value="toss">토스
                                <input type="radio" name="pg" value="kakaopay">카카오
                            </div>
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
        </form>
    </div>
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/point.js"></script>
    <script type="module" src="public/js/basket.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>
</body>
</html>