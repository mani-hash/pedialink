<?php

namespace App\Services;

use App\Helpers\SignedToken;
use App\Helpers\Validator;
use App\Models\Doctor;
use App\Models\PublicHealthMidwife;
use App\Models\Staff;
use App\Models\User;
use App\Rules\EmailRule;
use Exception;

class RegisterStaffService
{
    use EmailRule;

    private function validateRole(string $role)
    {
        $error = null;

        if (!Validator::validateFieldExistence($role)) {
            $error = "Role cannot be empty";
            return $error;
        }

        if (trim($role) !== "doctor" && trim($role) !== "phm") {
            $error = "Invalid role";
            return $error;
        }

        return $error;
    }

    private function validateMessage(string $message)
    {
        $error = null;

        if (!Validator::validateFieldMaxLength($message, 200)) {
            $error = "Message cannot be greater than 200 characters";
            return $error;
        }

        return $error;
    }

    public function validateStaffData(
        string $email,
        string $role,
        string $message,
    )
    {
        $errors = [];

        $emailError = $this->validateEmail($email);
        if ($emailError) {
            $errors['email'] = $emailError;
        }

        $roleError = $this->validateRole($role);
        if ($roleError) {
            $errors['role'] = $roleError;
        }

        $messageError = $this->validateMessage($message);
        if ($messageError) {
            $errors['message'] = $messageError;
        }

        return $errors;
    }

    /**
     * Use to generate random temporary values for staff registration
     * @param int $length
     * @return string
     */
    private function randomStaffValue(int $length = 12)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charsLen = strlen($chars);
        $result = '';

        // random_int is cryptographically secure
        for ($i = 0; $i < $length; $i++) {
            $result .= $chars[random_int(0, $charsLen - 1)];
        }

        return $result;
    }

    private function generateSignedUrl(User $user)
    {
        $token = SignedToken::createSignedVerificationToken(
            $user,
            config('app.key'),
            3600 * 24 * 5
        );

        return rtrim(config('app.url'), '/') .
            route('staff.register', [], [
                'token' => $token,
            ]);
    }

    /**
     * Save a staff placeholder in database with random values
     * 
     * Notify staff email of new account available
     * 
     * @param string $email
     * @param string $role
     * @param string $message
     * @return void
     */
    public function saveStaff(
        string $email,
        string $role,
        string $message,
    ): bool
    {
        $user = new User();
        $user->name = $this->randomStaffValue(6);
        $user->email = $email;
        $user->password_hash = password_hash(
            $this->randomStaffValue(20),
            PASSWORD_DEFAULT
        );
        $user->role = $role;
        $user->email_verified = 0;
        $id = $user->save();

        if ($role === "doctor") {
            $doctor = new Doctor();
            $doctor->id = $id;
            $doctor->save();
        } else if ($role === "phm") {
            $phm = new PublicHealthMidwife();
            $phm->id = $id;
            $phm->save();
        }

        $staff = new Staff();
        $staff->id = $id;
        $staff->nic = $this->randomStaffValue(10);
        $staff->license_no = $this->randomStaffValue(10);
        $staff->save();

        try {
            mailer()->sendTemplate(
                $user->email,
                'staff-register',
                [
                    'register_link' => $this->generateSignedUrl($user),
                    'message' => $message,
                ],
                'Create your account'
            );
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}