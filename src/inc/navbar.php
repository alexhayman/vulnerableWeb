<?php $base_url = ""; ?>
    <nav class="navbar navbar-expand-lg navbar-dark py-3">
        <div class="container">
            <a href="index.php" class="navbar-brand">Pixelated</a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>shop.php">Shop</a>
                </li>
            </ul>
            <ul class="navbar-nav">
            <?php if (isset($_SESSION['username'])): ?>
                <?php if ($_SESSION['username'] == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>admin.php">Admin</a>
                    </li>
                <?php endif; ?>
                </li>
                    <a class="nav-link" href="<?= $base_url ?>account.php">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>logout.php">Log Out</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>login.php">Login</a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </nav>