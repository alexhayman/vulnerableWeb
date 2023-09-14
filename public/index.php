<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Home']) ?>
<?php view('navbar') ?>
    
    <section  class="py-5 wrapper flex-grow-1">
        <div class="container">
            <h1>Hack Me!</h1>
        </div>
    </section>

<?php view('footer') ?>
