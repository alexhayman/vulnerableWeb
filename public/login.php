<?php 
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['title' => 'SQL Injection']) ?>
<?php view('navbar') ?>
    <section class="py-5 wrapper flex-grow-1">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-6">  
                    <div class="card">
                        <div class="card-title text-center border-bottom">
                            <h2 class="p-4">Challenge: SQL Injection</h2>
                        </div>
                        <div class="card-body text-center">
                            <h2>Get the Admin Password</h2>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#1">1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#2">2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#3">3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#solution">Solution</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-title text-center border-bottom">
                            <h2 class="p-4">Hint</h2>
                        </div>
                        <div class="tab-content card-body text-center">
                            <div class="tab-pane active" id="1">
                                <h5>Try and escape the SQL statment using single quotes (use ')</h5>
                            </div>
                            <div class="tab-pane" id="2">
                                <h5>Try and make the SQL statement equal True after escaping the query (use OR)</h5>
                            </div>
                            <div class="tab-pane" id="3">
                                <h5>Comment out the rest of the SQL statement to avoid errors (use --)</h5>
                            </div>
                            <div class="tab-pane" id="solution">
                                <h5> write <b>'OR 1=1--</b> in the usename field</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">  
                    <div class="card">
                        <div class="card-title text-center border-bottom">
                            <h2 class="p-4">Login Page</h2>
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post" autocomplete="off">
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
                <?php if(array_key_exists('result', $output)): ?>
                    <h5>SQL Query: <?= $output['query'] ?? '' ?></h5>
                    <h5>SQL Results:</h5>
                    <?php if($output['result'] != ""): ?>
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
                                <?php 
                                $rows = $output['result'];
                                foreach ($rows as $row): ?>
                                    <tr>
                                        <th scope="row"><?= $row['id'] ?></th>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['password'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                    </tr>
                                <?php endforeach; ?>    
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h4>No Results</h4>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php view('footer') ?>