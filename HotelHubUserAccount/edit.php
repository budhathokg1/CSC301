<?php 
    include("functions.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id=$_POST['id'];
        unset($_POST['id']);
        modifyJSON("hotels.json", $_POST, $id);
        header("Location: index.php"); 
        exit();
    }
    $id = $_GET['id'];
    $hotels = readJSON('hotels.json', $id);
    include('header.php');
?>

<body>

    <div class="container-fluid text-center">
        <h1>Edit <?=$hotels['hotel_name'];?></h1>
    </div>

    <div class="container cs-body-overlap">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 overlap">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="hotel_name">Hotel Name:</label>
                        <input required type="text" class="form-control" id="hotel_name" placeholder="Enter hotel name" name="hotel_name" value="<?= $hotels['hotel_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input required type="text" class="form-control" id="address" placeholder="Enter hotel address" name="address" value="<?= $hotels['address']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" class="form-control" id="image_url" placeholder="Enter hotel image url" name="img_url" value="<?= $hotels['img_url']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="price_per_night">Price per Night:</label>
                        <input required type="number" class="form-control" id="price_per_night" placeholder="Enter price per night" name="price_per_night" value="<?= $hotels['price_per_night']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

</body>

</html>