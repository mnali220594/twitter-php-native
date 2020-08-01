<?php
if (isset($_POST['signup'])) {
  $screenName = $_POST['screenName'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $error = '';
  // If user submit empty form
  if (empty($screenName) or empty($password) or empty($email)) {
    $error = 'Semua field harus diisi !';
  }
  // Validate form
  else {
    $email = $getFromU->checkInput($email);
    $screenName = $getFromU->checkInput($screenName);
    $password = $getFromU->checkInput($password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Invalid email format';
    } else if (strlen($screenName) > 20) {
      $error = 'Name must be between in 6-20 characters';
    } else if (strlen($password) < 5) {
      $error = 'Password is too short';
    } else {
      // Check if email already existed in database
      if ($getFromU->checkEmail($email) === true) {
        $error = 'Email already in used';
      }
      // Created the account
      else {
        echo 'Register success';
        die;
      }
    }
  }
}
?>

<form method="post">
  <div class="signup-div">
    <h3>Sign up </h3>
    <ul>
      <li>
        <input type="text" name="screenName" placeholder="Full Name" />
      </li>
      <li>
        <input type="text" name="email" placeholder="Email" />
      </li>
      <li>
        <input type="password" name="password" placeholder="Password" />
      </li>
      <li>
        <input type="submit" name="signup" Value="Signup for Twitter">
      </li>
    </ul>

    <!-- If any error existed -->
    <?php if (isset($error)) : ?>
      <li class="error-li">
        <div class="span-fp-error"><?= $error; ?></div>
      </li>
    <?php endif; ?>
  </div>
</form>