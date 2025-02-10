<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('staff.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .description-container {
            display: block;
            /* Paksa konten agar tidak dalam satu baris */
            width: 100%;
            margin-bottom: 10px;
        }

        .description-summary {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .full-description {
            display: none;
            font-size: 14px;
            margin-top: 5px;
            width: 100%;
            /* Pastikan lebarnya penuh */
        }

        .full-description.active {
            display: block;
            /* Aktifkan saat Read More ditekan */
        }

        .read-more {
            display: block;
            color: #007BFF;
            cursor: pointer;
            text-decoration: underline;
            margin-top: 5px;
        }

        /* Tambahan agar tabel tidak menahan tinggi konten */
        td {
            vertical-align: top;
            /* Pastikan konten bisa turun */
            padding: 10px;
            /* Beri ruang agar tidak terlalu rapat */
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('staff.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('staff.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid page-body-wrapper">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Menu</h4>
                                <?php if(session('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(session('success')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th> Nama Menu </th>
                                                <th> Deskripsi </th>
                                                <th> Harga </th>
                                                <th> Gambar </th>
                                                <th> Update </th>
                                                <th> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr style="text-align: center;">
                                                    <td><?php echo e($data->nama_menu); ?></td>
                                                    <td>
                                                        <div class="description-container">
                                                            <p class="description-summary">
                                                                <?php echo e(Str::limit($data->deskripsi, 50)); ?>

                                                            </p>
                                                            <p class="full-description">
                                                                <?php echo e($data->deskripsi); ?>

                                                            </p>
                                                            <a href="#" class="read-more">Read More</a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo e($data->harga); ?></td>
                                                    <td>
                                                        <img width="75" src="room/<?php echo e($data->gambar); ?>"
                                                            alt="">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-warning"
                                                            href="<?php echo e(url('menu_update', $data->id)); ?>">Update</a>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Apakah anda ingin menghapus menu?')"
                                                            class="btn btn-outline-danger"
                                                            href="<?php echo e(url('menu_delete', $data->id)); ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('staff.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('staff.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const descriptionContainers = document.querySelectorAll('.description-container');

            descriptionContainers.forEach(function(container) {
                const summary = container.querySelector('.description-summary');
                const fullDescription = container.querySelector('.full-description');
                const readMoreLink = container.querySelector('.read-more');

                // Pastikan tombol "Read More" hanya muncul jika teks lebih panjang dari batasan (50 karakter)
                if (fullDescription.textContent.trim().length > 50) {
                    readMoreLink.style.display =
                        'inline'; // Tampilkan tombol jika lebih panjang dari 50 karakter
                } else {
                    readMoreLink.style.display = 'none'; // Sembunyikan tombol jika teks pendek
                }

                readMoreLink.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (!fullDescription.classList.contains('active')) {
                        fullDescription.classList.add('active');
                        summary.style.display = 'none';
                        this.textContent = 'Read Less';
                    } else {
                        fullDescription.classList.remove('active');
                        summary.style.display = 'block';
                        this.textContent = 'Read More';
                    }
                });
            });
        });
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\restoran\resources\views/staff/data_menu.blade.php ENDPATH**/ ?>