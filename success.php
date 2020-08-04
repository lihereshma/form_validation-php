<?php
  session_start();
?>

<!doctype html>

<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <title>Success</title>
  <!--font-awesome link for icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" media="screen" href="assets/vendor/font-awesome/css/all.min.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="assets/css/style.css">
</head>

<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <h1>user details</h1>
      </div>
    </header>
    <!--header section end-->
    <!--main section start-->
    <main>
      <div class="wrapper">
        <div class="userDetails">
          <ul>
            <li>
              <span>profile image:</span>
            </li>
            <li>
              <figure>
              <img src="<?php echo 'assets/images/'.$_SESSION['image']; ?>">
            </figure>
            </li>
          </ul>
          <ul>
            <li>
              <span>name:</span>
            </li>
            <li>
              <span><?php echo $_SESSION['firstName'] . ' '. $_SESSION['lastname']; ?></span>
            </li>
          </ul>
          <ul>
            <li>
              <span>email id:</span>
            </li>
            <li>
              <span class="small"><?php echo $_SESSION['emailId']; ?></span>
            </li>
          </ul>
          <ul>
            <li>
              <span>phone mumber:</span>
            </li>
            <li>
              <span><?php echo $_SESSION['phoneNumber']; ?></span>
            </li>
          </ul>
          <div>
            <input type="button" name="save" value="Save">
          </div>
        </div>
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