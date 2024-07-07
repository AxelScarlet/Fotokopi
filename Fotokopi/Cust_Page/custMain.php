<?php 
    include('partials/navbar.php');

?>

    <div>
        <div id="carouselIndex" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselIndex" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselIndex" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselIndex" data-bs-slide-to="2"></li>
            </ol>
            
            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../menu_pic/4.png" class="d-block w-100 " alt="Slide 1">
                    <div class="carousel-caption">
                        <h3>Tasty and Crispy</h3>
                        <p>Best Local Chicken Restaurant in the Town</p>
                      </div>
                </div>
                <div class="carousel-item">
                    <img src="../menu_pic/3.png" class="d-block w-100 " alt="Slide 2">
                    <div class="carousel-caption">
                        <h3>Savor The Taste</h3>
                        <p>An explosion of flavor in every bite!</p>
                      </div>
                </div>
                <div class="carousel-item">
                    <img src="../menu_pic/7.png" class="d-block w-100 " alt="Slide 3">
                    <div class="carousel-caption">
                        <h3>Satisfy Your Palate on a Budget</h3>
                        <p>Flavorful Delights at Affordable Prices</p>
                      </div>
                </div>
    
            </div>
            
            <!-- Controls -->
            <a class="carousel-control-prev" href="#carouselIndex" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndex" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="container bg1 text-justify rounded">
                    <br>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="#moreInfo1">More Info</button>
                    </div>
                    <div id="moreInfo1" class="collapse">
                        Info 1
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container bg1 text-justify rounded">
                    <br>
                    <img src="../menu_pic/1.png" class="d-block w-75 mx-auto rounded" alt="Crispy Chicken">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="#moreInfo2">More Info</button>
                    </div>
                    <div id="moreInfo2" class="collapse">
                        Info 1
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container text-justify rounded">
                    wassup
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
<?php include('partials/footer.php'); ?>