<section class="py-5 wrapper flex-grow-1">
    <div class="container">
        <div class="row justify-content-center">
            <div id="image-container" class="col-md-6">
                <img src="img/<?= $item['img_name'] ?>" id="item-image" class="img-thumbnail" alt="Image Not Found">
            </div>
            <div class="col-md-6">
                <h1><?= $item['name']; ?></h1>
                <h4>£<?= number_format((float)$item['price'], 2, '.', ''); ?></h4>
                <p><?= $item['description']; ?></p>
            </div>
        </div>
    </div>
</section>