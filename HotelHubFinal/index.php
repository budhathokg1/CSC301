<?php 
session_start();
include_once("functions/File.php");
include_once("functions/HotelDB.php");    
require_once("account/auth_library.php");
include_once("layout/Template.php");
include_once("functions/UserManager.php");
    
$hotels = Hotel::getHotels();
$loginCheck = new User();
$isloggedIn = $loginCheck->is_logged('email');
$email = null;
$user = null;
$comments = null;
if($isloggedIn) {
  $email = $_SESSION['email'];
  $user = UserManager::getUserFromEmail($email);
  $comments = Hotel::getComments($email);
}

Template::Header();
?>
<?php
if(!$isloggedIn){
    echo'<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="account/signin.php">Sign In</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="account/signup.php">Sign Up</a>
  </li>
</ul>';
}
else{
    echo'<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="account/signout.php">Sign Out</a>
  </li>
</ul>';
}
?>
<div class="container-fluid text-center">
  <h1>HotelHub</h1>
</div>

<div class="container cs-body-overlap">

  <div class="row overlap">
    <div class="col-md-12">
      <br>
      <?php if($loginCheck->is_logged('email') && ($loginCheck->isAdmin('email') || $loginCheck->is_super_admin('email'))) echo'
          <div class="list-group">
            <a href="admin/create.php" class="list-group-item list-group-item-action">Add a New Hotel</a>
          </div>'?>
      <br>
      <?php
          foreach($hotels as $name=>$value) {
        ?>
      <div class="row hotel-card">
        <div class="col-md-4 background-card" style="background-image:url(<?php echo $value["hotelImageUrl"]; ?>)">
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <h3><?= $value["hotelName"]; ?></h3>
              <h5>Address:
                <?php print($value["streetName"]." ".$value["city"].", ".$value["state"]." ".$value["zipCode"]); ?>
              </h5>
              <a class="btn btn-md btn-primary" href="details.php?id=<?= $value["hotelID"]; ?>">Available Rooms</a>
              <?php if($loginCheck->is_logged('email') && ($loginCheck->isAdmin('email') || $loginCheck->is_super_admin('email'))){ ?>
              <a class="btn btn-md btn-info" href="admin/edit.php?id=<?= $value["hotelID"]; ?>">Edit</a>
              <a class="btn btn-md btn-danger" href="admin/delete.php?id=<?= $value["hotelID"]; ?>">Delete</a>
              <?php }?>
            </div>
          </div>
        </div>
        <?php if($isloggedIn) { ?>
        <div class="col-md-12">
          <h3>Comments</h3>
          <hr>
          <div class="comment-wrapper">
            <div class="panel panel-info">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-11">
                    <textarea id="comment-<?= $value["hotelID"]?>" class="form-control" placeholder="write a comment..."
                      rows="3"></textarea>
                    <span class="text-danger" id="error_comment-<?= $value["hotelID"]?>"></span>

                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn btn-info"
                      onclick="saveComment( <?= $value['hotelID']?>, '<?= $email?>', '<?= $user['firstName']?>', '<?= $user['lastName']?>')">Post</button> </div>
                </div>

                <div class="clearfix"></div>
                <br>
                <ul class="media-list" id="media-list-<?= $value["hotelID"] ?>">
                  <?php foreach($comments as $comment) {
                    if($comment['hotelID'] == $value['hotelID']) {
                    ?>
                  <li class="media">
                    <a href="#" class="pull-left">
                    </a>
                    <div class="media-body">
                      <span class="text-muted pull-right">
                        <small class="text-muted"><?= $comment['date']?></small>
                      </span>
                      <strong class="text-success"><?= $user['firstName']. " ". $user['lastName'] ?></strong>
                      <p>
                        <?= $comment['comment']?>
                      </p>
                    </div>
                  </li>
                  <?php 
                  }
                } 
                ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <script>
        function saveComment(hotelId, email, firstName, lastName) {
    comment = $("#comment-" + hotelId).val();
    if(comment.length < 4){
        errorSelector = $('#error_comment-' + hotelId);
        errorSelector.html("Comment must be more than 3 characters");
        return;
    } else{
        errorSelector = $('#error_comment-' + hotelId);
        errorSelector.html("");
    }
    jQuery.ajax({
        url: "functions/comment.php",
        data: 'hotelId=' + hotelId + '&email=' + email + '&comment=' + comment,
        type: "POST",
        success: function (data) {
            if(data=="success") {
                $('#comment-' + hotelId).val("");
                date = js_yyyy_mm_dd_hh_mm_ss();
                prependHtml = '<li class="media"><a href="#" class="pull-left"></a><div class="media-body"><span class="text-muted pull-right"><small class="text-muted">' + date + '</small></span><strong class="text-success">' + firstName + ' ' + lastName + '</strong><p>' + comment + '</p></div></li>';
                $('#media-list-' + hotelId).prepend(prependHtml);
            }
        },
        error: function () {}
    });
}

function js_yyyy_mm_dd_hh_mm_ss () {
    now = new Date();
    year = "" + now.getFullYear();
    month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
    day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
    hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
    minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
    second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
    return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
  }
  </script>
      </div>
      <br />
      <?php
          }
        ?>

    </div>
  </div>
  <?php
Template::Footer();
?>