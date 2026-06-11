<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - RoomMatch</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

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

    overflow-x:hidden;

    position:relative;
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

    position:fixed;

    top:22px;

    left:50%;

    transform:translateX(-50%);

    width:95%;

    max-width:1320px;

    height:82px;

    background:rgba(255,255,255,0.92);

    backdrop-filter:blur(18px);

    border-radius:26px;

    padding:0 38px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    z-index:9999;

    box-shadow:
    0 12px 35px rgba(0,0,0,0.08);
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
CENTER NAV
========================= */

.nav-center{

    position:absolute;

    left:50%;

    transform:translateX(-50%);

    display:flex;

    align-items:center;

    gap:18px;
}

/* =========================
NAV ITEM
========================= */

.nav-center a{

    text-decoration:none;

    color:#243220;

    font-size:15px;

    font-weight:700;

    padding:12px 24px;

    border-radius:18px;

    transition:0.3s;
}

.nav-center a:hover{

    background:#E7F1DB;

    color:#7BAE52;
}

.nav-center .active{

    background:#7BAE52;

    color:white;

    box-shadow:
    0 8px 20px rgba(123,174,82,0.24);
}

/* =========================
USERNAME
========================= */

.nav-right{

    background:#7BAE52;

    color:white;

    padding:12px 22px;

    border-radius:18px;

    font-size:14px;

    font-weight:700;

    box-shadow:
    0 8px 18px rgba(123,174,82,0.18);
}

/* =========================
PROFILE PAGE
========================= */

.profile-page{

    padding:150px 25px 60px;

    position:relative;

    z-index:2;
}

/* =========================
CONTAINER
========================= */

.profile-container{

    width:100%;
    max-width:950px;

    margin:auto;

    background:rgba(255,255,255,0.74);

    backdrop-filter:blur(18px);

    border:1px solid rgba(123,174,82,0.16);

    border-radius:38px;

    padding:50px;

    box-shadow:
    0 20px 55px rgba(0,0,0,0.08);
}

/* =========================
TITLE
========================= */

.profile-title{

    font-size:52px;

    font-weight:800;

    margin-bottom:40px;

    color:#243220;
}

/* =========================
PROFILE BOX
========================= */

.profile-box{

    margin-bottom:55px;
}

/* =========================
HEADINGS
========================= */

h2{

    color:#243220 !important;

    font-size:28px !important;

    margin-bottom:10px !important;

    font-weight:800 !important;
}

/* =========================
TEXT
========================= */

p{

    color:#6B7D63 !important;

    line-height:1.8 !important;
}

/* =========================
LABEL
========================= */

label{

    color:#5D7150 !important;

    font-weight:700 !important;

    margin-bottom:8px !important;
}

/* =========================
INPUT
========================= */

input{

    width:100% !important;

    background:#F3F7EE !important;

    border:1px solid #DDE8CF !important;

    color:#243220 !important;

    border-radius:18px !important;

    margin-top:10px !important;

    height:58px !important;

    padding:0 18px !important;

    transition:0.3s !important;
}

/* =========================
INPUT FOCUS
========================= */

input:focus{

    border:1px solid #7BAE52 !important;

    box-shadow:
    0 0 0 5px rgba(123,174,82,0.10) !important;
}

/* =========================
BUTTON
========================= */

button{

    background:#7BAE52 !important;

    color:white !important;

    border:none !important;

    border-radius:18px !important;

    font-weight:700 !important;

    cursor:pointer;

    transition:0.3s !important;

    height:55px !important;

    padding:0 28px !important;

    box-shadow:
    0 12px 24px rgba(123,174,82,0.18);
}

button:hover{

    transform:translateY(-2px);

    background:#689844 !important;
}

/* =========================
LOGOUT
========================= */

.logout-btn{

    width:100%;

    margin-top:10px;

    font-size:16px;
}

/* =========================
POPUP
========================= */

.popup-overlay{

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background:rgba(20,30,15,0.38);

    backdrop-filter:blur(6px);

    display:flex;
    align-items:center;
    justify-content:center;

    opacity:0;
    visibility:hidden;

    transition:0.25s;

    z-index:99999;
}

.popup-overlay.active{

    opacity:1;
    visibility:visible;
}

/* =========================
POPUP BOX
========================= */

.popup-box{

    width:430px;

    background:white;

    border-radius:32px;

    padding:38px;

    text-align:center;

    box-shadow:
    0 20px 55px rgba(0,0,0,0.12);
}

.popup-box h2{

    margin-bottom:14px !important;
}

/* =========================
ACTIONS
========================= */

.popup-actions{

    display:flex;

    gap:15px;

    margin-top:30px;
}

.popup-actions button,
.popup-actions a{

    flex:1;

    height:54px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:18px;

    text-decoration:none;

    font-weight:700;
}

.popup-actions button{

    background:#EDF4E4 !important;

    color:#355125 !important;

    box-shadow:none !important;
}

.popup-actions a{

    background:#7BAE52;

    color:white;
}

/* =========================
RESPONSIVE
========================= */

@media(max-width:768px){

    .navbar{

        flex-direction:column;

        height:auto;

        padding:20px;

        gap:18px;
    }

    .nav-center{

        position:static;

        transform:none;
    }

    .profile-page{

        padding-top:180px;
    }

    .profile-container{

        padding:35px 25px;
    }

    .profile-title{

        font-size:38px;
    }

}

</style>

</head>

<body>

    <div class="navbar">

    <div class="logo">

        Room<span>Match</span>

    </div>

    <div class="nav-center">

        <a href="/dashboard">

            Dashboard

        </a>

        <a href="/chat-list">

            Chat

        </a>

        <a href="/profile" class="active">

            Profile

        </a>

    </div>

    <div class="nav-right">

        {{ Auth::user()->name }}

    </div>

</div>

    <div class="profile-page">

        <div class="profile-container">

            <div class="profile-title">

                Profile Settings

            </div>

            <div class="profile-box">

                @include('profile.partials.update-profile-information-form')

            </div>

            <div class="profile-box">

                @include('profile.partials.update-password-form')

            </div>

            <button
                class="logout-btn"
                onclick="openLogoutPopup()">

                Logout

            </button>

        </div>

    </div>

    <div class="popup-overlay" id="logoutPopup">

        <div class="popup-box">

            <h2>

                Logout?

            </h2>

            <p>

                Kamu yakin ingin keluar dari akun RoomMatch?

            </p>

            <div class="popup-actions">

                <button onclick="closeLogoutPopup()">

                    Batal

                </button>

                <a href="/logout-manual">

                    Logout

                </a>

            </div>

        </div>

    </div>

    <script>

        function openLogoutPopup(){

            document
                .getElementById('logoutPopup')
                .classList
                .add('active');
        }

        function closeLogoutPopup(){

            document
                .getElementById('logoutPopup')
                .classList
                .remove('active');
        }

    </script>

</body>

</html>