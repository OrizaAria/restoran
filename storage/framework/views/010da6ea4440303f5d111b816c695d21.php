<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="index.html" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="service.html" class="nav-item nav-link">Service</a>
            <a href="menu.html" class="nav-item nav-link">Menu</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="booking.html" class="dropdown-item">Booking</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>
        <div class="dropdown">
            <a href="#" class="nav-link dropdown-toggle btn btn-primary py-2 px-4" data-bs-toggle="dropdown"
                aria-expanded="false">
                Masuk
            </a>
            <ul class="dropdown-menu">
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="dropdown-item">Halo, <?php echo e(Auth::user()->name); ?></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="<?php echo e(url('login')); ?>">Login</a></li>
                        <?php if(Route::has('register')): ?>
                            <li><a class="dropdown-item" href="<?php echo e(url('register')); ?>">Register</a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\restoran\resources\views/home/navbar.blade.php ENDPATH**/ ?>