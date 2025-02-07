<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

use Hyperzod\WhatsappMarketingSdkPhp\Client\HyperzodClientInterface;

/**
 * Abstract base class for all service factories used to expose service
 * instances through {@link \Hyperzod\WhatsappMarketingSdkPhp\Client\HyperzodClient}.
 *
 * Service factories serve two purposes:
 *
 * 1. Expose properties for all services through the `__get()` magic method.
 * 2. Lazily initialize each service instance the first time the property for
 *    a given service is used.
 */
abstract class AbstractServiceFactory
{
    /** @var HyperzodClientInterface */
    private $client;

    /** @var array<string, AbstractService> */
    private $services;

    /**
     * @param HyperzodClientInterface $client
     */
    public function __construct($client)
    {
        $this->client = $client;
        $this->services = [];
    }

    /**
     * @param string $name
     *
     * @return null|string
     */
    abstract protected function getServiceClass($name);

    /**
     * @param string $name
     *
     * @return null|AbstractService
     */
    public function __get($name)
    {
        $serviceClass = $this->getServiceClass($name);
        if ($serviceClass !== null) {
            if (!array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->client);
            }
            return $this->services[$name];
        }
        return null;
    }
}
