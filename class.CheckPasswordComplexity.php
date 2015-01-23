<?php

/**
 * @package         PHP-Lib
 * @description     Class is used to check the complexity of password
 * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
 * @license         GNU GPL v2.0
 */
class CheckPasswordComplexity
{
    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to check the complexity of password based on the different criteria like password includes Mixed char case/digits/special characters.
     *
     * @param $password Use to set the password to check the complexity
     *
     * @return mixed    The strength of password
     */
    function checkPassword($password)
    {
        $strength = ['Excellent', 'Strong', 'Good', 'Week'];

        if ($this->isEnoughLength($password, 12) && $this->containsMixedCase($password) && $this->containsDigits($password) && $this->containsSpecialChars($password)) {
            return $strength[0];
        } elseif ($this->isEnoughLength($password, 10) && $this->containsMixedCase($password) && $this->containsDigits($password)) {
            return $strength[1];
        } elseif ($this->isEnoughLength($password, 8) && $this->containsMixedCase($password)) {
            return $strength[2];
        } elseif ($this->isEnoughLength($password, 8) && $this->containsDigits($password)) {
            return $strength[2];
        } elseif ($this->isEnoughLength($password, 8) && $this->containsSpecialChars($password)) {
            return $strength[2];
        } else {
            return $strength[3];
        }
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to check the length of password
     *
     * @param $password Use to set the password to check
     * @param $length   Use to set the length of password
     *
     * @return bool     "true" if the password is not empty or length matches the criteria
     *                  "false" if the password is empty and does not matches the criteria
     */
    private function isEnoughLength($password, $length)
    {
        if (empty($password)) {
            return false;
        } elseif (strlen($password) < $length) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to check the mixed case of password
     *
     * @param $password Use to set the password to check
     *
     * @return bool "true" if password contains mixed case characters
     *              "false" if password does not contains mixed case characters
     */
    private function containsMixedCase($password)
    {
        if (preg_match('/[a-z]+/', $password) && preg_match('/[A-Z]+/', $password)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to check the digits are included in password or not
     *
     * @param $password Use to set the password to check
     *
     * @return bool "true" if password contains digits
     *              "false" if password does not contains digits
     */
    private function containsDigits($password)
    {
        if (preg_match("/\d/", $password)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @author          Peeyush Budhia <peeyush.budhia@phpnmysql.com>
     * @description     The function is used to check the special characters are included in password or not
     *
     * @param $password Use to set the password to check
     *
     * @return bool "true" if password contains special characters
     *              "false" if password does not contains special characters
     */
    private function containsSpecialChars($password)
    {
        if (preg_match("/[^\da-z]/", $password)) {
            return true;
        } else {
            return false;
        }
    }
}
