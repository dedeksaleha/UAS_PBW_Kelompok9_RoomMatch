<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Roommate</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:#EEF3E6;

    font-family:Arial,sans-serif;

    color:#243220;

    min-height:100vh;

    position:relative;

    overflow-x:hidden;
}

/* =========================
BACKGROUND EFFECT
========================= */

body::before{

    content:'';

    position:absolute;

    width:700px;
    height:700px;

    background:
    radial-gradient(
        rgba(123,174,82,0.14),
        transparent 70%
    );

    top:-250px;
    right:-180px;

    z-index:0;
}

body::after{

    content:'';

    position:absolute;

    width:500px;
    height:500px;

    background:
    radial-gradient(
        rgba(123,174,82,0.10),
        transparent 70%
    );

    bottom:-180px;
    left:-120px;

    z-index:0;
}

/* =========================
NAVBAR
========================= */

.navbar{

    width:100%;
    height:90px;

    background:rgba(255,255,255,0.72);

    backdrop-filter:blur(18px);

    border-bottom:1px solid #DDE8CF;

    padding:0 60px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    position:sticky;

    top:0;

    z-index:99;
}

/* =========================
LOGO
========================= */

.logo{

    color:#355125;

    font-size:40px;

    font-weight:800;
}

.logo span{

    color:#7BAE52;
}

/* =========================
BACK BUTTON
========================= */

.back-btn{

    text-decoration:none;

    color:#7BAE52;

    font-size:15px;

    font-weight:700;

    transition:0.3s;
}

.back-btn:hover{

    transform:translateX(-4px);

    color:#5E8D3C;
}

/* =========================
FORM WRAPPER
========================= */

.form-wrapper{

    width:100%;

    display:flex;
    justify-content:center;

    padding:70px 20px;

    position:relative;

    z-index:2;
}

/* =========================
FORM BOX
========================= */

.form-box{

    width:100%;
    max-width:820px;

    background:rgba(255,255,255,0.74);

    backdrop-filter:blur(18px);

    border:1px solid rgba(123,174,82,0.16);

    border-radius:38px;

    padding:50px;

    box-shadow:
    0 20px 50px rgba(0,0,0,0.08);
}

/* =========================
TITLE
========================= */

.form-title{

    font-size:52px;

    margin-bottom:38px;

    color:#243220;

    font-weight:800;
}

/* =========================
GROUP
========================= */

.form-group{

    margin-bottom:24px;
}

/* =========================
LABEL
========================= */

.form-group label{

    display:block;

    margin-bottom:12px;

    color:#5D7150;

    font-size:15px;

    font-weight:700;
}

/* =========================
INPUT
========================= */

.form-group input{

    width:100%;

    height:60px;

    border:none;

    outline:none;

    background:#F3F7EE;

    border:1px solid #DDE8CF;

    color:#243220;

    border-radius:18px;

    padding:0 20px;

    font-size:15px;

    transition:0.3s;
}

/* =========================
FOCUS
========================= */

.form-group input:focus{

    border:1px solid #7BAE52;

    box-shadow:
    0 0 0 5px rgba(123,174,82,0.10);
}

/* =========================
FILE INPUT
========================= */

.form-group input[type="file"]{

    padding:16px;

    height:auto;

    background:#EDF4E4;

    cursor:pointer;
}

/* =========================
PREVIEW IMAGE
========================= */

.preview-image{

    width:100%;

    height:340px;

    object-fit:cover;

    border-radius:28px;

    margin-bottom:28px;

    border:1px solid #DDE8CF;

    box-shadow:
    0 18px 40px rgba(0,0,0,0.08);
}

/* =========================
DISABLED
========================= */

.form-group input:disabled{

    background:#E7EFDD;

    color:#708063;

    cursor:not-allowed;
}

/* =========================
BUTTON
========================= */

.submit-btn{

    width:100%;

    height:62px;

    margin-top:30px;

    background:#7BAE52;

    color:white;

    border:none;

    border-radius:22px;

    font-size:17px;

    font-weight:700;

    cursor:pointer;

    transition:0.3s;

    box-shadow:
    0 14px 30px rgba(123,174,82,0.20);
}

.submit-btn:hover{

    background:#689844;

    transform:translateY(-3px);

    box-shadow:
    0 18px 34px rgba(123,174,82,0.24);
}

/* =========================
RESPONSIVE
========================= */

@media(max-width:768px){

    .navbar{

        padding:0 25px;
    }

    .logo{

        font-size:32px;
    }

    .form-box{

        padding:35px 25px;
    }

    .form-title{

        font-size:38px;
    }

    .preview-image{

        height:240px;
    }

}

</style>

</head>

<body>

<nav class="navbar">

    <h1 class="logo">

        Room<span>Match</span>

    </h1>

    <a href="/dashboard" class="back-btn">

        ← Kembali

    </a>

</nav>

<div class="form-wrapper">

    <div class="form-box">

        <h2 class="form-title">

            Edit Iklan Roommate

        </h2>

        @if($roommate->gambar)

        <img
            src="{{ asset($roommate->gambar) }}"
            class="preview-image">

        @endif

        <form
            action="/roommate/update/{{ $roommate->id }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <!-- USERNAME AKUN -->

            <div class="form-group">

                <label>

                    Username Akun

                </label>

                <input
                    type="text"
                    value="{{ Auth::user()->name }}"
                    disabled>

            </div>

            <!-- NAMA CARD -->

            <div class="form-group">

                <label>

                    Nama Tampilan Card

                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ $roommate->judul }}"
                    required>

            </div>

            <!-- FOTO -->

            <div class="form-group">

                <label>

                    Upload Foto Baru

                </label>

                <input
                    type="file"
                    name="image">

            </div>

            <!-- LOKASI -->

            <div class="form-group">

                <label>

                    Lokasi

                </label>

                <input
                    type="text"
                    name="lokasi"
                    value="{{ $roommate->lokasi }}"
                    required>

            </div>

            <!-- PEKERJAAN -->

            <div class="form-group">

                <label>

                    Status / Pekerjaan

                </label>

                <input
                    type="text"
                    name="pekerjaan"
                    value="{{ $roommate->pekerjaan }}"
                    required>

            </div>

            <!-- ROOMMATE -->

            <div class="form-group">

                <label>

                    Preferensi Roommate

                </label>

                <input
                    type="text"
                    name="roommate"
                    value="{{ $roommate->roommate }}"
                    required>

            </div>

            <!-- HABIT 1 -->

            <div class="form-group">

                <label>

                    Habit 1

                </label>

                <input
                    type="text"
                    name="habit1"
                    value="{{ $roommate->habit1 }}"
                    required>

            </div>

            <!-- HABIT 2 -->

            <div class="form-group">

                <label>

                    Habit 2

                </label>

                <input
                    type="text"
                    name="habit2"
                    value="{{ $roommate->habit2 }}"
                    required>

            </div>

            <!-- BUDGET -->

            <div class="form-group">

                <label>

                    Budget

                </label>

                <input
                    type="text"
                    name="harga"
                    value="{{ $roommate->harga }}"
                    required>

            </div>

            <button class="submit-btn">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

</body>

</html>