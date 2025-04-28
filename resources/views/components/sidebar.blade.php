<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex">

    <!-- Sidebar -->
    <div class="w-64 bg-white h-screen p-6 flex flex-col justify-between z-10 shadow-lg">
        <div>
            <!-- Nama Website -->
            <h1 class="text-2xl font-bold text-blue-600 mb-8 text-start italic ">P-Tiket</h1>

            <!-- Menu -->
            <nav class="flex flex-col space-y-4">
                @auth
                    @php
                        $role = Auth::user()->role;
                    @endphp
            
                    @if($role === 'maskapai')
                        <a href="/dashboard" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                        <a href="/maskapais" class="text-gray-700 hover:text-blue-600 font-medium">Data Maskapai</a>
                        <a href="/transaksis" class="text-gray-700 hover:text-blue-600 font-medium">Transaksi</a>
                    @elseif($role === 'admin')
                        <a href="/dashboard" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                        <a href="/users" class="text-gray-700 hover:text-blue-600 font-medium">Data User</a>
                        <a href="/maskapais" class="text-gray-700 hover:text-blue-600 font-medium">Data Maskapai</a>
                        <a href="/transaksis" class="text-gray-700 hover:text-blue-600 font-medium">Transaksi</a>
                    @endif
                @endauth
            </nav>            
        </div>

        <!-- Logout -->
        @auth
        <form action="{{ route('logout') }}" method="POST" class="mt-8">
            @csrf
            <button type="submit" class="w-full text-white bg-red-500 hover:bg-red-500 py-2 rounded-lg">Logout</button>
        </form>
        @endauth
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>

</body>
</html>
