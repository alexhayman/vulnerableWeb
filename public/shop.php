<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'shop']) ?>
<?php view('navbar') ?>

<?php 
require __DIR__ . '/../src/shop.php';
?>

<?php if(isset($items)): ?>
<section class="py-5 wrapper flex-grow-1">
    <div class="container">
        <div class="row">
            <?php foreach ($items as $item): ?>
            <div class="col-lg-4 p-3">
                <div class="card">
                    <div class="card-body">
                    <div style="text-align: center;">
                        <img src="img/<?= $item[2] ?>" id="item-thumbnail" alt="Image Not Found">
                    </div>
                    <div class="mx-3">
                        <a href="shop.php?item=<?= strtolower($item[0]) ?>.php"><h1 class="mt-5"><?= $item[0] ?></h1></a>
                        <h3>£<?= number_format((float)$item[1], 2, '.', ''); ?> </h3>
                    </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php view('footer') ?>
