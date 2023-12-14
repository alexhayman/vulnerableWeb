<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Home']) ?>
<?php view('navbar') ?>
    
    <section  class="py-5 wrapper flex-grow-1">
        <div class="container">
            <h1>Hack Me!</h1>
            <h1>Disclaimer</h1>
            <div class="col-8">
                <ul>
                    <li><h5>All the information provided on this site are for educational purposes only. The site is no way responsible for any misuse of the information.</h5></li>
                    <li><h5>You shall not misuse the information to gain unauthorised access. However you may try out these hacks on your own computer at your own risk. Performing hack attempts (without permission) on computers that you do not own is illegal.</h5></li>
                    <li><h5>All the information on this site are meant for developing Hacker Defense attitude among the users and help preventing the hack attacks. We insists that these information shall not be used for causing any kind of damage directly or indirectly. However you may try these codes on your own computer at your own risk.</h5></li>
                </ul>
            </div>
        </div>
    </section>

<?php view('footer') ?>
