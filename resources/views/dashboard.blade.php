<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>RoomMatch Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,sans-serif;
    background:#EEF3E6;
    color:#243220;
}

/* =========================
NAVBAR
========================= */

/* =========================
NAVBAR FIX CLEAN
HAPUS SEMUA CSS NAVBAR LAMA
LALU GANTI FULL DENGAN INI
========================= */

.navbar{

    position:fixed;

    top:22px;

    left:50%;

    transform:translateX(-50%);

    width:95%;

    max-width:1320px;

    height:82px;

    background:rgba(255,255,255,0.94);

    backdrop-filter:blur(16px);

    border-radius:26px;

    padding:0 38px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    z-index:99999;

    box-shadow:
    0 12px 35px rgba(0,0,0,0.12);
}

/* =========================
LEFT
========================= */

.left-navbar{

    display:flex;

    align-items:center;

    z-index:2;
}

/* =========================
LOGO
========================= */

.logo{

    font-size:40px;

    font-weight:800;

    color:#355125;
}

.logo span{

    color:#7BAE52;
}

/* =========================
CENTER
========================= */

.center-navbar{

    position:absolute;

    left:50%;

    transform:translateX(-50%);
}

/* =========================
MENU
========================= */

.menu{

    display:flex;

    align-items:center;

    gap:18px;
}

/* =========================
MENU ITEM
========================= */

.menu a{

    position:relative;

    text-decoration:none;

    color:#243220;

    font-weight:700;

    font-size:15px;

    padding:12px 24px;

    border-radius:18px;

    transition:0.3s;
}

/* HOVER */

.menu a:hover{

    background:#E7F1DB;

    color:#7BAE52;
}

/* ACTIVE */

.menu a.active{

    background:#7BAE52;

    color:white;

    box-shadow:
    0 8px 20px rgba(123,174,82,0.25);
}

/* ACTIVE DOT */

.menu a.active::after{

    content:'';

    position:absolute;

    left:50%;
    bottom:-8px;

    transform:translateX(-50%);

    width:7px;
    height:7px;

    background:#7BAE52;

    border-radius:50%;
}

/* =========================
RIGHT
========================= */

.right-navbar{

    display:flex;

    align-items:center;

    gap:14px;

    margin-left:auto;

    z-index:2;
}

/* =========================
MATCH NOTIF
========================= */

.match-notif{

    background:#7BAE52;

    color:white;

    padding:10px 14px;

    border-radius:14px;

    text-decoration:none;

    font-weight:bold;

    box-shadow:
    0 8px 20px rgba(123,174,82,0.28);

    transition:0.3s;
}

.match-notif:hover{

    transform:translateY(-2px);

    background:#679944;
}

/* =========================
USERNAME
========================= */

.username{

    background:#7BAE52;

    color:white;

    padding:12px 24px;

    border-radius:18px;

    font-size:14px;

    font-weight:700;

    box-shadow:
    0 8px 18px rgba(123,174,82,0.22);
}

/* =========================
MOBILE
========================= */

@media(max-width:768px){

    .navbar{

        width:94%;

        height:auto;

        padding:20px;

        flex-direction:column;

        gap:20px;
    }

    .center-navbar{

        position:static;

        transform:none;
    }

    .right-navbar{

        margin-left:0;
    }

    .menu{

        flex-wrap:wrap;

        justify-content:center;
    }

}

/* =========================
HERO
========================= */

.hero{

    width:100%;

    min-height:920px;

    background:
    linear-gradient(
        rgba(0,0,0,0.28),
        rgba(0,0,0,0.40)
    ),
    url('{{ asset("images/hero-kos.jpeg") }}');

    background-size:cover;
    background-position:center;

    position:relative;

    padding:
    220px 70px 150px;

    display:flex;

    align-items:center;
}

/* =========================
HERO CONTENT
========================= */

.hero-content{

    max-width:700px;
}

/* =========================
HERO LAYOUT
========================= */

.hero{

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:60px;
}

/* =========================
HERO LEFT
========================= */

.hero-content{

    flex:1;

    max-width:650px;
}

/* =========================
HERO RIGHT
========================= */

.hero-image-wrapper{

    flex:1;

    display:flex;

    justify-content:center;
}

/* =========================
IMAGE CARD
========================= */

