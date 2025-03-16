<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Data;

class OnboardingStatusData
{
    /**
     * @param string $tenant_id Tenant identifier
     */
    public function __construct(
        public readonly string $tenant_id,
    ) {
    }

    /**
     * Create a new instance from an array.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['tenant_id'],
        );
    }
    
    /**
     * Convert to array for API request
     */
    public function toArray(): array
    {
        return [
            'tenant_id' => $this->tenant_id,
        ];
    }
} 