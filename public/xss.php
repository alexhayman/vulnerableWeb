<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/xss.php';
?>

<?php view('header', ['title' => 'XSS Challenge']) ?>
<?php view('navbar') ?>

<section class="py-5 wrapper flex-grow-1" id="page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">  
                <div class="card">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-4">Challenge: Cross-site Scripting (XSS)</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2>Make the Background Red</h2>
                    </div>
                </div>
            </div>
            <div class="col-6">  
                <div class="card">
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-4">Hint</h2>
                    </div>
                    <div class="card-body text-center">
                        <h2>Try and execute:</h2>
                        <p>document.getElementById("page").style.backgroundColor = "red";</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-4">
                <form action="xss.php" method="post" autocomplete="off">
                    <div>
                        <label class="form-label">Post a message</label>
                        <input  class="form-control" name="message"
                            value="">
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col">
                <h4><?= $text['message'] ?? '' ?></h4>
            </div>
        </div>
    </div>
</section>

<?php view('footer') ?>
