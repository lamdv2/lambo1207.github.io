// login register
const imgLogins = document.querySelector('.js-imglogin');
const modalRegister = document.querySelector('.modal-register');
const registerMain = document.querySelector('.loginmain');

const DangNhap = document.querySelector('.js-dangnhap');
const DangKy = document.querySelector('.js-dangky');
const modalLogin = document.querySelector('.modal-login');
const loginMain = document.querySelector('.js-loginMain');

function showRegister() {
    modalRegister.classList.add('open');
    modalLogin.classList.remove('open');
}

function hideRegister() {
    modalRegister.classList.remove('open');
}

function convertRegister() {
    modalRegister.classList.add('open');
    modalLogin.classList.remove('open');
}

imgLogins.addEventListener('click', showRegister);

modalRegister.addEventListener('click', hideRegister);

registerMain.addEventListener('click', function (even) {
    even.stopPropagation();
})

DangKy.addEventListener('click', convertRegister);

// đăng nhập
function convertLogin() {
    modalLogin.classList.add('open');
    modalRegister.classList.remove('open');
}

function hideLogin() {
    modalLogin.classList.remove('open');
}

DangNhap.addEventListener('click', convertLogin);

modalLogin.addEventListener('click', hideLogin);

loginMain.addEventListener('click', function (even) {
    even.stopPropagation();
})
