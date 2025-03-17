<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Enums\HttpMethodEnum;
use Hyperzod\WhatsappMarketingSdkPhp\Service\AbstractService;
use Hyperzod\WhatsappMarketingSdkPhp\Data\OnboardingStatusData;

class WABAService extends AbstractService
{
    /**
     * Check WhatsApp Business Account onboarding status
     *
     * @param \Hyperzod\WhatsappMarketingSdkPhp\Data\OnboardingStatusData $data
     * @throws \Hyperzod\WhatsappMarketingSdkPhp\Exception\ApiErrorException if the request fails
     */
    public function checkOnboardingStatus(OnboardingStatusData $data)
    {
        return $this->request(
            HttpMethodEnum::GET,
            '/whatsapp/onboarding-status',
            $data->toArray()
        );
    }
} 