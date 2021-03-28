<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?= include('header.php') ?>
    <div class="login page">
        <div class="login__img"></div>
        <div class="login__form login__wrap">
            <div class="login__logo">A Life</div>
            <input type="text" class="login__input" placeholder="아이디" name="id">
            <input type="password" class="login__input" placeholder="비밀번호" name="password">
            <button class="login__button">로그인</button>
            <div class="login__text login__text--under"><b>아이디 / 비밀번호 찾기</b></div>
            <div class="login__text">회원이 아니십니까? <b>회원가입</b></div>
        </div>
        <div class="login__form sign__wrap">
            <div class="login__logo">A Life</div>
            <div class="login__title">회원정보입력</div>
            <input type="text" class="login__input" placeholder="아이디" name="id">
            <input type="password" class="login__input" placeholder="비밀번호" name="password">
            <input type="password" class="login__input" placeholder="비밀번호 재확인" name="rePassword">
            <input type="text" class="login__input" placeholder="이름" name="name">
            <div class="login__phone">
                <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1">
                <input type="text" class="login__input login__input--short" name="phone2">
                <input type="text" class="login__input login__input--short" name="phone3">
            </div>
            <input type="text" class="login__input" placeholder="주소" name="address">
            <div class="login__label">※ 정확한 도로명 주소 기입 시 배송주문이 가능합니다.</div>
            <div class="login__buttons">
                <button class="login__button login__input--short">회원가입</button>
                <button class="login__button login__input--short">취소</button>
            </div>
        </div>
        <div class="login__form find__wrap login__form-id">
            <div class="login__logo">A Life</div>
            <div class="login__toggle">
                <div class="login__toggle-button">아이디 찾기</div>
                <div class="login__toggle-button">비밀번호 찾기</div>
            </div>
            <div class="login__form-list">
                <div class="login__form-items">
                    <div class="login__form-item">
                        <input type="text" class="login__input" placeholder="이름" name="name">
                        <div class="login__phone">
                            <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1">
                            <input type="text" class="login__input login__input--short" name="phone2">
                            <input type="text" class="login__input login__input--short" name="phone3">
                        </div>
                        <div class="login__buttons">
                            <button class="login__button login__input--short">아이디 찾기</button>
                            <button class="login__button login__input--short">취소</button>
                        </div>
                    </div>
                    <div class="login__form-item">
                        <input type="text" class="login__input" placeholder="아이디" name="id">
                        <input type="text" class="login__input" placeholder="이름" name="name">
                        <div class="login__phone">
                            <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1">
                            <input type="text" class="login__input login__input--short" name="phone2">
                            <input type="text" class="login__input login__input--short" name="phone3">
                        </div>
                        <div class="login__buttons">
                            <button class="login__button login__input--short">비밀번호 찾기</button>
                            <button class="login__button login__input--short">취소</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>