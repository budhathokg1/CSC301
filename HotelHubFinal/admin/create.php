<?php 
    require_once('../_settings.php');
    require_once(APP_ROUTE."/functions/File.php");
    require_once(APP_ROUTE."/functions/HotelDB.php");
    require_once(APP_ROUTE."/layout/Template.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        Hotel::createHotel($_POST['hotel_name'], $_POST['img_url'], $_POST['streetName'], $_POST['city'], $_POST['state'], $_POST['zipCode']);
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
                        <label for="address">Street Name:</label>
                        <input required type="text" class="form-control" id="streetName" placeholder="Enter hotel Street" name="streetName">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">City:</label>
                        <input required type="text" class="form-control" id="city" placeholder="Enter hotel City" name="city">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">State:</label>
                        <input required type="text" class="form-control" id="state" placeholder="Enter hotel State" name="state">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Zip Code:</label>
                        <input required type="text" class="form-control" id="zipCode" placeholder="Enter hotel Zip Code" name="zipCode">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" class="form-control" id="image_url" placeholder="Enter hotel image url" name="img_url">
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