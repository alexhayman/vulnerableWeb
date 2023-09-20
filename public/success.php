<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Home']) ?>
<?php view('navbar') ?>
    <section  class="py-5 wrapper flex-grow-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <h1 class="text-center">Success!</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <img src="/img/hackerman.jpg">
            </div>
        </div>
    </section>

<?php view('footer') ?>
