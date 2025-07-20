<?php
$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$email = $_POST['Email'];
$message = $_POST['Message'];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

// Validate names
if (!preg_match("/^[A-Za-z]{2,30}$/", $firstName) || !preg_match("/^[A-Za-z]{2,30}$/", $lastName)) {
    die("Invalid name or last name");
}

// Validate message
if (strlen(trim($message)) < 10) {
    die("Message is too short.");
}

// Send email
$to = "your-email@example.com";  // Replace with your email
$subject = "Message from $firstName $lastName";
$body = "Email: $email\n\nMessage:\n$message";
$headers = "From: $email";

if (mail($to, $subject, $body, $headers)) {
    echo "✅ Message sent successfully!";
} else {
    echo "❌ Failed to send message.";
}
?>
