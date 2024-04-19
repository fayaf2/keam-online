<?php
session_start(); // Start the session to access the verification code stored in the session

// Check if the verification code form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verification_code'])) {
    $verificationCode = $_POST['verification_code'];

    // Compare the verification code entered by the user with the one stored in the session
    if ($verificationCode == $_SESSION['verification_code']) {
        // Verification successful, redirect to exa.html
        header("Location: exa.html");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        // Verification failed, show an error message
        echo "Verification failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verification Page</title>
</head>
<body>
<h2>Verification Page</h2>
<form method="post" action="">
    <label for="verification_code">Enter Verification Code:</label><br>
    <input type="text" id="verification_code" name="verification_code" required><br>
    <input type="submit" value="Verify">
</form>
</body>
</html>
