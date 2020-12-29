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
    <h1 class="text-white nav-header">User Details</h1>
    <div class="row">
    <h3 class="text-white ml-auto">Welcome <?php 
    
   
    
    echo $this->session->userdata('userdata') ?></h3>
    </div>
    </div>

    </div>
   <div class="container py-5">
   <?php
$success = $this->session->userdata('success');

$failure = $this->session->userdata('failure');
if ($success != "") {
    ?>

<div class="alert alert-success"><?php echo $success ?></div>
        <?php
} else if ($failure != "") {
    ?>

<div class="alert alert-warning"><?php echo $failure ?></div>


  <?php
}
?>
<div class="row">
<a class="btn btn-primary mb-5 ml-3" href="<?php echo base_url() . 'index.php/Adduser/user'; ?>">Add User</a>
<a class="btn btn-primary mb-5 ml-auto mr-3" href="<?php echo base_url() . 'index.php/Adduser/logout'; ?>">Logout</a>
</div>


   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">User_Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Dateofsignup.</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody><?php
// print_r($details);
if (!empty($details)) {

    foreach ($details as $key => $val) {

        ?>
    <tr>
      <th scope="row"><?php echo $val['user_id'] ?></th>
      <td><?php echo $val['user_name'] ?></td>
      <td><?php echo $val['email'] ?></td>
      <td><?php echo $val['dateofsignup'] ?></td>
      <td><a href="<?php echo base_url() . 'index.php/Adduser/edit/' . $val['user_id'] ?>">Edit / </a>


      <a href="<?php echo base_url() . 'index.php/Adduser/delete/' . $val['user_id']; ?>" onclick="return confirm('Are you sure want to Delete this User?')">Delete</a></td>




    </tr>

    <?php
}
}
?>
  </tbody>
</table>

</div>
</body>
</html>
