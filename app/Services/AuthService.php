<?php

namespace App\Services;

class AuthService
{
    private function validateName(string $name, string $attributeName)
    {
        $error = null;
        if (!Validator::validateFieldExistence($name)) {
            $error = "{$attributeName} field cannot be empty";
            return $error;
        }

        if (!Validator::validateFieldMinLength($name, 3)) {
            $error = "{$attributeName} cannot be less than 3 characters";
            return $error;
        }

        if (!Validator::validateFieldMaxLength($name, 20)) {
            $error = "{$attributeName} cannot be greater than 20 characters";
            return $error;
        }

        return $error;
    }

    private function validateEmail(string $email)
    {
        $error = null;
        if(!Validator::validateFieldExistence($email)) {
            $error = "Email field cannot be empty";
            return $error;
        }

        if (!Validator::validateEmailFormat($email)) {
            $error = "Email format is invalid";
            return $error;
        }

        if (Validator::validateEmailExists($email)) {
            $error = "This email is already registered with our system";
            return $error;
        }

        return $error;
    }

    private function validatePassword(string $password, string $confirmPassword)
    {
        $error = null;
        if (!Validator::validateFieldExistence($password)) {
            $error = "Password field cannot be empty";
            return $error;
        }

        if (!Validator::validateFieldMinLength($password, 6)) {
            $error = "Password cannot be less than 6 characters";
            return $error;
        }

        if (!Validator::validatePassword($password, password_hash($confirmPassword, PASSWORD_DEFAULT))) {
            $error = "Passwords do not match";
            return $error;
        }

        return $error;
    }

    public function validateInitialForm(array $data)
    {
        $firstName = trim(htmlspecialchars($data["firstName"]));
        $lastName = trim(htmlspecialchars($data["lastName"]));
        $email = trim(htmlspecialchars($data["email"]));
        $password = trim(htmlspecialchars($data["password"]));
        $confirmPassword = trim(htmlspecialchars($data["confirmPassword"]));

        $errors = [];

        $firstNameError = $this->validateName($firstName, "First Name");
        if ($firstNameError) {
            $errors["firstName"] = $firstNameError;
        }

        $lastNameError = $this->validateName($lastName, "Last Name");
        if ($lastNameError) {
            $errors["lastName"] = $lastNameError;
        }

        $emailError = $this->validateEmail($email);
        if ($emailError) {
            $errors["email"] = $emailError;
        }

        $passwordError = $this->validatePassword($password, $confirmPassword);
        if ($passwordError) {
            $errors["password"] = $passwordError;
        }

        return $errors;
    }
}