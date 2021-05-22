"use strict";
import loading from './loading.js';
const login = document.querySelector(".login");
const loginWrap = document.querySelector(".login__wrap");
const signWrap = document.querySelector(".sign__wrap");
const findWrap = document.querySelector(".find__wrap");
const findIdWrap = document.querySelector(".find-id__wrap");
const findPwWrap = document.querySelector(".find-pw__wrap");
const findEmailWrap = document.querySelector('.find-email__wrap');
const changePwWrap = document.querySelector('.change-pw__wrap');
//로그인
const loginButton = loginWrap.querySelector('.login__button');
const showSign = loginWrap.querySelector(".login__text:last-child");
const showFind = loginWrap.querySelector(".login__text--under");
const loginInputs = loginWrap.querySelectorAll('input');
//회원가입
const signInputEmail = signWrap.querySelector('.login__input[name=email]');
const signInputPw = signWrap.querySelector('.login__input[name=password]');
const signInputRepw = signWrap.querySelector('.login__input[name=rePassword]');
const signInputAddress = signWrap.querySelector('.login__input[name=address]');
const signButton = signWrap.querySelector(".login__button:first-child");
const closeSign = signWrap.querySelectorAll(".login__button").item(3);
const emailAuth = signWrap.querySelector('.login__button--small');
const signInputHalf = signWrap.querySelector('.login__input--half');
const emailCheck = signInputHalf.querySelector('.login__button');
// 약관 동의
const accept1 = signWrap.querySelectorAll('.login__accept-button').item(0);
const accept2 = signWrap.querySelectorAll('.login__accept-button').item(1);
//아이디 및 비밀번호 찾기
const findId = findWrap.querySelector(".login__toggle-button:first-child");
const findPw = findWrap.querySelector(".login__toggle-button:last-child");
const findIdButton = findWrap.querySelector(".login__form-item:first-child button");
const cancelButtons = findWrap.querySelectorAll(".login__buttons > .login__button:last-child");
const findPwButton = findWrap.querySelector(".find-pw__wrap button");
const findEmailButton = findEmailWrap.querySelector("button");
const changePw = changePwWrap.querySelector('.change-pw');
const changeRepw = changePwWrap.querySelector('.change-repw');
const changePwButton = changePwWrap.querySelector("button");
//공통
const phones = document.querySelectorAll('.login__phone > input');
//init
// loginWrap.remove();
signWrap.remove();
findWrap.remove();
findEmailWrap.remove();
changePwWrap.remove();
//로그인
loginButton.addEventListener('click', function() {
    user.login();
})
loginInputs.forEach(input => {
    input.addEventListener('keypress', function(e) {
        if(e.key === 'Enter') {
            user.login();
        }
    })
})
//회원가입
signInputEmail.addEventListener('blur', function() { //중복 아이디 체크
    const loginLabelEmail = signWrap.querySelector('.login__label-email');
    if(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i.test(this.value)) {
        user.doubleCheck();
    } else {
        changeLabelTextColor(loginLabelEmail, '이메일 형식이 아닙니다!', 'red');
    }
})
emailAuth.addEventListener('click', function() {
    const loginLabelEmail = signWrap.querySelector('.login__label-email');
    if(user.asign.email) {
        user.emailCheck();
    } else {
        changeLabelTextColor(loginLabelEmail, '이메일 형식을 먼저 맞춰주세요!', 'red');
    }
})
emailCheck.addEventListener('click', function() {
    user.emailAuthCheck();
})
signInputPw.addEventListener('blur', function() {
    const loginLabelPw = signWrap.querySelector('.login__label-pw');
    if(/^[a-z0-9]{8,20}$/g.test(this.value)) {
        changeLabelTextColor(loginLabelPw, '적당합니다!', 'green');
        user.asign.password = true;
    } else {
        changeLabelTextColor(loginLabelPw, '비밀번호는 8~20자 영문자 또는 숫자이어야 합니다.', 'red');
        user.asign.password = false;
    }
})
signInputRepw.addEventListener('blur', function() {
    const loginLabelRepw = signWrap.querySelector('.login__label-repw');
    if(this.value === signInputPw.value) {
        changeLabelTextColor(loginLabelRepw, '비밀번호가 같습니다!', 'green');
        user.asign.rePassword = true;
    } else {
        changeLabelTextColor(loginLabelRepw, '비밀번호가 다릅니다!', 'red');
        user.asign.rePassword = false;
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
    removeAllInput();
})
showFind.addEventListener("click", function() {
    login.append(findWrap);
    loginWrap.remove();
    removeAllInput();
})
signButton.addEventListener('click', function() {
    user.signUp();
    removeAllInput();
})
closeSign.addEventListener("click", function() {
    login.append(loginWrap);
    signWrap.remove();
    removeAllInput();
})
// 약관 동의
accept1.addEventListener('click', function() {
    new Accept('accept1');
})
accept2.addEventListener('click', function() {
    new Accept('accept2');
})
//아이디 및 비밀번호 찾기
findId.addEventListener("click", function() {
    findWrap.classList.replace("login__form-pw", "login__form-id");
    removeAllInput();
})
findPw.addEventListener("click", function() {
    findWrap.classList.replace("login__form-id", "login__form-pw");
    removeAllInput();
})
findIdButton.addEventListener('click', function() {
    user.findEmail();
})
findPwButton.addEventListener('click', function() {
    user.findPw();
})
findEmailButton.addEventListener('click', function() {
    findEmailWrap.remove();
    login.append(loginWrap);
    removeAllInput();
})
changePw.addEventListener('blur', function() {
    const loginLabelPw = changePwWrap.querySelector('.login__label-pw');
    if(/^[a-z0-9]{8,20}$/g.test(this.value)) {
        changeLabelTextColor(loginLabelPw, '적당합니다!', 'green');
        user.asign.cPassword = true;
    } else {
        changeLabelTextColor(loginLabelPw, '비밀번호는 8~20자 영문자 또는 숫자이어야 합니다.', 'red');
        user.asign.cPassword = false;
    }
})
changeRepw.addEventListener('blur', function() {
    const loginLabelRepw = changePwWrap.querySelector('.login__label-repw');
    if(this.value === changePw.value) {
        changeLabelTextColor(loginLabelRepw, '비밀번호가 같습니다!', 'green');
        user.asign.cRePassword = true;
    } else {
        changeLabelTextColor(loginLabelRepw, '비밀번호가 다릅니다!', 'red');
        user.asign.cRePassword = false;
    }
})
changePwButton.addEventListener('click', function() {
    user.changePw();
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

class User {
    constructor() {
        this.asign = {
            email: false,
            password: false,
            rePassword: false,
            accept1: false,
            accept2: false,
            emailAuth: false,
            cPassword: false,
            cRePassword: false
        }
        this.loginLabelEmail = signWrap.querySelector('.login__label-email');
    }
    async fetching(url) {
        const msg = await fetch(`controller/user/${url}`, this.header);
        return await msg.json();
    }
    init(form) {
        this.formData = new FormData(form);
        this.header = {
            method: 'POST',
            body: this.formData
        }
        loading.start();
    }
    login() {
        this.init(loginWrap);
        this.fetching('login')
        .then(msg => {
            if(msg.status === 'A200') {
                location.href = 'index';
            } else if(msg.status === 'A404') {
                alert('아이디와 비밀번호를 다시 확인해주세요!');
            } else if(msg.status === 'A400') {
                alert('비어있는 값이 있습니다!');
            }
        })
        .then(() => loading.end());
    }
    emailCheck() {
        this.init(signWrap);
        this.fetching('emailCheck')
        .then(msg => {
            if(msg.status === 'A200') {
                signInputHalf.style.display = 'flex';
            }
        })
        .then(() => loading.end());
    }
    emailAuthCheck() {
        this.init(signWrap);
        this.fetching('emailAuthCheck')
        .then(msg => {
            if(msg.status === 'A200') {
                signInputHalf.remove();
                signInputEmail.readOnly = true;
                this.asign.emailAuth = true;
                changeLabelTextColor(this.loginLabelEmail, '인증 완료!', 'green');
            } else {
                this.asign.emailAuth = false;
                changeLabelTextColor(this.loginLabelEmail, '인증번호를 확인해주세요!', 'red')
            }
        })
        .then(() => loading.end());
    }
    signUp() {
        this.checkAccept();
        if(!this.asign.email) {
            alert('이메일을 확인하세요!');
        } else if(!this.asign.password || !this.asign.rePassword) {
            alert('비밀번호를 확인하세요!');
        } else if(!this.asign.accept1 || !this.asign.accept2) {
            alert('이용약관에 동의해주세요!');
        } else if(!this.asign.emailAuth) {
            alert('이메일 인증을 확인하세요!');
        } else {
            this.init(signWrap);
            this.fetching('signUp')
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
            .then(() => loading.end());
        }
    }
    doubleCheck() {
        this.init(signWrap);
        this.fetching('doubleCheck')
        .then(msg => {
            if(msg.status === 'A200') {
                this.asign.email = true;
                changeLabelTextColor(this.loginLabelEmail, '이메일 인증을 진행해주세요.', 'red');
            } else if(msg.status === 'A409') {
                this.asign.email = false;
                changeLabelTextColor(this.loginLabelEmail, '중복입니다!', 'red');
            }
        })
        .then(() => loading.end());
    }
    findEmail() {
        this.init(findIdWrap);
        this.fetching('findEmail')
        .then(msg => {
            if(msg.status === 'A200') {
                findEmailWrap.querySelector(".login__input--green").innerText = msg.email;
                login.append(findEmailWrap);
                findWrap.remove();
            } else if(msg.status === 'A404') {
                alert('사용자가 존재하지 않습니다!');
            } else if(msg.status === 'A400') {
                alert('비어 있는 값이 있습니다!');
            }
        })
        .then(() => loading.end());
    }
    findPw() {
        this.init(findPwWrap);
        this.fetching('findPw')
        .then(msg => {
            if(msg.status === 'A200') {
                changePwWrap.querySelector('input[type=hidden]').value = msg.email;
                login.append(changePwWrap);
                findWrap.remove();
            } else if(msg.status === 'A404') {
                alert('사용자가 존재하지 않습니다!');
            } else if(msg.status === 'A400') {
                alert('비어 있는 값이 있습니다!');
            }
        })
        .then(() => loading.end());
    }
    changePw() {
        if(this.asign.cPassword && this.asign.cRePassword) {
            this.init(changePwWrap);
            this.fetching('changePw')
            .then(msg => {
                if(msg.status === 'A200') {
                    alert('변경 완료!');
                    login.append(loginWrap);
                    changePwWrap.remove();
                } else if(msg.status === 'A400') {
                    alert('비어 있는 값이 있습니다!');
                } else {
                    alert('서버 오류!');
                }
            })
            .then(() => loading.end());
        } else {
            alert('비밀번호란을 확인해주세요!')
        }
    }
    checkAccept() {
        this.asign.accept1 = document.querySelector('#accept1').checked;
        this.asign.accept2 = document.querySelector('#accept2').checked;
    }
}

class Accept {
    constructor(name) {
        this.name = name;
        this.form = document.querySelector(`.${name}`);
        this.closeBtn = this.form.querySelector('.popup__close');
        this.button = this.form.querySelector('.popup__button');
        this.closeBtn.onclick = () => this.close();
        this.button.onclick = () => this.accept();
        this.show();
    }
    show() {
        this.form.style.display = 'flex';
    }
    close() {
        this.form.style.display = 'none';
    }
    accept() {
        this.close();
        document.querySelector(`#${this.name}`).checked = true;
    }
}

function changeLabelTextColor(label, text, color) {
    label.innerText = text;
    label.style.color = color;
}

function removeAllInput() {
    document.querySelectorAll('input').forEach(el => el.value = "");
}

const user = new User();