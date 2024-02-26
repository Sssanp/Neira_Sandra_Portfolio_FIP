<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'my_portfolio';

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$errors = array();

$lname = mysqli_real_escape_string($connection, $_POST['lname']);
if ($lname == NULL) {
    $errors[] = "Last name field is empty.";
}

$fname = mysqli_real_escape_string($connection, $_POST['fname']);
if ($fname == NULL) {
    $errors[] = "First name field is empty.";
}

$email = $_POST['email'];
if ($email == NULL) {
    $errors[] = "Email field is empty.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "\"" . $email . "\" is not a valid email address.";
}


$city = mysqli_real_escape_string($connection, $_POST['city']);
if ($city == NULL) {
    $errors[] = "City field is empty.";
}

$message = mysqli_real_escape_string($connection, $_POST["message"]);
if ($message == NULL) {
    $errors[] = "Message field is empty.";
}


$errcount = count($errors);
if ($errcount > 0) {
    $errmsg = array();
    for ($i = 0; $i < $errcount; $i++) {
        $errmsg[] = $errors[$i];
    }
    echo json_encode(array("errors" => $errmsg));
} else {
    $querystring = "INSERT INTO contact (id, fname, lname, email, city, message) VALUES(NULL,'" . $fname . "','" . $lname . "','" . $email . "','" . $city . "', '" . $message . "')";
    $qpartner = mysqli_query($connection, $querystring);
    echo json_encode(array("message" => "Your message has been successfully received. I’ll get back to you as soon as possible. In the meantime, feel free to explore more of my portfolio. Have a wonderful day!”"));
}
?>