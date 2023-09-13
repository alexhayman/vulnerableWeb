<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Home']) ?>
<?php view('navbar') ?>
    
    <section  class="py-5 wrapper flex-grow-1">
        <div class="container">
            <div class="row pb-5">
                <div class="col-md-6 py-5">
                    <h1>The Next Generation Store</h1>
                    <h4 class="pt-3">
                        We sell pixelated items <br> 
                        created by individuals
                    </h4>
                    <a href="shop.php" class="mt-3 btn btn-primary btn-lg">
                        Shop Now!
                    </a>
                </div>
                <div class="col-md-6 px-5 py-4">  
                    <img src="img/trolly.png" class="w-50 d-none d-md-block">
                </div>
            </div>
            <div class="row py-5">
                <div class="col-md-4 py-3">
                    <div class="card">
                        <div class="card-title text-center border-bottom py-4">
                            <h3>Fast Delivery</h3>
                        </div>
                        <div class="card-body">
                            <p>We offer next day delivery to all customers</p>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4  py-3">
                    <div class="card">
                        <div class="card-title text-center border-bottom py-4">
                            <h3>Cheap Prices</h3>
                        </div>
                        <div class="card-body">
                            <p>Our deals are cheaper than all our competitors</p>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4  py-3">
                    <div class="card">
                        <div class="card-title text-center border-bottom py-4">
                                <h3>Happy Customers</h3>
                        </div>
                            <div class="card-body">
                                <p>9/10 customers said they will shop again</p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section  class="pb-4 pt-5 text-center text-sm-star">
    </section>
  

<?php view('footer') ?>
