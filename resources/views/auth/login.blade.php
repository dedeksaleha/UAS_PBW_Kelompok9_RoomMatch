<x-guest-layout>

<div class="min-h-screen relative overflow-hidden
    bg-[#EEF3E6]
    flex items-center justify-center px-4 py-10">

    <!-- BACKGROUND EFFECT -->

    <div class="absolute
        w-[700px] h-[700px]
        bg-[radial-gradient(circle,rgba(123,174,82,0.16),transparent_70%)]
        -top-[250px] -right-[180px]">
    </div>

    <div class="absolute
        w-[500px] h-[500px]
        bg-[radial-gradient(circle,rgba(123,174,82,0.10),transparent_70%)]
        -bottom-[180px] -left-[120px]">
    </div>

    <!-- CARD -->

    <div class="relative z-10
        w-full max-w-md
        rounded-[38px]
        p-10
        bg-[rgba(255,255,255,0.72)]
        backdrop-blur-[18px]
        border border-[rgba(123,174,82,0.16)]
        shadow-[0_20px_55px_rgba(0,0,0,0.08)]">

        <!-- HEADER -->

        <div class="mb-10 text-center">

            <div class="flex justify-center mb-5">

                <div class="w-20 h-20
                    rounded-[24px]
                    bg-[#E4F0D6]
                    flex items-center justify-center
                    shadow-[0_10px_30px_rgba(123,174,82,0.18)]">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-9 h-9 text-[#7BAE52]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.7"
                            d="M3 10.5L12 3L21 10.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9.5z" />

                    </svg>

                </div>

            </div>

            <h1 class="text-[46px]
                font-extrabold
                text-[#243220]">

                Welcome Back

            </h1>

            <p class="text-[#6B7D63] mt-3 text-[15px]">

                Login to your account

            </p>

        </div>

        <!-- FORM -->

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->

            <div class="mb-5">

                <label class="text-[#5D7150]
                    text-sm
                    mb-2
                    block
                    font-semibold">

                    Email

                </label>

                <input type="email"
                    name="email"

                    class="w-full
                    h-[58px]
                    rounded-[18px]
                    bg-[#F3F7EE]
                    border border-[#DDE8CF]
                    text-[#243220]
                    px-5
                    placeholder-[#91A087]
                    focus:border-[#7BAE52]
                    focus:ring-[#7BAE52]/20"

                    placeholder="Enter your email">

            </div>

            <!-- PASSWORD -->

            <div class="mb-7">

                <label class="text-[#5D7150]
                    text-sm
                    mb-2
                    block
                    font-semibold">

                    Password

                </label>

                <input type="password"
                    name="password"

                    class="w-full
                    h-[58px]
                    rounded-[18px]
                    bg-[#F3F7EE]
                    border border-[#DDE8CF]
                    text-[#243220]
                    px-5
                    placeholder-[#91A087]
                    focus:border-[#7BAE52]
                    focus:ring-[#7BAE52]/20"

                    placeholder="Enter your password">

            </div>

            <!-- BUTTON -->

            <button type="submit"

                class="w-full
                h-[58px]
                rounded-[20px]
                bg-[#7BAE52]
                hover:bg-[#689844]
                text-white
                font-bold
                transition
                duration-300
                shadow-[0_12px_24px_rgba(123,174,82,0.24)]">

                Login

            </button>

            <!-- FOOTER -->

            <p class="text-center
                text-[#6B7D63]
                mt-7">

                Don't have an account?

                <a href="{{ route('register') }}"
                    class="text-[#7BAE52]
                    font-semibold
                    hover:underline">

                    Register

                </a>

            </p>

        </form>

    </div>

</div>

</x-guest-layout>