.hero-image-card{

    width:100%;

    max-width:620px;

    height:520px;

    border-radius:40px;

    overflow:hidden;

    position:relative;

    box-shadow:
    0 25px 60px rgba(0,0,0,0.25);
}

/* =========================
IMAGE
========================= */

.hero-image{

    width:100%;
    height:100%;

    object-fit:cover;
}

/* =========================
OVERLAY
========================= */

.hero-image-overlay{

    position:absolute;

    inset:0;

    background:
    linear-gradient(
        to top,
        rgba(0,0,0,0.55),
        rgba(0,0,0,0.08)
    );

    padding:40px;

    display:flex;

    flex-direction:column;

    justify-content:flex-end;
}

/* =========================
BADGE
========================= */

.hero-mini-badge{

    width:max-content;

    background:rgba(123,174,82,0.85);

    color:white;

    padding:10px 18px;

    border-radius:30px;

    margin-bottom:18px;

    font-size:14px;

    font-weight:bold;

    backdrop-filter:blur(10px);
}

/* =========================
IMAGE TITLE
========================= */

.hero-image-overlay h3{

    color:white;

    font-size:42px;

    margin-bottom:14px;

    text-shadow:
    0 6px 18px rgba(0,0,0,0.25);
}

/* =========================
IMAGE TEXT
========================= */

.hero-image-overlay p{

    color:#F3F3F3;

    line-height:1.8;

    font-size:15px;

    max-width:420px;
}

.hero-badge{

    display:inline-flex;

    align-items:center;

    gap:8px;

    background:rgba(164,208,125,0.20);

    border:1px solid rgba(255,255,255,0.18);

    backdrop-filter:blur(12px);

    color:white;

    padding:12px 18px;

    border-radius:40px;

    margin-bottom:24px;

    font-size:14px;
}

.hero-content h1{

    color:white;

    font-size:88px;

    line-height:1.08;

    margin-bottom:28px;

    text-shadow:
    0 10px 30px rgba(0,0,0,0.35);
}

.hero-content p{

    color:#F2F2F2;

    font-size:22px;

    line-height:1.9;

    margin-bottom:42px;

    max-width:650px;
}

/* =========================
HERO BUTTON
========================= */

.hero-btn{

    display:inline-flex;

    align-items:center;
    justify-content:center;

    width:190px;
    height:60px;

    background:#7BAE52;

    color:white;

    text-decoration:none;

    border-radius:40px;

    font-weight:bold;

    box-shadow:
    0 10px 24px rgba(123,174,82,0.30);

    transition:0.3s;
}

.hero-btn:hover{

    transform:translateY(-3px);

    background:#679944;
}

/* =========================
SEARCH FLOAT
========================= */

.search-wrapper{

    width:100%;

    display:flex;

    justify-content:center;

    margin-top:-75px;

    position:relative;

    z-index:999;
}

.search-box{

    width:980px;

    background:#D9E8C7;

    border-radius:80px;

    padding:20px;

    display:flex;

    align-items:center;

    gap:20px;

    box-shadow:
    0 18px 40px rgba(0,0,0,0.18);
}

.search-box input{

    flex:1;

    height:65px;

    border:none;

    border-radius:40px;

    padding:0 25px;

    outline:none;

    font-size:15px;

    color:#243220;
}

.search-btn{

    width:170px;
    height:65px;

    border:none;

    border-radius:40px;

    background:#7BAE52;

    color:white;

    font-weight:bold;

    cursor:pointer;

    transition:0.3s;
}

.search-btn:hover{

    background:#679944;
}

/* =========================
CONTENT
========================= */

.content{

    padding:90px 70px;
}

/* =========================
SECTION TITLE
========================= */

.section-title{

    font-size:42px;

    margin-bottom:14px;

    color:#243220;
}

.section-desc{

    color:#6A7863;

    margin-bottom:50px;

    line-height:1.7;
}

/* =========================
OWNER CARD
========================= */

.owner-wrapper{

    width:100%;

    display:flex;

    justify-content:center;

    margin-bottom:70px;
}

.owner-card{

    width:850px;

    min-height:320px;

    background:white;

    border-radius:38px;

    overflow:hidden;

    display:flex;

    align-items:center;

    box-shadow:
    0 18px 45px rgba(0,0,0,0.12);

    border:4px solid #A4D07D;

    position:relative;
}
    
