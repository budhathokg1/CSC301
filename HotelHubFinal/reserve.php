<?php 
    session_start();
    require_once('_settings.php');
    require_once(APP_ROUTE."/functions/File.php");
    require_once(APP_ROUTE."/functions/HotelDB.php");
    require_once(APP_ROUTE.'/layout/Template.php');
    require_once(APP_ROUTE.'/functions/UserManager.php');
    require_once(APP_ROUTE.'/functions/ReservationManager.php');
    require_once(APP_ROUTE.'/account/auth_library.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $roomNum = $_GET['id'];
        $id_user = UserManager::getUserIDFromEmail($_SESSION['email']);
        $hotel = Hotel::getHotelIDFromRoomNum($roomNum);
        $error = Reservation::MakeReservation($id_user, $hotel, $roomNum, $_POST['arriveDate'], $_POST['departDate']);
        if(isset($error{0})) echo $error;
    }

    $roomNum = $_GET['id'];
    $id_user = UserManager::getUserIDFromEmail($_SESSION['email']);
    $hotel = Hotel::getHotelIDFromRoomNum($roomNum);
    $loginCheck = new User();

    if(!($loginCheck->is_logged("email"))){
        header("Location: ../index.php"); 
        exit();
    }
    
    Template::Header();
?>
    <ul class="nav">
        <li class="nav-item">
         <a class="nav-link active" href="index.php">Back to Home</a>
        </li>
    </ul>
    <div class="container-fluid text-center">
        <h1>Make a Reservation</h1>
    </div>

    <div class="container cs-body-overlap">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 overlap">
                <br>
                <form action="reserve.php?id=<?=$_GET['id']?>" method="post">
                    <div class="form-group">
                        <label for="arriveDate">Arrival Date:</label>
                        <input required type="date" class="form-control" id="arriveDate" name="arriveDate" required>
                    </div>
                    <div class="form-group">
                        <label for="departDate">Departure Date:</label>
                        <input required type="date" class="form-control" id="departDate" name="departDate" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="ccNum">Credit Card Number:</label>
                        <input required type="text" class="form-control" id="ccNum" name="ccNum" required minlength="16">
                    </div>
                    
                    <div class="form-group">
                        <label for="expDate">Exp. Date:</label>
                        <input required type="text" class="form-control" id="expDate" name="expDate" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">CVV Code:</label>
                        <input required type="text" class="form-control" id="CVV" name="CVV" required>
                    </div>
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
<?php Template::Footer(); ?> 