<!DOCTYPE html>
<html>
<head>
    <title>Edit Buah</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>

<style>
    /* Reset margin dan padding */
body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #f3f4f6, #e2e8f0);
    color: #333;
}

/* Wrapper */
.container {
    max-width: 400px;
    margin: auto;
    background: white;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transform: translateY(50%);
    position: relative;
}

/* Header */
h1 {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
    font-size: 1.5rem;
}

/* Form */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Input dan Select */
input, select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

input:focus, select:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Tombol Submit */
button {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Error Messages */
.error {
    background: #f8d7da;
    color: #842029;
    padding: 10px;
    border: 1px solid #f5c2c7;
    border-radius: 5px;
    margin-bottom: 15px;
}

/* Tombol Kembali */
.back-btn {
    display: inline-block;
    text-align: center;
    margin-top: 15px;
    padding: 10px 15px;
    background-color: #6c757d;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.back-btn:hover {
    background-color: #5a6268;
    transform: scale(1.05);
}

</style>
<body>
    <div class="container">
        <h1>Edit Buah</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/fruits/{{ $fruit->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $fruit->name }}" placeholder="Nama Buah">
            <input type="number" name="price" value="{{ $fruit->price }}" placeholder="Harga">
            <select name="stock">
                <option value="1" {{ $fruit->stock ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ !$fruit->stock ? 'selected' : '' }}>Habis</option>
            </select>
            <button type="submit">Simpan Perubahan</button>
        </form>

        <!-- Tombol Kembali -->
        <a href="/" class="back-btn">Kembali ke Home</a>
    </div>
</body>
</html>
