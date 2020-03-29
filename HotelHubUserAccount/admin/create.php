<?php 
    require_once("../functions/File.php");
    require_once("../layout/Template.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        File::modifyJSON("../assets/data/hotels.json", $_POST);
        header("Location: ../index.php"); 
        exit();
    }
   
    Template::Header();
?>

    <div class="container-fluid text-center">
        <h1>Add Hotel</h1>
    </div>

    <div class="container cs-body-overlap">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 overlap">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="hotel_name">Hotel Name:</label>
                        <input required type="text" class="form-control" id="hotel_name" placeholder="Enter hotel name" name="hotel_name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input required type="text" class="form-control" id="address" placeholder="Enter hotel address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" class="form-control" id="image_url" placeholder="Enter hotel image url" name="img_url">
                    </div>
                    <div class="form-group">
                        <label for="price_per_night">Price per Night:</label>
                        <input required type="number" class="form-control" id="price_per_night" placeholder="Enter price per night" name="price_per_night">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <a class="btn btn-md btn-info" href="../index.php">Back To Home</a><br/>  
                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

<?php Template::Footer(); ?> 