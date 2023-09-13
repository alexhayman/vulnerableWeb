<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/admin.php'
?>

<?php view('header', ['title' => 'Admin']) ?>
<?php view('navbar') ?>
    
<section class="flex-grow-1">
<div class="container">
    <table class="table my-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Description</th>
                <th scope="col">Date Created</th>
            </tr>   
        </thead>
        <tbody>
        <?php $counter = 1;
            foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?= $counter ?></th>
                <td> <?= $user[0] ?></td>
                <?php if($user[1]): ?>
                    <td> <?= $user[1] ?></td>
                <?php else: ?>
                    <td>No Description</td>
                <?php endif; ?>
                <td> <?= $user[2] ?></td>
            </tr>
            <?php $counter +=1;
            endforeach; ?>
        </tbody>
    </table>
</div>
</section>

<?php view('footer') ?>