<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {

        require_once 'dbh.inc.php'; // Database connection
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';


        // ERROR HANDLERS

        $errors = [];

        /**
         * MVC aka Model View Controller
         * M : Model -> Model works with database table i.e. Need to use Model in order to do CRUD
         * V: View -> View is where we show data passed from controller.
         * Controller -> Controller is where we write our business logic
         * i.e. check if the form data are sanitized, validated and finally use model to interact with database.
         *
         * Use case :
         *
         * Register a user === Using a Model
         * Send verification email === Get last registered user row using Model and send verification email
         * Verify email === Validate email verification and set user status is active or inactive in case of invalid verification code.
         * Send welcome to the community email if the verification code is valid.
        */

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_register($pdo, $email)){
            $errors["email_used"] = "Email already registered!";
        }


        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php?signup=failure");
            die();
        }
        die(213131);
        create_user($pdo, $pwd, $username, $email);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}