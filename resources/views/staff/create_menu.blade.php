<!DOCTYPE html>
<html lang="en">

<head>
    @include('staff.css')
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100% !important;
            margin-right: 0 !important;
            padding-right: 0 !important;
            padding: 20px;
            box-sizing: border-box;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        form {
            width: 100%;
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background: #1e1e1e;
            color: white;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-secondary {
            background-color: gray;
            color: white;
        }

        .main-panel {
            width: 100% !important;
        }

        input,
        textarea,
        select {
            color: white !important;
            /* Warna teks putih */
            background-color: #222 !important;
            /* Warna latar belakang input */
            border: 1px solid #555 !important;
            /* Garis tepi input agar terlihat */
        }

        input::placeholder,
        textarea::placeholder {
            color: #bbb !important;
            /* Warna placeholder agar kontras */
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('staff.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('staff.navbar')
            <div class="main-panel">
                <div class="container-wrapper">
                    <form action="{{ url('tambah_menu') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h2 class="text-center">Form Tambah Menu</h2>

                        <div class="form-group">
                            <label for="type">Tipe Menu</label>
                            <select id="type" name="type" required>
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="menu">Nama Menu</label>
                            <input type="text" id="menu" name="menu" placeholder="Masukkan Nama Menu"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" id="harga" name="harga" placeholder="Masukkan Harga" required>
                        </div>

                        <div class="form-group">
                            <label for="desk">Deskripsi</label>
                            <textarea id="desk" name="desk" rows="3" placeholder="Masukkan Deskripsi"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Upload Gambar</label>
                            <input type="file" id="gambar" name="gambar" accept="image/*">
                        </div>

                        <button type="submit" class="btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            @include('staff.footer')
        </div>
    </div>
    @include('staff.js')
</body>

</html>
