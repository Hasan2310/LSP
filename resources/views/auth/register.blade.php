<h2>Register</h2>
<form method="POST" action="{{ route('register.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nama"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Register</button>
</form>
<a href="{{ route('login.index') }}">Login</a>