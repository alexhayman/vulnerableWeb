<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/hidden.php';
?>

<?php view('header', ['title' => 'Hidden Text']) ?>
<?php view('navbar') ?>

<section class="py-5 wrapper flex-grow-1"> 
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-6">  
                <div class="card">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-4">Challenge: Hidden Message</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2>Find the Secret Message</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-4">
                <form action="hidden.php" method="post" autocomplete="off">
                    <div>
                    <label class="form-label">Enter Secret Message</label>
                    <input  class="form-control" name="secret"
                        value="">
                    <small class="m-0 p-0">
                        <?= $errors['secret'] ?? '' ?>
                    </small>  
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- The secret message is: secret!1337 -->

<?php view('footer') ?>