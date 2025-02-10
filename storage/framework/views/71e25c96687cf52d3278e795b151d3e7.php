<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('staff.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .card {
            background: #1e1e1e;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .card-title {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555 !important;
            background: #222 !important;
            color: white !important;
            /* Pastikan teks berwarna putih */
            font-size: 16px !important;
            /* Perbesar ukuran teks agar lebih jelas */
        }

        input::placeholder,
        textarea::placeholder {
            color: #bbb !important;
            /* Warna placeholder lebih terang agar tetap terlihat */
            font-size: 14px !important;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #1eff00 !important;
            /* Warna border saat input aktif */
            outline: none !important;
            background: #333 !important;
            /* Lebih kontras saat aktif */
            color: white !important;
            /* Pastikan teks tetap putih */
        }

        label {
            font-weight: bold !important;
            color: white !important;
        }


        button {
            width: 100%;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .image-preview {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .image-preview img {
            border-radius: 10px;
            border: 1px solid #555;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('staff.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('staff.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-wrapper">
                        <div class="card">
                            <h2 class="card-title">Form Update Menu</h2>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(url('edit_menu', $data->id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="type">Tipe Menu</label>
                                    <select id="type" name="type" required>
                                        <option value="breakfast"
                                            <?php echo e($data->tipe_menu == 'breakfast' ? 'selected' : ''); ?>>Breakfast</option>
                                        <option value="lunch" <?php echo e($data->tipe_menu == 'lunch' ? 'selected' : ''); ?>>Lunch
                                        </option>
                                        <option value="dinner" <?php echo e($data->tipe_menu == 'dinner' ? 'selected' : ''); ?>>
                                            Dinner</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="menu">Nama Menu</label>
                                    <input type="text" id="menu" name="menu" value="<?php echo e($data->nama_menu); ?>"
                                        placeholder="Masukkan Nama Menu" required>
                                </div>

                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" id="harga" name="harga" value="<?php echo e($data->harga); ?>"
                                        placeholder="Masukkan Harga" required>
                                </div>

                                <div class="form-group">
                                    <label for="desk">Deskripsi</label>
                                    <textarea id="desk" name="desk" rows="3" placeholder="Masukkan Deskripsi"><?php echo e($data->deskripsi); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Gambar Sebelumnya</label>
                                    <div class="image-preview">
                                        <img width="100" src="/room/<?php echo e($data->gambar); ?>" alt="Gambar Menu">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gambar">Upload Gambar Baru</label>
                                    <input type="file" id="gambar" name="gambar" accept="image/*">
                                </div>

                                <button type="submit" class="btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('staff.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('staff.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\restoran\resources\views/staff/update_menu.blade.php ENDPATH**/ ?>