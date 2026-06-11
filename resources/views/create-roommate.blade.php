<!-- resources/views/create-roommate.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Roommate</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:#EEF3E6;

    font-family:Arial,sans-serif;

    min-height:100vh;

    padding:70px 20px;

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
        rgba(123,174,82,0.16),
        transparent 70%
    );

    top:-250px;
    right:-150px;

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
CONTAINER
========================= */

.container{

    max-width:760px;

    margin:auto;

    background:rgba(255,255,255,0.74);

    backdrop-filter:blur(18px);

    border:1px solid rgba(123,174,82,0.16);

    padding:50px;

    border-radius:36px;

    position:relative;

    z-index:2;

    box-shadow:
    0 20px 50px rgba(0,0,0,0.08);
}

/* =========================
TITLE
========================= */

h1{

    margin-bottom:35px;

    font-size:48px;

    color:#243220;

    font-weight:800;
}

/* =========================
FORM GROUP
========================= */

.form-group{

    margin-bottom:24px;
}

/* =========================
LABEL
========================= */

label{

    display:block;

    margin-bottom:12px;

    color:#5D7150;

    font-weight:700;

    font-size:15px;
}

/* =========================
INPUT & SELECT
========================= */

input,
select{

    width:100%;

    padding:18px;

    border:none;

    border-radius:18px;

    background:#F3F7EE;

    border:1px solid #DDE8CF;

    color:#243220;

    outline:none;

    font-size:15px;

    transition:0.3s;
}

/* FOCUS */

input:focus,
select:focus{

    border:1px solid #7BAE52;

    box-shadow:
    0 0 0 5px rgba(123,174,82,0.10);
}

/* =========================
FILE INPUT
========================= */

input[type="file"]{

    padding:14px;

    background:#EDF4E4;

    cursor:pointer;
}

/* =========================
READONLY INPUT
========================= */

input[readonly]{

    background:#E8F0DD !important;

    color:#6B7D5E;

    cursor:not-allowed;
}

/* =========================
BUTTON
========================= */

button{

    width:100%;

    padding:20px;

    border:none;

    border-radius:22px;

    background:#7BAE52;

    color:white;

    font-size:17px;

    font-weight:700;

    cursor:pointer;

    margin-top:30px;

    transition:0.3s;

    box-shadow:
    0 14px 28px rgba(123,174,82,0.18);
}

/* HOVER */

button:hover{

    transform:translateY(-3px);

    background:#699845;

    box-shadow:
    0 18px 34px rgba(123,174,82,0.24);
}

/* =========================
RESPONSIVE
========================= */

@media(max-width:768px){

    body{

        padding:40px 16px;
    }

    .container{

        padding:35px 25px;
    }

    h1{

        font-size:38px;
    }

}
    
</style>

</head>

<body>

<div class="container">

    <h1>
        Tambah Roommate
    </h1>

    <form action="/roommate/store" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <label>
                Upload Foto
            </label>

            <input type="file" name="image">

        </div>

        <div class="form-group">

            <label>
                Nama
            </label>

            <input
    type="text"
    name="judul"
    value="{{ Auth::user()->name }}"
    readonly
    style="
        background:#1E293B;
        cursor:not-allowed;
    ">

        </div>

        <div class="form-group">

            <label>
                Gender
            </label>

            <select name="gender">

                <option>Laki-laki</option>
                <option>Perempuan</option>

            </select>

        </div>

        <div class="form-group">

            <label>
                Umur
            </label>

            <input type="text" name="umur">

        </div>

        <div class="form-group">

            <label>
                Lokasi
            </label>

            <input type="text" name="lokasi">

        </div>

        <div class="form-group">

            <label>
                Status / Pekerjaan
            </label>

            <input type="text" name="status">

        </div>

        <div class="form-group">

            <label>
                Cari Berapa Roommate
            </label>

            <input type="text" name="roommate">

        </div>

        <div class="form-group">

            <label>
                Kebiasaan 1
            </label>

            <input type="text" name="habit1">

        </div>

        <div class="form-group">

            <label>
                Kebiasaan 2
            </label>

            <input type="text" name="habit2">

        </div>

        <div class="form-group">

            <label>
                Budget
            </label>

            <input type="text" name="budget">

        </div>

        <button type="submit">
            Tambah Roommate
        </button>

    </form>

</div>

</body>
</html>