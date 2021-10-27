const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const PLAYER_STORAGE_KEY = 'MUSIC_PLAYER';

const main = $('.main');
const audio = $('#audio');
const songsList = $('.songs-list');
const cdThumb = $('.cd');
const cdImg = $('.cd-img');
const cdName = $('.cd-name');
const cdSinger = $('.cd-singer');
const cdPlaylist = $('.cd-playlist');

const playBtn = $$('.btn-play');
const nextBtns = $$('.btn-next');
const prevBtns = $$('.btn-prev');
const repeatBtns = $$('.btn-repeat');
const randomBtns = $$('.btn-random');
const volumeBtn = $('.volume-icon');


const progressList = $$('.progress');
const circles = $$('.circle');
const lineCurrents = $$('.line-current');


const progressVolume = $('.progress-volume');
const lineVolumeCurrent = $('.line-volume-current');
const circleVolume = $('.circle-volume')

const timeLefts = $$('.time-left');
const timeRights = $$('.time-right');
const timeTotal = $('.time-total');
const NodesList = $('.nodes-list');

// Mobile
const headingOnMobile = $('.heading-on-mobile');
const cdOnMobile = $('.cd-on-mobile');
const cdThumbOnMobile = $('.cd-thumb-on-mobile');
const mobileIconHide = $('.mobile-icon-hide');


