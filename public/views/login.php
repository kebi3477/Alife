<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
    <?php 
        include('header.php');
        include('interceptor/userInterceptor.php');
        include('modules/mailer.php');
        isNonLoging();
    ?>
    <div class="popup accept1">
        <div class="popup__form">
            <div class="popup__header">
                <div class="popup__title">이용약관동의</div>
                <div class="popup__close"><object data="public/images/icon/close.svg" type="image/svg+xml"></object></div>
            </div>
            <div class="popup__body">
                <?php include('terms.php') ?>
            </div>
            <div class="popup__button">동의합니다</div>
        </div>
    </div>
    <div class="popup accept2">
        <div class="popup__form">
            <div class="popup__header">
                <div class="popup__title">개인정보 수집 / 이용 동의</div>
                <div class="popup__close"><object data="public/images/icon/close.svg" type="image/svg+xml"></object></div>
            </div>
            <div class="popup__body">
                <div class="popup__table">
                    <div class="popup__table-row">
                        <div>수집 목적</div>
                        <div>수집 항목</div>
                        <div>보유 기간</div>
                    </div>
                    <div class="popup__table-row">
                        <div>
                            <div>이용자 식별 및 본인여부</div>
                            <div>거점 기반 서비스 제공</div>
                            <div>계약 이행 및 약관변경 등의 고지를 위한 연락, 본인의사 확인 및 민원 등의 고객 고충 처리</div>
                            <div>부정 이용 방지, 비인가 사용방지 및 서비스 제공 및 계약의 이행</div>
                        </div>
                        <div>이름, 닉네임, 아이디, 비밀번호, 휴대폰번호, 이메일, 주소</div>
                        <div>회원 탈퇴<br>즉시 파기<br><br>부정이용 방지를 위하여 30일 동안 보관 후 (아이디, 휴대폰 번호) 파기</div>
                    </div>
                    <div class="popup__table-row">
                        <div>서비스방문 및 이용기록 분석, 부정이용 방지 등을 위한 기록 관리</div>
                        <div>서비스 이용기록, IP주소,<br>쿠키, MAC 주소,<br>모바일 기기정보<br>(광고식별자, OS/ 앱 버전)</div>
                        <div>회원 탈퇴 즉시 또는<br>이용 목적 달성 즉시 파기</div>
                    </div>
                </div>
                <div class="popup__margin">서비스 제공을 위해서 필요한 최소한의 개인정보입니다. 동의를 해 주셔야 서비스를 이용하실 수 있으며, 동의하지 않으실 경우 서비스에 제한이 있을 수 있습니다.</div>
            </div>
            <div class="popup__button">동의합니다</div>
        </div>
    </div>
    <div class="login page">
        <div class="login__img"></div>
        <form class="login__form login__wrap">
            <div class="login__logo"><img src="/public/images/logo.svg" alt="logo"></div>
            <input type="text" class="login__input" placeholder="이메일" name="email">
            <input type="password" class="login__input" placeholder="비밀번호" name="password">
            <button class="login__button" type="button">로그인</button>
            <div class="login__text login__text--under"><b>이메일 / 비밀번호 찾기</b></div>
            <div class="login__text">회원이 아니십니까? <b>회원가입</b></div>
        </form>
        <form class="login__form sign__wrap">
            <div class="login__logo"><img src="/public/images/logo.svg" alt="logo"></div>
            <div class="login__title">회원정보입력</div>
            <div class="login__input--row">
                <input type="text" class="login__input" placeholder="이메일" name="email">
                <button type="button" class="login__button login__button--small">인증</button>
            </div>
            <div class="login__input--row login__input--half">
                <input type="text" class="login__input" placeholder="인증번호" name="certi">
                <button type="button" class="login__button login__button--small">확인</button>
            </div>
            <label class='login__label-email'></label>
            <input type="password" class="login__input" placeholder="비밀번호" name="password">
            <label class='login__label-pw'></label>
            <input type="password" class="login__input" placeholder="비밀번호 재확인" name="rePassword">
            <label class='login__label-repw'></label>
            <input type="text" class="login__input" placeholder="이름" name="name">
            <div class="login__phone">
                <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1" maxlength=3>
                <input type="text" class="login__input login__input--short" name="phone2" maxlength=4>
                <input type="text" class="login__input login__input--short" name="phone3" maxlength=4>
            </div>
            <input type="text" class="login__input" placeholder="주소" name="address">
            <div class="login__label">※ 정확한 도로명 주소 기입 시 배송주문이 가능합니다.</div>
            <div class="login__title">이용약관동의</div>
            <div class="login__accept">
                <input type="checkbox" name="accept" id="accept1">
                <label for="accept1"><div class="login__accept-label">이용약관 동의</div></label>
                <div class="login__accept-button">약관보기 ></div>
            </div>
            <div class="login__accept">
                <input type="checkbox" name="accept" id="accept2">
                <label for="accept2"><div class="login__accept-label">개인정보 수집 / 이용 동의</div></label>
                <div class="login__accept-button">약관보기 ></div>
            </div>
            <div class="login__buttons">
                <button class="login__button login__input--short" type="button">회원가입</button>
                <button class="login__button login__input--short" type="reset">취소</button>
            </div>
        </form>
        <div class="login__form find__wrap login__form-id">
            <div class="login__logo"><img src="/public/images/logo.svg" alt="logo"></div>
            <div class="login__toggle">
                <div class="login__toggle-button">이메일 찾기</div>
                <div class="login__toggle-button">비밀번호 찾기</div>
            </div>
            <div class="login__form-list">
                <div class="login__form-items">
                    <form class="login__form-item find-id__wrap">
                        <input type="text" class="login__input" placeholder="이름" name="name">
                        <div class="login__phone">
                            <input type="text" class="login__input login__input--short" placeholder="휴대전화" name="phone1" maxlength=3>
                            <input type="text" class="login__input login__input--short" name="phone2" maxlength=4>
                            <input type="text" class="login__input login__input--short" name="phone3" maxlength=4>
                        </div>
                        <div class="login__buttons">
                            <button class="login__button login__input--short" type="button">이메일 찾기</button>
                            <button class="login__button login__input--short" type="reset">취소</button>
                        </div>
                    </form>
                    <form class="login__form-item find-pw__wrap">
                        <input type="text" class="login__input" placeholder="이메일" name="email">
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
        <div class="login__form find-email__wrap">
            <div class="login__logo"><img src="/public/images/logo.svg" alt="logo"></div>
            <div class="login__label--under">입력한 정보로 조회된 이메일입니다.</div>
            <div class="login__input login__input--green">undifined</div>
            <button class="login__button">로그인 하러가기</button>
        </div>
        <form class="login__form change-pw__wrap">
                <div class="login__logo"><img src="/public/images/logo.svg" alt="logo"></div>
            <input type="hidden" name="email" value="">
            <div class="login__label--under">비밀번호 재설정</div>
            <input type="password" class="login__input change-pw" placeholder="비밀번호" name="password">
            <label class="login__label-pw"></label>
            <input type="password" class="login__input change-repw" placeholder="비밀번호 재확인" name="rePassword">
            <label class="login__label-repw"></label>
            <button class="login__button" type="button">비밀번호 재설정</button>
        </form>
    </div>
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/login.js"></script>
    <script type="module" src="public/js/common.js"></script>
</body>
</html>