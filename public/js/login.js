const login = document.querySelector(".login");
const loginWrap = document.querySelector(".login__wrap");
const signWrap = document.querySelector(".sign__wrap");
const findWrap = document.querySelector(".find__wrap");
const showSign = loginWrap.querySelector(".login__text:last-child");
const showFind = loginWrap.querySelector(".login__text--under");
const closeSign = signWrap.querySelector(".login__button:last-child");
const findId = findWrap.querySelector(".login__toggle-button:first-child");
const findPw = findWrap.querySelector(".login__toggle-button:last-child");
const cancelButtons = findWrap.querySelectorAll(".login__buttons > .login__button:last-child")

signWrap.remove();
findWrap.remove();
showSign.addEventListener("click", function() {
    login.append(signWrap);
    loginWrap.remove();
})
showFind.addEventListener("click", function() {
    login.append(findWrap);
    loginWrap.remove();
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