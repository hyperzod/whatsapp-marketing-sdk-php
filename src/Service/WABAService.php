<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Service\AbstractService;
use Hyperzod\WhatsappMarketingSdkPhp\Enums\HttpMethodEnum;

class WABAService extends AbstractService
{
    /**
     * Check WhatsApp Business Account onboarding status
     *
     * @param array $params
     * @throws \Hyperzod\WhatsappMarketingSdkPhp\Exception\ApiErrorException if the request fails
     */
    public function checkOnboardingStatus(array $params)
    {
        return $this->request(
            HttpMethodEnum::GET,
            '/whatsapp/account/onboarding-status',
            $params
        );
    }
} 