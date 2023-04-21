<?php include "./includes/header.php"; ?>

<?php
  $name = $email = $fbText = "";
  $nameErr = $emailErr = $fbTextErr = "";

  // Get, check data and submit if possible
  if (isset($_POST["submit"])) {
    // Validate name
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name))
        $nameErr = "Only letters and white space allowed";
    }

    // Validate email
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // Check email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailErr = "Invalid email format";
    }

    // Validate feedback text
    if (empty($_POST["fbText"])) {
      $fbTextErr = "Feedback is required";
    } else {
      $fbText = test_input($_POST["fbText"]);
    }

    // Submit data
    if(empty($nameErr) && empty($emailErr) && empty($fbTextErr)) {
      $sql = "INSERT INTO feedback (name, email, fbText) values ('$name', '$email', '$fbText')";
      
      if(mysqli_query($conn, $sql)) {
        // Success
        header("Location: feedback.php");
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
  }

  function test_input($data) {
    $data = trim($data); // Retira caracteres desnecessario do inicio ou fim da string
    $data = stripslashes($data); // Remove back slash da string
    $data = htmlspecialchars($data); // Evitar exploit
    return $data;
  }
?>


<h1>Feedback</h1>
<p class="lead text-center">We want to know what you think</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mt-4 w-75">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $name; ?>" class="form-control <?php echo $nameErr ? "is-invalid" : null; ?>" />
    <div class="invalid-feedback"><?php echo $nameErr; ?></div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" name="email" id="email" placeholder="Enter your email" value="<?php echo $email; ?>" class="form-control <?php echo $emailErr ? "is-invalid" : null; ?>" />
    <div class="invalid-feedback"><?php echo $emailErr; ?></div>
  </div>

  <div class="mb-3">
    <label for="fbText" class="form-label">Feedback</label>
    <textarea name="fbText" id="fbText" placeholder="Enter your feedback" class="form-control <?php echo $fbTextErr ? "is-invalid" : null; ?>"><?php echo $fbText; ?></textarea>
    <div class="invalid-feedback"><?php echo $fbTextErr; ?></div>
  </div>

  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100" />
  </div>
</form>

<?php include "./includes/footer.php"; ?>