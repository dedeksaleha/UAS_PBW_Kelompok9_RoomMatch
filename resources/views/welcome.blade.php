<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KosKu</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-[#F8FAFC] font-['Plus_Jakarta_Sans']">

    <!-- Navbar -->
    <nav class="bg-[#0F172A] px-10 py-5 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-white">
            Kos<span class="text-[#C8A96B]">Ku</span>
        </h1>

        <div class="space-x-4">

            <a href="/login"
                class="text-white hover:text-[#C8A96B]">
                Login
            </a>

            <a href="/register"
                class="bg-[#C8A96B] text-[#0F172A] px-5 py-2 rounded-xl font-semibold">
                Register
            </a>

        </div>

    </nav>

    <!-- Hero -->
    <section class="px-10 py-20 text-center">

        <h1 class="text-5xl font-bold text-[#0F172A] leading-tight">
            Temukan Kos Nyaman <br>
            Dengan Mudah
        </h1>

        <p class="text-gray-500 mt-5 text-lg">
            Platform pencarian kos modern dengan tampilan minimalis.
        </p>

    </section>

    <!-- Cards -->
    <section class="px-10 pb-20">

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($iklans as $iklan)

            <div class="bg-white rounded-[28px] overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">

                <div class="h-52 bg-[#0F172A]"></div>

                <div class="p-6">

                    <h2 class="text-2xl font-bold text-[#0F172A]">
                        {{ $iklan->judul }}
                    </h2>

                    <p class="text-gray-500 mt-2">
                        {{ $iklan->lokasi }}
                    </p>

                    <div class="mt-6 flex justify-between items-center">

                        <span class="text-[#C8A96B] font-bold text-lg">
                            {{ $iklan->harga }}
                        </span>

                        <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm">
                            Active
                        </span>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </section>

</body>
</html>