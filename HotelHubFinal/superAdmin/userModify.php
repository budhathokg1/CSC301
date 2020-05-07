<?php 
    session_start();
    require_once('../_settings.php');
    require_once(APP_ROUTE."/functions/File.php");
    require_once(APP_ROUTE."/functions/HotelDB.php");
    require_once(APP_ROUTE."/functions/UserManager.php");
    require_once(APP_ROUTE."/layout/Template.php");
    require_once(APP_ROUTE."/account/auth_library.php");

    $loginCheck=new User();

    if(!($loginCheck->is_logged("email") && $loginCheck->is_super_admin("email"))){
        header("Location: ../index.php"); 
        exit();
    }
    else{
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $error=UserManager::modifyUser($_POST['id'] ,$_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['userType']);
            if(isset($error{0})) echo $error;
            else{
                header("Location: UserConfig.php"); 
                exit();
            }
        }

        $id=$_GET['id'];
        $user=UserManager::getUser($id);
    }
    Template::Header();
?>
    
    <div class="container-fluid text-center">
        <h1>Modify <?php print($user['firstName']." ".$user['lastName']);?></h1>
    </div>

    <div class="container cs-body-overlap">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 overlap">
                <form action="userModify.php?id=<?=$_GET['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input required type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName" value="<?=$user['firstName']?>">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input required type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName" value="<?=$user['firstName']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input required type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?=$user['email']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input required type="text" class="form-control" id="password" placeholder="Enter password" name="password" value="<?=$user['password']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <input required type="text" class="form-control" id="userType" placeholder="Enter User Type" name="userType" value="<?=$user['userType']?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <a class="btn btn-md btn-info" href="UserConfig.php">Back To List</a><br/>  
                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

<?php Template::Footer(); ?> 