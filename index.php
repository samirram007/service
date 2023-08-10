<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unsubscribe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Unsubscribe from our service</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminEmail = 'info@inspirigenceworks.co.in'; // Admin's email address
        $subject = 'Unsubscribe Request';
        
        $name = $_POST['name'];
        $identifier = isset($_POST['email']) ? $_POST['email'] : $_POST['username'];
        $phone = isset($_POST['phone']) ? $_POST['phone'] : 'Not provided';

        $message = 'An unsubscribe request has been received with the following details:'
            . "\nName: " . $name
            . "\nIdentifier: " . $identifier
            . "\nPhone: " . $phone;

        // Send email to admin
        mail($adminEmail, $subject, $message);

        // Display success message
        echo '<p class="text-success mt-3">Unsubscribe request has been sent. Thank you!</p>';
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address / Username</label>
        <input type="text" class="form-control" id="identifier" name="email" placeholder="Enter your email or username" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone number (optional)</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
      </div>
      <button type="submit" class="btn btn-primary">Unsubscribe</button>
    </form>
  </div>
</body>
</html>
