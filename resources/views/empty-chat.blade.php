<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Belum Ada Chat</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:#F3F7EE;

    font-family:Arial,sans-serif;

    min-height:100vh;

    display:flex;
    align-items:center;
    justify-content:center;

    overflow:hidden;

    position:relative;
}

/* =========================
BACKGROUND DECORATION
========================= */

body::before{

    content:'';

    position:absolute;

    width:750px;
    height:750px;

    background:
    radial-gradient(
        rgba(157,191,128,0.18),
        transparent 70%
    );

    top:-280px;
    right:-180px;

    z-index:0;
}

body::after{

    content:'';

    position:absolute;

    width:550px;
    height:550px;

    background:
    radial-gradient(
        rgba(157,191,128,0.14),
        transparent 70%
    );

    bottom:-200px;
    left:-120px;

    z-index:0;
}

/* =========================
EMPTY BOX
========================= */

.empty-box{

    width:470px;

    background:rgba(255,255,255,0.78);

    backdrop-filter:blur(20px);

    border:1px solid rgba(157,191,128,0.18);

    padding:65px 50px;

    border-radius:40px;

    text-align:center;

    box-shadow:
    0 20px 55px rgba(60,90,40,0.08);

    position:relative;

    z-index:2;

    animation:popupShow 0.35s ease;
}

/* =========================
ICON
========================= */

.icon{

    width:120px;
    height:120px;

    margin:auto;
    margin-bottom:32px;

    border-radius:50%;

    background:#EAF3DE;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:56px;

    box-shadow:
    0 12px 30px rgba(123,174,82,0.14);
}

/* =========================
TITLE
========================= */

.empty-box h1{

    color:#243220;

    font-size:44px;

    margin-bottom:18px;

    font-weight:800;
}

/* =========================
DESCRIPTION
========================= */

.empty-box p{

    color:#6D7E64;

    font-size:16px;

    line-height:1.9;

    margin-bottom:40px;
}

/* =========================
BUTTON
========================= */

.empty-box a{

    background:#7BAE52;

    color:white;

    text-decoration:none;

    padding:17px 38px;

    border-radius:20px;

    font-weight:bold;

    display:inline-block;

    transition:0.3s;

    box-shadow:
    0 12px 24px rgba(123,174,82,0.20);
}

.empty-box a:hover{

    transform:translateY(-4px);

    background:#6A9947;

    box-shadow:
    0 16px 32px rgba(123,174,82,0.24);
}

/* =========================
ANIMATION
========================= */

@keyframes popupShow{

    from{

        opacity:0;

        transform:
        translateY(25px)
        scale(0.92);
    }

    to{

        opacity:1;

        transform:
        translateY(0)
        scale(1);
    }
}

/* =========================
RESPONSIVE
========================= */

@media(max-width:768px){

    .empty-box{

        width:92%;

        padding:50px 30px;
    }

    .empty-box h1{

        font-size:34px;
    }

    .empty-box p{

        font-size:15px;
    }

}

</style>

</head>

<body>

<div class="empty-box">

    <div class="icon">
        💬
    </div>

    <h1>
        Belum Ada Chat
    </h1>

    <p>
        Kamu belum memiliki riwayat percakapan dengan pengguna lain.
        Yuk mulai cari roommate dan ngobrol sekarang.
    </p>

    <a href="/dashboard">

        Cari Roommate

    </a>

</div>

</body>
</html>