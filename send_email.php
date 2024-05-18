<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $priority = htmlspecialchars($_POST['priority']);
    $message = htmlspecialchars($_POST['message']);
    $copy = isset($_POST['copy']) ? $_POST['copy'] : 'off';

    $to = "harshitakalani02@gmail.com";
    $subject = "New Message from $name ($priority Priority)";
    $body = "Name: $name\nEmail: $email\nPriority: $priority\n\nMessage:\n$message";

    $headers = "From: $email\r\n";
    if ($copy == 'on') {
        $headers .= "Cc: $email\r\n";
    }

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>
