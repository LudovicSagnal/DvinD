<?php
ini_set("SMTP","localhost");
ini_set("smtp_port","25");

if (isset($_POST['form_contact'])) {
    $name = htmlspecialchars($_POST['name']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $name_regex = "/^[a-zA-Z-' ]*$/";
    $email_regex = "/^[^@\s]+@[^@\s]+\.[^@\s]+$/";
    if (!preg_match($name_regex, $name)) {
        http_response_code(400);
        echo "Invalid name";
        exit;
    }
    if (!preg_match($name_regex, $firstname)) {
        http_response_code(400);
        echo "Invalid first name";
        exit;
    }
    if (!preg_match($email_regex, $email)) {
        http_response_code(400);
        echo "Invalid email";
        exit;
    }

    $to = "DvinD@laposte.net";
    $subject = "Contact form submission";
    $body = "Name: $name\nFirst name: $firstname\nEmail: $email\n\n$message";

    $headers = "From: $email\r\nReply-To: $email\r\n";
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "OK";
    } else {
        http_response_code(500);
        echo "Server error";
    }
} else {
    http_response_code(400);
    echo "Invalid request";
}