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

var CaNhan = document.getElementById("onclickCaNhan");
CaNhan.onclick = function(){
    UserProFile_CaNhan.style.display = 'block';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';

    cssbackground(CaNhan);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
}

var KhamPha = document.getElementById("onclickKhamPha");
KhamPha.onclick = function(){
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display='block';
    UserProFile_CaNhan.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';
    
    cssbackground(KhamPha);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
}

var Radio = document.getElementById("onclickRadio");
Radio.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'block';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';

    cssbackground(Radio);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
}

var FollowVN = document.getElementById("onclickFollow");
FollowVN.onclick = function(){
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display='none';
    UserProFile_CaNhan.style.display = 'none';
    UserProFileFollowVN.style.display = 'block';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'none';
    
    cssbackground(FollowVN);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(Radio);
    cssbackgroundnone(Top100);
    cssbackgroundnone(ZingChat);
}

var Top100 = document.getElementById("onclickTop100");
Top100.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'block';
    UserProFileZingChat.style.display = 'none';

    cssbackground(Top100);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(CaNhan);
    cssbackgroundnone(ZingChat);
}

var ZingChat = document.getElementById("onclickZingChat");
ZingChat.onclick = function(){
    UserProFile_CaNhan.style.display = 'none';
    UserProFile.style.display = 'none';
    UserProFileKhamPha.style.display = 'none';
    UserProFileFollowVN.style.display = 'none';
    UserProFileTop100.style.display = 'none';
    UserProFileZingChat.style.display = 'block';

    cssbackground(ZingChat);
    cssbackgroundnone(Top100);
    cssbackgroundnone(KhamPha);
    cssbackgroundnone(Radio);
    cssbackgroundnone(FollowVN);
    cssbackgroundnone(CaNhan);
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
