<?php
// Replace with your email address where you want to receive messages
$to_email = 'vaishnaovaidya2001@gmail.com';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Construct email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message:\n$message\n";

    // Send email
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    mail($to_email, $subject, $email_message, $headers);

    // Set response message
    $response_message = 'Your message has been sent. Thank you!';
    echo json_encode(array('success' => true, 'message' => $response_message));
} else {
    // If not a POST request, return an error
    $response_message = 'Invalid request method.';
    echo json_encode(array('success' => false, 'message' => $response_message));
}
?>
