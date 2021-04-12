const login = document.querySelector(".login");
const loginWrap = document.querySelector(".login__wrap");
const signWrap = document.querySelector(".sign__wrap");
const findWrap = document.querySelector(".find__wrap");
const loginButton = loginWrap.querySelector('.login__button');
const showSign = loginWrap.querySelector(".login__text:last-child");
const showFind = loginWrap.querySelector(".login__text--under");
const signButton = signWrap.querySelector(".login__button:first-child");
const closeSign = signWrap.querySelector(".login__button:last-child");
const findId = findWrap.querySelector(".login__toggle-button:first-child");
const findPw = findWrap.querySelector(".login__toggle-button:last-child");
const cancelButtons = findWrap.querySelectorAll(".login__buttons > .login__button:last-child")

signWrap.remove();
findWrap.remove();
loginButton.addEventListener('click', function() {
    fetch('controller/user/login')
    .then(data => data.text())
    .then(text => {
        console.log(text);
    })
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
    .then(res => res.json())
    .then(res => {
        console.log(res);
    })
})
closeSign.addEventListener("click", function() {
    login.append(loginWrap);
    signWrap.remove();
})
findId.addEventListener("click", function() {
    findWrap.classList.replace("login__form-pw", "login__form-id");
})
findPw.addEventListener("click", function() {
    findWrap.classList.replace("login__form-id", "login__form-pw");
})
cancelButtons.forEach(button => {
    button.addEventListener("click", function() {
        login.append(loginWrap);
        findWrap.remove();
    })
})