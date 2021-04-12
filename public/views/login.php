<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/login.css">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
    <?php include('header.php') ?>
    <div class="login page">
        <div class="login__img"></div>
        <form class="login__form login__wrap">
            <div class="login__logo">A Life</div>
            <input type="text" class="login__input" placeholder="아이디" name="id">
            <input type="password" class="login__input" placeholder="비밀번호" name="password">
            <button class="login__button" type="button">로그인</button>
            <div class="login__text login__text--under"><b>아이디 / 비밀번호 찾기</b></div>
            <div class="login__text">회원이 아니십니까? <b>회원가입</b></div>
        </form>
        <form class="login__form sign__wrap">
            <div class="login__logo">A Life</div>
            <div class="login__title">회원정보입력</div>
            <input type="text" class="login__input" placeholder="아이디" name="id">
            <label class='login__label-id'></label>
            <input type="password" class="login__input" placeholder="비밀번호" name="password">
            <label class='login__label-pw'></label>
            <input type="password" class="login__input" placeholder="비밀번호 재확인" name="rePassword">
            <label class='login__label-repw'></label>
            <input type="text" class="login__input" placeholder="이름" name="name">
            <label></label>
            <div class="login__phone">
                <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1" maxlength=3>
                <input type="text" class="login__input login__input--short" name="phone2" maxlength=4>
                <input type="text" class="login__input login__input--short" name="phone3" maxlength=4>
            </div>
            <label></label>
            <input type="text" class="login__input" placeholder="주소" name="address">
            <div class="login__label">※ 정확한 도로명 주소 기입 시 배송주문이 가능합니다.</div>
            <div class="login__buttons">
                <button class="login__button login__input--short" type="button">회원가입</button>
                <button class="login__button login__input--short" type="reset">취소</button>
            </div>
        </form>
        <div class="login__form find__wrap login__form-id">
            <div class="login__logo">A Life</div>
            <div class="login__toggle">
                <div class="login__toggle-button">아이디 찾기</div>
                <div class="login__toggle-button">비밀번호 찾기</div>
            </div>
            <div class="login__form-list">
                <div class="login__form-items">
                    <form class="login__form-item">
                        <input type="text" class="login__input" placeholder="이름" name="name">
                        <div class="login__phone">
                            <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1" maxlength=3>
                            <input type="text" class="login__input login__input--short" name="phone2" maxlength=4>
                            <input type="text" class="login__input login__input--short" name="phone3" maxlength=4>
                        </div>
                        <div class="login__buttons">
                            <button class="login__button login__input--short" type="button">아이디 찾기</button>
                            <button class="login__button login__input--short" type="reset">취소</button>
                        </div>
                    </form>
                    <form class="login__form-item">
                        <input type="text" class="login__input" placeholder="아이디" name="id">
                        <input type="text" class="login__input" placeholder="이름" name="name">
                        <div class="login__phone">
                            <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1" maxlength=3>
                            <input type="text" class="login__input login__input--short" name="phone2" maxlength=4>
                            <input type="text" class="login__input login__input--short" name="phone3" maxlength=4>
                        </div>
                        <div class="login__buttons">
                            <button class="login__button login__input--short" type="button">비밀번호 찾기</button>
                            <button class="login__button login__input--short" type="reset">취소</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/login.js"></script>
</body>
</html>