.owner-badge{

    position:absolute;

    top:20px;
    left:20px;

    background:#7BAE52;

    color:white;

    padding:10px 18px;

    border-radius:40px;

    font-size:13px;

    font-weight:bold;

    z-index:10;
}

.owner-image{

    width:45%;

    height:320px;

    object-fit:cover;
}

.owner-content{

    flex:1;

    padding:40px;
}

.owner-content h2{

    font-size:52px;

    margin-bottom:16px;

    color:#243220;
}

.owner-content p{

    color:#6A7863;

    margin-bottom:10px;
}

.owner-content .edit-btn{

    width:220px;

    margin-top:35px;
}

/* =========================
SMALL CARD
========================= */

.card{

    border-radius:28px;

    overflow:hidden;

    background:white;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);

    transition:0.3s;
}

.card:hover{

    transform:translateY(-8px);
}

.profile-image{

    width:100%;
    height:190px;

    object-fit:cover;
}

.card-content{

    padding:22px;

    display:flex;

    flex-direction:column;

    flex:1;
}

.card-content h3{

    font-size:22px;

    margin-bottom:8px;

    color:#243220;
}

.gender-age{

    color:#7BAE52;

    font-weight:bold;

    margin-bottom:14px;
}

.location{

    color:#5B6856;

    margin-bottom:20px;
}

/* =========================
BUTTON GROUP
========================= */

.button-group{

    display:flex;

    gap:12px;

}

.chat-btn,
.detail-btn{

    flex:1;

    min-width:0;

    height:50px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    font-weight:bold;

    transition:0.3s;
}

.chat-btn{

    background:#7BAE52;

    color:white;
}

.chat-btn:hover{

    background:#679944;
}

.detail-btn{

    background:#DCE9CF;

    color:#355125;
}

.detail-btn:hover{

    background:#CFE2BB;
}

.card-content h3{

    overflow:hidden;

    text-overflow:ellipsis;

    white-space:nowrap;
}

.location{

    overflow:hidden;

    text-overflow:ellipsis;

    white-space:nowrap;
}

/* =========================
POPUP
========================= */

.popup{

    position:fixed;

    inset:0;

    background:rgba(0,0,0,0.55);

    backdrop-filter:blur(6px);

    display:none;

    align-items:center;
    justify-content:center;

    z-index:99999;
}

.popup-content{

    width:500px;

    background:white;

    border-radius:34px;

    overflow:hidden;

    animation:popupShow 0.3s ease;
}

.popup-image{

    width:100%;
    height:280px;

    object-fit:cover;
}

.popup-body{

    padding:30px;
}

.popup-body h2{

    font-size:36px;

    margin-bottom:10px;

    color:#243220;
}

.popup-body p{

    color:#5B6856;

    margin-bottom:14px;

    line-height:1.7;
}

.close-popup{

    width:100%;

    height:58px;

    border:none;

    border-radius:18px;

    margin-top:20px;

    background:#7BAE52;

    color:white;

    font-weight:bold;

    cursor:pointer;
}

@keyframes popupShow{

    from{

        opacity:0;
        transform:scale(0.9);
    }

    to{

        opacity:1;
        transform:scale(1);
    }
}

/* =========================
CARD CONTAINER
========================= */

.card-container{

    width:100%;

    display:grid;

    grid-template-columns:
    repeat(4,1fr);

    gap:28px;

    margin-top:30px;
}

/* =========================
CARD
========================= */

.card{

    width:320px;

    min-height:380px;

    background:white;

    border-radius:28px;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);

    transition:0.3s;

    display:flex;

    flex-direction:column;
}

.card:hover{

    transform:translateY(-10px);

    box-shadow:
    0 18px 40px rgba(0,0,0,0.12);
}

/* =========================
FIRST CARD USER
========================= */

.own-card{

    border:3px solid #A4D07D;

    position:relative;
}

.own-card::before{

    content:'Postingan Kamu';

    position:absolute;

    top:18px;
    left:18px;

    background:#7BAE52;

    color:white;

    padding:10px 18px;

    border-radius:30px;

    font-size:13px;

    font-weight:bold;

    z-index:10;
}

/* =========================
IMAGE
========================= */

.profile-image{

    width:100%;
    height:170px;

    object-fit:cover;
}

/* =========================
CARD CONTENT
========================= */

.card-content{

    padding:28px;
}

.card-content h3{

    font-size:32px;

    margin-bottom:10px;

    color:#243220;
}

