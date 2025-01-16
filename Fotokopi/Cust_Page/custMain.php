<?php
include('partials/navbar.php');
include('calculate.php');

// Fetch top pick items based on cart count for modal
$sql = "SELECT 
    menu.foodID, 
    menu.foodName, 
    menu.foodDetails, 
    menu.foodPrice, 
    menu.menuPic,
    SUM(cart.quantity) AS total_quantity
FROM 
    cart
INNER JOIN 
    menu ON cart.foodID = menu.foodID
GROUP BY 
    menu.foodID, menu.foodName, menu.foodDetails, menu.foodPrice, menu.menuPic
ORDER BY 
    total_quantity DESC
LIMIT 1;";

// Fetch top pick items based on cart count for AI
$sql3 = "SELECT 
    menu.foodID, 
    menu.foodName, 
    menu.foodDetails, 
    menu.foodPrice, 
    menu.menuPic,
    SUM(cart.quantity) AS total_quantity
FROM 
    cart
INNER JOIN 
    menu ON cart.foodID = menu.foodID
GROUP BY 
    menu.foodID, menu.foodName, menu.foodDetails, menu.foodPrice, menu.menuPic
ORDER BY 
    total_quantity DESC
LIMIT 1;";

// Fetch the latest updated product
$sql2 = "SELECT 
    menu.foodID, 
    menu.foodName, 
    menu.foodDetails, 
    menu.foodPrice, 
    menu.menuPic,
    menu.updateDate 
FROM 
    menu 
ORDER BY 
    updateDate DESC 
LIMIT 1;";

$res = mysqli_query($conn, $sql);
$res2 = mysqli_query($conn, $sql2);
$res3 = mysqli_query($conn, $sql3);
$topPick = mysqli_fetch_assoc($res3);
echo "<script>var topPickItem = " . json_encode($topPick) . ";</script>";
?>

<div>
    <div id="carouselIndex" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselIndex" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselIndex" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselIndex" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../menu_pic/4.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h3>Sip, Savor, Smile</h3>
                    <p>Where Coffee Meets Comfort.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../menu_pic/3.png" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h3>Savor The Taste</h3>
                    <p>Pastry Perfection, Coffee Connection.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../menu_pic/7.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h3>Warmth in Every Sip and Bite</h3>
                    <p>Flavorful Delights at Affordable Prices.</p>
                </div>
            </div>
        </div>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="container promoPic1 rounded">
                    <br><br><br><br><br><br><br><br><br><br>
                    <h1 class="text-light">Top Pick Suggestion</h1>
                    <?php if ($res && mysqli_num_rows($res) > 0) {
                        $topPick = mysqli_fetch_assoc($res); ?>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#moreInfoModal<?php echo $topPick['foodID']; ?>">
                            More Info
                        </button>
                    <?php } ?>
                    <!-- AI Chatbot Suggestion -->
                    <!-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#chatbotModal">
                        AI Chatbot Suggestion
                    </button> -->
                    <br>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container promoPic2 rounded">
                    <br><br><br><br><br><br><br><br><br><br>
                    <h1 class="text-light">Latest Product</h1>
                    <?php if ($res2 && mysqli_num_rows($res2) > 0) {
                        $latestProduct = mysqli_fetch_assoc($res2); ?>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#latestProductModal<?php echo $latestProduct['foodID']; ?>">
                            View Latest Product
                        </button>
                    <?php } ?>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="container orderPage rounded text-center">
                    <br><br>
                    <button class="btn1 rounded">
                        <a href="order.php?id=<?php echo $id ?>" class="btn text-light">Start Order</a>
                    </button>
                    <br><br>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="container MyProfile rounded text-center">
                <br><br>
                <button class="btn1 rounded">
                    <a href="custProfile.php?id=<?php echo $id ?>" class="btn text-light">My Profile</a>
                </button>
                <!-- Button to open the chatbox -->
                <button class="btn btn-dark rounded" id="chatbotBtn" onclick="openChatbot()">Chat with AI</button>
                <br><br>
            </div>
        </div>
    </div>
</div>
<br>

