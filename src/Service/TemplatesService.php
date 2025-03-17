<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Data\TemplatesData;
use Hyperzod\WhatsappMarketingSdkPhp\Enums\HttpMethodEnum;
use Hyperzod\WhatsappMarketingSdkPhp\Service\AbstractService;

class TemplatesService extends AbstractService
{
    /**
     * Get WhatsApp templates
     *
     * @param \Hyperzod\WhatsappMarketingSdkPhp\Data\TemplatesData $data
     * @throws \Hyperzod\WhatsappMarketingSdkPhp\Exception\ApiErrorException if the request fails
     */
    public function getTemplates(TemplatesData $data)
    {
        return $this->request(
            HttpMethodEnum::GET,
            '/whatsapp/templates',
            $data->toArray()
        );
    }
} 