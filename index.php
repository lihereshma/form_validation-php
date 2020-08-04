<?php 
  if($_POST) {
    require_once 'validation.php';
  }  
?>

<!doctype html>

<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <title>Form</title>
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="assets/css/style.css"/>
</head>

<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <h1>fill up the form</h1>
      </div>
    </header>
    <!--header section end-->
    <!--main section start-->
    <main>
      <div class="wrapper">
        <form method="POST" action="index.php" enctype="multipart/form-data"> 
          <ul class="photo">
            <li>
              <figure>
                <img class="profile" src="assets/images/300x200.jpg" alt="Profile">
              </figure>              
            </li>
            <li>
              <input name="image" type="file" value="<?php if(isset($_FILES['image']['name'])) { echo $_FILES['image']['name']; } ?>">
              <p class="error">
                <?php 
                  if(isset($errors['image'])) 
                    echo $errors['image'];
                ?>
              </p>
            </li>            
          </ul>
          <ul class="name">
            <li>
              <label for="fname">First Name:</label>
              <input type="text" name="fname" maxlength="10" value="<?php if(isset($_POST['fname'])) { echo $firstName; } ?>">
              <p class="error">
                <?php 
                  if(isset($errors['fname'])) 
                    echo $errors['fname'];
                ?>
              </p>
            </li>         
            <li>
              <label for="lname">Last Name:</label>
              <input type="text" name="lname" maxlength="10" value="<?php if(isset($_POST['lname'])) { echo $lastName; } ?>">
              <p class="error">
                <?php 
                  if(isset($errors['lname'])) 
                    echo $errors['lname'];
                ?>
              </p>
            </li>
          </ul>
          
          <ul class="contact">
            <li>
              <label for="email">Email:</label>
              <input type="text" name="email" value="<?php if(isset($_POST['email'])) { echo $emailId; } ?>">
              <p class="error">
                <?php 
                  if(isset($errors['email'])) 
                    echo $errors['email'];
                ?>
              </p>
            </li>
            <li>
              <label for="phone">Phone Number:</label>
              <input type="text" name="phone" maxlength="15" value="<?php if(isset($_POST['phone'])) { echo $pNumber; } ?>">
              <p class="error">
                <?php 
                  if(isset($errors['phone'])) 
                    echo $errors['phone'];
                ?>
              </p>
            </li>
          </ul>          
          <ul>
            <li>
              <label for="password">Password:</label>
              <input class="eye" type="password" name="password" value="<?php if(isset($_POST['password'])) { echo $pass; } ?>">
              <p class="error">
                <?php 
                  if(isset($errors['password'])) 
                    echo $errors['password'];
                ?>
              </p>
            </li>        
            <li>
              <label for="cPassword">Confirm Password:</label>
              <input type="password" name="cPassword">
              <p class="error">
                <?php 
                  if(isset($errors['cPassword'])) 
                    echo $errors['cPassword'];
                ?>
              </p>
            </li>
          </ul>
          <div>
            <input type="submit" name="submit" value="Submit">
          </div> 
        </form>
      </div>
    </main>
    <!--main section end-->
    <!--footer section start-->
    <footer>
    </footer>
    <!--footer section end-->
  </div>
  <!--container end-->

</body>
</html>