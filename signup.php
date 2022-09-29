<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MT | SIGN UP</title>
  <link rel="icon" type="image/icon type" href="images/logos/mt-logo-blk.png">
  <link rel="stylesheet" type="text/css" href="style.css" crossorigin="anonymous">
  <script src="js/navbar.js" defer></script>
</head>

<body>

  <nav class="navBar">
    <a href="index.php"><img class="navLogo" src="images/logos/mt-logo-white.png" alt="MyTxns Logo"></a>
    <a href="#" class="toggle-button">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </a>
    <div class="navbar-links">
      <ul>
        <li><a href="about.html" target="">About</a></li>
        <li><a href="https://nanacalc.com/" target="_blank">Nana Calc</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>

  <br><br>

  <h2 align="center">Sign Up</h2>

  <form class="loginForm" method="POST" action="process-signup.php" id="signup">
    <div>
      <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Username" />
    </div>
    <div>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" />
    </div>
    <div>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
    </div>
    <div>
      <input type="password" class="form-control" d="password_confirmation" name="password_confirmation" placeholder="Confirm password" />
    </div>
    <br />
    <button type="submit" class="signUpButton">Sign Up</button>
  </form>

</body>

</html>