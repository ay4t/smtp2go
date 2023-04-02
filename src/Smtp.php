<?php
/*
 * File: Smtp.php
 * Project: src
 * Created Date: Su Apr 2023
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -------------------------
 * Last Modified: Sun Apr 02 2023
 * Modified By: Ayatulloh Ahad R
 * -------------------------
 * Copyright (c) 2023 Indiega Network 

 * -------------------------
 * HISTORY:
 * Date      	By	Comments 

 * ----------	---	---------------------------------------------------------
 * 
 * Manage the SMTP users in your account.
 * Dokumentasi: https://apidoc.smtp2go.com/documentation/#/SMTP%20Users
 * 
 */


namespace Ay4t\Smtp2go;

use Exception;

class Smtp extends SMTP2GO
{
    /**
    * __construct
    *
    * @return parent::__construct()
    */
    public function __construct( string $apiKey )
    {
        $this->apiKey = $apiKey;
        parent::__construct();
    }

    // view function
    public function view( string $username )
    {
        $this->jayParsedAry['username'] = $username;
        return $this->_exce('users/smtp/view', 'POST');
    }

    // remove function
    public function remove( string $username )
    {
        $this->jayParsedAry['username'] = $username;
        return $this->_exce('users/smtp/remove', 'POST');
    }

    // add a new SMTP user to your account
    /* Request Example:
    {
        "api_key": "your_api_key",
        "username": "smtpuser@example.com",
        "email_password": null,
        "custom_ratelimit": true,
        "custom_ratelimit_value": 100,
        "custom_ratelimit_period": "1 day",
        "comments": "Comment explaining how amazing this Test person is"
    } */
    public function add( array $smtpUser )
    {
        $required = [
            'username',
            'email_password',
            'custom_ratelimit',
            'custom_ratelimit_value',
            'custom_ratelimit_period',
        ];

        // jika array $smtpUser tidak memiliki key yang dibutuhkan
        if ( ! $this->_checkRequired($required, $smtpUser) ) {
            return false;
        }

        // jika array $smtpUser memiliki key yang dibutuhkan inject kedalam $this->jayParsedAry
        foreach ( $required as $key ) {
            $this->jayParsedAry[$key] = $smtpUser[$key];
        }

        return $this->_exce('users/smtp/add', 'POST');
    }

    // fungsi untuk mengecek apakah array $smtpUser memiliki key yang dibutuhkan
    private function _checkRequired( array $required, array $smtpUser )
    {
        foreach ( $required as $key ) {
            if ( ! array_key_exists($key, $smtpUser) ) {
                // add throw exception key tidak ditemukan
                new Exception("Key $key not found in array \$smtpUser");
                return false;
            }
        }
        return true;
    }
}
