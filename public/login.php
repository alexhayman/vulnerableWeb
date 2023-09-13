<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['title' => 'Login']) ?>
<?php view('navbar') ?>
    <section class="py-5 wrapper flex-grow-1">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6 col-md-8">  
                    <div class="card">
                        <div class="card-title text-center border-bottom">
                            <h2 class="p-4">Login</h2>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input  class="form-control" name="username"
                                        value="<?= $input['username'] ?? '' ?>">
                                    <small class="m-0 p-0">
                                        <?= $errors['username'] ?? '' ?>
                                    </small>  
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <small class="m-0 p-0">
                                        <?= $errors['password'] ?? '' ?>
                                    </small>  
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                            <div class="text-center pt-4">
                                <p>Not yet a member? <a href="register.php">Signup</a></p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>

<?php view('footer') ?>