const app = {
    currentIndex: 0,
    isPlaying: false,
    isRandom: false,
    isRepeat: false,
    isMute: false,
    config: JSON.parse(localStorage.getItem(PLAYER_STORAGE_KEY)) || {},
    setConfig: function (key, value) {
        this.config[key] = value;
        localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(this.config));
    },
    arrSongs: [],
    songs: [
        {
            name: 'Trò Đùa',
            singer: 'Quang Đăng Trần x 4SunMusic',
            path: './assets/song/Trò Đùa ( Lofi Ver ) - Quang Đăng Trần x 4SunMusic - Người luôn che chở em quan tâm em luôn là anh..mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/5/1/1/5/51152a170d660eaefadaf4b4d8b58892.jpg'
        },
        {
            name: 'Anh thương em nhất mà',
            singer: 'Lã. x Log x TiB',
            path: './assets/song/Anh Thương Em Nhất Mà- - Lã. x Log x TiB「Official Lyrics Video」 .Chang.mp3',
            image: 'https://theharmonica.vn/wp-content/uploads/2019/07/anh-thuong-em-nhat-ma.jpg'
        },
        {
            name: 'Vây Hãm',
            singer: 'Vương Tĩnh Văn Không Mập',
            path: './assets/song/[Vietsub] Vây hãm - Vương Tĩnh Văn Không Mập -- 沦陷 - 王靖雯不胖.mp3',
            image: 'https://i.ytimg.com/vi/YWg3htRVc1A/maxresdefault.jpg'
        },
        {
            name: 'Yêu 5',
            singer: 'Rhymastic',
            path: './assets/song/YÊU 5 - Rhymastic.mp3',
            image: 'https://i.ytimg.com/vi/y576-ONm5II/sddefault.jpg'
        },
        {
            name: '24 Giờ',
            singer: 'Ly Ly',
            path: './assets/song/24H - OFFICIAL MUSIC VIDEO - LYLY ft MAGAZINE.mp3',
            image: 'https://i.ytimg.com/vi/gs-zxnVWPR8/sddefault.jpg'
        },
        {
            name: '3107 - 3',
            singer: 'Kai Cover',
            path: './assets/song/3107-3 - W-n x Nâu x Duongg x Titie - Kai Cover.mp3',
            image: 'https://i.ytimg.com/vi/kfw7MYah2n0/maxresdefault.jpg'
        },
        {
            name: 'Anh sẽ ổn thôi',
            singer: 'Vương Anh Tú',
            path: './assets/song/ANH SẼ ỔN THÔI - VƯƠNG ANH TÚ - VIDEO LYRICS - NHẠC BUỒN NHẤT.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2019/11/07/3/e/1/e/1573118065582_640.jpg'
        },
        {
            name: 'Bước qua mùa cô đơn',
            singer: 'Vũ',
            path: './assets/song/Bước qua mùa cô đơn - Vũ. ( Nhat Anh Cover ).mp3',
            image: 'https://i.ytimg.com/vi/_Lste0Plenw/maxresdefault.jpg'
        },
        {
            name: 'Cảm Ơn Tổn Thương',
            singer: 'Phạm Nguyên Ngọc',
            path: './assets/song/Cảm Ơn Tổn Thương - Phạm Nguyên Ngọc「Lyrics Video」Meens.mp3',
            image: 'https://nhachay.vn/wp-content/uploads/2020/08/loi-bai-hat-cam-on-ton-thuong-pham-nguyen-ngoc-lyrics-kem-hop-am.jpg'
        },
        {
            name: 'Chắc Ai Đó Sẽ Về',
            singer: 'Sơn Tùng M-TP',
            path: './assets/song/Sơn Tùng M-TP - Chắc Ai Đó Sẽ Về.mp3',
            image: 'http://imgs.vietnamnet.vn/Images/vnn/2014/12/18/08/20141218082625-a.jpg'
        },
        {
            name: 'Có chàng trai viết lên cây',
            singer: 'Ngô Lan Hương',
            path: './assets/song/CÓ CHÀNG TRAI VIẾT LÊN CÂY - PHAN MẠNH QUỲNH _ NGÔ LAN HƯƠNG COVER.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2019/12/23/1/5/0/5/1577070200907_640.jpg'
        },
        {
            name: 'Có hẹn với thanh xuân',
            singer: 'Kai Cover',
            path: './assets/song/Có Hẹn Với Thanh Xuân ( Monstar ) - Kai Cover.mp3',
            image: 'https://kenh14cdn.com/zoom/320_200/203336854389633024/2021/7/20/photo1626748139442-16267481396521029003719.jpg'
        },
        {
            name: 'Còn gì đau hơn chữ đã từng',
            singer: 'Quân AP',
            path: './assets/song/QUÂN A.P - Còn Gì Đau Hơn Chữ Đã Từng - Lyrics Audio.mp3',
            image: 'https://photo-baomoi.zadn.vn/w720x480/2019_10_14_541_32550117/40157e1bd25b3b05624a.jpg'
        },
        {
            name: 'Cứ Chill Thôi',
            singer: 'Anh Khoa Cover',
            path: './assets/song/Cứ Chill Thôi - Chillies ft Suni Hạ Linh . Rhymastic - Anh Khoa Cover ( Lyrics).mp3',
            image: 'https://avatar-nct.nixcdn.com/mv/2020/07/23/8/1/2/d/1595472126333_640.jpg'
        },
        {
            name: 'Cưới thôi',
            singer: 'Bray-Masew',
            path: './assets/song/Cưới Thôi - Masew x Masiu x B Ray x TAP ( Lyrics Audio ).mp3',
            image: 'https://data.chiasenhac.com/data/cover/145/144624.jpg'
        },
        {
            name: 'Chờ em trong đêm',
            singer: 'Chu Duyên Bún',
            path: './assets/song/Chờ em trong đêm.mp3',
            image: 'https://i.ytimg.com/vi/sfC_EscgtWI/mqdefault.jpg'
        },
        {
            name: 'Chuyện của mùa đông ❄️',
            singer: '',
            path: './assets/song/Chuyện của mùa đông ❄️ Tiến Thành.mp3',
            image: 'https://i1.sndcdn.com/artworks-000073569718-h3gzi2-t500x500.jpg'
        },
        {
            name: 'Đông kiếm em',
            singer: 'Vũ',
            path: './assets/song/ĐÔNG KIẾM EM - Vũ. (Original).mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w360_r1x1_jpeg/avatars/b/a/d/2/bad27197c6774fc04c039c040ed8813c.jpg'
        },
        {
            name: 'Em Ổn Không',
            singer: 'Trịnh Thiên Ân x ViruSs x Láo Soái Nhi',
            path: './assets/song/Em Ổn Không - Trịnh Thiên Ân x ViruSs x Láo Soái Nhi「Lyrics Video」.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2018/03/03/7/1/d/1/1520083907163_640.jpg'
        },
        {
            name: 'Exs Hate Me',
            singer: 'B Ray x Masew (Ft AMEE)',
            path: './assets/song/Ex Hate Me - B Ray x Masew (Ft AMEE) - Official MV.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/share/2019/02/13/7/f/2/1/1550063180850.jpg'
        },
        {
            name: 'Kẻ Theo Đuổi Ánh Sáng',
            singer: 'Huy Vạc x Tiến Nguyễn',
            path: './assets/song/Kẻ Theo Đuổi Ánh Sáng - Huy Vạc x Tiến Nguyễn (Official MV).mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/a/a/1/a/aa1aa9276ddda9f826aca495038b06db.jpg'
        },
        {
            name: 'Khi Em Lớn',
            singer: 'Orange x Hoàng Dũng',
            path: './assets/song/KHI EM LỚN (FREXS x OC.A REMIX) HOT TREND TIKTOK - Orange x Hoàng Dũng - EM SẼ NGÃ ĐAU HƠN BÂY GIỜ.mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/c/4/3/a/c43a3f7cc98ee9c62401edb8fb999b74.jpg'
        },
        {
            name: 'Lạ Lùng',
            singer: 'Vũ',
            path: './assets/song/LẠ LÙNG - Vũ. (Original).mp3',
            image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Vu_monsoon2019.jpg/1200px-Vu_monsoon2019.jpg'
        },
        {
            name: 'Mãi Chẳng Thuộc Về Nhau',
            singer: 'Bozitt',
            path: './assets/song/Mãi Chẳng Thuộc Về Nhau - Bozitt - MV Lyrics HD.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2019/10/08/0/3/2/0/1570506074184_640.jpg'
        },
        {
            name: 'Nàng Thơ (Lofi Ver.)',
            singer: 'Hoàng Dũng x Freak',
            path: './assets/song/Nàng Thơ (Lofi Ver.) - Hoàng Dũng x Freak D.mp3',
            image: 'https://i.scdn.co/image/ab67616d0000b273248295fbbb32d0e4d71cc7ea'
        },
        {
            name: 'Năm ấy',
            singer: 'Đức Phúc ( Đỗ Hải Đăng Cover)',
            path: './assets/song/Năm ấy - Đức Phúc ( Đỗ Hải Đăng Cover Lyrics ).mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2017/12/09/1/f/7/3/1512816233582_640.jpg'
        },
        {
            name: 'Quên anh trong từng cơn đau',
            singer: 'Chu Duyên Bún',
            path: './assets/song/QUÊN ANH TRONG TỪNG CƠN ĐAU - CHU DUYÊN COVER GUITAR.wav',
            image: 'https://yt3.ggpht.com/ytc/AKedOLQHQ51IZGbKrr3QFXFXfpRNRcTAdXYBzyYliajriw=s900-c-k-c0x00ffffff-no-rj'
        },
        {
            name: 'Sao em lại tắt máy',
            singer: 'Phạm Nguyên Ngọc ft.Vanh',
            path: './assets/song/Sao em lại tắt máy- - Phạm Nguyên Ngọc ft.Vanh.mp3',
            image: 'https://i.ytimg.com/vi/yhP2loYscAc/maxresdefault.jpg'
        },
        
        {
            name: 'Suýt Nữa Thì',
            singer: 'ANDIEZ x BITIS HUNTER',
            path: './assets/song/SUÝT NỮA THÌ - OFFICIAL OST - CHUYẾN ĐI CỦA THANH XUÂN - ANDIEZ x BITIS HUNTER - LYRIC VIDEO.mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/c/2/4/7/c2475264a30999a45a3c8bcf0e5f090d.jpg'
        },
        {
            name: 'Thanh Xuân',
            singer: 'Da LAB',
            path: './assets/song/Thanh Xuân - Da LAB (Official MV).mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2018/08/24/b/a/9/5/1535121377317_640.jpg'
        },
        {
            name: 'Thì Thôi',
            singer: 'Reddy x Freak',
            path: './assets/song/Thì Thôi (Lofi Ver.) - Reddy x Freak D.mp3',
            image: 'https://chandat.net/testx/wp-content/uploads/2020/05/Reddy-Huu-Duy.jpg'
        },{
            name: 'Trái Tim Anh Cũng Biết Đau',
            singer: 'Cover by Mr. Siro',
            path: './assets/song/Trái Tim Anh Cũng Biết Đau - Cover by Mr. Siro.mp3',
            image: 'https://chandat.net/testx/wp-content/uploads/2020/05/Reddy-Huu-Duy.jpg'
        },
        {
            name: 'Yêu Từ Đâu Mà Ra',
            singer: 'Lil ZPOET',
            path: './assets/song/Yêu Từ Đâu Mà Ra - Lil ZPOET「Lyrics Video」Meens.mp3',
            image: 'https://media-cdn.laodong.vn/storage/newsportal/2020/4/28/801714/Mvyeutudaumara.jpg?w=720&crop=auto&scale=both'
        }
    ],
    render: function () {
        var htmls = this.songs.map(function (song, index) {
            return `<div class="song${app.currentIndex === index ? ' active' : ''} is-flex" data-index="${index}">
                            <div class="song-left is-flex">
                                <div class="thumb" data-index="${index}" style="background-image: url('${song.image}')!important">
                                    <i class="ri-play-fill icon-song-play"></i>
                                    <img src="./assets/img/home/icon-playing.gif" alt="" class="gif-playing">
                                </div>
                                <div class="song-body">
                                    <h3 class="song-name">${song.name}</h3>
                                    <p class="song-singer">${song.singer}</p>
                                </div>
                            </div>
                            <div class="time-total time-total-${index}" >
                                <span>00:00</span>
                            </div>
                            <div class="song-option">
                                <i class="ri-heart-3-fill icon-heart"></i>
                                <i class="ri-more-fill icon-options"></i>
                            </div>
                        </div>`
        });
        songsList.innerHTML = htmls.join('');
    },
    defineProperties: function () {
        Object.defineProperty(this, 'currentSong', {
            get: function () {
                return this.songs[this.currentIndex];
            }
        })
    },
    handleEvents: function () {
        var lastValueVolume = 1;

        console.log(lastValueVolume)
        const cdThumbAnimate = cdThumb.animate([
            { transform: 'rotate(360deg)' }
        ], {
            duration: 10000,
            iterations: Infinity
        });

        const cdPlaylistAnimate = cdPlaylist.animate([
            { transform: 'rotate(360deg)' }
        ], {
            duration: 10000,
            iterations: Infinity
        });

        const cdOnMobileAnimate = cdOnMobile.animate([
            { transform: 'rotate(360deg)' }
        ], {
            duration: 20000,
            iterations: Infinity
        });

        cdThumbAnimate.pause();
        cdPlaylistAnimate.pause();
        cdOnMobileAnimate.pause();

        playBtn[0].onclick = PlayFunc;
        playBtn[1].onclick = PlayFunc;

        function PlayFunc() {
            if (app.isPlaying) {
                audio.pause();

            } else {
                audio.play();
            }

            // song play
            audio.onplay = function () {
                app.isPlaying = true;
                main.classList.add('is-playing');
                cdThumbAnimate.play();
                cdPlaylistAnimate.play();
                cdOnMobileAnimate.play();
                NodesList.classList.add('active');
            }

            // song pause
            audio.onpause = function () {
                app.isPlaying = false;
                main.classList.remove('is-playing');
                cdThumbAnimate.pause();
                cdPlaylistAnimate.pause();
                cdOnMobileAnimate.pause();
                NodesList.classList.remove('active');

            }

            // bài hát đang chạy
            audio.ontimeupdate = function () {
                if (audio.duration) {
                    const progressPercent = audio.currentTime / audio.duration * 100;
                    progressList[0].value = progressPercent;
                    progressList[1].value = progressPercent;
                    circles[0].style.left = `calc(${progressPercent}% - 4px)`;
                    circles[1].style.left = `calc(${progressPercent}% - 4px)`;
                    lineCurrents[0].style.width = progressPercent + '%';
                    lineCurrents[1].style.width = progressPercent + '%';

                    timeLefts[0].innerHTML = app.convertTime(audio.currentTime);
                    timeLefts[1].innerHTML = app.convertTime(audio.currentTime);
                }
            }

            // tua bài Hát
            progressList.forEach(function (progress) {
                progress.oninput = function () {
                    audio.currentTime = progress.value * audio.duration / 100;
                }
            })

            // Thay đổi âm lượng
            progressVolume.oninput = function () {
                audio.volume = progressVolume.value / 100;
                lineVolumeCurrent.style.width = audio.volume * 100 + '%';
                circleVolume.style.left = `calc(${audio.volume * 100}% - 4px)`;

                lastValueVolume = audio.volume;

                if (audio.volume === 0) {
                    volumeBtn.classList.toggle('mute', true);
                    app.isMute = true;
                } else {
                    volumeBtn.classList.toggle('mute', false);
                    app.isMute = false;
                }


            }

            //Khi kết thúc bài hát
            audio.onended = function () {
                if (app.isRepeat) {
                    audio.play();
                } else {
                    app.nextSong();
                    PlayFunc();
                    audio.play();
                    app.render();
                    app.scrollToActiveSong();
                    app.loadTotalTime();
                }
            }

            // Lắng nghe hành vi click vào playlist
            songsList.onclick = function (e) {
                const thumbEl = e.target.closest('.song:not(.active)');
                // const thumbEl = e.target.closest('.song:not(.active) .thumb');
                const optionEl = e.target.closest('.icon-options');
                const favariteEl = e.target.closest('.icon-heart');
                // console.log(thumbEl, optionEl, favariteEl);

                if (!optionEl && !favariteEl) {
                    if (thumbEl) {
                        app.currentIndex = Number(thumbEl.getAttribute('data-index'));
                        app.loadCurrentSong();
                        PlayFunc();
                        audio.play();
                        setTimeout(function () {
                            app.render();
                            app.loadTotalTime();
                        }, 100)

                    }
                }
                if (optionEl) {
                    alert('Nhạc hay thì xin 1 like ạ');
                }
            }
        }

        PlayFunc()

        nextBtns.forEach(function (nextBtn) {
            nextBtn.onclick = function () {
                app.nextSong();
                PlayFunc();
                audio.play();
                // app.render();
                app.scrollToActiveSong();
                // app.loadTotalTime();
                setTimeout(function () {
                    app.render();
                    app.loadTotalTime();
                }, 100)
            }
        })

        prevBtns.forEach(function (prevBtn) {
            prevBtn.onclick = function () {
                app.prevSong();
                PlayFunc();
                audio.play();
                app.render();
                app.loadTotalTime();
                setTimeout(function () {
                    app.render();
                    app.loadTotalTime();
                }, 100)
            }
        })

        randomBtns.forEach(function (randomBtn) {
            randomBtn.onclick = function () {
                app.isRandom = !app.isRandom;
                randomBtn.classList.toggle('active', app.isRandom);
                app.setConfig('isRandom', app.isRandom)
                console.log(app.isRandom);
            }
        })

        repeatBtns.forEach(function (repeatBtn) {
            repeatBtn.onclick = function () {
                app.isRepeat = !app.isRepeat;
                repeatBtn.classList.toggle('active', app.isRepeat);
                app.setConfig('isRepeat', app.isRepeat)
                console.log(app.isRepeat);
            }
        })


        volumeBtn.onclick = function () {
            if (app.isMute) {
                // app.setConfig('isMute', !app.isMute);
                audio.volume = lastValueVolume;
                lineVolumeCurrent.style.width = audio.volume * 100 + '%';
                circleVolume.style.left = `calc(${audio.volume * 100}% - 4px)`;
            } else {
                audio.volume = 0;
                // app.setConfig('isMute', !app.isMute);
                lineVolumeCurrent.style.width = audio.volume * 100 + '%';
                circleVolume.style.left = `calc(${audio.volume * 100}% - 4px)`;
            }
            volumeBtn.classList.toggle('mute', !app.isMute);
            app.isMute = !app.isMute;
        }
    },
    nextSong: function () {
        if (app.isRandom) {
            app.endRandomSong();
            app.playRandomSong();
        } else {
            app.currentIndex++;
            if (app.currentIndex >= app.songs.length) {
                app.currentIndex = 0;
            }
        }
        this.loadCurrentSong();

    },
    prevSong: function () {
        if (app.isRandom) {
            app.endRandomSong();
            app.playRandomSong();
        } else {
            app.currentIndex--;
            if (app.currentIndex < 0) {
                app.currentIndex = app.songs.length - 1;
            }
        }
        app.loadCurrentSong();
        this.loadTotalTime();

    },
    playRandomSong: function () {
        do {
            this.currentIndex = Math.floor(Math.random() * app.songs.length);
        } while (app.arrSongs.includes(this.currentIndex));
        this.loadCurrentSong();
    },
    convertTime: function (time) {
        var mins = Math.floor(time / 60);
        var secs = Math.floor(time % 60);
        if (mins < 10) {
            mins = '0' + mins;
        }
        if (secs < 10) {
            secs = '0' + secs;
        }
        return `${mins}:${secs}`;
    },
    loadCurrentSong: function () {
        cdName.innerHTML = this.currentSong.name;
        cdSinger.innerHTML = this.currentSong.singer;
        cdImg.src = this.currentSong.image;
        audio.src = this.currentSong.path;

        headingOnMobile.innerHTML = this.currentSong.name;
        cdThumbOnMobile.style.backgroundImage = `url('${this.currentSong.image}')`
        this.loadTimeRight();
    },
    loadTimeRight: function () {
        audio.onloadedmetadata = function () {
            timeRights[0].innerHTML = app.convertTime(audio.duration);
            timeRights[1].innerHTML = app.convertTime(audio.duration);
        }
    },
    loadTotalTime: function () {
        const listMusic = $$('.song');
        const lengthOfSongsList = listMusic.length;

        for (let i = 0; i < lengthOfSongsList; i++) {
            let audioFake = document.createElement('audio');
            audioFake.src = app.songs[i].path;
            audioFake.onloadedmetadata = function () {
                let totalTimeEl = listMusic[i].querySelector(`.time-total-${i} span`)
                console.log(audioFake.src, audioFake.duration, totalTimeEl)
                totalTimeEl.innerHTML = app.convertTime(audioFake.duration)
            }
        }

    },
    endRandomSong: function () {
        app.arrSongs.push(app.currentIndex);
        if (app.arrSongs.length === app.songs.length) {
            app.arrSongs = [];
        }
    },
    scrollToActiveSong: function () {
        setTimeout(() => {
            $('.song.active').scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }, 100)
    },
    loadConfig: function () {
        this.isRandom = this.config.isRandom;
        this.isRepeat = this.config.isRepeat;
        // this.isMute = this.config.isMute;
        randomBtns[0].classList.toggle('active', app.isRandom);
        randomBtns[1].classList.toggle('active', app.isRandom);
        repeatBtns[0].classList.toggle('active', app.isRepeat);
        repeatBtns[1].classList.toggle('active', app.isRepeat);
        // volumeBtn.classList.toggle('mute', app.isMute);

    },
    toggleControlOnMobile: function () {
        mobileIconHide.onclick = function () {
            document.querySelector('.control-on-mobile').classList.remove('active');
        }

        cdImg.onclick = function () {
            document.querySelector('.control-on-mobile').classList.add('active');
        }

    },
    start: function () {
        // Gán cấu hình từ config vào app
        this.loadConfig();

        // Xử lý các sự kiện
        this.handleEvents();

        // Định nghĩa các thuộc tính cho object
        this.defineProperties();

        // Tải bài hát đầu tiên
        this.loadCurrentSong();

        //Render playlist
        this.render();

        // Tải total time
        this.loadTotalTime();

        // Đóng mở điều khiển ở mobile
        this.toggleControlOnMobile();
    }
}

app.start();