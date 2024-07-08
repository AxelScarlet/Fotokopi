<?php
// Include constant.php
include('../config/constants.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the 'foodID' and 'newPrice' fields are set
    if (isset($_POST['foodID'], $_POST['newPrice'])) {
        // Get the foodID and newPrice from the POST data
        $id = $_POST['foodID'];
        $price = $_POST['newPrice'];

        // Ensure numeric value for price (optional, depending on your requirements)
        $price = is_numeric($price) ? $price : 0;

        // Update the price in the database
        $sql = "UPDATE menu SET foodPrice = '$price' WHERE foodID = '$id'";
        $res = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($res) {
            // Update successful, set a success message in the session variable
            $_SESSION['update'] = "<div class='alert alert-success alert-dismissible'><button type='button' class='btn-close' data-bs-dismiss='alert'></button>Order Updated Successfully</div>";
        } else {
            // Update failed, set an error message in the session variable
            $_SESSION['update'] = "<div class='alert alert-danger alert-dismissible'><button type='button' class='btn-close' data-bs-dismiss='alert'></button>Failed to update order. Try again later.</div>";
        }
    } else {
        // Invalid or missing data, set an error message in the session variable
        $_SESSION['update'] = "<div class='alert alert-danger alert-dismissible'><button type='button' class='btn-close' data-bs-dismiss='alert'></button>Invalid data. Please try again.</div>";
    }
} else {
    // If the form is not submitted directly, redirect back to the viewMenu.php page
    header('location:' . SITEURL . 'Staff_Page/menuView.php');
    exit;
}

// Redirect back to the viewMenu.php page after processing the update
header('location:' . SITEURL . 'Staff_Page/menuView.php');
exit;
?>