.gender-age{

    color:#7BAE52;

    font-weight:bold;

    margin-bottom:24px;
}

/* =========================
INFO LIST
========================= */

.info-list{

    display:flex;
    flex-direction:column;

    gap:14px;

    margin-bottom:30px;
}

.info-list p{

    color:#5B6856;

    line-height:1.6;
}

/* =========================
BUDGET
========================= */

.budget small{

    color:#7B8A74;
}

.budget h4{

    margin-top:8px;

    color:#7BAE52;

    font-size:28px;
}

/* =========================
BUTTONS
========================= */

.match-btn,
.edit-btn{

    width:100%;

    height:60px;

    margin-top:28px;

    border:none;

    border-radius:18px;

    text-decoration:none;

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:bold;

    transition:0.3s;
}

.match-btn{

    background:#7BAE52;

    color:white;
}

.match-btn:hover{

    background:#679944;

    transform:translateY(-2px);
}

.edit-btn{

    background:#DCE9CF;

    color:#355125;
}

.edit-btn:hover{

    background:#CFE2BB;

    transform:translateY(-2px);
}

/* =========================
FLOAT BUTTON
========================= */

.add-btn{

    position:fixed;

    right:35px;
    bottom:35px;

    width:80px;
    height:80px;

    border-radius:50%;

    background:#7BAE52;

    color:white;

    text-decoration:none;

    font-size:44px;
    font-weight:bold;

    display:flex;
    align-items:center;
    justify-content:center;

    box-shadow:
    0 14px 35px rgba(123,174,82,0.35);

    transition:0.3s;

    z-index:999;
}

.add-btn:hover{

    transform:scale(1.08);

    background:#679944;
}

/* =========================
EMPTY
========================= */

.empty{

    background:white;

    padding:30px;

    border-radius:24px;

    color:#355125;
}

/* =========================
RESPONSIVE
========================= */

@media(max-width:992px){

    .card-container{

        grid-template-columns:repeat(3,1fr);
    }

    .hero-content h1{

        font-size:58px;
    }

}

/* =========================
TABLET & MOBILE
========================= */

@media(max-width:768px){

    .navbar{

        width:94%;

        height:auto;

        padding:20px;

        flex-direction:column;

        gap:20px;
    }

    .center-navbar{

        position:static;

        transform:none;
    }

    .right-navbar{

        margin-left:0;
    }

    .menu{

        flex-wrap:wrap;

        justify-content:center;
    }

    .hero{

        min-height:780px;

        padding:180px 25px 120px;

        flex-direction:column;

        gap:50px;
    }

    .hero-content h1{

        font-size:52px;
    }

    .search-wrapper{

        margin-top:-40px;
    }

    .search-box{

        width:92%;

        flex-direction:column;

        border-radius:30px;
    }

    .search-box input,
    .search-btn{

        width:100%;
    }

    .content{

        padding:70px 25px;
    }

    .card-container{

        grid-template-columns:repeat(2,1fr);
    }

    .owner-card{

        flex-direction:column;

        width:100%;
    }

    .owner-image{

        width:100%;

        height:240px;
    }

    .hero-image-card{

        height:360px;
    }

}

/* =========================
SMALL MOBILE
========================= */

@media(max-width:520px){

    .card-container{

        grid-template-columns:1fr;
    }

}

</style>

</head>

<body>

<nav class="navbar">

    <div class="left-navbar">

        <h1 class="logo">
            Room<span>Match</span>
        </h1>

    </div>

    <div class="center-navbar">

        <div class="menu">

            <a href="/dashboard" class="active">
                Dashboard
            </a>

            <a href="/chat-list" style="position:relative;">

                Chat

                @if($chatNotif > 0)

                    <span style="
                        position:absolute;
                        top:-10px;
                        right:-18px;

                        background:#EF4444;
                        color:white;

                        width:22px;
                        height:22px;

                        border-radius:50%;

                        display:flex;
                        align-items:center;
                        justify-content:center;

                        font-size:12px;
                        font-weight:bold;
                    ">

                        {{ $chatNotif }}

                    </span>

                @endif

            </a>

            <a href="/profile">
                Profile
            </a>

        </div>

    </div>

    <div class="right-navbar">

        @if($matchRequests->count() > 0 && $matchUser)

            <a href="/chat/{{ $matchUser->id }}" class="match-notif">

                🔔 {{ $matchRequests->count() }}

            </a>

        @endif

        <div class="username">

            {{ Auth::user()->name }}

        </div>

    </div>

