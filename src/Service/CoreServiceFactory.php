<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property MessageService $message
 */
class CoreServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'message' => MessageService::class,
        'waba' => WABAService::class,
        'templates' => TemplatesService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
