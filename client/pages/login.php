<!DOCTYPE html>
<html lang="en">
<head>
  <title>SmartQ — Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/logo/sq.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/login.css" rel="stylesheet">
</head>

<body class="auth-body">

  <div class="auth-card">

    <!-- Header -->
    <div class="auth-card-header">
      <img src="../assets/logo/sq.png" alt="SmartQ Logo">
      <h4>Welcome Back</h4>
      <span class="auth-subtitle">Sign in to your account</span>
    </div>

    <!-- Body -->
    <div class="auth-card-body">

      <form action="validate.php" method="POST">
        <input name="username" type="text"     class="form-control" placeholder="Username" required>
        <input name="password" type="password" class="form-control" placeholder="Password" required minlength="6">
        <button type="submit" class="auth-btn">Login</button>
      </form>

      <hr class="auth-divider">
      <p class="auth-link"><a href="forgot-password.php">Forgot password?</a></p>
      <p class="auth-link">Don't have an account? <a href="signup.php">Sign Up</a></p>

    </div>
  </div>

</body>
</html>