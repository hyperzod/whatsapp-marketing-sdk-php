<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Service\AbstractService;
use Hyperzod\WhatsappMarketingSdkPhp\Enums\HttpMethodEnum;

class TemplatesService extends AbstractService
{
    /**
     * Get WhatsApp templates
     *
     * @param array $params
     * @throws \Hyperzod\WhatsappMarketingSdkPhp\Exception\ApiErrorException if the request fails
     */
    public function getTemplates(array $params)
    {
        return $this->request(
            HttpMethodEnum::GET,
            '/api/whatsapp/account/templates',
            $params
        );
    }
} 