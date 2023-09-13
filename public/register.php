<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
?>



<?php view('header', ['title' => 'Register']) ?>
<?php view('navbar') ?>
    

    <section  class="py-5 wrapper flex-grow-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="class col-lg-6 col-md-8">  
                    <div class="card">
                        <div class="class class-title text-center border-bottom">
                            <h2 class="p-4">Register</h2>
                        </div>
                        <div class="card-body">
                            <form  action="register.php" method="post" >
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input  id="validationUsername" class="form-control" name="username" 
                                        value="<?= $input['username'] ?? '' ?>">
                                    <small class="m-0 p-0">
                                        <?= $errors['username'] ?? '' ?>
                                    </small>  
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <small  class="p-0">
                                        <?= $errors['password'] ?? '' ?>
                                    </small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password2">
                                    <small>
                                        <?= $errors['password2'] ?? '' ?>
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                            <div class="text-center pt-4">
                                <p>Already a Member? <a href="login.php">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
<?php view('footer') ?>