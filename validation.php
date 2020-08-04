<?php
  $errors = [];
  $firstName = $lastName = $pNumber = $emailId = $pass = $confirmPass = "";

  // first name validation
  if(isset($_POST['submit'])) {
    if(empty($_POST['fname'])) {
      $errors['fname'] = "first name field is empty";
    } else if (!preg_match("/^[a-zA-Z]*$/", $_POST['fname'])) {
      $errors['fname'] = "only letters allowed";
    } else {
      $firstName = $_POST['fname'];
    }
    
    // last name validation
    if(empty($_POST['lname'])) {
      $errors['lname'] = "last name field is empty";
    } else if (!preg_match("/^[a-zA-Z]*$/", $_POST['lname'])) {
      $errors['lname'] = "only letters allowed";
    } else {
      $lastName = $_POST['lname'];
    }

    // Email validation
    if(empty($_POST['email'])) {
      $errors['email'] = "email field is empty";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "invalid email id";
    } else {
      $emailId = $_POST['email'];
    }

    // Phone number validation
    if(empty($_POST['phone'])) {
      $errors['phone'] = "phone number field is empty";
    } else if (!preg_match("/^[0-9]+$/", $_POST['phone'])) {
      $errors['phone'] = "only numbers are allowed";
    } else if (strlen($_POST["phone"]) <= '8' && strlen($_POST["phone"]) >= '15') {
      $errors['phone'] = "phone number must be of range 8 to 15 digits";
    } else {
      $pNumber = $_POST['phone'];
    }

    // Password validation
    if(empty($_POST['password'])) {
      $errors['password'] = "password field is empty";
    } else if (strlen($_POST["password"]) <= '8' && strlen($_POST["password"]) >= '15') {
      $errors['password'] = "password range must be 8 to 15";
    } else if (!preg_match("#[0-9]+#", $_POST['password'])) {
      $errors['password'] = "your password must contain at least 1 number";
    } else if (!preg_match("#[A-Z]+#", $_POST['password'])) {
      $errors['password'] = "your password must contain at least 1 capital letter";
    } else if (!preg_match("#[a-z]+#", $_POST['password'])) {
      $errors['password'] = "your password must contain at least 1 lowercase letter";
    } else if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['password'])) {
      $errors['password'] = "your password must contain at least 1 special character";
    } else {
      $pass = $_POST['password'];
    }

    // Re-entered password validation
    if(empty($_POST['cPassword'])) {
      $errors['cPassword'] = "re-enter password";
    } else if($_POST['cPassword'] != $_POST['password']) {
      $errors['cPassword'] = "password not matched";
    } else {
      $confirmPass = $_POST['cPassword'];
    }
    
    // Image validation
    if(isset($_FILES['image'])) {
      $fileName = $_FILES['image']['name'];
      $fileSize = $_FILES['image']['size'];
      $fileTemp = $_FILES['image']['tmp_name'];
      $fileType = $_FILES['image']['type'];
      $fileInfo = getimagesize($_FILES['image']['tmp_name']);
      $width = $fileInfo[0];
      $height = $fileInfo[1];

      if (is_uploaded_file($fileTemp)) {
        if($width <= "300" || $height <= "200") {
          if ($fileSize < 2097152) {
            if ($fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png') {
              if (move_uploaded_file($fileTemp,'assets/images/'.$fileName)) { 
                // image uplaoded successfully             
              }
            } else {
              $errors['image'] = "Only JPG, PNG and JPEG files are allowed";
            }
          } else {
            $errors['image'] = "please select file less than or 2MB";
          }
        } else {
          $errors['image'] = "image dimensions should be within 300x200";
        }
      } else {
        $errors['image'] = "no file is selected";
      }
    } 

    session_start();
    $_SESSION['image'] = $fileName;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastname'] = $lastName;
    $_SESSION['phoneNumber'] = $pNumber;
    $_SESSION['emailId'] = $emailId;
  } 
  
  // ckeck errors
  if(count($errors) == 0) {
    header("location: success.php");
    exit();
  }  
?>