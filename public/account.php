<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/updateProfile.php';
?>

<?php view('header', ['title' => 'Account']) ?>
<?php view('navbar') ?>
    
<section class="py-5 wrapper flex-grow-1">
    <div class="container">
        <div class="row ">
            <div id="image-container" class="col-lg-4 text-center  pb-3">
                <img src="<?=  $userAvatar?>"  id="profile-image" class="img-thumbnail" alt="Image Not Found">
            </div>
            <div class="col-lg-6 pt-3 px-3">
                <h1 style="word-wrap:break-word" >Hello <?= $_SESSION["username"] ?></h1>
                <form action="account.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea  class="form-control" name="description" rows=""><?= $description ?? '' ?></textarea>
                          
                        <small>
                            <?= $errors["description"] ?? '' ?>
                        </small>
                    </div>
                    <button type="submit" name="setDescription" class="btn btn-primary">Change Description</button>
                </form>
            </div>
        </div>
        <form method="POST" action="account.php" enctype="multipart/form-data">
            <div class="row pt-3">
                <div class="col-lg-6 text-center">
                    <input type="file" name="uploadFile">
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-lg-3 text-center">
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </div>
            
            </div>
        </form>
     </div>

</section>

<?php view('footer') ?>