<h2>Login</h2>
<form method="POST" action="{{ route('login.store') }}">
    @csrf
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
<a href="{{ route('register.index') }}">Register</a>