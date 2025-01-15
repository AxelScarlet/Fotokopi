<?php
include('partials/navbar.php');

$id = $_GET['id'] ?? '';

// Store the value of $id in a separate variable
$orderId = $id;

// Fetch the order details from the database
$conn = mysqli_connect('localhost', 'root', '', 'fotokopi') or die(mysqli_error($conn));

$sql = "SELECT * FROM ordermenu WHERE orderID = '$orderId'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$orderData = mysqli_fetch_assoc($result);

// Fetch the cart items associated with the order
$sql2 = "SELECT * FROM cart WHERE orderID = '$orderId'";
$cartResult = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$cartItems = [];
while ($row = mysqli_fetch_assoc($cartResult)) {
    $cartItems[] = $row;
}

?>

<div class="container w-50 bg-light rounded text-center">
    <br>
    <img src="../pic/successLogo.png" alt="">
    <br>
    <h3>Order Success</h3>
    <br>
    <h5>Order Details</h5>
    <p>Order Date: <?php echo $orderData['orderDate']; ?></p>
    <p>Eat Option: <?php echo $orderData['eatOption']; ?></p>
    <p>Payment Method: <?php echo $orderData['paymentMethod']; ?></p>
    <p>Total Amount: RM <?php echo number_format($orderData['grandTotal'], 2); ?></p>
    <br>
    <h5>Items</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Quantity</th>
                <th>Total Price (RM)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?php echo $item['foodName']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($item['totalPrice'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <button class="btn btn-dark" onclick="window.print()">Print Bill</button>
    <br><br>
    <a href="order.php?id=<?php echo $orderId; ?>" class="btn btn-dark">Return to Order Page</a>
    <br><br>
</div>

<?php
// Clear all session data
session_unset();
?>

<br><br>
<?php include('partials/footer.php'); ?>