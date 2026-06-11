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

        <div class="text-center mb-10">

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
                            d="M2.25 12L12 4.5 21.75 12M4.5 10.5V20.25H19.5V10.5" />

                    </svg>

                </div>

            </div>

            <h1 class="text-[46px]
                font-extrabold
                text-[#243220]">

                Create Account

            </h1>

            <p class="text-[#6B7D63] mt-3 text-[15px]">

                Register your new account

            </p>

        </div>

        <!-- FORM -->

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NAME -->

            <div class="mb-5">

                <label class="text-[#5D7150]
                    text-sm
                    mb-2
                    block
                    font-semibold">

                    Full Name

                </label>

                <input type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required

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

                    placeholder="Enter your name">

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2" />

            </div>

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
                    value="{{ old('email') }}"
                    required

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

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2" />

            </div>

            <!-- PASSWORD -->

            <div class="mb-5">

                <label class="text-[#5D7150]
                    text-sm
                    mb-2
                    block
                    font-semibold">

                    Password

                </label>

                <input type="password"
                    name="password"
                    required

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

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2" />

            </div>

            <!-- CONFIRM PASSWORD -->

            <div class="mb-7">

                <label class="text-[#5D7150]
                    text-sm
                    mb-2
                    block
                    font-semibold">

                    Confirm Password

                </label>

                <input type="password"
                    name="password_confirmation"
                    required

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

                    placeholder="Confirm your password">

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

                Register

            </button>

            <!-- FOOTER -->

            <p class="text-center
                text-[#6B7D63]
                mt-7">

                Already have an account?

                <a href="{{ route('login') }}"
                    class="text-[#7BAE52]
                    font-semibold
                    hover:underline">

                    Login

                </a>

            </p>

        </form>

    </div>

</div>

</x-guest-layout>