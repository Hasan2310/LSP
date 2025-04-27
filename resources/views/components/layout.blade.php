<div style="display: flex; gap: 5px;">
@auth
    @if(Auth::user()->role === 'user')
        <a href="/">Home</a>    
    @endif
@endauth

@auth
    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
        <a href="/dashboard">Dashobard</a>
        <a href="/users">Data User</a>
        <a href="/maskapais">Data Maskapai</a>
        <a href="/transaksis">Transaksi</a>
    @endif
@endauth

@auth
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
@endauth
</div>
@yield('content')