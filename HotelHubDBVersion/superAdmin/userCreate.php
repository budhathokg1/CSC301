<?php 
    require_once("../functions/File.php");
    require_once("../functions/HotelDB.php");
    require_once("../functions/UserManager.php");
    require_once("../layout/Template.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $error=UserManager::createUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['userType']);
        if(isset($error{0})) echo $error;
        else{
            header("Location: UserConfig.php"); 
            exit();
        }
    }
   
    Template::Header();
?>

    <div class="container-fluid text-center">
        <h1>Add New User</h1>
    </div>

    <div class="container cs-body-overlap">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 overlap">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input required type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input required type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input required type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input required type="text" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
                    
                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <input required type="text" class="form-control" id="userType" placeholder="Enter User Type" name="userType">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <a class="btn btn-md btn-info" href="UserConfig.php">Back To List</a><br/>  
                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

<?php Template::Footer(); ?> 