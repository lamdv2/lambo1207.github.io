const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const player = $('.player')
const cd = $('.cd')
const heading = $('header h2')
const cdThumb = $('.cd-thumb')
const audio = $('#audio')
const playBtn = $('.btn-toggle-play')
const progress = $('#progress')
const nextBtn = $('.btn-next')
const prevBtn = $('.btn-prev')
const randomBtn = $('.btn-random')
const repeatBrn = $('.btn-repeat')

const app = {

    currenIndex: 0,
    isPlaying: false,
    songs: [{
            name: 'Anh thương em nhất mà',
            singer: 'Lã x Log x Tib',
            path: './assets/musics/Anh Thương Em Nhất Mà- - Lã. x Log x TiB「Official Lyrics Video」 .Chang.mp3',
            image: './assets/img/anhthuongemnhatma.jpg'
        },
        {
            name: '3107 - 3',
            singer: 'W-n x Nâu x Duongg x Titie - Kai Cover',
            path: './assets/musics/3107-3 - W-n x Nâu x Duongg x Titie - Kai Cover.mp3',
            image: './assets/img/3107.jpg'
        },
        {
            name: 'Anh sẽ ổn thôi',
            singer: 'Vương Anh Tú',
            path: './assets/musics/ANH SẼ ỔN THÔI - VƯƠNG ANH TÚ - VIDEO LYRICS - NHẠC BUỒN NHẤT.mp3',
            image: './assets/img/anhseonthoi.jpg'
        },
        {
            name: '24H',
            singer: 'LyLy',
            path: './assets/musics/24H - OFFICIAL MUSIC VIDEO - LYLY ft MAGAZINE.mp3',
            image: './assets/img/24gio.jpg'
        },
        {
            name: 'Bước qua mùa cô đơn',
            singer: 'Vũ',
            path: './assets/musics/Bước qua mùa cô đơn - Vũ. ( Nhat Anh Cover ).mp3',
            image: './assets/img/buocquamuacodon.jpg'
        },
        {
            name: 'Cảm ơn tổn thương',
            singer: 'Phạm Nguyên Ngọc',
            path: './assets/musics/Cảm Ơn Tổn Thương - Phạm Nguyên Ngọc「Lyrics Video」Meens.mp3',
            image: './assets/img/camontonthuong.jpg'
        },
        {
            name: 'Có hẹn với thanh xuân',
            singer: '( Monstar ) - Kai Cover',
            path: './assets/musics/Có Hẹn Với Thanh Xuân ( Monstar ) - Kai Cover.mp3',
            image: './assets/img/cohenvoithanhxuan.jpg'
        },
        {
            name: 'Cứ Chill Thôi',
            singer: 'Chillies ft Suni Hạ Linh . Rhymastic',
            path: './assets/musics/Cứ Chill Thôi - Chillies ft Suni Hạ Linh . Rhymastic - Anh Khoa Cover ( Lyrics).mp3',
            image: './assets/img/cuchillthoi.jpg'
        },
        {
            name: 'Cưới thôi',
            singer: 'Masew x Masiu x B Ray x TAP',
            path: './assets/musics/Cưới Thôi - Masew x Masiu x B Ray x TAP ( Lyrics Audio ).mp3',
            image: './assets/img/cuoithoi.jpg'
        },
        {
            name: 'Chuyện của mùa đông',
            singer: 'Tiến Thành',
            path: './assets/musics/Chuyện của mùa đông ❄️ Tiến Thành.mp3',
            image: './assets/img/chuyencuamuadong.jpg'
        }
    ],

    render: function() {
        const htmls = this.songs.map(song => {
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
        Object.defineProperty(this, 'currentSong', {
            get: function() {
                return this.songs[this.currenIndex]
            }
        })
    },

    handleEvents: function() {
        const _this = this
        const cdWidth = cd.offsetWidth

        // Quay đĩa Cd
        const cdThumbAnimate = cdThumb.animate([{
            transform: 'rotate(360deg)'
        }], {
            duration: 10000,
            iterations: Infinity
        })
        cdThumbAnimate.pause()

        // Phóng to , thu nhỏ CD
        document.onscroll = function() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop
            const newcdWidth = cdWidth - scrollTop

            cd.style.width = newcdWidth > 0 ? newcdWidth + 'px' : 0
            cd.style.opacity = newcdWidth / cdWidth
        }

        // Khi click vào Play
        playBtn.onclick = function() {
            if (_this.isPlaying) {
                audio.pause()
            } else {
                audio.play()
            }
        }

        // Khi audio play
        audio.onplay = function() {
            _this.isPlaying = true
            player.classList.add('playing')
            cdThumbAnimate.play()
        }

        // KHi audio pause
        audio.onpause = function() {
            _this.isPlaying = false
            player.classList.remove('playing')
            cdThumbAnimate.pause()
        }

        // KHi tieesn độ bài hát thay đổi
        audio.ontimeupdate = function() {
            if (audio.duration) {
                const progressPercent = Math.floor(audio.currentTime / audio.duration * 100)
                progress.value = progressPercent
            }
        }

        // Khi tua bafi hat
        progress.oninput = function(e) {
            const seekTime = audio.duration / 100 * e.target.value
            audio.currentTime = seekTime

        }

        // Next Song
        nextBtn.onclick = function() {
            _this.nextSong()
            audio.play()
        }

        // Prev Song
        prevBtn.onclick = function() {
            _this.prevSong()
            audio.play()
        }

        // Random Btn
        randomBtn.onclick = function() {

        }

    },

    loadCurrentSong: function() {
        heading.textContent = this.currentSong.name
        cdThumb.style.backgroundImage = `url('${this.currentSong.image}')`
        audio.src = this.currentSong.path
    },

    nextSong: function() {
        this.currenIndex++;
        if (this.currenIndex >= this.songs.length) {
            this.currenIndex = 0
        }
        this.loadCurrentSong()
    },

    prevSong: function() {
        this.currenIndex--;
        if (this.currenIndex < 0) {
            this.currenIndex = this.songs.length - 1
        }
        this.loadCurrentSong()
    },

    start: function() {
        this.defineProperties()

        this.handleEvents()

        this.loadCurrentSong()

        this.render();
    }
};

app.start();