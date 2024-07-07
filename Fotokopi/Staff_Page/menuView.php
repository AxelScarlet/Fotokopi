<?php include('partials/menu.php');?>
    <div class="container mt-3">
        <div class="mt-4 p-5 bg-light text-bg-light rounded">
            <h1>
                <img src="../pic/Logo.png" alt="Company Logo" width="200px">
                View Menu
            </h1>
        </div>
    </div>
    <br>
    <div class="container bg-light rounded">
        <br>
        <div class="container">
            <?php
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
        </div>
        <div class="container">
            <!-- Search -->
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name = "foodID" class="form-control" placeholder="Search foodID">
                            <button class="btn btn-dark" name="search" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a href="updatePrice.php" class="btn btn-dark">Reload Table</a>
                </div>
                <div>
                    <button class="btn btn-dark me-2" onclick="sortTable(false)">Sort Descending</button>
                    <button class="btn btn-dark" onclick="sortTable(true)">Sort Ascending</button>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">foodID</th>
                    <th class="text-center w-25">Food Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Price Per Item</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>            
            <tbody>
                <?php
                if (isset($_POST['search'])) {
                    $searchFoodID = $_POST['foodID'];
                    // Query to get the specific menu based on the search
                    $sql = "SELECT * FROM menu WHERE foodID = '$searchFoodID'";
                } else {
                    // Query to get all menu items
                    $sql = "SELECT * FROM menu";
                }

                // Execute query
                $res = mysqli_query($conn, $sql);

                if ($res && mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        // Retrieve data from the database
                        $foodID = $row['foodID'];
                        $foodName = $row['foodName'];
                        $description = $row['foodDetails'];
                        $pricePerItem = $row['foodPrice'];
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $foodID; ?></td>
                            <td><?php echo $foodName; ?></td>
                            <td><?php echo $description; ?></td>
                            <td class="text-center"><?php echo $pricePerItem; ?></td>
                            <td class="text-center">
                                <!-- Button to trigger the modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatePriceModal<?php echo $foodID; ?>">
                                    Update Price
                                </button>
                            </td>
                        </tr>

                        <!-- Modal for updating the price -->
                        <div class="modal fade" id="updatePriceModal<?php echo $foodID; ?>" tabindex="-1" role="dialog" aria-labelledby="updatePriceModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updatePriceModalLabel">Update Price for <?php echo $foodName; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form to update the price -->
                                        <form action="updatePrice.php?id=<?php echo $foodID?>" method="post">
                                            <input type="hidden" name="foodID" value="<?php echo $foodID; ?>">
                                            <div class="mb-3">
                                                <label for="newPrice" class="form-label">New Price Per Item</label>
                                                <input type="text" class="form-control" id="newPrice" name="newPrice" placeholder="Enter new price" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">No menu items found</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
        <br>
    </div>
    <br>
    
<?php include('partials/footer.php');?>

<script>
    // JavaScript function to sort the table based on foodID
    function sortTable(ascending) {
        let table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector("table");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[0]; // Column index 0 for foodID
                y = rows[i + 1].getElementsByTagName("TD")[0]; // Column index 0 for foodID
                if (ascending ? parseInt(x.innerHTML) > parseInt(y.innerHTML) : parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>

