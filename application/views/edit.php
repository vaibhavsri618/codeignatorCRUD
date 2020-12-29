<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
    <div class="text-center">
    <h1 class="text-white nav-header">Registration Form</h1></div>
    </div>
   <div class="container py-5">


   <?php
$success = $this->session->userdata('success');


$failure = $this->session->userdata('failure');
if ($success != "") {
    ?>

<div class="alert alert-success"><?php echo $success ?></div>
        <?php
} else if($failure!="") {
    ?>

<div class="alert alert-warning"><?php echo $failure ?></div>


  <?php
}
?>


   <?php
if (!empty($edit)) {

    foreach ($edit as $ket => $val) {

        ?>
 <form method="post" action="<?php echo base_url() . 'index.php/Adduser/update/' . $val['user_id']; ?>">
   <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" id="name" name="user_name" value="<?php echo $val['user_name'] ?>" placeholder="Enter name">
    <h6 class="text-danger"><?php echo form_error('user_name'); ?></h6>
  </div>


  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $val['email'] ?>" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <h6 class="text-danger"><?php echo form_error('email'); ?></h6>
  </div>


  <div class="text-center">
  <button type="submit" class="btn btn-primary">Update</button>
  <a class="btn btn-warning" href="<?php echo base_url().'index.php/Adduser/show';?>">Cancel</a>

  </div>
  <?php
}
}?>
</form>
   </div>

   </div>
</body>
</html>


