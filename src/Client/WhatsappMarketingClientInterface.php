<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Client;

/**
 * Interface for a Whatsapp Marketing client.
 */
interface WhatsappMarketingClientInterface
{
   /**
    * Sends a request to Whatsapp Marketing API.
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */
    public function request($method, $path, $params);
}
