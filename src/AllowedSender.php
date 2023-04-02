<?php
/*
 * File: AllowedSender.php
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
 * Documentation: https://apidoc.smtp2go.com/documentation/#/Allowed%20Senders
 * 
 */

namespace Ay4t\Smtp2go;

class AllowedSender extends SMTP2GO
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

    /**
     * Returns the allowed sender list for your account.
     *
     * @param Undocumented function $name
     *
     * @return parent::_exce();
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function view()
    {
        return $this->_exce('allowed_senders/view', 'POST');
    }

    /**
     * Add one or more allowed senders to your account.
     *
     * @param  array $allowedSenders
     *
     * @return parent::_exce();
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function add( array $allowedSenders)
    {
        $this->jayParsedAry['allowed_senders'] = $allowedSenders;
        return $this->_exce('allowed_senders/add', 'POST');
    }

    /**
     * Update the allowed senders list on your account, overwriting the current list with the passed 'allowed_senders' value.
     *
     * @param  array $allowedSenders
     *
     * @return parent::_exce();
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function update( array $allowedSenders)
    {
        $this->jayParsedAry['allowed_senders'] = $allowedSenders;
        return $this->_exce('allowed_senders/update', 'POST');
    }

    
    /**
     * Remove one or more allowed senders from your account.
     *
     * @param  array $allowedSenders
     *
     * @return parent::_exce();
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function remove( array $allowedSenders)
    {
        $this->jayParsedAry['allowed_senders'] = $allowedSenders;
        return $this->_exce('allowed_senders/remove', 'POST');
    }
    
}
