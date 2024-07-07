<?php
include('partials/navbar.php');

// Check if custID is provided in the URL
// get the id
$id = $_GET['id'];
// create sql query
$sql = "SELECT * FROM customer WHERE custID=$id";

// execute query
$res = mysqli_query($conn, $sql);

// check if the query executed successfully
if ($res == true) {
    // check if the staff exists
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $custName = $row['custName'];
        $gender = $row['custGender'];
        $phoneNum = $row['custPhoneNumber'];
        $email = $row['custEmail'];
    } else {
        header('location: ' . SITEURL . 'Cust_Page/order.php?id='.$id);
        exit(); // terminate the script
    }
}

    // Display the customer information
?>

    <div class="container bg-light p-5 my-5 jumbotron rounded">
        <h1><center>Customer Information</center></h1>
        <p><strong>Customer ID :</strong> <?php echo $id; ?></p>
        <p><strong>Name:</strong> <?php echo $custName; ?></p>
        <p><strong>Gender:</strong> <?php echo $gender ?></p>
        <p><strong>Phone Number:</strong> <?php echo $phoneNum; ?></p>
        <p><strong>Email:</strong> <?php echo $email ?></p>
        <br>
        <a href="updateUser.php?id=<?php echo $id;?>" class="btn btn-success">Update Information</a>
        <a href="updatePassword.php?id=<?php echo $id;?>" class="btn btn-primary">Change Password</a>
    </div>

    <br>
<?php

include('partials/footer.php');
?>