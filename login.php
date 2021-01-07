<?php
  $uncookie='';
  $pwcookie='';
  // var_dump($_COOKIE);
  // die;
  if(isset($_COOKIE['usercookie']) and isset($_COOKIE['passcookie']))
  {
    $uncookie=$_COOKIE['usercookie'];
    $pwcookie=$_COOKIE['passcookie'];
  }

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signin GuestBook</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
  <?php include "view_error.php"?>
    <form method="post" action="process/login_proc.php">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <label for="inputEmail" class="visually-hidden">Email address</label>
      <input type="email" class="form-control mb-3" id="inputEmail" name="inputEmail" value="<?php echo $uncookie; ?>"
      class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="visually-hidden">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" value="<?php echo $pwcookie; ?>"
       class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" id="rem" name="rem" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <div class="mt-2"><a  href="register.php">Create new account</a></div>
      <p class="mt-5 mb-3 text-muted">&copy; Ahmed Mansour 2021</p>
    </form>
  </main>


</body>

</html>