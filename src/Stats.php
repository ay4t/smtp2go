<?php
/*
 * File: Stats.php
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
 * Documentation: https://apidoc.smtp2go.com/documentation/#/Statistics
 * 
 */

namespace Ay4t\Smtp2go;

class Stats extends SMTP2GO
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

    // Report on email unsubscribe statistics
    public function getEmailUnsubs()
    {
        return $this->_exce('stats/email_unsubs', 'POST');
    }

    // Retrieve a combination of the email_bounces, email_cycle, email_spam, and email_unsubs calls. This call may take longer to complete.
    public function getEmailSummary()
    {
        return $this->_exce('stats/email_summary', 'POST');
    }

    // Report on email spam statistics
    public function getEmailSpam()
    {
        return $this->_exce('stats/email_spam', 'POST');
    }

    /**
     * Retrieve a summary showing account activity from a specified date range (defaults to the last 30 days), per sender email address or SMTP username.
     *
     * @return parent::_exce();
     */
    public function getEmailHistory()
    {
        return $this->_exce('stats/email_history', 'POST');
    }

    /**
     * Retrieve a summary showing the start date and end date of your monthly cycle, the number of emails sent this monthly cycle, number of emails remaining and the total number of emails in your plan's monthly allowance.
     * 
     * @return parent::_exce();
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function getEmailCycle()
    {
        return $this->_exce('stats/email_cycle', 'POST');
    }

    /**
     * Report on email bounce statistics
     *
     * @param Undocumented function $name
     * @return parent::_exce();
     */
    public function getEmailBounces()
    {
        return $this->_exce('stats/email_bounces', 'POST');
    }
}