<?php
if ($res && mysqli_num_rows($res) > 0) {
    mysqli_data_seek($res, 0);
    while ($row = mysqli_fetch_assoc($res)) {
        $foodID = $row['foodID'];
        $foodName = $row['foodName'];
        $description = $row['foodDetails'];
        $pricePerItem = $row['foodPrice'];
        $menuPic = $row['menuPic'];
        ?>
        <div class="modal fade" id="moreInfoModal<?php echo $foodID; ?>" tabindex="-1"
            aria-labelledby="moreInfoModal<?php echo $foodID; ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="myForm<?php echo $foodID; ?>" method="POST" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="moreInfoModal<?php echo $foodID; ?>Label">
                                <?php echo htmlspecialchars($foodName); ?> - RM <?php echo htmlspecialchars($pricePerItem); ?>
                                per item
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container d-flex w-75 justify-content-center">
                                <img src="<?php echo htmlspecialchars($menuPic); ?>"
                                    alt="<?php echo htmlspecialchars($foodName); ?>" class="d-flex w-75">
                            </div>
                            <p class="text-center"><?php echo htmlspecialchars($description); ?></p>
                            <div class="d-flex justify-content-end">
                                <div class="input-group mb-3 w-50">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Quantity:</span>
                                    </div>
                                    <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                    <input type="hidden" name="index" value="<?php echo $foodID; ?>">
                                    <input type="text" class="form-control text-center" id="orderQtyInput"
                                        name="quantity[<?php echo $foodID; ?>]" value="1" readonly>
                                    <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                                name="foodName[<?php echo $foodID; ?>]" value="<?php echo htmlspecialchars($foodName); ?>">Add
                                to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "No item available for this section";
}
?>

<?php
if ($res2 && mysqli_num_rows($res2) > 0) {
    mysqli_data_seek($res2, 0);
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $latestFoodID = $row2['foodID'];
        $latestFoodName = $row2['foodName'];
        $latestDescription = $row2['foodDetails'];
        $latestPricePerItem = $row2['foodPrice'];
        $latestMenuPic = $row2['menuPic'];
        ?>
        <div class="modal fade" id="latestProductModal<?php echo $latestFoodID; ?>" tabindex="-1"
            aria-labelledby="latestProductModal<?php echo $latestFoodID; ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="myForm<?php echo $latestFoodID; ?>" method="POST" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="latestProductModal<?php echo $latestFoodID; ?>Label">
                                <?php echo htmlspecialchars($latestFoodName); ?> - RM
                                <?php echo htmlspecialchars($latestPricePerItem); ?>
                                per item
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container d-flex w-75 justify-content-center">
                                <img src="<?php echo htmlspecialchars($latestMenuPic); ?>"
                                    alt="<?php echo htmlspecialchars($latestFoodName); ?>" class="d-flex w-75">
                            </div>
                            <p class="text-center"><?php echo htmlspecialchars($latestDescription); ?></p>
                            <div class="d-flex justify-content-end">
                                <div class="input-group mb-3 w-50">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Quantity:</span>
                                    </div>
                                    <button class="btn btn-dark" type="button" id="decreaseQtyBtn">-</button>
                                    <input type="hidden" name="index" value="<?php echo $latestFoodID; ?>">
                                    <input type="text" class="form-control text-center" id="orderQtyInput"
                                        name="quantity[<?php echo $latestFoodID; ?>]" value="1" readonly>
                                    <button class="btn btn-dark" type="button" id="increaseQtyBtn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark" id="addToCartBtn" data-bs-dismiss="modal"
                                name="foodName[<?php echo $latestFoodID; ?>]"
                                value="<?php echo htmlspecialchars($latestFoodName); ?>">Add
                                to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "No latest product available";
}
?>



<!-- AI Chatbot Modal -->
<div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatbotModalLabel">AI Chatbot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="chatbot-messages"
                    style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;"></div>
                <div class="input-group mt-3">
                    <input type="text" id="chatbot-input" class="form-control" placeholder="Ask me anything...">
                    <button id="chatbot-send" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var decreaseQtyBtns = document.querySelectorAll('#decreaseQtyBtn');
        var increaseQtyBtns = document.querySelectorAll('#increaseQtyBtn');
        var orderQtyInputs = document.querySelectorAll('#orderQtyInput');

        decreaseQtyBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = this.parentNode.querySelector('input[type="text"]');
                var value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });
        });

        increaseQtyBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = this.parentNode.querySelector('input[type="text"]');
                var value = parseInt(input.value);
                input.value = value + 1;
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chatbotMessages = document.getElementById("chatbot-messages");
        const chatbotInput = document.getElementById("chatbot-input");
        const chatbotSend = document.getElementById("chatbot-send");

        chatbotSend.addEventListener("click", function () {
            const userInput = chatbotInput.value;
            if (userInput.trim() !== "") {
                addMessage("You", userInput);
                chatbotInput.value = "";

                // Simulate chatbot response
                setTimeout(() => {
                    handleChatbotResponse(userInput);
                }, 500);
            }
        });

        chatbotInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                chatbotSend.click();
            }
        });

        function addMessage(sender, message) {
            const messageElement = document.createElement("div");
            messageElement.classList.add("chatbot-message");
            messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
            chatbotMessages.appendChild(messageElement);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }

        function handleChatbotResponse(userInput) {
            let response = "Sorry, I didn't understand that.";

            if (userInput.toLowerCase().includes("how to use")) {
                response = "To use this website, navigate through the menu, select items, and proceed to cart,select your order setup and confirm payment.";
            } else if (userInput.toLowerCase().includes("top item suggestion") || userInput.toLowerCase().includes("suggest")) {
                if (typeof topPickItem !== 'undefined' && topPickItem !== null) {
                    response = `Our top item is ${topPickItem.foodName} - ${topPickItem.foodDetails}. It costs RM ${topPickItem.foodPrice}.`;
                } else {
                    response = "We currently have no top items to suggest.";
                }
            } else if (userInput.toLowerCase().includes("refund")) {
                response = "For refunds, just click the refund button in order history and if already processing or received, you need to cancel it. Then you can click the refund button. REMINDER : 'Refund request only valid for 2 days.'";
            }  else if (userInput.toLowerCase().includes("when")) {
                response = "When your refund requested, the refund will be checked if it is valid or not. Once proven valid, it will be approved.";
            }
            addMessage("Chatbot", response);
        }

        window.openChatbot = function () {
            var myModal = new bootstrap.Modal(document.getElementById('chatbotModal'), {
                keyboard: false
            });
            myModal.show();
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>