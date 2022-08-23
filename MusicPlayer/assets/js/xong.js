// Một số bài hát có thể bị lỗi do liên kết bị hỏng. Vui lòng thay thế liên kết khác để có thể phát
// Some songs may be faulty due to broken links. Please replace another link so that it can be played

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const PlAYER_STORAGE_KEY = "F8_PLAYER";

const player = $(".player");
const cd = $(".cd");
const heading = $("header h2");
const cdThumb = $(".cd-thumb");
const audio = $("#audio");
const playBtn = $(".btn-toggle-play");
const progress = $("#progress");
const prevBtn = $(".btn-prev");
const nextBtn = $(".btn-next");
const randomBtn = $(".btn-random");
const repeatBtn = $(".btn-repeat");
const playlist = $(".playlist");

const app = {
    currentIndex: 0,
    isPlaying: false,
    isRandom: false,
    isRepeat: false,
    config: {},
    // (1/2) Uncomment the line below to use localStorage
    // config: JSON.parse(localStorage.getItem(PlAYER_STORAGE_KEY)) || {},
    songs: [{
            name: 'Trò Đùa',
            singer: 'Quang Đăng Trần x 4SunMusic',
            path: './assets/musics/Trò Đùa ( Lofi Ver ) - Quang Đăng Trần x 4SunMusic - Người luôn che chở em quan tâm em luôn là anh..mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/5/1/1/5/51152a170d660eaefadaf4b4d8b58892.jpg'
        },
        {
            name: 'Anh thương em nhất mà',
            singer: 'Lã. x Log x TiB',
            path: './assets/musics/Anh Thương Em Nhất Mà- - Lã. x Log x TiB「Official Lyrics Video」 .Chang.mp3',
            image: 'https://theharmonica.vn/wp-content/uploads/2019/07/anh-thuong-em-nhat-ma.jpg'
        },
        {
            name: 'Vây Hãm',
            singer: 'Vương Tĩnh Văn Không Mập',
            path: './assets/musics/[Vietsub] Vây hãm - Vương Tĩnh Văn Không Mập -- 沦陷 - 王靖雯不胖.mp3',
            image: 'https://i.ytimg.com/vi/YWg3htRVc1A/maxresdefault.jpg'
        },
        {
            name: 'Yêu 5',
            singer: 'Rhymastic',
            path: './assets/musics/YÊU 5 - Rhymastic.mp3',
            image: 'https://i.ytimg.com/vi/y576-ONm5II/sddefault.jpg'
        },
        {
            name: '24 Giờ',
            singer: 'Ly Ly',
            path: './assets/musics/24H - OFFICIAL MUSIC VIDEO - LYLY ft MAGAZINE.mp3',
            image: 'https://i.ytimg.com/vi/gs-zxnVWPR8/sddefault.jpg'
        },
        {
            name: '3107 - 3',
            singer: 'Kai Cover',
            path: './assets/musics/3107-3 - W-n x Nâu x Duongg x Titie - Kai Cover.mp3',
            image: 'https://i.ytimg.com/vi/kfw7MYah2n0/maxresdefault.jpg'
        },
        {
            name: 'Anh sẽ ổn thôi',
            singer: 'Vương Anh Tú',
            path: './assets/musics/ANH SẼ ỔN THÔI - VƯƠNG ANH TÚ - VIDEO LYRICS - NHẠC BUỒN NHẤT.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2019/11/07/3/e/1/e/1573118065582_640.jpg'
        },
        {
            name: 'Bước qua mùa cô đơn',
            singer: 'Vũ',
            path: './assets/musics/Bước qua mùa cô đơn - Vũ. ( Nhat Anh Cover ).mp3',
            image: 'https://i.ytimg.com/vi/_Lste0Plenw/maxresdefault.jpg'
        },
        {
            name: 'Cảm Ơn Tổn Thương',
            singer: 'Phạm Nguyên Ngọc',
            path: './assets/musics/Cảm Ơn Tổn Thương - Phạm Nguyên Ngọc「Lyrics Video」Meens.mp3',
            image: 'https://nhachay.vn/wp-content/uploads/2020/08/loi-bai-hat-cam-on-ton-thuong-pham-nguyen-ngoc-lyrics-kem-hop-am.jpg'
        },
        {
            name: 'Chắc Ai Đó Sẽ Về',
            singer: 'Sơn Tùng M-TP',
            path: './assets/musics/Sơn Tùng M-TP - Chắc Ai Đó Sẽ Về.mp3',
            image: 'http://imgs.vietnamnet.vn/Images/vnn/2014/12/18/08/20141218082625-a.jpg'
        },
        {
            name: 'Có chàng trai viết lên cây',
            singer: 'Ngô Lan Hương',
            path: './assets/musics/CÓ CHÀNG TRAI VIẾT LÊN CÂY - PHAN MẠNH QUỲNH _ NGÔ LAN HƯƠNG COVER.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2019/12/23/1/5/0/5/1577070200907_640.jpg'
        },
        {
            name: 'Có hẹn với thanh xuân',
            singer: 'Kai Cover',
            path: './assets/musics/Có Hẹn Với Thanh Xuân ( Monstar ) - Kai Cover.mp3',
            image: 'https://kenh14cdn.com/zoom/320_200/203336854389633024/2021/7/20/photo1626748139442-16267481396521029003719.jpg'
        },
        {
            name: 'Còn gì đau hơn chữ đã từng',
            singer: 'Quân AP',
            path: './assets/musics/QUÂN A.P - Còn Gì Đau Hơn Chữ Đã Từng - Lyrics Audio.mp3',
            image: 'https://photo-baomoi.zadn.vn/w720x480/2019_10_14_541_32550117/40157e1bd25b3b05624a.jpg'
        },
        {
            name: 'Cứ Chill Thôi',
            singer: 'Anh Khoa Cover',
            path: './assets/musics/Cứ Chill Thôi - Chillies ft Suni Hạ Linh . Rhymastic - Anh Khoa Cover ( Lyrics).mp3',
            image: 'https://avatar-nct.nixcdn.com/mv/2020/07/23/8/1/2/d/1595472126333_640.jpg'
        },
        {
            name: 'Cưới thôi',
            singer: 'Bray-Masew',
            path: './assets/musics/Cưới Thôi - Masew x Masiu x B Ray x TAP ( Lyrics Audio ).mp3',
            image: 'https://data.chiasenhac.com/data/cover/145/144624.jpg'
        },
        {
            name: 'Chờ em trong đêm',
            singer: 'Chu Duyên Bún',
            path: './assets/musics/Chờ em trong đêm.mp3',
            image: 'https://i.ytimg.com/vi/sfC_EscgtWI/mqdefault.jpg'
        },
        {
            name: 'Chuyện của mùa đông ❄️',
            singer: '',
            path: './assets/musics/Chuyện của mùa đông ❄️ Tiến Thành.mp3',
            image: 'https://i1.sndcdn.com/artworks-000073569718-h3gzi2-t500x500.jpg'
        },
        {
            name: 'Đông kiếm em',
            singer: 'Vũ',
            path: './assets/musics/ĐÔNG KIẾM EM - Vũ. (Original).mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w360_r1x1_jpeg/avatars/b/a/d/2/bad27197c6774fc04c039c040ed8813c.jpg'
        },
        {
            name: 'Em Ổn Không',
            singer: 'Trịnh Thiên Ân x ViruSs x Láo Soái Nhi',
            path: './assets/musics/Em Ổn Không - Trịnh Thiên Ân x ViruSs x Láo Soái Nhi「Lyrics Video」.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2018/03/03/7/1/d/1/1520083907163_640.jpg'
        },
        {
            name: 'Exs Hate Me',
            singer: 'B Ray x Masew (Ft AMEE)',
            path: './assets/musics/Ex Hate Me - B Ray x Masew (Ft AMEE) - Official MV.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/share/2019/02/13/7/f/2/1/1550063180850.jpg'
        },
        {
            name: 'Kẻ Theo Đuổi Ánh Sáng',
            singer: 'Huy Vạc x Tiến Nguyễn',
            path: './assets/musics/Kẻ Theo Đuổi Ánh Sáng - Huy Vạc x Tiến Nguyễn (Official MV).mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/a/a/1/a/aa1aa9276ddda9f826aca495038b06db.jpg'
        },
        {
            name: 'Khi Em Lớn',
            singer: 'Orange x Hoàng Dũng',
            path: './assets/musics/KHI EM LỚN (FREXS x OC.A REMIX) HOT TREND TIKTOK - Orange x Hoàng Dũng - EM SẼ NGÃ ĐAU HƠN BÂY GIỜ.mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/c/4/3/a/c43a3f7cc98ee9c62401edb8fb999b74.jpg'
        },
        {
            name: 'Lạ Lùng',
            singer: 'Vũ',
            path: './assets/musics/LẠ LÙNG - Vũ. (Original).mp3',
            image: 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Vu_monsoon2019.jpg/1200px-Vu_monsoon2019.jpg'
        },
        {
            name: 'Mãi Chẳng Thuộc Về Nhau',
            singer: 'Bozitt',
            path: './assets/musics/Mãi Chẳng Thuộc Về Nhau - Bozitt - MV Lyrics HD.mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2019/10/08/0/3/2/0/1570506074184_640.jpg'
        },
        {
            name: 'Nàng Thơ (Lofi Ver.)',
            singer: 'Hoàng Dũng x Freak',
            path: './assets/musics/Nàng Thơ (Lofi Ver.) - Hoàng Dũng x Freak D.mp3',
            image: 'https://i.scdn.co/image/ab67616d0000b273248295fbbb32d0e4d71cc7ea'
        },
        {
            name: 'Năm ấy',
            singer: 'Đức Phúc ( Đỗ Hải Đăng Cover)',
            path: './assets/musics/Năm ấy - Đức Phúc ( Đỗ Hải Đăng Cover Lyrics ).mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2017/12/09/1/f/7/3/1512816233582_640.jpg'
        },
        {
            name: 'Quên anh trong từng cơn đau',
            singer: 'Chu Duyên Bún',
            path: './assets/musics/QUÊN ANH TRONG TỪNG CƠN ĐAU - CHU DUYÊN COVER GUITAR.wav',
            image: 'https://yt3.ggpht.com/ytc/AKedOLQHQ51IZGbKrr3QFXFXfpRNRcTAdXYBzyYliajriw=s900-c-k-c0x00ffffff-no-rj'
        },
        {
            name: 'Sao em lại tắt máy',
            singer: 'Phạm Nguyên Ngọc ft.Vanh',
            path: './assets/musics/Sao em lại tắt máy- - Phạm Nguyên Ngọc ft.Vanh.mp3',
            image: 'https://i.ytimg.com/vi/yhP2loYscAc/maxresdefault.jpg'
        },

        {
            name: 'Suýt Nữa Thì',
            singer: 'ANDIEZ x BITIS HUNTER',
            path: './assets/musics/SUÝT NỮA THÌ - OFFICIAL OST - CHUYẾN ĐI CỦA THANH XUÂN - ANDIEZ x BITIS HUNTER - LYRIC VIDEO.mp3',
            image: 'https://photo-resize-zmp3.zadn.vn/w240_r1x1_jpeg/cover/c/2/4/7/c2475264a30999a45a3c8bcf0e5f090d.jpg'
        },
        {
            name: 'Thanh Xuân',
            singer: 'Da LAB',
            path: './assets/musics/Thanh Xuân - Da LAB (Official MV).mp3',
            image: 'https://avatar-ex-swe.nixcdn.com/song/2018/08/24/b/a/9/5/1535121377317_640.jpg'
        },
        {
            name: 'Thì Thôi',
            singer: 'Reddy x Freak',
            path: './assets/musics/Thì Thôi (Lofi Ver.) - Reddy x Freak D.mp3',
            image: 'https://chandat.net/testx/wp-content/uploads/2020/05/Reddy-Huu-Duy.jpg'
        }, {
            name: 'Trái Tim Anh Cũng Biết Đau',
            singer: 'Cover by Mr. Siro',
            path: './assets/musics/Trái Tim Anh Cũng Biết Đau - Cover by Mr. Siro.mp3',
            image: 'https://chandat.net/testx/wp-content/uploads/2020/05/Reddy-Huu-Duy.jpg'
        },
        {
            name: 'Yêu Từ Đâu Mà Ra',
            singer: 'Lil ZPOET',
            path: './assets/musics/Yêu Từ Đâu Mà Ra - Lil ZPOET「Lyrics Video」Meens.mp3',
            image: 'https://media-cdn.laodong.vn/storage/newsportal/2020/4/28/801714/Mvyeutudaumara.jpg?w=720&crop=auto&scale=both'
        }
    ],
    setConfig: function(key, value) {
        this.config[key] = value;
        // (2/2) Uncomment the line below to use localStorage
        // localStorage.setItem(PlAYER_STORAGE_KEY, JSON.stringify(this.config));
    },
    render: function() {
        const htmls = this.songs.map(function(song) {
            return `
                <div class="song">
                    <div class="thumb" style="background-image: url('${song.image}')">
                    </div>
                    <div class="body">
                        <h3 class="title">${song.name}</h3>
                        <p class="author">${song.singer}</p>
                    </div>
                    <div class="option">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
            `
        })
        $('.playlist').innerHTML = htmls.join('')
    },
    defineProperties: function() {
        Object.defineProperty(this, "currentSong", {
            get: function() {
                return this.songs[this.currentIndex];
            }
        });
    },
    handleEvents: function() {
        const _this = this;
        const cdWidth = cd.offsetWidth;

        // Xử lý CD quay / dừng
        // Handle CD spins / stops
        const cdThumbAnimate = cdThumb.animate([{ transform: "rotate(360deg)" }], {
            duration: 10000, // 10 seconds
            iterations: Infinity
        });
        cdThumbAnimate.pause();

        // Xử lý phóng to / thu nhỏ CD
        // Handles CD enlargement / reduction
        document.onscroll = function() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const newCdWidth = cdWidth - scrollTop;

            cd.style.width = newCdWidth > 0 ? newCdWidth + "px" : 0;
            cd.style.opacity = newCdWidth / cdWidth;
        };

        // Xử lý khi click play
        // Handle when click play
        playBtn.onclick = function() {
            if (_this.isPlaying) {
                audio.pause();
            } else {
                audio.play();
            }
        };

        // Khi song được play
        // When the song is played
        audio.onplay = function() {
            _this.isPlaying = true;
            player.classList.add("playing");
            cdThumbAnimate.play();
        };

        // Khi song bị pause
        // When the song is pause
        audio.onpause = function() {
            _this.isPlaying = false;
            player.classList.remove("playing");
            cdThumbAnimate.pause();
        };

        // Khi tiến độ bài hát thay đổi
        // When the song progress changes
        audio.ontimeupdate = function() {
            if (audio.duration) {
                const progressPercent = Math.floor(
                    (audio.currentTime / audio.duration) * 100
                );
                progress.value = progressPercent;
            }
        };

        // Xử lý khi tua song
        // Handling when seek
        progress.onchange = function(e) {
            const seekTime = (audio.duration / 100) * e.target.value;
            audio.currentTime = seekTime;
        };

        // Khi next song
        // When next song
        nextBtn.onclick = function() {
            if (_this.isRandom) {
                _this.playRandomSong();
            } else {
                _this.nextSong();
            }
            audio.play();
            _this.render();
            _this.scrollToActiveSong();
        };

        // Khi prev song
        // When prev song
        prevBtn.onclick = function() {
            if (_this.isRandom) {
                _this.playRandomSong();
            } else {
                _this.prevSong();
            }
            audio.play();
            _this.render();
            _this.scrollToActiveSong();
        };

        // Xử lý bật / tắt random song
        // Handling on / off random song
        randomBtn.onclick = function(e) {
            _this.isRandom = !_this.isRandom;
            _this.setConfig("isRandom", _this.isRandom);
            randomBtn.classList.toggle("active", _this.isRandom);
        };

        // Xử lý lặp lại một song
        // Single-parallel repeat processing
        repeatBtn.onclick = function(e) {
            _this.isRepeat = !_this.isRepeat;
            _this.setConfig("isRepeat", _this.isRepeat);
            repeatBtn.classList.toggle("active", _this.isRepeat);
        };

        // Xử lý next song khi audio ended
        // Handle next song when audio ended
        audio.onended = function() {
            if (_this.isRepeat) {
                audio.play();
            } else {
                nextBtn.click();
            }
        };

        // Lắng nghe hành vi click vào playlist
        // Listen to playlist clicks
        playlist.onclick = function(e) {
            const songNode = e.target.closest(".song:not(.active)");

            if (songNode || e.target.closest(".option")) {
                // Xử lý khi click vào song
                // Handle when clicking on the song
                if (songNode) {
                    _this.currentIndex = Number(songNode.dataset.index);
                    _this.loadCurrentSong();
                    _this.render();
                    audio.play();
                }

                // Xử lý khi click vào song option
                // Handle when clicking on the song option
                if (e.target.closest(".option")) {}
            }
        };
    },
    scrollToActiveSong: function() {
        setTimeout(() => {
            $(".song.active").scrollIntoView({
                behavior: "smooth",
                block: "nearest"
            });
        }, 300);
    },
    loadCurrentSong: function() {
        heading.textContent = this.currentSong.name;
        cdThumb.style.backgroundImage = `url('${this.currentSong.image}')`;
        audio.src = this.currentSong.path;
    },
    loadConfig: function() {
        this.isRandom = this.config.isRandom;
        this.isRepeat = this.config.isRepeat;
    },
    nextSong: function() {
        this.currentIndex++;
        if (this.currentIndex >= this.songs.length) {
            this.currentIndex = 0;
        }
        this.loadCurrentSong();
    },
    prevSong: function() {
        this.currentIndex--;
        if (this.currentIndex < 0) {
            this.currentIndex = this.songs.length - 1;
        }
        this.loadCurrentSong();
    },
    playRandomSong: function() {
        let newIndex;
        do {
            newIndex = Math.floor(Math.random() * this.songs.length);
        } while (newIndex === this.currentIndex);

        this.currentIndex = newIndex;
        this.loadCurrentSong();
    },
    start: function() {
        // Gán cấu hình từ config vào ứng dụng
        // Assign configuration from config to application
        this.loadConfig();

        // Định nghĩa các thuộc tính cho object
        // Defines properties for the object
        this.defineProperties();

        // Lắng nghe / xử lý các sự kiện (DOM events)
        // Listening / handling events (DOM events)
        this.handleEvents();

        // Tải thông tin bài hát đầu tiên vào UI khi chạy ứng dụng
        // Load the first song information into the UI when running the app
        this.loadCurrentSong();

        // Render playlist
        this.render();

        // Hiển thị trạng thái ban đầu của button repeat & random
        // Display the initial state of the repeat & random button
        randomBtn.classList.toggle("active", this.isRandom);
        repeatBtn.classList.toggle("active", this.isRepeat);
    }
};

app.start();