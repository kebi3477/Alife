const login = document.querySelector(".login");
const loginWrap = document.querySelector(".login__wrap");
const signWrap = document.querySelector(".sign__wrap");
const findWrap = document.querySelector(".find__wrap");
//로그인
const loginButton = loginWrap.querySelector('.login__button');
const showSign = loginWrap.querySelector(".login__text:last-child");
const showFind = loginWrap.querySelector(".login__text--under");
//회원가입
const signInputId = signWrap.querySelector('.login__input[name=id]');
const signInputPw = signWrap.querySelector('.login__input[name=password]');
const signInputRepw = signWrap.querySelector('.login__input[name=rePassword]');
const signInputAddress = signWrap.querySelector('.login__input[name=address]');
const signButton = signWrap.querySelector(".login__button:first-child");
const closeSign = signWrap.querySelector(".login__button:last-child");
//아이디 및 비밀번호 찾기
const findId = findWrap.querySelector(".login__toggle-button:first-child");
const findPw = findWrap.querySelector(".login__toggle-button:last-child");
const cancelButtons = findWrap.querySelectorAll(".login__buttons > .login__button:last-child");
//공통
const phones = document.querySelectorAll('.login__phone > input');
//init
signWrap.remove();
findWrap.remove();
//로그인
loginButton.addEventListener('click', function() {
    const formData = new FormData(loginWrap);
    fetch('controller/user/login', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('로그인 성공!');
            location.href = 'index';
        } else if(msg.status === 'A404') {
            alert('아이디와 비밀번호를 다시 확인해주세요!');
        } else if(msg.status === 'A400') {
            alert('비어있는 값이 있습니다!');
        }
    })
})
//회원가입
signInputId.addEventListener('blur', function() {
    const loginLabelId = signWrap.querySelector('.login__label-id');
    if(/^[a-z0-9]{5,20}$/g.test(this.value)) {
        const formData = new FormData(signWrap);
        fetch('controller/user/doubleCheck', {
            method: 'POST',
            body: formData
        })
        .then(msg => msg.json())
        .then(msg => {
            if(msg.status === 'A200') {
                changeLabelTextColor(loginLabelId, '적당합니다!', 'green');
            } else if(msg.status === 'A409') {
                changeLabelTextColor(loginLabelId, '중복입니다!', 'red');
            }
        })
    } else {
        changeLabelTextColor(loginLabelId, '아이디는 6~20자 영문자 또는 숫자이어야 합니다.', 'red');
    }
})
signInputPw.addEventListener('blur', function() {
    const loginLabelPw = signWrap.querySelector('.login__label-pw');
    if(/^[a-z0-9]{8,20}$/g.test(this.value)) {
        changeLabelTextColor(loginLabelPw, '적당합니다!', 'green');
    } else {
        changeLabelTextColor(loginLabelPw, '비밀번호는 8~20자 영문자 또는 숫자이어야 합니다.', 'red');
    }
})
signInputRepw.addEventListener('blur', function() {
    const loginLabelRepw = signWrap.querySelector('.login__label-repw');
    if(this.value === signInputPw.value) {
        changeLabelTextColor(loginLabelRepw, '비밀번호가 같습니다!', 'green');
    } else {
        changeLabelTextColor(loginLabelRepw, '비밀번호가 다릅니다!', 'red');
    }
})
signInputAddress.addEventListener('click', function() {
    if(this.value === '') {
        new daum.Postcode({
            oncomplete: function(data) {
                signInputAddress.value = data.address;
            }
        }).open();
    }
})
showSign.addEventListener("click", function() {
    login.append(signWrap);
    loginWrap.remove();
})
showFind.addEventListener("click", function() {
    login.append(findWrap);
    loginWrap.remove();
})
signButton.addEventListener('click', function() {
    const formData = new FormData(signWrap);
    fetch('controller/user/signUp', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('가입 완료!');
            location.href = 'index';
        } else if(msg.status === 'A500') {
            alert('에러! 관리자에게 문의해주세요. Tel.010-5295-6530');
        } else if(msg.status === 'A400') {
            alert('비어 있는 값이 있습니다!');
        }
    })
})
closeSign.addEventListener("click", function() {
    login.append(loginWrap);
    signWrap.remove();
})
//아이디 및 비밀번호 찾기
findId.addEventListener("click", function() {
    findWrap.classList.replace("login__form-pw", "login__form-id");
})
findPw.addEventListener("click", function() {
    findWrap.classList.replace("login__form-id", "login__form-pw");
})
//공통
cancelButtons.forEach(button => {
    button.addEventListener("click", function() {
        login.append(loginWrap);
        findWrap.remove();
    })
})
phones.forEach(input => {
    const maxLength = input.name === 'phone1' ? 3 : 4;
    input.addEventListener('keyup', function() {
        if(input.value.length === maxLength) {
            this.nextElementSibling && this.nextElementSibling.focus();
        }
    })
})

function changeLabelTextColor(label, text, color) {
    label.innerText = text;
    label.style.color = color;
}