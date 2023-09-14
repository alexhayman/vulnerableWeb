<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['title' => 'Login']) ?>
<?php view('navbar') ?>
    <section class="py-5 wrapper flex-grow-1">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-6">  
                    <div class="card">
                        <div class="card-title text-center border-bottom">
                            <h2 class="p-4">Challenge: SQL Injection</h2>
                        </div>
                        <div class="card-body">
                            <h2>Get the Admin password</h2>
                        </div>
                    </div>
                </div>
                <div class="col-6">  
                    <div class="card">
                        <div class="card-title text-center border-bottom">
                            <h2 class="p-4">Login Page</h2>
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
                        </div>
                    </div>
                </div> 
                <div class="row pt-5">
                <?php if($output): ?>
                    <h1>SQL Results:</h1>
                    <table class="table">
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                $rows = $output['result'];
                                foreach ($rows as $row): ?>
                                    <th scope="row"><?= $row['id'] ?></th>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['password'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <h1>Hello<h1>
                                <?php endforeach; ?>    
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php view('footer') ?>