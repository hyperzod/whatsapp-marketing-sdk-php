<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Enums\HttpMethodEnum;
use Hyperzod\WhatsappMarketingSdkPhp\Data\UtilityMessageData;

class MessageService extends AbstractService
{
    /**
     * Send a utility message via WhatsApp
     *
     * @param \Hyperzod\WhatsappMarketingSdkPhp\Data\UtilityMessageData $data
     * @throws \Hyperzod\WhatsappMarketingSdkPhp\Exception\ApiErrorException if the request fails
     */
    public function sendUtilityMessage(UtilityMessageData $data)
    {
        return $this->request(
            HttpMethodEnum::POST, 
            '/whatsapp/send-utility-message', 
            $data->toArray()
        );
    }
} 