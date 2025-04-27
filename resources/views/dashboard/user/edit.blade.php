<h2>Edit User</h2>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Nama: <input type="text" name="name" value="{{ $user->name }}" required></p>
    <p>Email: <input type="email" name="email" value="{{ $user->email }}" required></p>
    <p>Role:
        <select name="role" required>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
        </select>
    </p>
    <button type="submit">Update</button>
</form>
