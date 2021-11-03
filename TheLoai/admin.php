<?php 
    session_start();    
    require("config.php");
    $sql = "select * from signin";
    $result=mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    if(!isset($_SESSION["username"])){
        header("location: index.php");
    }
    if($_SESSION["level"]!=1){
        header("location: user.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./login_submit.php">
    <link rel="stylesheet" href="./song_show.php">
    <title>DreamTeam</title>
</head>

<body>
<?php 
    require("config.php");
    $username = $_SESSION["username"];

    $username = preg_replace('/\s+/', '', $username);
    
    $sql = "select * from $username";
    $result=mysqli_query($conn , $sql);
    
?>
    <div class="main">
        <div class="sidebar hide-on-mobile">
            <div class="sidebar-logo">
                <a href="#">
                    <img src="./assets/img/home/logo-dark.svg" alt="" class="logo-img hide-on-t-m">
                    <img src="./assets/img/icon_zing_mp3_60.f6b51045.svg" alt="" class="logo-img-t-m">
                </a>
            </div>

            <div class="navbar">
                <div class="nav-item active" id="onclickCaNhan">
                    <i class="nav-item-icon fas fa-music"></i>
                    <a class="nav-item-text hide-on-t-m nav-item-profile">Cá Nhân</a>
                </div>

                <div class="nav-item " id="onclickKhamPha">
                    <i class="nav-item-icon fas fa-map-marked-alt"></i>
                    <a class="nav-item-text hide-on-t-m">Khám Phá</a>
                </div>

                <div class="nav-item" id="onclickZingChat">
                    <i class="nav-item-icon fas fa-globe"></i>
                    <a class="nav-item-text hide-on-t-m">#zingchart</a>
                </div>

                <div class="nav-item radio" id="onclickRadio">
                    <i class="nav-item-icon fas fa-podcast "></i>
                    <a class="nav-item-text hide-on-t-m">Radio</a>
                    <figure class="image tag is-48x48">
                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                            alt="">
                    </figure>
                </div>

                <div class="nav-item" id="onclickFollow">
                    <i class="nav-item-icon ri-album-line"></i>
                    <a class="nav-item-text hide-on-t-m ">Theo Dõi</a>
                </div>

                <div class="line"></div>

                <div class="nav-item">
                    <i class="nav-item-icon fas fa-headphones"></i>
                    <a class="nav-item-text hide-on-t-m">Nhạc Mới</a>
                </div>

                <div class="nav-item">
                    <i class="nav-item-icon fas fa-th-large"></i>
                    <a class="nav-item-text hide-on-t-m">Thể Loại</a>
                </div>

                <div class="nav-item" id="onclickTop100">
                    <i class="nav-item-icon far fa-star"></i>
                    <a class="nav-item-text hide-on-t-m">Top 100</a>
                </div>

                <div class="nav-item" id="onclickMV">
                    <i class="nav-item-icon ri-youtube-line"></i>
                    <a href="https://kun510.github.io/DREAMTEAM/MV/" class="nav-item-text hide-on-t-m">MV</a>
                </div>
            </div>

            <div class="line hide-on-t-m"></div>

            <div class="new-playlist hide-on-t-m  is-flex" id="onclickPlaylist">
                <p>
                    <span class="new-playlist-icon">+</span>
                    <span>Tạo playlist mới</span>
                </p>
            </div>
        </div>

        <div class="player">
            <header class="header">
                <div class="header-left">
                    <div class="header-btn hide-on-mobile">
                        <i class="ri-arrow-left-line header-icon-prev"></i>
                        <i class="ri-arrow-right-line header-icon-next"></i>
                    </div>
                    <div class="header-search is-flex">
                        <i class="ri-search-line icon-search"></i>
                        <input type="text" class="search-input" placeholder="Nhập tên bài hát, nghệ sĩ hoặc MV...">
                    </div>
                </div>
                <div class="header-user is-flex">
                    <i class="ri-t-shirt-fill hide-on-mobile"></i>
                    <button class="js-upload">
                        <i class="ri-upload-line hide-on-t-m"></i>
                    </button>
                    <i class="ri-settings-5-line hide-on-mobile"></i>
                    <button class="js-imglogin">
                        <img src="https://avatar.talk.zdn.vn/default.jpg" alt="" class="icon-user">
                    </button>
                </div>
            </header>

            <!--UserCaNhan------->
            <div class="user-canhan" id="user-profile-canhan">
                <div class="user-profile-canhan">
                    <video loop autoplay src="./assets/img/home/text.mp4" class="user-img"></video>
                    <h2 class="user-name"><?php   echo $_SESSION["username"]?></h2>
                    <div class="user-profile-right hide-on-mobile is-flex">
                        <a href="" class="user-buy-vip">MUA VIP NGAY</a>
                        <a href="" class="user-import-vip">NHẬP CODE VIP</a>
                        <a href="" class="user-more"><i class="ri-more-fill"></i></a>
                    </div>
                </div>
                <div class="playlist">
                    <div class="playlist-header is-flex">
                        <h3 class="playlist-heading is-flex">
                            <span>Bài Hát</span>
                            <i class="ri-arrow-right-s-line"></i>
                        </h3>
                        <div class="playlist-header-right is-flex">
                            <button class="btn-upload hide-on-mobile is-flex">
                                <i class="ri-upload-line"></i>
                                <span>TẢI LÊN</span>
                            </button>
                            <button class="btn-play-all is-flex">
                                <i class="ri-play-fill"></i>
                                <span>PHÁT TẤT CẢ</span>
                            </button>
                        </div>
                    </div>

                    <div class="playlist-body">
                        <div class="playlist-body-left hide-on-800">
                            <div class="cd-playlist">
                                <img src="./assets/img/home/icon-playing.gif" alt="" class="cd-gif">
                                <img src="./assets/img/home/music.jpg" alt="" class="cd-player">
                            </div>
                        </div>

                        <div class="songs-list">
                            <div class="song is-flex">
                                <div class="song-left is-flex">
                                    <div class="thumb">
                                        <i class="ri-play-fill icon-song-play"></i>
                                        <img src="./assets/img/home/icon-playing.gif" alt="" class="gif-playing">
                                    </div>
                                    <div class="song-body">
                                        <h3 class="song-name">Tên Bài hát</h3>
                                        <p class="song-singer">Tên ca sĩ</p>
                                    </div>
                                </div>
                                <div class="time-total">
                                    <span>00:00</span>
                                </div>
                                <div class="song-option">
                                    <i class="ri-heart-3-fill icon-heart"></i>
                                    <i class="ri-more-fill"></i>
                                </div>
                            </div>

                            <div class="song is-flex">
                                <div class="song-left is-flex">
                                    <div class="thumb">
                                        <i class="ri-play-fill icon-song-play"></i>
                                        <img src="./assets/img/home/icon-playing.gif" alt="" class="gif-playing">
                                    </div>
                                    <div class="song-body">
                                        <h3 class="song-name">Tên Bài hát</h3>
                                        <p class="song-singer">Tên ca sĩ</p>
                                    </div>
                                </div>
                                <div class="time-total">
                                    <span>00:00</span>
                                </div>
                                <div class="song-option">
                                    <i class="ri-heart-3-fill icon-heart"></i>
                                    <i class="ri-more-fill"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!------------End UserCaNhan -------->

            <!--Kham Pha---------->

            <div class="user-khampha" id="user-profile-khampha">
                <div class="z-radio-home">
                    <div class="zm-section">
                        <div class="head-dicover">
                            <div class="all-head-discover"><img
                                    src="https://photo-zmp3.zadn.vn/banner/b/b/7/e/bb7e4d9401436844c71a1653eb0cde07.jpg"
                                    alt="" class="head-imgdiscover"></div>
                            <div class="all-head-discover"><img
                                    src="https://photo-zmp3.zadn.vn/banner/b/5/f/0/b5f01f1f22b937a469f23ab6c1496608.jpg"
                                    alt="" class="head-imgdiscover"></div>
                            <div class="all-head-discover"><img
                                    src="https://photo-zmp3.zadn.vn/banner/3/6/a/9/36a988864057fb26aca6fd1450d92dc8.jpg"
                                    alt="" class="head-imgdiscover"></div>
                        </div>

                        <div class="radio-list-item-layout">
                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">Gần Đây</h3>
                                </div>
                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/7/9/c/0/79c0fe52e37b8bbe8d7134c028b13551.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Em Nào Có Tội</div>
                                    <div class="name-musician"><a href="#">Thương võ,ACV</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/1/4/e/f14ec2ef7e3119745fcde8ef3760914f.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Ta Nợ Nhau Một Đời Hạnh Phúc</div>
                                    <div class="name-musician"><a href="#">Đông Đăng</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/8/9/d/6/89d611f9e2d0298bf6e6458ecf451741.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Sau Ngày Mưa</div>
                                    <div class="name-musician"><a href="#">Quang Đăng Trần</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/5/9/b/1/59b17eb9f0478af892640d7b5792fe71.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Ở Nhà Vẫn Vui</div>
                                    <div class="name-musician"><a href="#">Hưng Cacao,K.U.S</a></div>
                                </div>

                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/0/0/0/4/00045e2fb64477d881d28dfd4b251a5f.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Today's EDM Hit</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                            </div>
                        </div>

                        <div class="radio-list-item-layout">

                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">Có Thể Bạn Muốn Nghe</h3>
                                </div>

                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/7/0/2/e/702e9f783592e8d59f38dcaebc4a3a09.jpg"
                                            alt="" class="imgradio ">

                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Nhạc Trẻ Gây Nghiện</div>
                                    <div class="name-musician"><a href="#">AMEE,Quân A.P,ERIK</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-playlist-zmp3.zadn.vn/s1/user-playlist?src=HavwqN7EvKCI1oYSFOdq0rHDEPmyYQ03LG4_X3xJf5PK33BIEOQf0mHVCT8uXgvML0asr6_M_WSOLo3GOv2i35CLQOWenELR7bakcMZKhqqU3YwUQ8Fa7r9GVCbkZEjA1WOWmsgBk1S00NEHFOllGr9M9P4wa-5H15fZmp7OenXR4JUAOPNlNqfH8i1obRLVJr5uZY_Uubn0LYZQAuYq3aK2AOWeYh0C40T_tY_SvrT33sUDQeFh4H44BCyZtQ15M5LXWsJCu0SIH67JPClWLrv4AeOpch9K2qWeq6gKj0C2ItxGFvUpK01AAuHfakSQMWakY7q&size=thumb/240_240"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">LK Lê Bảo Bình </div>
                                    <div class="name-musician"><a href="#">Lê Bảo Bình</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-playlist-zmp3.zadn.vn/s1/mixtape?src=HavwqN7EYmrDGr6VBegUMHOLKPiyqSi4LnK3cphHcHa53W-QQz2M7mKFNfbaXP58MmeFo6Q5aHvSNGh8CDUA4XbR1evYtC5GK6WTYMxhnniD8WZTDRt77nzv2u1tlPGVJ7bOdYJmbHjCU5sO8Q6L6anpNSnmgiL57N1SnN2YnK18VqMQOVF91Xfi0iutfPPSFYRPLiQWLwZuFe3R2xiE9JMn6nXZ8dq&cv=1&size=thumb/240_240"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">MIXTAPE Phạm Nguyên Ngọc </div>
                                    <div class="name-musician"><a href="#">Phạm Nguyên Ngọc</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-playlist-zmp3.zadn.vn/s3/mixtape?src=HavwqN7EYmrDGr6VBegSG044GDzemDr0K0GGtpdStmnO1HBUPzcENbjJ5OemZ8e8K0D7ZMZQYry4KqUASzAPNGWL5O4uaD1k4n8PjZxRZIG4NrNnByVKSrbFLV5ZmiXoNnjVzsIIndLRIblnCSINTGfD2wDYnPOX21m0pc33dKyA4GhCOywA5af21eentSr271HPq1CyMq0J55-5QhmGZfftUgu0Fha-dKNsD6FRUla&cv=1&size=thumb/240_240"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">MIXTAPE Vì Yêu Cứ Đâm Đầu</div>
                                    <div class="name-musician"><a href="#">MIN,Đen,JustaTee </a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/d/3/c/c/d3cc82d81f4493d998fc7bf8451c9f14.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Lofi Một Chút Thôi</div>
                                    <div class="name-musician"><a href="#">Khi nét cũ kĩ lại làm cho âm nhạc trở nên
                                            tươi mới hơn</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="radio-list-item-layout">

                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">Lựa Chọn Hôm Nay</h3>
                                </div>

                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/5/e/0/35e02ecd7418d1e6860792ff2815e9e9.jpg"
                                            alt="" class="imgradio ">

                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Đóa Hồng Nhạc Việt</div>
                                    <div class="name-musician"><a href="#">Những đóa hồng tạo nên dấu ấn âm nhạc Việt
                                            hiện nay</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/5/6/9/a/569a84bf6674e55758c1b013dbf1d4b0.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">A The List</div>
                                    <div class="name-musician"><a href="#">Nhạc hot nhất ở thời điểm hiện tại có ngay
                                            tại đây</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/6/f/a/e/6faea0d99e117830004d81c41987b1b3.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">K-POP Vip </div>
                                    <div class="name-musician"><a href="#">Những hạt giống tiềm năng của K-Pop thế hệ
                                            mới </a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/1/7/b/a/17ba5720e78f37ed33351b9957fb507d.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">V-POP</div>
                                    <div class="name-musician"><a href="#">Những tài năng Gen Z của V-Pop đáng nghe nhất
                                            hôm nay </a>
                                    </div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/b/0/a/7/b0a7094cc938e7fec1a73eb95aac23ea.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">
                                        Chỉ Có Thể Là Alan Walker
                                    </div>
                                    <div class="name-musician"><a href="#">Alan Walker</a></div>
                                </div>

                            </div>
                        </div>

                        <p class="content1"><a href="#">Radio Nổi Bật</a></p>
                        <div class="all-radio allradio-khampha">
                            <div class="discover-item">
                                <div class="radio-anh ">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/c/8/5/b/c85b1ed67eeff74065acade8929ad4e1.jpg"
                                        alt="" class="radio-item ">

                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="228.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>

                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/7/7/8/d/778d152062edfbe0e4c4abf151858bf0.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>

                                <div class="radio-name"><a href="#">Chill</a></div>
                                <div class="radio-view"><a href="#">650 đang nghe</a></div>
                            </div>

                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/f/d/7/9/fd79808d2180de9a421afa6aff38953e.jpg"
                                        alt="" class="radio-item VPOP">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="118.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/1/4/6/b/146b49d11cc9b3bc591823bfedb8bce2.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">V-Pop</a></div>
                                <div class="radio-view"><a href="#">450 đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/4/8/c/e/48cefd41cfc03533d52303190f47e6ef.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="208.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/1/3/0/5/1305cd954d22d89fef4354301613fd68.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">Bolero</a></div>
                                <div class="radio-view"><a href="#">200 đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/d/0/0/b/d00b7e555c8d7c2983d1fc0373a1e67a.jpg"
                                        alt="" class="radio-item RapViet">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="28.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/8/5/4/0/854010f76bddeefd5f13305a1d6cc8be.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">On Air</a></div>
                                <div class="radio-view"><a href="#">11k đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/b/f/2/2/bf223818f85e7fe129091b415038ca6c.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="268.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/b/f/3/b/bf3bf87a788a5d0b8719c6feee774a2e.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">Rap Viet</a></div>
                                <div class="radio-view"><a href="#">60 đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/e/f/b/0/efb05fb9097a7057aecef6ecb62bff5a.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="158.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/0/9/9/3/0993b3110c60ba6518fceeba9913d20d.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">Acoustic</a></div>
                                <div class="radio-view"><a href="#">5k đang nghe</a></div>
                            </div>

                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/5/3/1/c531d15ce3006ab3c7467a2c0315f1b7.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="178.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/b/0/d/a/b0da7c8ecd6521337682f3a86fa0170f.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">One the radio</a></div>
                                <div class="radio-view"><a href="#">4k đang nghe</a></div>
                            </div>

                        </div>

                        <div class="radio-list-item-layout duoi-all-radio">

                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">Nhạc dành riêng cho bạn</h3>
                                </div>

                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-playlist-zmp3.zadn.vn/s2/dailymix?src=HavwqN7EvKCI1oYSFOdq0rDDOfmuYVK3LbffYZk8emW60MwAPu_tMLfNO8zYsFq93WDcs63P_0uNM2BPR9-k1LmQQu4do-TI4LOia3kIjmzNLYoARu_d2GK5VDreYkGC1b4iYMwEjWWFL7kARjgqMLK1HTWutzbGL051rp_4XHS13GU5D8_7Nbv6KynameiPJmP6XYN2sXbA1XUQ8TkD4qi45S8dteWG75SGadE5tnCSMaF1V8QCHnOF39q_Wu01H0H7ttRTorKDLGgJCSoB6qSN2fqnouiLM1OIac35YaHTJK6HDvEB65WU5PWrmjWV3KqIp3UHtr842XR0VG&cv=1&size=thumb/240_240"
                                            alt="" class="imgradio ">

                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">4U V-POP</div>
                                    <div class="name-musician"><a href="#">Quân A.P,ACV</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-playlist-zmp3.zadn.vn/s3/dailymix?src=HavwqN7EvKCI1oYSFOdq0rLDE9njYQG31G1hWJtJfmLHMpY7EO6Y0r8BQ80vqF86KGjkZsxI-GWPKoVVOfIh0r8HReSfmE9K7rqfbcdGg1KV22cMQOMq5GDM8fnlsRfA1L0XpMk8xKnHKNFCEzxgIrDM8im-a-OC05fadZNOf4LV4J3NPPNe0avH99rqbRa26b5rqN2Dx5DBKoVN98c-NnW7TTqbsxvS6bLpYNlOk0iR1pZHCekqJKaCSvDxrVyP05q-tpp4lrXA6JxTFCQ_MbCO9OuwmkfS0Xzms6d1xrXKJY3PQPRi3GPBSTu-aBj03Gjoqdq&cv=1&size=thumb/240_240"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">4U-EDM</div>
                                    <div class="name-musician"><a href="#">Alan Walker, Farruko</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-playlist-zmp3.zadn.vn/s1/dailymix?src=HavwqN7EvKCI1og5AfZbHm1SVDXecELPL4jptMoOx5iD5IFUDStiLWyJUz0ocxHO3qCgsM-RsrW2HqRVQ9lUMGPU6faubvWB3HLOq63Sp49QM1INSS2L7WSP59TimOX40KaVpJkHWHjKJ1hED9I6I0v7Iferpu583nHAfsVBqoSE54kZPCpBUKr0H-Ksnu0x11yCiN-NpNT33X3e8ygCTqCJ4VLvpDny6KH1_2QPsNaQIqJxTSFIAKvA7_nrme4fSnWRhnB7Z2vv51AmIe_R8Zz66Vi8neLfQmz8jaI1b7KoMnMZH87TSdi84F8QqDrr8Lf4_4tGt7HsNnFzJT6DBtLUGASRwjyaTJ58eX_gtYPeQm3n8dq&cv=1&size=thumb/240_240"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">4U-BALLAD </div>
                                    <div class="name-musician"><a href="#">Mr.Siro</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/a/2/e/a/a2ea04325a99802185a7dd0a076b9302.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">C-Pop Tháng 10/2021</div>
                                    <div class="name-musician"><a href="#">Trình Hưởng, PANTHEPACK, Sunnee Dương Vân
                                            Tình</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/a/5/9/5/a5958bd24819255cfa64ebda7c9735da.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">K-Pop Tháng 10/2021</div>
                                    <div class="name-musician"><a href="#">CL, aespa, Eric-Nam</a></div>
                                </div>

                            </div>
                        </div>

                        <p class="content1"><a href="#">Tâm Trạng và Hoạt Động</a></p>
                        <div class="mood">
                            <div class="mod-img"><img
                                    src="https://photo-zmp3.zadn.vn/cover/0/4/6/c/046cb712123452d99e0f5d6d3f77d6ec.jpg"
                                    alt="" class="mood-img"></div>
                            <div class="mod-img"><img
                                    src="https://photo-zmp3.zadn.vn/cover/1/a/9/9/1a99f9d8d8c5563e3893d9f10cd8689a.jpg"
                                    alt="" class="mood-img"></div>
                            <div class="mod-img"><img
                                    src="https://photo-zmp3.zadn.vn/cover/4/f/8/5/4f857e3277bb89b5e1c5ecc24598027c.jpg"
                                    alt="" class="mood-img"></div>
                            <div class="mod-img"><img
                                    src="https://photo-zmp3.zadn.vn/cover/a/2/7/8/a2784283efbab4c3b17e344f9b0a4b30.jpg"
                                    alt="" class="mood-img"></div>

                        </div>

                        <div class="radio-list-item-layout">

                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">Nhạc Quốc Tế</h3>
                                </div>

                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/2/b/5/4/2b54d49a5b910317078f8322781ca3b3.jpg"
                                            alt="" class="imgradio ">

                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Chỉ Có Thể Là Martin Garrix</div>
                                    <div class="name-musician"><a href="#">Martin Garrix</a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/9/9/d/0/99d0a9c69d082085c7943e091352080c.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">DJ Station</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/4/f/2/7/4f27c3c58f45ebb1162d8a602cdd417c.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Justin Bieber's Flavour</div>
                                    <div class="name-musician"><a href="#">Cơn sốt âm nhạc từ những tên tuổi tạo hit</a>
                                    </div>
                                </div>

                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/d/1/c/6/d1c67aeb6c974c66fad999c95c5ff942.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Everyday EDM!</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>

                            </div>
                        </div>

                        <p class="content1"><a href="#">Sắp Ra Mắt</a></p>
                        <div class="upcoming">
                            <div class="up">
                                <img src="https://photo-resize-zmp3.zadn.vn/w600_r12x7_jpeg/event/5/8/7/9/5879c19f57a708acedace03bdaf543d3.jpg"
                                    alt="" class="up-img">
                                <div class="fan-context"> Lượt quan tâm</div>
                                <div class="fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826712685629480/95d74049e3b512eb4ba4.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826714237534228/79f7115db99743c91a86.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826720264749056/e322d465d32f2071793e.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898827164609302538/31906893_230365114382323_8830020424873017344_n.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898827766970064986/242991308_1131762267561921_7297629715278085581_n.jpg"
                                        alt="" class="img-fan">
                                    <p class="fan-view">+11K</p>
                                    <div class="fan-box">
                                        <p>QUAN TÂM</p>
                                    </div>
                                </div>

                            </div>

                            <div class="up">
                                <img src="https://photo-resize-zmp3.zadn.vn/w600_r12x7_jpeg/event/a/c/1/b/ac1b44fcc28bc9f72b952f756b3c4df2.jpg"
                                    alt="" class="up-img">
                                <div class="fan-context"> Lượt quan tâm</div>
                                <div class="fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826712685629480/95d74049e3b512eb4ba4.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826714237534228/79f7115db99743c91a86.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826720264749056/e322d465d32f2071793e.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898827164609302538/31906893_230365114382323_8830020424873017344_n.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898827766970064986/242991308_1131762267561921_7297629715278085581_n.jpg"
                                        alt="" class="img-fan">
                                    <p class="fan-view">+31K</p>
                                    <div class="fan-box">
                                        <p>QUAN TÂM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="up">
                                <img src="https://photo-resize-zmp3.zadn.vn/w600_r12x7_jpeg/event/b/8/e/5/b8e5bfd4f5d96570ea5431b2e9a9ddc6.jpg"
                                    alt="" class="up-img">
                                <div class="fan-context"> Lượt quan tâm</div>
                                <div class="fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826712685629480/95d74049e3b512eb4ba4.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826714237534228/79f7115db99743c91a86.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898826720264749056/e322d465d32f2071793e.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898827164609302538/31906893_230365114382323_8830020424873017344_n.jpg"
                                        alt="" class="img-fan">
                                    <img src="https://cdn.discordapp.com/attachments/860720453542739978/898827766970064986/242991308_1131762267561921_7297629715278085581_n.jpg"
                                        alt="" class="img-fan">
                                    <p class="fan-view">+20K</p>
                                    <div class="fan-box">
                                        <p>QUAN TÂM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="content-bieudo"><a href="#">#ZingChat 〄</a></p>

                        <!-- Bieu do -->
                        <div class="all-bieudo">

                            <div class="bieudo-img">
                                <div class="bieudo-img-box" id="postone">
                                    <p class="bieudo-text">1</p>
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/a/9/e/e/a9ee81fdd1c2b569c1c9631e969ea0aa.jpg"
                                        alt="" class="bieudo-img-anh">
                                    <div class="bieudo-text24">
                                        <p class="bieudo-text2">Chưa Bao Giờ Em Quên</p>
                                        <a href="#" class="bieudo-text4">Trần Cường</a>
                                    </div>

                                    <p class="bieudo-text3">38%</p>
                                </div>
                                <div class="bieudo-img-box " id="posttwo">
                                    <p class="bieudo-text">2</p>
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/5/1/7/c/517ca58e0bb720d2e469e96259ef2bdd.jpg"
                                        class="bieudo-img-anh">
                                    <div class="bieudo-text24">
                                        <p class="bieudo-text2">Yêu Là Tha Thứ Cho Nhau</p>
                                        <a href="#" class="bieudo-text4">Đỗ Vạn Lâm</a>
                                    </div>

                                    <p class="bieudo-text3">25%</p>
                                </div>
                                <div class="bieudo-img-box " id="postthree">
                                    <p class="bieudo-text">3</p>
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/8/8/5/7885c2ade26fc2dd33a2c33638f5f72a.jpg"
                                        alt="" class="bieudo-img-anh">
                                    <div class="bieudo-text24">
                                        <p class="bieudo-text2">Yêu Là Nói Ra Luôn</p>
                                        <a href="#" class="bieudo-text4">Nguyễn Hoài Vĩ</a>
                                    </div>

                                    <p class="bieudo-text3">22%</p>
                                </div>
                                <div class="bieudo-img-box">
                                    <p class="bieudo-text">4</p>
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/9/c/0/79c0fe52e37b8bbe8d7134c028b13551.jpg"
                                        alt="" class="bieudo-img-anh">
                                    <div class="bieudo-text24">
                                        <p class="bieudo-text2">Thêm Một Lần Đau Nữa</p>
                                        <a href="#" class="bieudo-text4">DREATEAM</a>
                                    </div>

                                    <p class="bieudo-text3">15%</p>
                                </div>
                                <div class="bieudo-click">
                                    <label class="bieudo-text-but" for="">Xem Thêm</label>
                                </div>

                            </div>
                            <svg class="bieudo">
                                <!-- trục X -->
                                <line x1="30" y1="0" x2="30" y2="415" style="stroke-width:3;"></line>
                                <!-- trục Y -->
                                <line x1="29" y1="415" x2="770" y2="415"
                                    style="stroke-width:3; stroke:rgba(127,9,156,0.8)"></line>
                                <!-- đường kẻ trong  -->
                                <line x1="30" y1="50" x2="770" y2="50"
                                    style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                                </line>
                                <line x1="30" y1="120" x2="770" y2="120"
                                    style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                                </line>
                                <line x1="30" y1="190" x2="770" y2="190"
                                    style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                                </line>
                                <line x1="30" y1="260" x2="770" y2="260"
                                    style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                                </line>
                                <line x1="30" y1="330" x2="770" y2="330"
                                    style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                                </line>
                                <g font-size="10" font-family="verdana" fill="#BBBFBF" stroke="none"
                                    text-anchor="middle" opacity=0.5>
                                    <text x="50" y="410" dx="-15" dy="20">15:00</text>
                                    <text x="115" y="410" dx="-15" dy="20">17:00</text>
                                    <text x="175" y="410" dx="-15" dy="20">19:00</text>
                                    <text x="240" y="410" dx="-15" dy="20">21:00</text>
                                    <text x="305" y="410" dx="-15" dy="20">23:00</text>
                                    <text x="370" y="410" dx="-15" dy="20">1:00</text>
                                    <text x="435" y="410" dx="-15" dy="20">3:00</text>
                                    <text x="500" y="410" dx="-15" dy="20">5:00</text>
                                    <text x="565" y="410" dx="-15" dy="20">7:00</text>
                                    <text x="630" y="410" dx="-15" dy="20">9:00</text>
                                    <text x="695" y="410" dx="-15" dy="20">11:00</text>
                                    <text x="760" y="410" dx="-15" dy="20">13:00</text>
                                </g>
                                <!-- đường đi tọa độ -->
                                <polyline class="duong"
                                    points="40,160,70,150,100,150,150,190,200,175,250,160,260,160,280,160,300,140,400,170,450,190,460,195,470,198,480,200,485,200,490,200,550,250,560,250,580,245,600,220,620,200,625,190,630,180,635,180,670,220,675,225,680,225,700,200,720,190,740,160,760,150"
                                    style="stroke:cyan; fill:none;"></polyline>
                                <polyline
                                    points="40,170,70,160,100,170,150,220,200,200,250,200,280,190,300,195,330,170,360,180,390,180,420,200,440,200,460,210,490,230,520,250,560,260,590,260,610,230,620,230,640,200,665,230,680,250,690,240,700,220,720,200,740,200,760,180,780,165"
                                    style="stroke:red; fill:none;"></polyline>
                                <polyline
                                    points="40,220,120,240,150,260,155,259,160,258,200,240,205,240,220,250,260,300,265,300,295,295,310,285,340,265,370,245,380,240,400,240,420,220,440,220,460,230,490,250,550,265,600,265,610,265,640,250,645,240,650,240,665,260,680,270,690,275,700,275,750,240,780,245"
                                    style="stroke:rgb(238, 217, 27); fill:none;"></polyline>
                                <g class="post1" id="post111">
                                    <circle cx="40" cy="160" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="70" cy="150" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="100" cy="150" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="150" cy="190" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="200" cy="175" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="250" cy="160" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="260" cy="160" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="280" cy="160" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="300" cy="140" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="400" cy="170" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="450" cy="190" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="460" cy="195" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="470" cy="198" r="4" style="stroke-width:3;"></circle>
                                    <!-- <circle cx="480" cy="200" r="4" style="stroke-width:3;"></circle> -->
                                    <circle cx="485" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <!-- <circle cx="490" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="550" cy="250" r="4" style="stroke-width:3;"></circle> -->
                                    <circle cx="560" cy="250" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="580" cy="245" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="600" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="620" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="625" cy="190" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="630" cy="180" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="670" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="675" cy="225" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="680" cy="225" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="700" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="720" cy="190" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="740" cy="160" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="760" cy="150" r="4" style="stroke-width:3;"></circle>


                                </g>
                                <g class="post1" id="post222" fill="White" stroke="red" stroke-width="2">
                                    <circle cx="40" cy="170" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="70" cy="160" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="100" cy="170" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="150" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="200" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="250" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="280" cy="190" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="300" cy="195" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="330" cy="170" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="360" cy="180" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="390" cy="180" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="420" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="440" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="460" cy="210" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="490" cy="230" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="520" cy="250" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="560" cy="260" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="590" cy="260" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="610" cy="230" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="620" cy="230" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="640" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="665" cy="230" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="680" cy="250" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="690" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="700" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="720" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="740" cy="200" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="760" cy="180" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="780" cy="165" r="4" style="stroke-width:3;"></circle>

                                </g>
                                <g class="post1" id="post333" fill="White" stroke="red" stroke-width="2">
                                    <circle cx="40" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="120" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="150" cy="260" r="4" style="stroke-width:3;"></circle>
                                    <!-- <circle cx="155" cy="259" r="4" style="stroke-width:3;"></circle> -->
                                    <circle cx="160" cy="258" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="200" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <!-- <circle cx="205" cy="240" r="4" style="stroke-width:3;"></circle> -->
                                    <circle cx="220" cy="250" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="260" cy="300" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="265" cy="300" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="295" cy="295" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="310" cy="285" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="340" cy="265" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="370" cy="245" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="380" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="400" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="420" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="440" cy="220" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="460" cy="230" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="490" cy="250" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="550" cy="265" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="600" cy="265" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="610" cy="265" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="640" cy="250" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="645" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="650" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="680" cy="270" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="690" cy="275" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="700" cy="275" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="750" cy="240" r="4" style="stroke-width:3;"></circle>
                                    <circle cx="780" cy="245" r="4" style="stroke-width:3;"></circle>

                                </g>
                            </svg>
                        </div>

                        <div class="mood">
                            <div class="mod-img"><img
                                    src="https://zmp3-static.zadn.vn/skins/zmp3-v5.2/images/song-vn-2x.jpg" alt=""
                                    class="mood-img"></div>
                            <div class="mod-img"><img
                                    src="https://photo-zmp3.zadn.vn/cover/e/d/3/2/ed325aa9d68abced2dc9234965f4af73.jpg"
                                    alt="" class="mood-img"></div>
                            <div class="mod-img"><img
                                    src="https://zmp3-static.zadn.vn/skins/zmp3-v5.2/images/web_song_usuk.jpg" alt=""
                                    class="mood-img"></div>
                            <div class="mod-img"><img
                                    src="https://zmp3-static.zadn.vn/skins/zmp3-v5.2/images/web_song_kpop.jpg" alt=""
                                    class="mood-img"></div>

                        </div>
                        <p class="content-NS"><a href="#">Nghệ Sĩ </a></p>
                        <div class="discover nghesi">

                            <div class="anh ">
                                <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/erik.png" alt=""
                                    class="NS-img ">
                            </div>
                            <div class="anh">
                                <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/huong-giang.png"
                                    alt="" class="NS-img ">
                            </div>
                            <div class="anh">
                                <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/huong-tram.png"
                                    alt="" class="NS-img ">

                            </div>
                            <div class="anh">
                                <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/justatee.png"
                                    alt="" class="NS-img ">

                            </div>
                            <div class="anh">
                                <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/liz-kim-cuong.png"
                                    alt="" class="NS-img ">>
                            </div>

                        </div>

                        <div class="radio-list-item-layout">

                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">Top 100</h3>
                                </div>

                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/9/b/b/b/9bbb0756e0844189746ad02f2a81eee8.jpg"
                                            alt="" class="imgradio ">

                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Top 100 Bài Hát Nhạc Trẻ</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/b/8/0/0/b800a8b039fd00210f54e58b3309b46f.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Top 100 Bài Hát Dance Việt</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/c/5/f/c/c5fc615c43215c6b72676f42767855ee.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Top 100 EDM Hay Nhất </div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>

                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/2/5/2/f2527ceaab79370a6bacec6f667fe1c1.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Top 100 EDM Hay Nhất </div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>

                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/2/6/4/f26467e87075a96bf974a8c49450bad5.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Top 100 Nhạc Cách Mạng</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>

                            </div>
                        </div>

                        <p class="content1"><a href="#">Mới Phát Hành</a></p>
                        <div class="Spread">
                            <div class="Spread-box">
                                <img src="	https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/b/c/9/a/bc9a9feaff8fe7bda8bc67621b8c1312.jpg"
                                    alt="" class="Spread-img">
                                <div class="Spread-text">
                                    <h3 class="Spread-text1">Em Hát Ai Nghe</h3>
                                    <a href="" class="Spread-text2">Orange</a>
                                    <div class="Spread-text34">
                                        <p class="Spread-text3">#1</p>
                                        <p class="Spread-text4">13/08/2021</p>
                                    </div>

                                </div>
                            </div>
                            <div class="Spread-box">
                                <img src="	https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/d/2/6/1/d26117831a67fecf48f95c99823cecc6.jpg"
                                    alt="" class="Spread-img">
                                <div class="Spread-text">
                                    <h3 class="Spread-text1">Khuê Mộc Lang</h3>
                                    <a href="" class="Spread-text2">Hương Ly</a>
                                    <div class="Spread-text34">
                                        <p class="Spread-text3">#2</p>
                                        <p class="Spread-text4">14/08/2021</p>
                                    </div>

                                </div>
                            </div>
                            <div class="Spread-box">
                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/f/e/0/9/fe09fb3583e525d9c5c3619f446baae7.jpg"
                                    alt="" class="Spread-img">
                                <div class="Spread-text">
                                    <h3 class="Spread-text1">Thú Tội</h3>
                                    <a href="" class="Spread-text2">Đạt G</a>
                                    <div class="Spread-text34">
                                        <p class="Spread-text3">#3</p>
                                        <p class="Spread-text4">15/08/2020</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Spread-content">
                            <div class="Spread-content1">

                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/d/2/6/1/d26117831a67fecf48f95c99823cecc6.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Khuê Mộc Lan</p>
                                    <p class="SP-text1"><a href="#">Hương Ly,Jombie</a></p>
                                </div>


                            </div>

                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/6/5/f/3/65f316face040eb499884719b9d2c214.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Khoan Thai</p>
                                    <p class="SP-text1"><a href="#">Khải Đăng</a></p>
                                </div>
                            </div>
                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/9/5/3/5/9535cf2a5ebf34f486a42392f70a0dec.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Bao Giờ Quên</p>
                                    <p class="SP-text1"><a href="#">Anh quân Idol</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="Spread-content">
                            <div class="Spread-content1">

                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/5/2/3/c/523c030863fef2e9fb8bd997b4dd7e1c.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Chạy Đi Chờ Chi</p>
                                    <p class="SP-text1"><a href="#">T-Pame</a></p>
                                </div>


                            </div>

                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/0/5/f/e/05fef4a417e88bee47a7c6a45a656c36.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Nỗi Buồn Của Người</p>
                                    <p class="SP-text1"><a href="#">Jarvis Huỳnh</a></p>
                                </div>
                            </div>
                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/1/b/b/b/1bbb92a19f1acccbc5858393fef3af17.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Quý Giá</p>
                                    <p class="SP-text1"><a href="#">Đạt G</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="Spread-content">
                            <div class="Spread-content1">

                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/6/d/7/f/6d7f7f4eff5805a9f2c96f3b5265b420.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Tình Nồng</p>
                                    <p class="SP-text1"><a href="#">Vicky Nhung</a></p>
                                </div>


                            </div>

                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/6/0/a/e/60ae4c9a54bf8800e89aa7339cff584c.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Một Thuỡ Yêu Người</p>
                                    <p class="SP-text1"><a href="#">Vicky Nhung</a></p>
                                </div>
                            </div>
                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/3/1/1/5/31155c2da193f85c8c0719fda2bf6212.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Chờ Đến Khi</p>
                                    <p class="SP-text1"><a href="#">Trinh Thăng Bình</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="Spread-content">
                            <div class="Spread-content1">

                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/c/a/a/3/caa33fde7c86c0d0fc8842593b059f30.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Hôm Nay Em Đẹp Lắm</p>
                                    <p class="SP-text1"><a href="#">Tường Quân</a></p>
                                </div>


                            </div>

                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/5/1/a/751afa60db741623dd5dfd4e79a7e45c.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Là Sao?</p>
                                    <p class="SP-text1"><a href="#">Wang</a></p>
                                </div>
                            </div>
                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/d/e/0/6/de06907e687e042fa25bfed0fc66c208.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Hát Hay Lắm</p>
                                    <p class="SP-text1"><a href="#">Trần Cường</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="Spread-content">
                            <div class="Spread-content1">

                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/1/8/f/6/18f64c5e83b7e13b7ff23dc34507ca69.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Trùng Dương</p>
                                    <p class="SP-text1"><a href="#">Đỗ Vạn Lâm</a></p>
                                </div>


                            </div>

                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/d/4/7/1/d471827426fdefb76098e6b9e82ba23b.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Cớ Sao Lại Buồn</p>
                                    <p class="SP-text1"><a href="#">Thanh Vĩ</a></p>
                                </div>
                            </div>
                            <div class="Spread-content1">
                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/b/9/1/d/b91d7a98908852bd606837b7a53f5072.jpg"
                                    alt="" class="Spread-content-img">
                                <div class="Sp-all-text">
                                    <p class="SP-text">Masup</p>
                                    <p class="SP-text1"><a href="#">Masew,Ngô Kiến Huy</a></p>
                                </div>
                            </div>

                        </div>

                        <div class="radio-list-item-layout">

                            <div class="content2 radio-media-content">
                                <div class="radio-media-content">
                                    <h3 class="title">MV Hot</h3>
                                </div>

                            </div>

                            <div class="discover">
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/0/e/0/d/0e0d2b8985fdeb89f126b2290f7e5f47.jpg"
                                            alt="" class="imgradio ">

                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Bao Lâu Ta Lại Yêu Nhau</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/a/d/c/e/adce596f4171f145a41e8f18634101d1.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Yêu Ai Cũng Vậy</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/6/8/2/4/682429cd5adca8fb751af9ba7707203f.jpg"
                                            alt="" class="imgradio">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Ôm Trọn Nỗi Đau</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/d/a/8/fda8ba5de80cc1be4f38727d17c2e776.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Kiếp Xa Quê</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>
                                <div class="radio-list-item-layout-ingredient">
                                    <div class="radio-action">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/0/a/b/7/0ab7d18869134ee776b0cbac09f69693.jpg"
                                            alt="" class="imgradio ">
                                        <div class="action-radio">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="action-radio-heart">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        <div class="action-radio-bacham">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="radio-name-content">Triệu Trái Tim</div>
                                    <div class="name-musician"><a href="#"></a></div>
                                </div>

                            </div>
                        </div>


                        <div class="support">
                            <p class="support-text">Đối Tác Âm Nhạc</p>
                            <div class="support-nap">
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/Kakao-M.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/orcahrd.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/beggers.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/SM-Entertainment.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/universal-1.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/yg.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/sony.png"
                                        alt="" class="support-img">
                                </div>
                                <div class="support-all-img">
                                    <img src="https://static-zmp3.zadn.vn/skins/zmp3-v6.1/images/partner_logo/empire.png"
                                        alt="" class="support-img">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------End Kham Pha---------->

            <!-- Zing chat -->

            <div class="user-zingchat" id="user-profile-zingchat">
                <div class="zingchatmain">

                    <div class="zingchatheader mb-40">
                        <h3 class="zingchat-header-name">#zingchart</h3>
                        <div class="zingchat-header-icon">
                            <i class="fa fa-play zingchat-header-icon-play"></i>
                        </div>
                    </div>

                    <div class="all-bieudo">

                        <div class="bieudo-img">
                            <div class="bieudo-img-box" id="postone">
                                <p class="bieudo-text">1</p>
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/a/9/e/e/a9ee81fdd1c2b569c1c9631e969ea0aa.jpg"
                                    alt="" class="bieudo-img-anh">
                                <div class="bieudo-text24">
                                    <p class="bieudo-text2">Chưa Bao Giờ Em Quên</p>
                                    <a href="#" class="bieudo-text4">Trần Cường</a>
                                </div>

                                <p class="bieudo-text3">38%</p>
                            </div>
                            <div class="bieudo-img-box " id="posttwo">
                                <p class="bieudo-text">2</p>
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/5/1/7/c/517ca58e0bb720d2e469e96259ef2bdd.jpg"
                                    class="bieudo-img-anh">
                                <div class="bieudo-text24">
                                    <p class="bieudo-text2">Yêu Là Tha Thứ Cho Nhau</p>
                                    <a href="#" class="bieudo-text4">Đỗ Vạn Lâm</a>
                                </div>

                                <p class="bieudo-text3">25%</p>
                            </div>
                            <div class="bieudo-img-box " id="postthree">
                                <p class="bieudo-text">3</p>
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/8/8/5/7885c2ade26fc2dd33a2c33638f5f72a.jpg"
                                    alt="" class="bieudo-img-anh">
                                <div class="bieudo-text24">
                                    <p class="bieudo-text2">Yêu Là Nói Ra Luôn</p>
                                    <a href="#" class="bieudo-text4">Nguyễn Hoài Vĩ</a>
                                </div>

                                <p class="bieudo-text3">22%</p>
                            </div>
                            <div class="bieudo-img-box">
                                <p class="bieudo-text">4</p>
                                <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/9/c/0/79c0fe52e37b8bbe8d7134c028b13551.jpg"
                                    alt="" class="bieudo-img-anh">
                                <div class="bieudo-text24">
                                    <p class="bieudo-text2">Thêm Một Lần Đau Nữa</p>
                                    <a href="#" class="bieudo-text4">DREATEAM</a>
                                </div>

                                <p class="bieudo-text3">15%</p>
                            </div>
                            <div class="bieudo-click">
                                <label class="bieudo-text-but" for="">Xem Thêm</label>
                            </div>

                        </div>
                        <svg class="bieudo">
                            <!-- trục X -->
                            <line x1="30" y1="0" x2="30" y2="415" style="stroke-width:3;"></line>
                            <!-- trục Y -->
                            <line x1="29" y1="415" x2="770" y2="415" style="stroke-width:3; stroke:rgba(127,9,156,0.8)">
                            </line>
                            <!-- đường kẻ trong  -->
                            <line x1="30" y1="50" x2="770" y2="50"
                                style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                            </line>
                            <line x1="30" y1="120" x2="770" y2="120"
                                style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                            </line>
                            <line x1="30" y1="190" x2="770" y2="190"
                                style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                            </line>
                            <line x1="30" y1="260" x2="770" y2="260"
                                style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                            </line>
                            <line x1="30" y1="330" x2="770" y2="330"
                                style="stroke-width:2; stroke:rgb(187, 191, 191); stroke-dasharray :1,5; opacity:0.3">
                            </line>
                            <g font-size="10" font-family="verdana" fill="#BBBFBF" stroke="none" text-anchor="middle"
                                opacity=0.5>
                                <text x="50" y="410" dx="-15" dy="20">15:00</text>
                                <text x="115" y="410" dx="-15" dy="20">17:00</text>
                                <text x="175" y="410" dx="-15" dy="20">19:00</text>
                                <text x="240" y="410" dx="-15" dy="20">21:00</text>
                                <text x="305" y="410" dx="-15" dy="20">23:00</text>
                                <text x="370" y="410" dx="-15" dy="20">1:00</text>
                                <text x="435" y="410" dx="-15" dy="20">3:00</text>
                                <text x="500" y="410" dx="-15" dy="20">5:00</text>
                                <text x="565" y="410" dx="-15" dy="20">7:00</text>
                                <text x="630" y="410" dx="-15" dy="20">9:00</text>
                                <text x="695" y="410" dx="-15" dy="20">11:00</text>
                                <text x="760" y="410" dx="-15" dy="20">13:00</text>
                            </g>
                            <!-- đường đi tọa độ -->
                            <polyline class="duong"
                                points="40,160,70,150,100,150,150,190,200,175,250,160,260,160,280,160,300,140,400,170,450,190,460,195,470,198,480,200,485,200,490,200,550,250,560,250,580,245,600,220,620,200,625,190,630,180,635,180,670,220,675,225,680,225,700,200,720,190,740,160,760,150"
                                style="stroke:cyan; fill:none;"></polyline>
                            <polyline
                                points="40,170,70,160,100,170,150,220,200,200,250,200,280,190,300,195,330,170,360,180,390,180,420,200,440,200,460,210,490,230,520,250,560,260,590,260,610,230,620,230,640,200,665,230,680,250,690,240,700,220,720,200,740,200,760,180,780,165"
                                style="stroke:red; fill:none;"></polyline>
                            <polyline
                                points="40,220,120,240,150,260,155,259,160,258,200,240,205,240,220,250,260,300,265,300,295,295,310,285,340,265,370,245,380,240,400,240,420,220,440,220,460,230,490,250,550,265,600,265,610,265,640,250,645,240,650,240,665,260,680,270,690,275,700,275,750,240,780,245"
                                style="stroke:rgb(238, 217, 27); fill:none;"></polyline>
                            <g class="post1" id="post111">
                                <circle cx="40" cy="160" r="4" style="stroke-width:3;"></circle>
                                <circle cx="70" cy="150" r="4" style="stroke-width:3;"></circle>
                                <circle cx="100" cy="150" r="4" style="stroke-width:3;"></circle>
                                <circle cx="150" cy="190" r="4" style="stroke-width:3;"></circle>
                                <circle cx="200" cy="175" r="4" style="stroke-width:3;"></circle>
                                <circle cx="250" cy="160" r="4" style="stroke-width:3;"></circle>
                                <circle cx="260" cy="160" r="4" style="stroke-width:3;"></circle>
                                <circle cx="280" cy="160" r="4" style="stroke-width:3;"></circle>
                                <circle cx="300" cy="140" r="4" style="stroke-width:3;"></circle>
                                <circle cx="400" cy="170" r="4" style="stroke-width:3;"></circle>
                                <circle cx="450" cy="190" r="4" style="stroke-width:3;"></circle>
                                <circle cx="460" cy="195" r="4" style="stroke-width:3;"></circle>
                                <circle cx="470" cy="198" r="4" style="stroke-width:3;"></circle>
                                <!-- <circle cx="480" cy="200" r="4" style="stroke-width:3;"></circle> -->
                                <circle cx="485" cy="200" r="4" style="stroke-width:3;"></circle>
                                <!-- <circle cx="490" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="550" cy="250" r="4" style="stroke-width:3;"></circle> -->
                                <circle cx="560" cy="250" r="4" style="stroke-width:3;"></circle>
                                <circle cx="580" cy="245" r="4" style="stroke-width:3;"></circle>
                                <circle cx="600" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="620" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="625" cy="190" r="4" style="stroke-width:3;"></circle>
                                <circle cx="630" cy="180" r="4" style="stroke-width:3;"></circle>
                                <circle cx="670" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="675" cy="225" r="4" style="stroke-width:3;"></circle>
                                <circle cx="680" cy="225" r="4" style="stroke-width:3;"></circle>
                                <circle cx="700" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="720" cy="190" r="4" style="stroke-width:3;"></circle>
                                <circle cx="740" cy="160" r="4" style="stroke-width:3;"></circle>
                                <circle cx="760" cy="150" r="4" style="stroke-width:3;"></circle>


                            </g>
                            <g class="post1" id="post222" fill="White" stroke="red" stroke-width="2">
                                <circle cx="40" cy="170" r="4" style="stroke-width:3;"></circle>
                                <circle cx="70" cy="160" r="4" style="stroke-width:3;"></circle>
                                <circle cx="100" cy="170" r="4" style="stroke-width:3;"></circle>
                                <circle cx="150" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="200" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="250" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="280" cy="190" r="4" style="stroke-width:3;"></circle>
                                <circle cx="300" cy="195" r="4" style="stroke-width:3;"></circle>
                                <circle cx="330" cy="170" r="4" style="stroke-width:3;"></circle>
                                <circle cx="360" cy="180" r="4" style="stroke-width:3;"></circle>
                                <circle cx="390" cy="180" r="4" style="stroke-width:3;"></circle>
                                <circle cx="420" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="440" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="460" cy="210" r="4" style="stroke-width:3;"></circle>
                                <circle cx="490" cy="230" r="4" style="stroke-width:3;"></circle>
                                <circle cx="520" cy="250" r="4" style="stroke-width:3;"></circle>
                                <circle cx="560" cy="260" r="4" style="stroke-width:3;"></circle>
                                <circle cx="590" cy="260" r="4" style="stroke-width:3;"></circle>
                                <circle cx="610" cy="230" r="4" style="stroke-width:3;"></circle>
                                <circle cx="620" cy="230" r="4" style="stroke-width:3;"></circle>
                                <circle cx="640" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="665" cy="230" r="4" style="stroke-width:3;"></circle>
                                <circle cx="680" cy="250" r="4" style="stroke-width:3;"></circle>
                                <circle cx="690" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="700" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="720" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="740" cy="200" r="4" style="stroke-width:3;"></circle>
                                <circle cx="760" cy="180" r="4" style="stroke-width:3;"></circle>
                                <circle cx="780" cy="165" r="4" style="stroke-width:3;"></circle>

                            </g>
                            <g class="post1" id="post333" fill="White" stroke="red" stroke-width="2">
                                <circle cx="40" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="120" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="150" cy="260" r="4" style="stroke-width:3;"></circle>
                                <!-- <circle cx="155" cy="259" r="4" style="stroke-width:3;"></circle> -->
                                <circle cx="160" cy="258" r="4" style="stroke-width:3;"></circle>
                                <circle cx="200" cy="240" r="4" style="stroke-width:3;"></circle>
                                <!-- <circle cx="205" cy="240" r="4" style="stroke-width:3;"></circle> -->
                                <circle cx="220" cy="250" r="4" style="stroke-width:3;"></circle>
                                <circle cx="260" cy="300" r="4" style="stroke-width:3;"></circle>
                                <circle cx="265" cy="300" r="4" style="stroke-width:3;"></circle>
                                <circle cx="295" cy="295" r="4" style="stroke-width:3;"></circle>
                                <circle cx="310" cy="285" r="4" style="stroke-width:3;"></circle>
                                <circle cx="340" cy="265" r="4" style="stroke-width:3;"></circle>
                                <circle cx="370" cy="245" r="4" style="stroke-width:3;"></circle>
                                <circle cx="380" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="400" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="420" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="440" cy="220" r="4" style="stroke-width:3;"></circle>
                                <circle cx="460" cy="230" r="4" style="stroke-width:3;"></circle>
                                <circle cx="490" cy="250" r="4" style="stroke-width:3;"></circle>
                                <circle cx="550" cy="265" r="4" style="stroke-width:3;"></circle>
                                <circle cx="600" cy="265" r="4" style="stroke-width:3;"></circle>
                                <circle cx="610" cy="265" r="4" style="stroke-width:3;"></circle>
                                <circle cx="640" cy="250" r="4" style="stroke-width:3;"></circle>
                                <circle cx="645" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="650" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="680" cy="270" r="4" style="stroke-width:3;"></circle>
                                <circle cx="690" cy="275" r="4" style="stroke-width:3;"></circle>
                                <circle cx="700" cy="275" r="4" style="stroke-width:3;"></circle>
                                <circle cx="750" cy="240" r="4" style="stroke-width:3;"></circle>
                                <circle cx="780" cy="245" r="4" style="stroke-width:3;"></circle>

                            </g>
                        </svg>
                    </div>

                    <!-- list -->
                    <div class="zingchat-container">

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--blue ">1</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/4/9/d/a/49da6a1d6cf13a42e77bc3a945d9dd6b.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Yêu Là Cưới</span>
                                    <p class="zingchat-media-author">Phát Hồ, X2X</p>
                                </div>

                            </div>

                            <span class="zingchat-time">02:59</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--green ">2</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/3/9/4/9/3949ac925328fbd5093aa9fa69acf44f.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Tan Vỡ</span>
                                    <p class="zingchat-media-author">Chi Dân</p>
                                </div>

                            </div>

                            <span class="zingchat-time">05:21</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--red ">3</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/e/b/3/c/eb3cbc5d9759bae3c79e8e141c099c56.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Thay Lòng</span>
                                    <p class="zingchat-media-author">DIMZ, TVk, NH4T</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:36</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">4</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/c/9/5/d/c95d510864924eb7eff43c9b4cb19202.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Chưa Bao Giờ Em Quên</span>
                                    <p class="zingchat-media-author">Hương Ly</p>
                                </div>

                            </div>

                            <span class="zingchat-time">05:11</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">5</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/3/7/4/737405f11e3910ebf7563fb0ea799bf5.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Dông Phải Mờ Dáng Ai</span>
                                    <p class="zingchat-media-author">DatKaa, QT Beatz</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:40</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">6</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/b/5/c/f/b5cfe3d54669f19af4618cc5b9bc654e.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Em Là Con Thuyền Cô Đơn</span>
                                    <p class="zingchat-media-author">Thái Học</p>
                                </div>

                            </div>

                            <span class="zingchat-time">05:04</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">7</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/5/f/2/d/5f2d9c8e7e39c0776a254980a26ec63d.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Cưới Luôn Được Không</span>
                                    <p class="zingchat-media-author">Yuniboo, Goctoi Mixer</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:02</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">8</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/d/2/6/1/d26117831a67fecf48f95c99823cecc6.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Khuê Mộc Lan</span>
                                    <p class="zingchat-media-author">Hương Ly, Zoobie</p>
                                </div>

                            </div>

                            <span class="zingchat-time">03:26</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">9</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/a/5/e/5/a5e5d3cee7f0cbffe69cac304978dee6.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Thương Nhau Tới Bên</span>
                                    <p class="zingchat-media-author">Nal</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:55</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">10</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/a/9/e/e/a9ee81fdd1c2b569c1c9631e969ea0aa.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Rồi Tới Luôn</span>
                                    <p class="zingchat-media-author">Nal</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:07</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">11</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/8/3/c/2/83c27acc7ae80605876ad7a333b92092.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Có Một Tình Yêu Gọi Là Chia Tay</span>
                                    <p class="zingchat-media-author">Tăng Phúc, Trương Thảo Nhi</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:18</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">12</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/7/4/d/1/74d144876bc7601f8fed3301cc7d1380.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Người Lạ Thoáng Qua</span>
                                    <p class="zingchat-media-author">Đinh Tùng Huy, ACV</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:45</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">13</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/c/f/c/7/cfc717f7818569ddfccd1b955b458eec.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Bao Lâu Ta Lại Yêu Một Người</span>
                                    <p class="zingchat-media-author">Doãn Hiếu, B.</p>
                                </div>

                            </div>

                            <span class="zingchat-time">03:51</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">14</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/3/f/f/d/3ffdd717f352015ad9e6644976a6bc30.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Nhắn Rằng Anh Nhớ Em</span>
                                    <p class="zingchat-media-author">Đình Dũng, AVC</p>
                                </div>

                            </div>

                            <span class="zingchat-time">05:12</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">15</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/3/4/b/7/34b79abf1040f0e654811579d5168d1b.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Mẹ</span>
                                    <p class="zingchat-media-author">Trung Tự</p>
                                </div>

                            </div>

                            <span class="zingchat-time">02:51</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">16</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/1/7/d/f/17df138d6b0c38c8a07ee502a49573cd.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Cưa Là Đổ</span>
                                    <p class="zingchat-media-author">Phát Hồ, X2X</p>
                                </div>

                            </div>

                            <span class="zingchat-time">03:31</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">17</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/3/b/f/6/3bf6a637783cfe6fab0fd75c43939964.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Dịa Dàng Em Đến</span>
                                    <p class="zingchat-media-author">ERIK, NijiaZ</p>
                                </div>

                            </div>

                            <span class="zingchat-time">03:05</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">18</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/1/2/9/0/1290f3275c9c59c2546eddf5dc0ed207.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Vậy Là Ta Mất Nhau</span>
                                    <p class="zingchat-media-author">Khải Đăng</p>
                                </div>

                            </div>

                            <span class="zingchat-time">04:15</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">19</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/b/8/c/f/b8cf5e3000488ddeae170e68b45bce87.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Em Hát Ai Nghe</span>
                                    <p class="zingchat-media-author">Orange</p>
                                </div>

                            </div>

                            <span class="zingchat-time">03:39</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>

                        <div class="zingchat-item">
                            <div class="zingchat-playlist">

                                <div class="zingchat-rank">
                                    <div class="zingchat-rank-number is-outline--white">20</div>
                                </div>

                                <div class="zingchat-rank-icon">
                                    <i class="fa fa-window-minimize"></i>
                                </div>

                                <div class="zingchat-media">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w94_r1x1_jpeg/cover/f/8/d/7/f8d715152be52e11c7397aca0029de3f.jpg"
                                        alt="" class="zingchat-media-anh">
                                </div>

                                <div class="zingchat-media-content">
                                    <span class="zingchat-media-song">Em Bỏ Thuốc Chưa</span>
                                    <p class="zingchat-media-author">Bích Phương</p>
                                </div>

                            </div>

                            <span class="zingchat-time">03:51</span>

                            <div class="zingchat-content">
                                <div class="zingchat-content-icon option-btn ">
                                    <i class="fa fa-microphone"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn zingchat-heart">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="zingchat-content-icon option-btn">
                                    <i class="fa fa-ellipsis-h"></i>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- End zing Chat -->

            <!-- Radio User-Profile -->
            <div class="user-profile" id="user-profilepro">
                <div class="z-radio-home">
                    <!-- background -->
                    <div class="bg">
                        <div class="bg-blur"></div>
                        <div class="bg-alpha"></div>
                        <div class="bg-alpha-1"></div>
                    </div>
                    <!-- end background -->

                    <!-- content -->
                    <div class="zm-section">
                        <!-- radio-live -->
                        <div class="all-radio">
                            <div class="discover-item">
                                <div class="radio-anh ">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/c/8/5/b/c85b1ed67eeff74065acade8929ad4e1.jpg"
                                        alt="" class="radio-item ">

                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="228.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>

                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/7/7/8/d/778d152062edfbe0e4c4abf151858bf0.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>

                                <div class="radio-name"><a href="#">Chill</a></div>
                                <div class="radio-view"><a href="#">650 đang nghe</a></div>
                            </div>

                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/f/d/7/9/fd79808d2180de9a421afa6aff38953e.jpg"
                                        alt="" class="radio-item VPOP">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="118.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/1/4/6/b/146b49d11cc9b3bc591823bfedb8bce2.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">V-Pop</a></div>
                                <div class="radio-view"><a href="#">450 đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/4/8/c/e/48cefd41cfc03533d52303190f47e6ef.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="208.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/1/3/0/5/1305cd954d22d89fef4354301613fd68.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">Bolero</a></div>
                                <div class="radio-view"><a href="#">200 đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/d/0/0/b/d00b7e555c8d7c2983d1fc0373a1e67a.jpg"
                                        alt="" class="radio-item RapViet">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="28.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/8/5/4/0/854010f76bddeefd5f13305a1d6cc8be.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">On Air</a></div>
                                <div class="radio-view"><a href="#">11k đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/b/f/2/2/bf223818f85e7fe129091b415038ca6c.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="268.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/b/f/3/b/bf3bf87a788a5d0b8719c6feee774a2e.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">Rap Viet</a></div>
                                <div class="radio-view"><a href="#">60 đang nghe</a></div>
                            </div>
                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/e/f/b/0/efb05fb9097a7057aecef6ecb62bff5a.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="158.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/0/9/9/3/0993b3110c60ba6518fceeba9913d20d.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">Acoustic</a></div>
                                <div class="radio-view"><a href="#">5k đang nghe</a></div>
                            </div>

                            <div class="discover-item">
                                <div class="radio-anh">
                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/5/3/1/c531d15ce3006ab3c7467a2c0315f1b7.jpg"
                                        alt="" class="radio-item">
                                    <svg class="svg" width="100%" height="100%" viewBox="0 0 100 100">
                                        <circle class="svg-circle-bg" stroke="rgba(255, 255, 255, 0.2)" cx="50" cy="50"
                                            r="48.75" stroke-width="2.5"></circle>
                                        <circle class="svg-circle" stroke="#ff4b4a" cx="50" cy="50" r="48.75"
                                            stroke-width="2.5" stroke-dasharray="306.3052837250048"
                                            stroke-dashoffset="178.9547478281604"
                                            style="transition: stroke-dashoffset 850ms ease-in-out 0s;"></circle>
                                    </svg>
                                    <figure class="image live is-48x48">
                                        <img src="https://zjs.zadn.vn/zmp3-desktop/dev/147506/static/media/live-tag.e25dd240.svg"
                                            alt="">
                                    </figure>
                                    <figure class="image host is-48x48">
                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/b/0/d/a/b0da7c8ecd6521337682f3a86fa0170f.jpg"
                                            alt="">
                                    </figure>
                                    <div class="action-radio">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                                <div class="radio-name"><a href="#">One the radio</a></div>
                                <div class="radio-view"><a href="#">4k đang nghe</a></div>
                            </div>

                        </div>

                        <!-- radio-list -->
                        <div class="container_body--layout">
                            <!-- radio-list-item -->
                            <div class="container_body--layout_list">

                                <!-- Lich Phat Song -->
                                <div class="lichphatsong">
                                    <div class="lich-header">
                                        <ul class="lich-nav">
                                            <li>Lịch Phát Sóng</li>
                                            <li>6:00</li>
                                            <li>8:00</li>
                                            <li>10:00</li>
                                        </ul>
                                    </div>

                                    <div class="lich-content">
                                        <div class="lich-content-left">
                                            <div class="lich-content-left-anh">
                                                <div class="lich-anh-item">
                                                    <div>
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w165_r1x1_jpeg/cover/a/6/9/5/a6955b69642f464dbbe4e42443c456bb.jpg"
                                                            alt="">
                                                        <div class="lich-anh-item-icon">
                                                            <i class="far fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="lich-anh-item">
                                                    <div>
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w165_r1x1_jpeg/cover/8/c/e/5/8ce5be6d880a79538136860b5327efc9.jpg"
                                                            alt="">
                                                        <div class="lich-anh-item-icon">
                                                            <i class="far fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="lich-anh-item">
                                                    <div>
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w165_r1x1_jpeg/cover/4/5/2/4/4524691ae09fafaf74386afad10a7a39.jpg"
                                                            alt="">
                                                        <div class="lich-anh-item-icon">
                                                            <i class="far fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="lich-content-right">
                                            <div class="lich-content-right-item ">
                                                <div class="lich-content-right-first" style="--percent: 30%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/e/8/5/c/e85cd54f851f926cb014e594f9ca3c83.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text ">
                                                            <h3>WORKTIME LOUNGE</h3>
                                                            <span>6:00 - 8:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lich-content-right-secon" style="--percent: 30%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/a/a/2/f/aa2f8ccca8c00f693c33af3215e0439f.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>XONE'S PICKS</h3>
                                                            <span>8:00 - 10:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lich-content-right-three" style="--percent: 40%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/7/0/2/f/702f24722867da2e71474520c25290c9.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>DRIVE XONE</h3>
                                                            <span>10:00 - 12:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="lich-content-right-item">
                                                <div class="lich-content-right-first" style="--percent: 50%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/b/8/b/9/b8b9ef449d113bb446f4c49fcb686843.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>Nhạc Mới Mỗi Ngày</h3>
                                                            <span>6:00 - 9:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lich-content-right-secon" style="--percent: 33.33333%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/7/5/c/0/75c057580f53520990b50fc350e901a4.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>On Air Playlist</h3>
                                                            <span>9:00 - 11:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lich-content-right-three" style="--percent: 16.66667%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/0/1/e/1/01e1f4f970ee0e58b112558bdbe3f0e6.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>Wazzup</h3>
                                                            <span>11:00 - 12:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="lich-content-right-item">
                                                <div class="lich-content-right-first" style="--percent: 40%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/2/7/e/6/27e617b8db26d7ae13378f4601eda4c5.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>Mỗi ngày một niềm vui cùng Chạm</h3>
                                                            <span>5:00 - 7:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lich-content-right-secon" style="--percent: 35%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/2/a/2/d/2a2dc42341a08901b5fba1ebcb9a9410.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>Buồn một chút cùng Chạm thôi</h3>
                                                            <span>7:00 - 9:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="lich-content-right-three" style="--percent: 25%">
                                                    <div class="lich-content-right-child">
                                                        <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/6/3/3/9/6339dc19f06ec57437704c06a42fcd7a.jpg"
                                                            alt="">
                                                        <div class="lich-content-right-text">
                                                            <h3>NITEXONE</h3>
                                                            <span>9:00 - 12:00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="hoverrr">
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div>

                                </div>
                                <!-- end lich phat song -->

                                <div class="radio-list-item-layout">

                                    <div class="content1 radio-media-content">
                                        <div class="radio-media-left">
                                            <div class="radio-media-image">
                                                <figure class="image is-50x50" title="Xone Radio">
                                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/0/8/2/5/0825d8cd559dee502625a25d540c636a.jpg"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="radio-media-content">
                                            <h3 class="radio-subtitle">Nghe lại</h3>
                                            <h3 class="title">
                                                Xone Radio
                                            </h3>
                                        </div>

                                    </div>

                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/4/c/6/d/4c6d8832b6117694f78b7881bb4d7f62.jpg"
                                                    alt="" class="imgradio ">

                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">XONE With Stars</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/e/f/e/4/efe43a4286962f943e80d5fc1a8a52ea.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">BREAKFAST XONE</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/0/6/2/c/062cecbd900f2694e37abea6272ae723.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">DRIVEXONE</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/c/2/b/c/c2bcdd306a961ad3444b2ecb96f512c5.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">XONE REWIND</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/7/0/9/9/709901a367ffdbec74ab134952089084.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">E-CITY</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="radio-list-item-layout">

                                    <div class="content1 radio-media-content">
                                        <div class="radio-media-left">
                                            <div class="radio-media-image">
                                                <figure class="image is-50x50" title="Xone Radio">
                                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/d/c/5/b/dc5b49e6cb115ee1d3fa0bf749a2efd1.jpg"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="radio-media-content">
                                            <h3 class="radio-subtitle">podcast</h3>
                                            <h3 class="title">
                                                Vietcetera
                                            </h3>
                                        </div>

                                    </div>

                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/b/c/9/a/bc9a9feaff8fe7bda8bc67621b8c1312.jpg"
                                                    alt="" class="imgradio ">

                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Em Hát Ai Nghe (Single)</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/d/8/3/7/d837ab1d67f49c5910e297c154ac1e07.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Để Tôi Lại Yêu Sài Gòn (Single)</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/9/7/6/f976d23d8a1d6ebf2269de3ee930ff2b.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Cho Đến Khi Trời Đất Sụp Đổ (Single)</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/5/4/a/f/54afacb532e00ba6c42549d28e1974b5.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Cớ Sao Em Buồn (Remix by Orinn)</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/1/c/6/2/1c627cff9d84ac682fbc567ecb01e156.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Việt Nam Cố Lên (Single)</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="radio-list-item-layout">

                                    <div class="content1 radio-media-content">
                                        <div class="radio-media-left">
                                            <div class="radio-media-image">
                                                <figure class="image is-50x50" title="Xone Radio">
                                                    <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/8/5/4/0/854010f76bddeefd5f13305a1d6cc8be.jpg"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="radio-media-content">
                                            <h3 class="radio-subtitle">Nghe Lại</h3>
                                            <h3 class="title">
                                                On Air
                                            </h3>
                                        </div>

                                    </div>

                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/b/6/2/9/b62924a278894d95b01e0294f5abb892.jpg"
                                                    alt="" class="imgradio ">

                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Nhạc Mới Mỗi Ngày</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/f/b/5/c/fb5cbbc66d4cb773958d7d5a6b42f254.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Chạm X Sao</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/9/2/c/4/92c43cf086d1581f3f89994682792461.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Chạm X Bạn</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="radio-list-item-layout">
                                    <p class="content1 khamphaPodcast"><a href="#">Khám phá Podcast</a></p>
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/e/f/d/8/efd80981d2f436c6a14c1bfa008eba7d.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">The Finding Audio</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/f/0/4/a/f04a174e90f4feae62f453225c81bd23.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Oddly Normal</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/b/f/5/e/bf5e5928eeb90bdb47530e8721100d09.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Amateur Psychology - Tay mơ học đời bằng Tâm
                                                lý học </div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/d/7/d/6/d7d61e61dc99044c40d48a90422896e7.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Hà Nội FM</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/6/7/e/7/67e7397cb8d3b9dc75b4e0ea1e2988d1.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Ghi Đông Radio</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="radio-list-item-layout">
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/a/8/a/a/a8aa7126c1f1e49367efd6f3d2d0c2f5.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Trạm Radio</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/d/6/b/7/d6b78566552f64478b5fa9e8868750a9.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Chàng-Ngốc-Già</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/a/e/d/b/aedb2863207b2a273ed8891e2bb0f8c2.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Lam's Story</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/d/5/d/0/d5d02fc15742f3aa7ed22f3f5135cc1c.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Luyện Nghe Tiếng Anh Hàng Ngày - Ms Thuỷ
                                                KISS English</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/1/c/4/e/1c4e8d264c0d25bb37feddf6ecc4b0a5.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Career Success | Take Away Series</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="radio-list-item-layout">
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/1/4/b/0/14b04565af8a827abc7a3620c31d2c97.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Nằm nghe đọc truyện - Hathaya Audio</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/1/6/c/0/16c07d59dfac4509763b552c73be0205.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Cạn Ly</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/6/9/9/3/699385ce5b183bfb73020d2691a87868.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Nghe Lỏm</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/avatars/6/a/a/6/6aa6589cafcd455994938590f8886920.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Tóm Tắt Sách Cùng Tanya</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-----------radio user profile-------->

            <!-- Begin Follow -->
            <div class="follow" id="user-profilepro-FollowVN">
                <div class="follow-header">
                    <ul class="follow-heading">
                        <li class="follow-header-list follower" id="follow-item-VN">
                            <div class="follow-header-link ">
                                <a>Việt Nam</a>
                            </div>
                        </li>
                        <li class="follow-header-list " id="follow-item-UsUk">
                            <div class="follow-header-link">
                                <a>Us-Uk</a>
                            </div>
                        </li>
                        <li class="follow-header-list" id="follow-item-Kpop">
                            <div class="follow-header-link">
                                <a>K-pop</a>
                            </div>
                        </li>
                        <li class="follow-header-list" id="follow-item-Hoangu">
                            <div class="follow-header-link">
                                <a>Hoa Ngữ</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- VN -->
                <div id="follow-content-VN">
                    <div class="follow-sidebar">
                        <div class="follow-img">
                            <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/phao.png" alt="" />
                        </div>
                        <div class="follow-img">
                            <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/chi-dan.png"
                                alt="" />
                        </div>
                        <div class="follow-img">
                            <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/justatee.png"
                                alt="" />
                        </div>
                        <div class="follow-img">
                            <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/mrsiro.png"
                                alt="" />
                        </div>
                        <div class="follow-img">
                            <img src="https://zmp3-static.zadn.vn/skins/zmp3-v6.1/images/artists/v2/trinh-thang-binh.png"
                                alt="" />
                        </div>
                    </div>
                    <div class="follow-content">
                        <div class="follow-story">
                            <!-- =======    follow-left    ===========-->
                            <div class="follow-story-left">
                                <div class="follow-left">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/0/c/d/a/0cdaeed936e1bb3b6ff53ffba6aea21c.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Như Hexi</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>14 tháng 10 lúc 15:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Thương em mãi đi rồi mai em thưởng cho ❤️
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/81cc8fa7aae243bc1af3"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>100</span></i>

                                            <i class="far fa-comment"><span>77</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-left">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/7/1/7121883aadcdad2230a7609785a10f3b_1468204133.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Kim Ny Ngọc</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>14 tháng 10 lúc 15:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Mọi người ơi xin hãy luôn yêu thương. Vì là kiếp sống luôn vô thương
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/6355223f077aee24b76b"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>100</span></i>

                                            <i class="far fa-comment"><span>77</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-left">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/a/6/1/5/a6155b14048b4ec88b8c87cf956a8979.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Fanny Trần</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>13 tháng 10 lúc 16:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Ăn mít hay ăn à mà thuiiiiii 😂😂😂
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/19c5e1aec4eb2db574fa"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>6</span></i>

                                            <i class="far fa-comment"><span>3</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-left">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/6/7/676c250bfb0a25358e7a62075e47416a_1511495598.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Akira Phan</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>13 tháng 10 lúc 17:27</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            😎
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/c4c4d2aef7eb1eb547fa"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>2</span></i>

                                            <i class="far fa-comment"><span>1</span></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- =======    follow-center    ===========-->

                            <div class="follow-story-center">
                                <div class="follow-center">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/e/e/4/b/ee4b84993ee8e824d1d62178e185a768.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Quốc Đại</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>14 tháng 10 lúc 17:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">😂</div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/efd212b937fcdea287ed"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>2</span></i>

                                            <i class="far fa-comment"><span>0</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-center">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/4/7/47df045524442c38fffbd2b26865fea2_1491635120.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Yến Trang</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>13 tháng 10 lúc 12:27</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Trải qua bao nhiêu điều trong cuộc sống đã rèn giũa cho bạn "sẽ nói những
                                            điều cần nói, và im lặng
                                            khi những điều đó ko còn là mối bận tâm". Sông càng sâu càng tĩnh lặng 🙂
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/dca923c20687efd9b696"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"> <span>1k</span></i>

                                            <i class="far fa-comment"><span>34</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-center">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/b/9/b9f57dc61e2baea3356698c554955d12_1497603844.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>P336 Band</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>12 tháng 10 lúc 12:27</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Người ta khổ tâm quá màa
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/bf37235c0619ef47b608"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"> <span>1254</span></i>

                                            <i class="far fa-comment"><span>34</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-center">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/1/c16e285309bd8ddbd579a6e5027f5f36_1499240137.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Bằng Cường</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>11 tháng 10 lúc 12:27</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Để đây cho ngta thấy mình đang sống tốt nè.
                                            Cho bản thân mình có động lực phấn đấu tiếp nè. 🍀🍀🍀🍀
                                            Hôm nay tui tự thấy tui đã mạnh hơn rất nhiều.
                                            Women power 🔥🔥🔥🔥🔥

                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/6960f20dd7483e166759"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"> <span>54</span></i>

                                            <i class="far fa-comment"><span>34</span></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- =======    follow-right    ===========-->

                            <div class="follow-story-right">
                                <div class="follow-right">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/2/d/6/1/2d61242d058a36761db4b60c563a410d.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Masew</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>14 tháng 10 lúc 17:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Loại này hay loại nào hả đca ???
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/4728d940fc05155b4c14"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>17</span></i>

                                            <i class="far fa-comment"><span>9</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-right">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/0/0/e/c00e39a892b3cbb0a87f1e87c0a583f7.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Thái Tuyết Trâm</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>13 tháng 10 lúc 17:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Người ta thường nhớ cái cần quên, và hay quên cái nên nhớ.
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/2d0873635626bf78e637"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>2</span></i>

                                            <i class="far fa-comment"><span>0</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-right">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/1/1/b/1/11b17d39561fc90171cec785d976300c.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Phạm Trưởng</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>13 tháng 10 lúc 17:57</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            Mới có 18 tuổi mà ai cũng bảo em già 😜
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/3ca134ca118ff8d1a19e"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"><span>2</span></i>

                                            <i class="far fa-comment"><span>0</span></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="follow-right">
                                    <div class="fl--top">
                                        <div class="fl--header">
                                            <div class="fl--header--left">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/a/f/2/2/af2221f166f8f9dfac19c90007f05926.jpg"
                                                    alt="" />
                                            </div>
                                            <div class="fl--header--right">
                                                <h3>
                                                    <span>Da LAB</span>
                                                    <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                    <span class="fl--care">Quan Tâm</span>
                                                </h3>
                                                <p>13 tháng 10 lúc 22:27</p>
                                            </div>
                                        </div>
                                        <div class="fl--header--content">
                                            GOKU TAKE MY ENERGY!!!
                                        </div>
                                    </div>
                                    <div class="fl--center">
                                        <div class="fl--center--content">
                                            <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/fb40492b6c6e8530dc7f"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="fl--bottom">
                                        <div class="fl--bottom--content">
                                            <i class="far fa-heart"> <span>2</span></i>

                                            <i class="far fa-comment"><span>0</span></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End VN -->

                <!-- UsUk -->
                <div class="follow-content Us-Uk" id="follow-content-UsUk">
                    <div class="follow-story">
                        <!-- =======    follow-left    ===========-->
                        <div class="follow-story-left">
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/9/a/9a5a4d0e3d0b32da4fc8a5b6f42d8be0_1425020295.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Kelly Clarkson</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>15 tháng 10 lúc 15:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        When Christmas Comes Around
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/061e2c770932e06cb923"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>300</span></i>

                                        <i class="far fa-comment"><span>76</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/5/9/5970b428b3c2c88b9fc964aa14012574_1394696406.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Enrique Iglesiac</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 15:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Now if the cell rings, I think you called Pendejo 🎶
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/35e0ce89ebcc02925bdd"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>100</span></i>

                                        <i class="far fa-comment"><span>76</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/6/a/6a4d3f1e6043d9995b7066890b104951_1466408204.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Marshmello</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 16:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Not gonna lie, this is my favorite holiday of the year 💀
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/e5801fe93aacd3f28abd"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>6</span></i>
                                        <i class="far fa-comment"><span>3</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/5/9/5970b428b3c2c88b9fc964aa14012574_1394696406.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Enrique Iglesias</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        I do not know what gives me that makes me so bad
                                        if love is a gamble baby let me roll my dice 🎲

                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/fdc860674522ac7cf533"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>1</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =======    follow-center    ===========-->

                        <div class="follow-story-center">
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/5/9/5970b428b3c2c88b9fc964aa14012574_1394696406.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Enrique Iglesiac</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">😂</div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/29c92ca009e5e0bbb9f4"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>
                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/3/7/37fe283c0e452850ffa49f5ffe1cbb2e_1476093910.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>John Legend</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        I’m back with Team Legends advisor Camila Cabello tonight on The Voice!

                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/0d048890add5448b1dc4"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>1k</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/4/7/471b74433489b94ef1ae14761d8468ed_1386580902.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Olly Murs</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>12 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Happy 60th birthday to my wonderful mum, I’ll never be too old for a cuddle or a
                                        squeeze love ya x

                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/a3243cb519f0f0aea9e1"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>1254</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/3/7/37fe283c0e452850ffa49f5ffe1cbb2e_1476093910.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>John Legend</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>11 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Ed Sheeran is our mega mentor this season!
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/af29f8afddea34b46dfb"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>54</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- =======    follow-right  ===========-->

                        <div class="follow-story-right">
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/5/a/5a6a0cfa2f9a84a04b62637493ffe8f3_1476933388.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Martin Garrix</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Diamonds 😏

                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/ab1e159e30dbd98580ca"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>17</span></i>

                                        <i class="far fa-comment"><span>9</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/5/9/5970b428b3c2c88b9fc964aa14012574_1394696406.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Enrique Iglesiac</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Enrique Ricky Tour 🤘
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/aff417763233db6d8222"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/d/1/d170e3fda75ec7afe19b1e01df3fce8a_1462351915.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Alicia Keys</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💜💜 Which woman in your life do you want to send unlimited love and respect to
                                        today?
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/e84ca1c184846dda3495"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/a/8/e/7/a8e71a9b5efdb53549e1cd52f5697e61.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Alan Walker</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 22:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Long time no see K-391 🙌🏻
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/2c963f3b1a7ef320aa6f"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>2</span></i>

                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End UsUk -->

                <!-- Begin Kpop -->
                <div class="follow-content Kpop" id="follow-content-Kpop">
                    <div class="follow-story">
                        <!-- =======    follow-left    ===========-->
                        <div class="follow-story-left">
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/7/0/3/5/703513f7e2506831c0c5ac435fb1513f.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>ROSÉ</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>15 tháng 10 lúc 15:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🥺🥺🥺
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/15a3bccc998970d72998"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>300</span></i>

                                        <i class="far fa-comment"><span>76</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/b/6/b66e3737c08379e1d8a4d418274d35b4_1486908815.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Jin</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 15:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💙💙💙
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/7d9817f632b3dbed82a2"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>100</span></i>

                                        <i class="far fa-comment"><span>77</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/f/9/2/9/f9295a42b8f0b65214afa76c4783ab48.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>SOMI</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 16:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        JEON SOMI😎😎😎
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/208d19e33ca6d5f88cb7"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>6</span></i>

                                        <i class="far fa-comment"><span>3</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/a/4/7/ca4769f72b2dc859864887f8fcff9474.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>MINO</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        [NEWS] 211014 MINO & HIS STYLE
                                        😭👋| California Love

                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/13b225db009ee9c0b08f"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>8</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- =======    follow-center    ===========-->
                        <div class="follow-story-center">
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/d/d/ddf9c6066fb2e281dd8b25ef00f9546e_1513834713.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>J.Fla</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">It's getting cold here☀️ stay healthy!🤗
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/efa610ce358bdcd5859a"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/0/e/c/b/0ecb89790d6a7a31ee372fe2dbdb5a53.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>SEVENTEEN</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🥺🥺🥺
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/0dd15aba7fff96a1cfee"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>1k</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/4/5/d/6/45d6a5afca44e8cbec3a14c5394bccba.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Hwasa</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>12 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Lee Hyori will be host 💋💋💋💋🌹🌹🌹🌹
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/eef8ab928ed767893ec6"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>2k</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/e/9/d/d/e9dd0775e06083b4dd59b44b822a7b75.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>IU</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>11 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🍓🌝
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/74f32d9208d7e189b8c6"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>54</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/4/6/9/9/469911351ddb6ec0a8ad3ed69437b846.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Super Junior</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>18 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🌝
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/b7e2208305c6ec98b5d7"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>54</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- =======    follow-right   ===========-->
                        <div class="follow-story-right">
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/f/1/1/1/f1113df32e09c1c5c6fe7069b0107c13.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>BLACKPINK</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        BLACKPINK 💋
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/2724484e6d0b8455dd1a"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>17k</span></i>

                                        <i class="far fa-comment"><span>9k</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/e/9/d/d/e9dd0775e06083b4dd59b44b822a7b75.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>IU</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🧡
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/89fe9894bdd1548f0dc0"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>205k</span></i>
                                        <i class="far fa-comment"><span>154k</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/2/2/0/f/220f1735e311ce877bbd180ef64d97a5.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>CLC</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        😜
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/8d95f100d4453d1b6454"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>7</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/7/0/3/5/703513f7e2506831c0c5ac435fb1513f.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>ROSÉ</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>18 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💖💖💖💖💖💖💖💖💖💖
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/791f357d1038f966a029"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>7</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/8/4/6/f/846f2f816d5689990d8e6b44ebbedfe7.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Red Velvet</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 22:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Queendom 😊

                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/7588601c4559ac07f548"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>25</span></i>

                                        <i class="far fa-comment"><span>6</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Kpop -->

                <!-- Begin HoaNgu -->
                <div class="follow-content HoaNgu" id="follow-content-HoaNgu">
                    <div class="follow-story">
                        <!-- =======    follow-left    ===========-->
                        <div class="follow-story-left">
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/e/0/e06d061a77a7bde916b8a91163029d41_1451891903.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Dương Mịch</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>15 tháng 10 lúc 15:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        When ????
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/c763d509f04c1912405d"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>370</span></i>

                                        <i class="far fa-comment"><span>76</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/f/1/9/cf190c139f9cc50b7986610e3dab9a61.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Cúc Tịnh Y</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 15:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🥰 My Mystery
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/f557b5c5908079de2091"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>100</span></i>

                                        <i class="far fa-comment"><span>74</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/d/9/d99119ca42e35bfa7fbc7fba9ab1d88a_1446707117.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Lộc Hàm</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 16:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Hi! Relax 👌🏻
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/bcbf72225767be39e776"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>546</span></i>

                                        <i class="far fa-comment"><span>83</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-left">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/f/1/9/cf190c139f9cc50b7986610e3dab9a61.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Cúc Tịnh Y</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/d7904ef86bbd82e3dbac"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>279</span></i>

                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- =======    follow-center    ===========-->
                        <div class="follow-story-center">
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/c/f/1/9/cf190c139f9cc50b7986610e3dab9a61.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Cúc Tịnh Y</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💘👸🎉
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/506b2ff90abce3e2baad"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2k</span></i>

                                        <i class="far fa-comment"><span>66</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/d/a/da9aa16fc82493cf7eb1e73902efa9fb_1438315003.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Triệu Lệ Dĩnh</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        ❤
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/09bfb33296777f292666"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>1k</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/5/5/7/8/557866cd0f0c868cb69f4a98a056e435.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Vương Tuấn Khải</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>12 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💙💙💙
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/b299a61583506a0e3341"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>125</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/1/3/13989d3d7be1618c96d2e27a56077304_1442373864.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Dương Dương</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 12:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        ☺☺☺
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/599b59287c6d9533cc7c"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>54</span></i>

                                        <i class="far fa-comment"><span>34</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-center">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/d/a/da9aa16fc82493cf7eb1e73902efa9fb_1438315003.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Triệu Lệ Dĩnh</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 22:27</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        Happy Birth Day To Me 🎂🎉
                                        Happy Birth Day To Me 🎂🎉
                                        Happy Birth Day To Me 🎂🎉
                                        Happy Birth Day To Me 🎂🎉
                                        Happy Birth Day To Me 🎂🎉
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/5ab72ad80f9de6c3bf8c"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>7</span></i>

                                        <i class="far fa-comment"><span>10</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- =======    follow-right    ===========-->
                        <div class="follow-story-right">
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/2/f/e/3/2fe34e6063b61c6d78068820b5f15f25.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Tiêu Chiến</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        ♻️♻️♻️
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/3de79255b7105e4e0701"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>17</span></i>

                                        <i class="far fa-comment"><span>89</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/9/b/9b1edc630121046188eea337921bfe30_1412788698.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Trương Bích Thần</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        🤘🤘
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/5000d6bff3fa1aa443eb"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>228</span></i>

                                        <i class="far fa-comment"><span>90</span></i>
                                    </div>
                                </div>
                            </div>
                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/f/3/f3ccdd27d2000e3f9255a7e3e2c48800_1291296655.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Lâm Tâm Như</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>13 tháng 10 lúc 17:57</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💗💗💗
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/50c59860bd25547b0d34"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"><span>2</span></i>

                                        <i class="far fa-comment"><span>0</span></i>
                                    </div>
                                </div>
                            </div>

                            <div class="follow-right">
                                <div class="fl--top">
                                    <div class="fl--header">
                                        <div class="fl--header--left">
                                            <img src="https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/avatars/e/0/e06d061a77a7bde916b8a91163029d41_1451891903.jpg"
                                                alt="" />
                                        </div>
                                        <div class="fl--header--right">
                                            <h3>
                                                <span>Dương Mịch</span>
                                                <span>&nbsp;&nbsp;•&nbsp;&nbsp;</span>
                                                <span class="fl--care">Quan Tâm</span>
                                            </h3>
                                            <p>14 tháng 10 lúc 22:47</p>
                                        </div>
                                    </div>
                                    <div class="fl--header--content">
                                        💎 Like A Diamond
                                        💕💋🌹🌹🌹🌹🌹🌹🌹🌹💕💋🌹🌹🌹🌹🌹🌹🌹🌹
                                    </div>
                                </div>
                                <div class="fl--center">
                                    <div class="fl--center--content">
                                        <img src="https://photo-zmedia-zmp3.zadn.vn/w512_png/48ff095f2c1ac5449c0b"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="fl--bottom">
                                    <div class="fl--bottom--content">
                                        <i class="far fa-heart"> <span>677</span></i>

                                        <i class="far fa-comment"><span>10</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End HoaNgu -->

            </div>
            <!-- End follow -->

            <!-- Top 100 -->
            <div class="user-profile-top100" id="user-profile-top100">
                <div class="z-radio-home">
                    <!-- background -->
                    <img src="./assets/img/home/zingmp3Top100.png" alt="" class="backgroundTop100">
                    <!-- end background -->

                    <!-- content -->
                    <div class="zm-section">
                        <!-- radio-list -->
                        <div class="container_body--layout">
                            <!-- radio-noibat   -->
                            <div class="container_body--layout_list">
                                <div class="radio-list-item-layout">
                                    <h3 class="contenttop100">Nổi Bật</h3>
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/9/b/b/b/9bbb0756e0844189746ad02f2a81eee8.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Bài Hát Nhạc Trẻ Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/5/d/8/9/5d890d445e5ecff4d118a296440f1654.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Pop Âu Mỹ Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/c/5/f/c/c5fc615c43215c6b72676f42767855ee.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Electronic/Dance Âu Mỹ Hay Nhất
                                            </div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/2/5/2/f2527ceaab79370a6bacec6f667fe1c1.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Trữ Tình Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/4/f/6/e/4f6eaff396951216df63768fa3f83efc.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hàn Quốc Hay Nhất</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- radio-VietNam   -->
                                <div class="radio-list-item-layout">
                                    <h3 class="contenttop100">Việt Nam</h3>
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/7/1/7/2/7172e5eef050a364accf3109a0f7477a.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Rap Việt Nam Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/a/a/9/9/aa99f3d8c3f21bf460a43165c1d6a43f.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Rock Việt Nam Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/2/5/2/f2527ceaab79370a6bacec6f667fe1c1.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Trữ Tình Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/f/2/6/4/f26467e87075a96bf974a8c49450bad5.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Cách Mạng Việt Nam</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/b/8/0/0/b800a8b039fd00210f54e58b3309b46f.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Dance Việt Nam Hay Nhất</div>
                                        </div>
                                    </div>
                                </div>
                                <!--------- radio-AuMy  --------->
                                <div class="radio-list-item-layout">
                                    <h3 class="contenttop100">Âu Mỹ</h3>
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/0/9/2/8/09289820540e88527a6a7b90fd86636b.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Country Âu Mỹ Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/5/d/8/9/5d890d445e5ecff4d118a296440f1654.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Pop Âu Mỹ Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/0/3/6/5/03657ccfd6777f4144e16bad5c3bb653.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Rock Âu Mỹ Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/c/5/f/c/c5fc615c43215c6b72676f42767855ee.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Electronic/Dance Âu Mỹ Hay Nhất
                                            </div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/9/e/0/4/9e047c9d089c68f60bce31b20ff59a97.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc R&B Âu Mỹ Hay Nhất</div>
                                        </div>
                                    </div>
                                </div>
                                <!---------- radio-ChauA --------->
                                <div class="radio-list-item-layout">
                                    <h3 class="contenttop100">Châu Á</h3>
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/4/f/6/e/4f6eaff396951216df63768fa3f83efc.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hàn Quốc Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/4/b/e/4/4be4fb53394b0e11a74829eadb4c8627.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hoa Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/a/e/5/6/ae5672b9d5af0a29dff3778e7e0c43b2.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Nhật Bản Hay Nhất</div>
                                        </div>

                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/8/5/30857ed114fb9125eb770d8bdd4e4f50.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Việt Nam Hay Nhất</div>
                                        </div>
                                    </div>
                                </div>
                                <!---------- radio-HoaTau --------->
                                <div class="radio-list-item-layout">
                                    <h3 class="contenttop100">Hòa Tấu</h3>
                                    <div class="discover">
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/4/9/6/5/4965f11b796243810f2d4a808b0b0e28.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hòa Tấu Nhạc Cụ Guitar Hay Nhất
                                            </div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/c/3/5/5/c3551ca47f882694e9248722e4127d8e.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hòa Tấu Nhạc Cụ Cello Hay Nhất
                                            </div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/8/5/f/d/85fd9f4dbd3a1df69966f5260da67966.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hòa Tấu Nhạc Cụ Piano Hay Nhất
                                            </div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/1/5/1/b/151b864e73216ca847eba4caa8dbb527.jpg"
                                                    alt="" class="imgradio">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hòa Tấu Cổ Điển Hay Nhất</div>
                                        </div>
                                        <div class="radio-list-item-layout-ingredient">
                                            <div class="radio-action">
                                                <img src="https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/1/3/4/6/13463b235ea1321acb6d194fe270d518.jpg"
                                                    alt="" class="imgradio ">
                                                <div class="action-radio">
                                                    <i class="far fa-play-circle"></i>
                                                </div>
                                                <div class="action-radio-heart">
                                                    <i class="far fa-heart"></i>
                                                </div>
                                                <div class="action-radio-bacham">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <div class="radio-name-content">Top 100 Nhạc Hòa Tấu Nhạc Cụ Saxophone Hay
                                                Nhất</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top 100 -->

            <!-- Playlist -->
            <div class="user-profile-playlist" id="user-playlist">
                <h2 class="playlist-heading center">
                    <marquee width="100%" behavior="scroll" direction="right" bgcolor="#DDA0DD" >  
                        Tạo Playlist Mới 
                    </marquee>
                </h2>
                <div class="playlist-container">
                

                <?php 
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>
                    <div class="song is-flex" 
                        ondblclick = "
                            alert('Không thể mở!!! Bạn cần nâng cấp VIP để nghe bài này!');
                            
                    ">
                        <!-- <div class="thongbao">
                            <h3 class="thongbao_content">Chưa thể mở bài này!</h3>
                        </div> -->
                        <div class="song-left is-flex">
                            <div class="thumb" style="background-image: url('<?php   echo $row["anh"]?>')">
                                <i class="ri-play-fill icon-song-play"></i>
                                <img src="./assets/img/home/icon-playing.gif" alt="" class="gif-playing">
                            </div>
                            <div class="song-body">
                                <h3 class="song-name"><?php   echo $row["namesong"]?></h3>
                                <p class="song-singer"><?php   echo $row["singer"]?></p>
                            </div>
                        </div>
                        <div class="time-total">
                            <span>00:00</span>
                        </div>
                        <div class="song-option" >
                            <i class="ri-heart-3-fill icon-heart" id="onclickBacham"></i>
                            <a href="song_Update.php?key=<?php echo $row['id'];?>" >
                                <i class="ri-more-fill " ></i>
                            </a>
                            
                            
                        </div>
                    </div>
                <?php
                }
                    mysqli_close($conn);
                ?>

                </div>
            </div>
            <!-- End playlist -->

        </div>

        <div class="control">
            <div class="control-left">
                <div class="cd">
                    <img src="" alt="" class="cd-img">
                    <div class="nodes-list">
                        <span class="cd-node node-1">♫</span>
                        <span class="cd-node node-2">♪</span>
                        <span class="cd-node node-3">♭</span>
                        <span class="cd-node node-4">♫</span>
                        <span class="cd-node node-5">♪</span>
                        <span class="cd-node node-6">♭</span>

                    </div>
                </div>
                <div class="cd-info">
                    <!-- <marquee width="100%" direction="left" behavior="scroll" scrolldelay="160"> -->
                    <p class="cd-name"></p>
                    <!-- </marquee> -->
                    <p class="cd-singer"></p>
                </div>
            </div>
            <div class="control-center">
                <div class="btn-control-list">
                    <div class="btn btn-hover btn-random hide-on-mobile ">
                        <i class="fas fa-random"></i>
                    </div>
                    <div class="btn btn-hover btn-prev hide-on-mobile ">
                        <i class="fas fa-step-backward"></i>
                    </div>
                    <div class="btn btn-play">
                        <i class="far fa-play-circle icon-play"></i>
                        <i class="far fa-pause-circle icon-pause"></i>
                    </div>
                    <div class="btn btn-hover btn-next">
                        <i class="fas fa-step-forward"></i>
                    </div>
                    <div class="btn btn-hover btn-repeat hide-on-mobile ">
                        <i class="fas fa-redo"></i>
                    </div>
                </div>
                <div class="progress-bar">
                    <span class="time-left hide-on-mobile">00:00</span>
                    <div class="progress-line">
                        <input id="progress" class="progress" type="range" value="0" step="0.1" min="0" max="100">
                        <div class="line-first"></div>
                        <div class="line-current"></div>
                        <div class="circle"></div>
                    </div>
                    <span class="time-right hide-on-mobile">00:00</span>
                </div>
                <audio id="audio" src=""></audio>
            </div>

            <div class="control-right hide-on-mobile is-flex">
                <i class="fab fa-youtube"></i>
                <i class="fas fa-microphone-alt"></i>
                <div class="volume is-flex">
                    <div class="volume-icon">
                        <i class="fas fa-volume-mute icon-volume-mute"></i>
                        <i class="fas fa-volume-up icon-volume-up active"></i>
                    </div>
                    <div class="progress-volume-bar">
                        <input id="progress-volume" class="progress-volume" type="range" value="100" step="1" min="0"
                            max="100">
                        <div class="line-volume"></div>
                        <div class="line-volume-current"></div>
                        <div class="circle-volume"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="control-on-mobile">
            <div class="player-on-mobile">
                <div class="control-top">
                    <div class="dashboard-on-mobile">
                        <i class="ri-arrow-down-s-line mobile-icon-hide"></i>
                        <header>
                            <h4>Now playing:</h4>
                            <h2 class="heading-on-mobile">String 57th & 9th</h2>
                        </header>
                    </div>

                    <div class="cd-on-mobile">
                        <div class="cd-thumb-on-mobile" style="background-image: url('./assets/img/masew.jpg')">
                        </div>
                    </div>
                </div>

                <div class="control-bottom">
                    <div class="progress-bar">
                        <span class="time-left">00:00</span>
                        <div class="progress-line">
                            <input id="progress" class="progress" type="range" value="0" step="0.1" min="0" max="100">
                            <div class="line-first"></div>
                            <div class="line-current"></div>
                            <div class="circle"></div>
                        </div>
                        <span class="time-right">00:00</span>
                    </div>

                    <div class="btn-control-list">
                        <div class="btn btn-hover btn-random">
                            <i class="fas fa-random"></i>
                        </div>
                        <div class="btn btn-hover btn-prev">
                            <i class="fas fa-step-backward"></i>
                        </div>
                        <div class="btn btn-play">
                            <i class="far fa-play-circle icon-play"></i>
                            <i class="far fa-pause-circle icon-pause"></i>
                        </div>
                        <div class="btn btn-hover btn-next">
                            <i class="fas fa-step-forward"></i>
                        </div>
                        <div class="btn btn-hover btn-repeat">
                            <i class="fas fa-redo"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <audio id="audio-fake" src=""></audio>
    </div>

    <div class="modal-register">
        <div class="loginmain">
            <div class="logincontent">
                <h2 class="loginheading center">Đăng ký tài khoản Zing Mp3</h2>
                <p class="loginheading-sub center">Cùng nhau tận hưởng âm nhạc
                    <i class="fa fa-heartbeat"></i>
                </p>
                <form action="register_submit.php" method="POST" class="input">
                    <div class="loginrow">
                        <p>Nhập tên</p>
                        <input type="text" name="username" required placeholder="VD: Dream Team">
                    </div>
                    <div class="loginrow">
                        <p>Email</p>
                        <input type="email" name="email" required placeholder="VD: onedream@gmail.com">
                    </div>
                    <div class="loginrow">
                        <p>Mật khẩu</p>
                        <input type="password" name="password" required placeholder="Nhập mật khẩu">
                    </div>
                    <div class="loginrow">
                        <p>Nhập lại mật khẩu</p>
                        <input type="password" name="repassword" required placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="loginrow">
                        <input type="submit" name="signin" value="Đăng ký" class="loginbton">
                    </div>
                    <div class="loginrow">
                        <button class="loginbtnton js-dangnhap" name="btnDangNhap">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="modal-login">
        <div class="loginmain js-loginMain">
            <div class="logincontent">
                <h2 class="loginheading center">Đăng nhập vào Zing Mp3</h2>
                <p class="loginheading-sub center">Cùng nhau tận hưởng âm nhạc
                    <i class="fa fa-heartbeat"></i>
                </p>
                <form action="login_submit.php" method="POST" class="input">
                    <div class="loginrow ">
                        <p>Tên đăng nhập</p>
                        <input type="text" name="username" required placeholder="VD: Dream Team">
                    </div>
                    <div class="loginrow padding-top-20">
                        <p>Mật khẩu</p>
                        <input type="password" name="password" required placeholder="Nhập mật khẩu">
                    </div>
                    <div class="loginrow padding-top-20">
                        <input type="submit" name="submit" value="Đăng nhập" class="loginbton">
                        <a href="#">Quên mật khẩu</a>
                    </div>
                    <div class="loginrow">
                        <button class="loginbtnton js-dangky" name="btnDangKy">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-upload">
        <div class="songmain">
            <div class="songcontent">
                <h2 class="songheading center">Upload nhạc lên Zing Mp3</h2>
                <p class="songheading-sub center">Cùng nhau tận hưởng âm nhạc
                    <i class="fa fa-heartbeat"></i>
                </p>
                <form action="song_upload.php" method="POST" class="input">
                    <div class="songrow">
                        <p>Tên bài hát</p>
                        <input type="text" name="namesong" required placeholder="VD: Em của ngày hôm qua">
                    </div>
                    <div class="songrow">
                        <p>Ca sĩ</p>
                        <input type="text" name="singer" required placeholder="Sơn Tùng MTP">
                    </div>
                    <div class="songrow">
                        <p>Ảnh</p>
                        <input type="text" name="anh" required placeholder="Nhập link ảnh">
                    </div>
                    <div class="songrow">
                        <p>Link nhạc</p>
                        <input type="file" name="nhac" required placeholder="Nhập link nhạc(mp3)">
                    </div>
                    <div class="songrow songsubmit">
                        <input type="submit" name="songsubmit" value="Upload" class="songbton">
                    </div>
                </form>
            </div>
        </div>
    </div>
                
    <div class="modal-update">
    <div class="songmain song-update">
                
            <?php 
                require("config.php");
                $username = $_SESSION["username"];
                $username = preg_replace('/\s+/', '', $username);
                
                $sql = "select * from $username";
                $result=mysqli_query($conn , $sql);
                $row = mysqli_fetch_assoc($result)
                
            ?>
            <div class="songcontent">
                <h2 class="songheading center">Update Playlist Zing Mp3</h2>
                <p class="songheading-sub center">Cùng nhau tận hưởng âm nhạc
                    <i class="fa fa-heartbeat"></i>
                </p>
                <form action="song_Update.php" method="POST" class="input">
                    <div class="songrow">
                        <p>Tên bài hát</p>
                        <input type="text" name="namesong" value="<?php echo $row['namesong'] ;?>">
                    </div>
                    <div class="songrow">
                        <p>Ca sĩ</p>
                        <input type="text" name="singer" value="<?php echo $row['singer'] ;?>">
                    </div>
                    <div class="songrow">
                        <p>Ảnh</p>
                        <input type="text" name="anh" value="<?php echo $row['anh'] ;?>">
                    </div>
                    <div class="songrow">
                        <p>Link nhạc</p>
                        <input type="file" name="nhac" value="<?php echo $row['nhac'] ;?>">
                    </div>
                    <div class="songrow songsubmit">
                        <input type="submit" name="songUpdate" value="Update" class="songbton">
                    </div>
                    <div class="songrow songsubmit">
                        <input type="submit" name="songDelete" value="Delete" class="songbton">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        
    </script>

    <script src="./convert.js"></script>
    <script src="./assets/Js/main.js"></script>
</body>

</html>