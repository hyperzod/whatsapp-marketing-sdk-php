<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Enums\HttpMethodEnum;

class MessageService extends AbstractService
{
    /**
     * Send a utility message via WhatsApp
     *
     * @param array $params
     * @throws \Hyperzod\WhatsappMarketingSdkPhp\Exception\ApiErrorException if the request fails
     */
    public function sendUtilityMessage(array $params)
    {
        return $this->request(
            HttpMethodEnum::POST, 
            '/whatsapp/send-utility-message', 
            $params
        );
    }
} 