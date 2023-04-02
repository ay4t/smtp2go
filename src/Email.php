<?php
/*
 * File: Email.php
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
 */

namespace Ay4t\Smtp2go;

class Email extends SMTP2GO
{
    /**
     * @var array $to
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $to = [];

    /**
     * @var string $sender
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $sender = 'Test Persons Friend <test2@example.com>';

    /**
     * @var string $subject
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $subject;

    /**
     * @var string $textBody
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $textBody;

    /**
     * @var string $htmlBody
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $htmlBody;

    /**
     * @var string $templateID
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $templateID;

    /**
     * @var array $templateData
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    private $templateData = [];

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

    public function send()
    {
        $this->jayParsedAry['to']       = $this->to;
        $this->jayParsedAry['sender']   = $this->sender;
        $this->jayParsedAry['custom_headers'] =  [
            [
                "header" => "Reply-To", 
                "value" => $this->sender
            ] 
        ];

        if( ! empty($this->templateID) ){
            // mengirim email dengan template
            $this->jayParsedAry['template_id']      = $this->templateID;
            $this->jayParsedAry['template_data']    = $this->templateData;
        } else {            
            // mengirim email biasa
            $this->jayParsedAry['subject']      = $this->subject;
            $this->jayParsedAry['text_body']    = $this->textBody;
            $this->jayParsedAry['html_body']    = $this->htmlBody;
        }

        return $this->_exce( 'email/send', 'POST');
    }

    /**
     * @param  string|null $params
     *
     * @return this
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function setTemplateID(string $params = null)
    {
        $this->templateID = $params;
        return $this;
    }

    public function setTemplateData(array $params = [])
    {
        $this->templateData = $params;
        return $this;
    }


    /**
     * Set property $To
     *
     * @param  string $person_name
     * @param  string $email_address
     *
     * @return this
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function toAddress(string $person_name, string $email_address)
    {
        $this->to[] = $person_name . ' <' . $email_address . '>';
        return $this;
    }

    /**
     * set sender
     *
     * @param  string $sender
     *
     * @return this           
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function setSender(string $person_name, string $email_address)
    {
        $this->sender = $person_name . ' <' . $email_address . '>';
        return $this;
    }

    /**
     * set subject
     *
     * @param  string $subject
     *
     * @return this
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
        return $this;
    }
    
    /**
     * set text body
     *
     * @param  string $textBody
     *
     * @return this
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function textBody(string $textBody)
    {
        $this->textBody = $textBody;
        return $this;
    }

    /**
     * set HTML body
     *
     * @param  string $htmlBody
     *
     * @return this
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function htmlbody(string $htmlBody)
    {
        $this->htmlBody = $htmlBody;
        return $this;
    }
}


