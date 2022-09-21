<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MT | Sign Up</title>
</head>

<body>



  <h2 align="center">Sign Up</h2>

  <form class="signUpForm" method="POST" action="process-signup.php" id="signup">
    <div class="">
      <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Username" />
    </div>
    <div class="">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" />
    </div>
    <div class="">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
    </div>
    <div class="">
      <input type="password" class="form-control" d="password_confirmation" name="password_confirmation" placeholder="Confirm password" />
    </div>
    <br />
    <button type="submit" class="signUpButton">Sign Up</button>
  </form>

</body>

</html>