<?php
include ('partials/navbar.php');
include ('calculate.php');
?>


<div class="container bg-light p-5 my-5 jumbotron rounded">
    <h1>
        <center>Order Menu</center>
    </h1>
</div>

<div>
    <!-- Menu Listbox -->


    <div class="col-lg-12">
        <div class="container bg-light rounded">
            <br>
            <div class="row align-items-center">
                <div class="col">
                    <h4>Original Crispy Chicken</h4>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#moreInfoModal2">More Info</button>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>





    <!-- Modal 1-->
    <div class="modal fade" id="moreInfoModal1" tabindex="-1" aria-labelledby="moreInfoModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 1;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal1Label">Original Crispy Chicken - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/1.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Indulge in Original Crispy Chicken: Golden, crunchy perfection. Hand-selected, marinated, and
                            deep-fried to crispy satisfaction. Bite into tender, juicy bliss. Experience the ultimate
                            fried chicken sensation. Try it today and crave more. </p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <!-- item name -->
                                <input type="hidden" name="index" value="0">
                                <!-- qty -->
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[0]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[0]" value="Original Crispy Chicken">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>


    <!-- Modal 2 -->
    <div class="modal fade" id="moreInfoModal2" tabindex="-1" aria-labelledby="moreInfoModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm2" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 2;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $foodID = $row['foodID'];
                                $foodName = $row['foodName'];
                                $description = $row['foodDetails'];
                                $pricePerItem = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal2Label"><?php echo $foodName ?> - RM <?php echo $pricePerItem ?>
                            per item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/2.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p class="text-center"><?php echo $description ?></p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="1">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[1]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[1]" value="Spicy Crispy Chicken">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="modal fade" id="moreInfoModal3" tabindex="-1" aria-labelledby="moreInfoModal3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm3" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 3;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal3Label">Cheesy Crispy Chicken - RM 6.00 per item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/3.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Savor Cheesy Crispy Chicken: Crispy, golden perfection meets gooey, melted cheese. Indulge in
                            the irresistible blend of flavors. Try it today and experience cheesy delight.</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="2">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[2]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[2]" value="Cheesy Crispy Chicken">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>


    <!-- Modal 4 -->
    <div class="modal fade" id="moreInfoModal4" tabindex="-1" aria-labelledby="moreInfoModal4Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm4" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 4;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal4Label">Original Crispy Chicken Popcorn - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/4.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Original Crispy Chicken Popcorn: Bite-sized flavor bombs. Crispy, juicy, and oh-so-addictive.
                            Experience the ultimate snacking sensation. Try it today and indulge in popcorn perfection.
                        </p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="3">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[3]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[3]" value="Original Crispy Chicken Popcorn">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 5 -->
    <div class="modal fade" id="moreInfoModal5" tabindex="-1" aria-labelledby="moreInfoModal5Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm5" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 5;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal5Label">Spicy Crispy Chicken Popcorn - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/6.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Spicy Crispy Chicken Popcorn: Explosive flavor in every bite. Fiery, crispy perfection. Try
                            it today and ignite your taste buds.</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="4">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[4]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[4]" value="Spicy Crispy Chicken Popcorn">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 6 -->
    <div class="modal fade" id="moreInfoModal6" tabindex="-1" aria-labelledby="moreInfoModal6Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm6" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 6;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal6Label">Cheesy Crispy Chicken Popcorn - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/7.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Cheesy Crispy Chicken Popcorn: Irresistible cheesy bites. Crispy, gooey perfection. Try it
                            today and indulge in cheesy delight.</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="5">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[5]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[5]" value="Cheesy Crispy Chicken Popcorn">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 7 -->
    <div class="modal fade" id="moreInfoModal7" tabindex="-1" aria-labelledby="moreInfoModal7Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm7" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 7;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal7Label">Original Crispy Chicken Satay - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/8.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Original Crispy Chicken Satay: Irresistible skewered delight. Crispy perfection meets savory
                            satay flavor. Try it today and savor the original goodness.</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="6">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[6]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[6]" value="Original Crispy Chicken Satay">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 8 -->
    <div class="modal fade" id="moreInfoModal8" tabindex="-1" aria-labelledby="moreInfoModal8Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm8" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 8;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal8Label">Spicy Crispy Chicken Satay - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/9.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Spicy Crispy Chicken Satay: Fiery, flavorful skewers. Perfectly spiced and irresistibly
                            crispy. Try it today and ignite your taste buds.</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="7">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[7]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[7]" value="Spicy Crispy Chicken Satay">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 9 -->
    <div class="modal fade" id="moreInfoModal9" tabindex="-1" aria-labelledby="moreInfoModal9Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm9" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 9;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal9Label">Cheesy Crispy Chicken Satay - RM
                            <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/10.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Cheesy Crispy Chicken Satay: Melty, savory skewered delight. Crispy perfection meets cheesy
                            goodness. Try it today and indulge in cheesy bliss.</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="8">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[8]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[8]" value="Cheesy Crispy Chicken Satay">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 10 -->
    <div class="modal fade" id="moreInfoModal10" tabindex="-1" aria-labelledby="moreInfoModal10Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm10" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 10;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal10Label">Cheese Sauce - RM <?php echo $price ?> per
                            item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/11.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Creamy and flavorful sauce made primarily from cheese</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="9">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[9]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[9]" value="Cheese Sauce">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 11 -->
    <div class="modal fade" id="moreInfoModal11" tabindex="-1" aria-labelledby="moreInfoModal11Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm11" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 11;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal11Label">Spicy Sauce - RM <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/12.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>Crafted with carefully selected chili peppers, this sauce brings the perfect amount of heat
                            to tantalize your taste buds</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="10">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[10]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[10]" value="Spicy Sauce">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

    <!-- Modal 12 -->
    <div class="modal fade" id="moreInfoModal12" tabindex="-1" aria-labelledby="moreInfoModal12Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="myForm12" method="POST" action=""> <!-- Add the <form> element and specify the action -->
                    <div class="modal-header">
                        <?php
                        $priceID = 12;
                        $sql = "SELECT * FROM menu WHERE foodID = $priceID";
                        // execute query
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            // Fetch the data from the result set into the $row variable
                            $row = mysqli_fetch_assoc($res);

                            // Check if a row was found
                            if ($row) {
                                $price = $row['foodPrice'];
                            } else {
                                // Handle the case when no row was found for the given $priceID
                                $price = "N/A";
                            }
                        } else {
                            // Handle the case when there was an error with the query
                            $price = "Error fetching data";
                        }
                        ?>
                        <h5 class="modal-title" id="moreInfoModal12Label">BBQ Sauce - RM <?php echo $price ?> per item
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex w-75 justify-content-center">
                            <img src="../menu_pic/13.png" alt="Chicken" class="d-flex w-75">
                        </div>
                        <p>BBQ sauce, short for barbecue sauce, is a mouthwatering condiment that brings a delightful
                            combination of smoky, sweet, and tangy flavors</p>
                        <div class="d-flex justify-content-end">
                            <div class="input-group mb-3 w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity:</span>
                                </div>
                                <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                <!-- item name -->
                                <input type="hidden" name="index" value="11">
                                <!-- qty -->
                                <input type="text" class="form-control text-center" id="orderQtyInput"
                                    name="quantity[11]" value="1" readonly>
                                <!-- Add the "name" attribute to the input -->
                                <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                            name="foodName[11]" value="BBQ Sauce">Add to Cart</button>
                        <!-- Change the button type to "submit" -->
                    </div>
                </form> <!-- Close the form -->
            </div>
        </div>
    </div>

</div>

<br>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var decreaseQtyBtns = document.querySelectorAll('#decreaseQtyBtn');
        var increaseQtyBtns = document.querySelectorAll('#increaseQtyBtn');
        var orderQtyInputs = document.querySelectorAll('#orderQtyInput');

        // Add event listeners to decrease quantity buttons
        decreaseQtyBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = this.parentNode.querySelector('input[type="text"]');
                var value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });
        });

        // Add event listeners to increase quantity buttons
        increaseQtyBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = this.parentNode.querySelector('input[type="text"]');
                var value = parseInt(input.value);
                input.value = value + 1;
            });
        });
    });
</script>
<?php include ('partials/footer.php'); ?>