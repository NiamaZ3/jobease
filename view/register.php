<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="assets/styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form method = "post" action="?route=SignUp" >
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name= "NameUtilisateur" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email"required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password"  name="password" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password"  name="c_password" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="submit" name ="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="?route=login">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>