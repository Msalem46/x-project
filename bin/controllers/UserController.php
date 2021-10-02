<?php
session_start();
ini_set('display_errors', 1);
require $_SERVER['DOCUMENT_ROOT']."/layouts/main.php";

use bin\models\User;

$customer = new User();

$errors = [];

if (!isset($_POST['email'])) {
    $errors['email'] = "Email should't be empty";
}

if (!isset($_POST['user'])) {
    $errors['user'] = "First Name should't be empty";
}

if (!isset($_POST['password'])) {
    $errors['password'] = "Password should't be empty";
}


$email = $_POST['email'];
/** Validate email */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}

if(!checkExistence('email', $customer,  $email)){
    $errors['email'] = "This email is already registered";
}

/** Validate password */

$pass = $_POST['password'];

if (strlen($pass) < 8 || strlen($pass) > 16) {
    $errors['password'] = "Password should be min 8 characters and max 16 characters";
}
if (!preg_match("/\d/", $pass)) {
    $errors['password'] = "Password should contain at least one digit";
}
if (!preg_match("/[A-Z]/", $pass)) {
    $errors['password'] = "Password should contain at least one Capital Letter";
}
if (!preg_match("/[a-z]/", $pass)) {
    $errors['password'] = "Password should contain at least one small Letter";
}
if (!preg_match("/\W/", $pass)) {
    $errors['password'] = "Password should contain at least one special character";
}
if (preg_match("/\s/", $pass)) {
    $errors['password'] = "Password should not contain any white space";
}


/** Validate first and last name */

$name = $_POST["user"];


if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $errors['firstName'] = "Only letters and white space allowed";
}

$phone = $_POST["phone"];
if(!checkExistence('phone', $customer,  $phone)){
    $errors['phone'] = "This phone is already registered";
}

/** Create account if no errors */

if(empty($errors)){

    $column = ['email', 'name', 'phone',  'password', 'register_date'];
    $values = [];
    $values[] = (string)$email;
    $values[] = (string)$name;
    $values[] = (string)$phone;
    $values[] = (string)md5($pass);
    $values[] = (new DateTime())->format("Y-m-d H:i:s");

    if($id = $customer->create($column,$values)){
        unset($_SESSION['signup-errors']);
        unset( $_SESSION['post-register']);
        $_SESSION['CUSTOMER'] = $customer->findOne($id);
        header("Location: /index.php");
    }
}else{
    $_SESSION['signup-errors'] = $errors;
    $_SESSION['post-register'] = $_POST;
    header("Location: /views/auth/register.php");
    exit;
}


function checkExistence($attribute, $model,  $value){

    $existed = $model->findByAttribute($attribute, $value);
    if($existed->existed > 0){
        return false;
    }
    return true;
}
