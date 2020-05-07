<?php 
    require_once('../_settings.php');
    require_once(APP_ROUTE."/functions/File.php");
    require_once(APP_ROUTE."/functions/HotelDB.php");
    require_once(APP_ROUTE.'/layout/Template.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        Hotel::updateHotel($_POST['id'], $_POST['hotel_name'], $_POST['img_url'], $_POST['streetName'], $_POST['city'], $_POST['state'], $_POST['zipCode']);
        header("Location: ../index.php"); 
        exit();
    }

    $id = $_GET['id'];
    $hotel = Hotel::getHotel($id);
    
    Template::Header();
?>

    <div class="container-fluid text-center">
        <h1>Edit <?=$hotel['hotelName'];?></h1>
    </div>

    <div class="container cs-body-overlap">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 overlap">
                <form action="edit.php?id=<?=$_GET['id']?>" method="post">
                    <div class="form-group">
                        <label for="hotel_name">Hotel Name:</label>
                        <input required type="text" class="form-control" id="hotel_name" placeholder="Enter hotel name" name="hotel_name" value="<?= $hotel['hotelName']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Street Name:</label>
                        <input required type="text" class="form-control" id="streetName" placeholder="Enter hotel Street" name="streetName" value="<?= $hotel['streetName'];?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">City:</label>
                        <input required type="text" class="form-control" id="city" placeholder="Enter hotel City" name="city" value="<?= $hotel['city'];?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">State:</label>
                        <input required type="text" class="form-control" id="state" placeholder="Enter hotel State" name="state" value="<?= $hotel['state'];?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Zip Code:</label>
                        <input required type="text" class="form-control" id="zipCode" placeholder="Enter hotel Zip Code" name="zipCode" value="<?= $hotel['zipCode'];?>">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" class="form-control" id="image_url" placeholder="Enter hotel image url" name="img_url" value="<?= $hotel['hotelImageUrl']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <a class="btn btn-md btn-primary" href="../index.php">Back</a>
                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
<?php Template::Footer(); ?> 