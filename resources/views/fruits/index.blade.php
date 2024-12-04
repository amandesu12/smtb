<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buah</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> --}}


</head>
<body>
    <div class="container">
        <h1>Manajemen Buah</h1>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/fruits" method="POST">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Buah">
            <input type="number" name="price" value="{{ old('price') }}" placeholder="Harga">
            <select name="stock">
                <option value="1" {{ old('stock') == '1' ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ old('stock') == '0' ? 'selected' : '' }}>Habis</option>
            </select>
            <button type="submit">Tambah Buah</button>
        </form>

        <ul>
            @foreach ($fruits as $fruit)
                <li>
                    <!-- Detail Buah -->
                    <span class="details">
                        {{ $fruit->name }} - Rp{{ number_format($fruit->price, 0, ',', '.') }}
                        @if ($fruit->stock)
                            (Tersedia)
                        @else
                            (Habis)
                        @endif
                    </span>
        
                    <!-- Tombol Hapus dan Edit -->
                    <div class="actions">
                        <!-- Tombol Edit -->
                        <a href="/fruits/{{ $fruit->id }}/edit">Edit</a>
        
                        <!-- Tombol Hapus -->
                        <form action="/fruits/{{ $fruit->id }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus buah ini?')">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>        
        
    </div>
</body>
</html>
