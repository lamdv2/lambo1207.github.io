function cssbackground(x){
    x.style.color = 'var(--text-primary)';
    x.style.backgroundColor = 'var(--alpha-bg)';
    x.style.borderLeft = '2px solid var(--color-purple)';
}

function cssbackgroundnone(x){
    x.style.color = 'var(--navigation-text)';
    x.style.backgroundColor = '#231b2e';
    x.style.borderLeft = 'none';
}

var UserProFile_CaNhan = document.getElementById("user-profile-canhan");
var UserProFile = document.getElementById("user-profilepro");
var UserProFileKhamPha = document.getElementById("user-profile-khampha");
var UserProFileFollowVN = document.getElementById("user-profilepro-FollowVN");
var UserProFileTop100 = document.getElementById("user-profile-top100");
var UserProFileZingChat = document.getElementById("user-profile-zingchat");
var UserPlaylist = document.getElementById("user-playlist");


var CaNhan = document.getElementById("onclickCaNhan");
CaNhan.onclick = function(){
    UserProFile_CaNhan.style.display = 'block';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none'; 
    UserPlaylist.style.display = 'none';

    cssbackground(CaNhan);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
    cssbackgroundnone(Playlist);
}

var KhamPha = document.getElementById("onclickKhamPha");
KhamPha.onclick = function(){
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display='block';
    UserProFile_CaNhan.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';
    UserPlaylist.style.display = 'none';
    
    cssbackground(KhamPha);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
    cssbackgroundnone(Playlist);
}

var Radio = document.getElementById("onclickRadio");
Radio.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'block';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';
    UserPlaylist.style.display = 'none';

    cssbackground(Radio);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
    cssbackgroundnone(Playlist);
}

var FollowVN = document.getElementById("onclickFollow");
FollowVN.onclick = function(){
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display='none';
    UserProFile_CaNhan.style.display = 'none';
    UserProFileFollowVN.style.display = 'block';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';
    UserPlaylist.style.display = 'none';
    
    cssbackground(FollowVN);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(Radio);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
    cssbackgroundnone(Playlist);
}

var Top100 = document.getElementById("onclickTop100");
Top100.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'block';
    UserProFileZingChat.style.display = 'none';
    UserPlaylist.style.display = 'none';

    cssbackground(Top100);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(ZingChat);
    cssbackgroundnone(Playlist);
}

var ZingChat = document.getElementById("onclickZingChat");
ZingChat.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'block';
    UserPlaylist.style.display = 'none';

    cssbackground(ZingChat);
    cssbackgroundnone(Top100);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(Playlist);
}

var Playlist = document.getElementById("onclickPlaylist");
Playlist.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';
    UserPlaylist.style.display = 'block';

    cssbackground(Playlist);
    cssbackgroundnone(Top100);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(ZingChat);
}

// -----------follow---------------
var FollowItemVN = document.getElementById("follow-item-VN");
var FollowItemUsUk = document.getElementById("follow-item-UsUk");
var FollowItemKPop = document.getElementById("follow-item-Kpop");
var FollowItemHoaNgu = document.getElementById("follow-item-Hoangu");

var FollowContentVN = document.getElementById("follow-content-VN");
var FollowContentUsUk = document.getElementById("follow-content-UsUk");
var FollowContentKpop = document.getElementById("follow-content-Kpop");
var FollowContentHoaNgu = document.getElementById("follow-content-HoaNgu");

function backgroundFollow(x){
    x.style.color = "rgb(255, 255, 255)";
    x.style.backgroundColor = "hsla(0, 0%, 100%, 0.3)";
    x.style.radius = "16px";
}

function backgroundFollowNone(x){
    x.style.color = "#dadada";
    x.style.backgroundColor = "hsla(0, 0%, 100%, 0)";
    x.style.radius = "0px"; 
}

FollowItemVN.onclick= function(){
    FollowContentVN.style.display = 'block';
    FollowContentUsUk.style.display = 'none';
    FollowContentKpop.style.display = 'none';
    FollowContentHoaNgu.style.display = 'none';

    backgroundFollow(FollowItemVN);
    backgroundFollowNone(FollowItemUsUk);
    backgroundFollowNone(FollowItemKPop);
    backgroundFollowNone(FollowItemHoaNgu);
}

FollowItemUsUk.onclick = function(){
    FollowContentVN.style.display = 'none';
    FollowContentUsUk.style.display = 'block';
    FollowContentKpop.style.display = 'none';
    FollowContentHoaNgu.style.display = 'none';

    backgroundFollow(FollowItemUsUk);
    backgroundFollowNone(FollowItemVN);
    backgroundFollowNone(FollowItemKPop);
    backgroundFollowNone(FollowItemHoaNgu);
}

FollowItemKPop.onclick = function(){
    FollowContentVN.style.display = 'none';
    FollowContentUsUk.style.display = 'none';
    FollowContentKpop.style.display = 'block';
    FollowContentHoaNgu.style.display = 'none';

    backgroundFollow(FollowItemKPop);
    backgroundFollowNone(FollowItemUsUk);
    backgroundFollowNone(FollowItemVN);
    backgroundFollowNone(FollowItemHoaNgu);
}

FollowItemHoaNgu.onclick = function(){
    FollowContentVN.style.display = 'none';
    FollowContentUsUk.style.display = 'none';
    FollowContentKpop.style.display = 'none';
    FollowContentHoaNgu.style.display = 'block';

    backgroundFollow(FollowItemHoaNgu);
    backgroundFollowNone(FollowItemUsUk);
    backgroundFollowNone(FollowItemKPop);
    backgroundFollowNone(FollowItemVN);
}


// script bieudo

var postmot = document.getElementById('postone');
var posthai = document.getElementById('posttwo');
var postba = document.getElementById('postthree');
var postmotmotmot = document.getElementById('post111');
var posthaihaihai = document.getElementById('post222');
var postbababa = document.getElementById('post333');

postmot.onmouseover = function(){
    postmotmotmot.style.opacity = '1';
    posthaihaihai.style.opacity = '0';
    postbababa.style.opacity = '0';
}

posthai.onmouseover = function(){
    postmotmotmot.style.opacity = '0';
    posthaihaihai.style.opacity = '1';
    postbababa.style.opacity = '0';
}

postba.onmouseover = function(){
    postmotmotmot.style.opacity = '0';
    posthaihaihai.style.opacity = '0';
    postbababa.style.opacity = '1';
}

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

// ----------Upload---------
const tbnUpload = document.querySelector('.js-upload');
const modalUpload = document.querySelector('.modal-upload');
const SongMain = document.querySelector('.songmain');

function showUpload(){
    modalUpload.classList.add('open');
}

function hideUpload(){
    modalUpload.classList.remove('open');
}

tbnUpload.addEventListener('click', showUpload);

modalUpload.addEventListener('click', hideUpload);

SongMain.addEventListener('click', function(event){
    event.stopPropagation();
})

// Update và Delete

const Bacham = document.querySelectorAll('.onclickBacham');
const modalUpdate = document.querySelector('.modal-update');
const SongUpdate = document.querySelector('.song-update');

function showUpdate(){
    modalUpdate.classList.add('open');
}

function hideUpdate(){
    modalUpdate.classList.remove('open');
}

Bacham.addEventListener('click', showUpdate);

modalUpdate.addEventListener('click', hideUpdate);

SongUpdate.addEventListener('click', function(event){
    event.stopPropagation();
})