<?php
/*
 * File: SMS.php
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
 * Send an SMS message.
 * Documentation: https://apidoc.smtp2go.com/documentation/#/SMS
 * 
 */

namespace Ay4t\Smtp2go;

class SMS extends SMTP2GO
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

    // sms/view-received
    /* 
    Request Example:
    {
        "api_key": "your_api_key",
        "unix_start": 1662379402,
        "unix_end": 1664841802
    } */
    public function viewReceived( int $unix_start, int $unix_end )
    {
        $this->jayParsedAry['unix_start']   = $unix_start;
        $this->jayParsedAry['unix_end']     = $unix_end;

        return $this->_exce('sms/view-received', 'POST');
    }

    /* 
    Send function
    Request Example:
    {
        "api_key": "your_api_key",
        "destination": ["+12025550959", "+12025550249"],
        "content": "The content of the sms message"
    } */

    public function send( array $destination, string $message)
    {
        $this->jayParsedAry['destination']  = $destination;
        $this->jayParsedAry['content']      = $message;

        return $this->_exce('sms/send', 'POST');
    }
}