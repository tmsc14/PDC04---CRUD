<?php 
// this for the database connection
include "db_connection.php";

  if (isset($_POST['update'])) {

    $first_name = $_POST['first_name'];

    $user_id = $_POST['user_id'];

    $last_name = $_POST['last_name'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "UPDATE  `users` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email', `password`='$password' WHERE `user_id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "Record updated successfully.";
      header('location: view.php');

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 
  }

  if (isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM `users` WHERE `user_id`='$user_id'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $first_name = $row['first_name'];

            $last_name = $row['last_name'];

            $email = $row['email'];

            $password = $row['password'];

            $user_id = $row['user_id'];

            $level = $row['level'];
        }
    }
  }


?>

<!DOCTYPE html>

<html>

<body>

<h2>Update Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    First name:<br>

    <input type="text" name="first_name" value="<?php echo $first_name; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

    <br>

    Last name:<br>

    <input type="text" name="last_name" value="<?php echo $last_name; ?>">

    <br>

    Email:<br>

    <input type="email" name="email" value="<?php echo $email; ?>">

    <br>

    Password:<br>

    <input type="password" name="password" value="<?php echo $password; ?>">

    <br>

    Level:<br>

    <input type="radio" name="level" value="1" <?php if($level==1){echo "checked";} ?>> Admin

    <input type="radio" name="level" value="2" <?php if($level==2){echo "checked";} ?>>User

    <br><br>

    <input type="submit" name="update" value="Update"> <input type="button" value="Go to Create Page" onclick="window.location.href = 'create.php';"> <input type="button" value="Go to View Page" onclick="window.location.href = 'view.php';">

  </fieldset>

</form>

</body>

</html>
