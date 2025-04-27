@extends('components.layout')

@section('content')
<h2>Daftar Pengguna</h2>
<a href="{{ route('users.create') }}">+ Tambah User</a>
<br><br>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                @if(auth()->id() !== $user->id)
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a> |
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                @else
                    <em>Tidak tersedia</em>
                @endif
            </td>
        </tr>
    @endforeach
</table>
@endsection