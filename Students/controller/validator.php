<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

    namespace OBrien_validation;

    //Validate at least 2 characters
    function stringValid($val, $len, $err) {
        if (strlen($val) > 0) {
            if (strlen($val) < $len)
                return 'Must be at least ' . $len . ' characters.';
        }
        else if ($err = 'Required')
            return 'Required';
        else
            return '';
    }

    //Validate dateOfBirth
    function extValid($val, $err) {
        if (strlen($val) > 0) {
            if (strlen($val) != 5)
                return 'Invalid Extension - 5 digits only';
        }
        else if ($err = 'Required')
            return 'Required';
        else
            return '';
    }

    //Validate password
    function passValid($val, $err) {
        if (strlen($val) > 0) {
            if (!preg_match('^\S*(?=\S{4,20})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$^', $val))
                return 'USER_PWORD must be 4-20 chars including at least one upper, one lower, one digit, and a special char in the set $!@*#';
        }
        else if ($err = 'Required')
            return 'Required';
        else
            return '';
    }

    //Validate the email
    function emailValid($val, $err) {
        if (strlen($val) > 0) {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL))
                return 'Must use a valid email address format (e.g. X@X.Y)';
        }
        else if ($err = 'Required')
            return 'Required'; 
        else
            return '';
    }

    //Validate that a value is numeric; throw an exception if
    //the value is not numeric - note the use of \Exception to 
    //indicate the Exception class is not from the Validation
    //namespace
    function numericValue($val, $err) {
        if (strlen($val) > 0) {
            if (filter_var($val, FILTER_VALIDATE_INT) === false)
                return 'Invalid Zip Code - 5 digits only';
        }
        else if ($err = 'Required')
            return 'Required';
        else
            return '';
    }

    //Validate an Birthdate
    function birthValid($val, $err) {
        if (strlen($val) > 0) {
            return '';
        }
        else if ($err = 'Required')
            return 'Required'; 
        else
            return '';
    }
?>