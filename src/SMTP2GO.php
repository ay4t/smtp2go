<?php
/*
 * File: SMTP2GO.php
 * Project: Libraries
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

use GuzzleHttp\Client;

class SMTP2GO
{
    /**
     * @var string $apiKey
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $apiKey;

    /**
     * @var string $baseUrl
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $baseUrl = 'https://api.smtp2go.com/v3/';

    /**
     * @var array $jayParsedAry
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    protected $jayParsedAry = [];

    /**
    * __construct
    *
    * @return parent::__construct()
    */
    public function __construct()
    {
        $this->jayParsedAry['api_key'] = $this->apiKey;
    }

    protected function _exce( string $endpoint, string $method = 'POST' )
    {
        // for testing purpose only
        // return json_encode($this->jayParsedAry);

        /** post dengan guzzlehttp/guzzle  */
        $client = new Client([
            'base_uri' => $this->baseUrl,
        ]);

        /** create request */
        $response = $client->request($method, $endpoint, [
            \GuzzleHttp\RequestOptions::JSON => $this->jayParsedAry
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response);
    }

    

    /**
     * @param  string $apiKey
     * @return this            
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @param  string $baseUrl
     * @return this            
     * @author Ayatulloh Ahad R <ayatulloh@indiega.net>
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }
}