</nav>

<section class="hero">

    <div class="hero-content">

        <div class="hero-badge">
            🌿 Temukan roommate nyaman
        </div>

        <h1>
            Cari Teman Kos Dengan Mudah
        </h1>

        <p>
            Temukan roommate yang cocok dengan gaya hidup,
            lokasi, dan kebiasaanmu tanpa drama yang biasanya
            muncul 2 minggu setelah pindahan.
        </p>

        <a href="/roommate/create" class="hero-btn">
            Mulai Sekarang
        </a>

    </div>

</section>

<div class="search-wrapper">

    <form action="/dashboard" method="GET" class="search-box">

        <input
            type="text"
            name="search"
            placeholder="Cari roommate, lokasi, kebiasaan..."
            value="{{ request('search') }}">

        <button type="submit" class="search-btn">

            Cari

        </button>

    </form>

</div>

<div class="content">

    {{-- CARD USER SENDIRI --}}
    @php
        $myRoom = $filteredRoommates->firstWhere('user_id', Auth::id());
    @endphp

    @if($myRoom)

    <div class="owner-wrapper">

        <div class="owner-card">

            <div class="owner-badge">
                Postingan Kamu
            </div>

            <img
                src="{{ asset($myRoom->gambar) }}"
                class="owner-image">

            <div class="owner-content">

                <h2>
                    {{ $myRoom->judul }}
                </h2>

                <p>
                    {{ $myRoom->gender }} • {{ $myRoom->umur }}
                </p>

                <p>
                    📍 {{ $myRoom->lokasi }}
                </p>

                <a
                    href="/roommate/edit/{{ $myRoom->id }}"
                    class="edit-btn">

                    Edit Iklan

                </a>

            </div>

        </div>

    </div>

    @endif

    {{-- TITLE --}}
    <h2 class="section-title">
        Roommate Recommendation
    </h2>

    <p class="section-desc">
        Pilih roommate yang paling cocok dengan preferensi dan gaya hidupmu.
    </p>

{{-- ROOMMATE LAIN --}}

<div class="card-container">

@forelse($filteredRoommates->where('user_id','!=',Auth::id()) as $roommate)

<div class="card">

    <img
        src="{{ asset($roommate->gambar) }}"
        class="profile-image">

    <div class="card-content">

        <h3>
            {{ $roommate->judul }}
        </h3>

        <p class="gender-age">
            {{ $roommate->gender }} • {{ $roommate->umur }}
        </p>

        <p class="location">
            📍 {{ $roommate->lokasi }}
        </p>

        <div class="button-group">

            <a
                href="/chat/{{ $roommate->user_id }}"
                class="chat-btn">

                Chat

            </a>

            <button
                class="detail-btn"
                onclick="openPopup('popup{{ $roommate->id }}')">

                Detail

            </button>

        </div>

    </div>

</div>

{{-- POPUP DETAIL --}}

<div
    class="popup"
    id="popup{{ $roommate->id }}">

    <div class="popup-content">

        <img
            src="{{ asset($roommate->gambar) }}"
            class="popup-image">

        <div class="popup-body">

            <h2>
                {{ $roommate->judul }}
            </h2>

            <p>
                {{ $roommate->gender }} • {{ $roommate->umur }}
            </p>

            <p>
                📍 {{ $roommate->lokasi }}
            </p>

            <p>
                🎓 {{ $roommate->pekerjaan }}
            </p>

            <p>
                🛏 {{ $roommate->roommate }}
            </p>

            <p>
                ✨ {{ $roommate->habit1 }}
            </p>

            <p>
                ✨ {{ $roommate->habit2 }}
            </p>

            <p>
                💰 {{ $roommate->harga }}
            </p>

            <button
                class="close-popup"
                onclick="closePopup('popup{{ $roommate->id }}')">

                Tutup

            </button>

        </div>

    </div>

</div>

@empty

<div class="empty">
    Roommate tidak ditemukan.
</div>

@endforelse

</div>
    </div>

</div>

<a href="/roommate/create" class="add-btn">
    +
</a>

<script>

function openPopup(id){

    document.getElementById(id).style.display = "flex";
}

function closePopup(id){

    document.getElementById(id).style.display = "none";
}

</script>

</body>
</html>