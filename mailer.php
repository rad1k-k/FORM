<?php

$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r","\n"),array(" "," "),$name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);

if (empty($name) OR empty($message) OR !filter_var($email,
FILTER_VALIDATE_EMAIL)) {
header("Location: https://www.radkakrenova.com/index.html?success=-1#form");
exit;
}

$recipient = "info@radkakrenova.com";


$subject = "Máte nový kontakt od: $name";

$email_content = "Jméno: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Zpráva:\n$message\n";

$email_headers = "From: $name <$email>";
90

mail($recipient, $subject, $email_content, $email_headers);

header("Location:https://www.radkakrenova.com/index.html?success=1#form");
?>
