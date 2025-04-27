<h2>Tambah User</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <p>Nama: <input type="text" name="name" required></p>
    <p>Email: <input type="email" name="email" required></p>
    <p>Password: <input type="password" name="password" required></p>
    <p>Role:
        <select name="role" required>
            <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Pilih Role --</option>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
        </select>
    </p>    
    <button type="submit">Simpan</button>
</form>
