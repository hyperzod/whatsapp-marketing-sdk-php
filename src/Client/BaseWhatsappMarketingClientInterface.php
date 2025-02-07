<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Client;

/**
 * Interface for a Whatsapp Marketing client.
 */
interface BaseWhatsappMarketingClientInterface
{
    /**
     * Gets the API key used by the client to send requests.
     *
     * @return null|string the API key used by the client to send requests
     */
    public function getApiKey();

    /**
     * Gets the base URL for Whatsapp Marketing API.
     *
     * @return string the base URL for Whatsapp Marketing API
     */
    public function getApiBase();
}
