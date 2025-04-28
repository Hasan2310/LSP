<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-2xl font-bold text-white italic">P-Tiket</h1>

            <!-- Menu for Authenticated Users -->
            @auth
                <div class="flex-1 flex justify-center space-x-4">
                    <a href="/" class="text-white hover:text-gray-200">Home</a>
                    <a href="{{ route('tiket.index') }}" class="text-white hover:text-gray-200">Tiket</a>
                    <a href="{{ route('transaksis.riwayat') }}" class="text-white hover:text-gray-200">Riwayat</a>
                    <!-- Add more links here if needed -->
                </div>

                <!-- User Menu (Dropdown) -->
                <div class="relative group">
                    <button class="text-white hover:text-gray-200 focus:outline-none">
                        {{ Auth::user()->name }} <!-- Display user name -->
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out transform scale-95 group-hover:scale-100">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md w-full text-left">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            <!-- Login Button for Guests -->
            @guest
                <div>
                    <a href="/login" class="text-white hover:text-gray-200">Login</a>
                </div>
            @endguest
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1">
        @yield('content')
    </div>

</body>
</html>
