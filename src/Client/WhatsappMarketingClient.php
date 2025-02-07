<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Client;

use Hyperzod\WhatsappMarketingSdkPhp\Service\CoreServiceFactory;

class WhatsappMarketingClient extends BaseWhatsappMarketingClient
{
    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}

