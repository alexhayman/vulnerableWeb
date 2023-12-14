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
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#1">1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#2">2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#solution">Solution</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-title text-center border-bottom">
                        <h2 class="p-4">Hint</h2>
                    </div>
                    <div class="tab-content tcard-body text-center">
                        <div class="tab-pane active" id="1">
                            <h2>Try and execute:</h2>
                            <p>document.getElementById("page").style.backgroundColor = "red";</p>
                        </div>
                        <div class="tab-pane" id="2">
                            <h5>Use Script tags to execute javascript (&lt;script&gt;&lt;/script&gt;)</h5>
                        </div>
                        <div class="tab-pane" id="solution">
                            <p>&lt;script&gt;document.getElementById("page").style.backgroundColor = "red";&lt;/script&gt;</p>
                        </div>
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
            <div align="center" class="col">
                <h4><?= $text['message'] ?? '' ?></h4>
            </div>
        </div>
    </div>
</section>

<?php view('footer') ?>
