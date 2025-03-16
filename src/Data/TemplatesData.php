<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Data;

class TemplatesData
{
    /**
     * @param string $tenant_id Tenant identifier
     * @param string|null $category Optional category filter (UTILITY/MARKETING)
     */
    public function __construct(
        public readonly string $tenant_id,
        public readonly ?string $category = null,
    ) {
    }

    /**
     * Create a new instance from an array.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['tenant_id'],
            $data['category'] ?? null,
        );
    }
    
    /**
     * Convert to array for API request
     */
    public function toArray(): array
    {
        $result = ['tenant_id' => $this->tenant_id];
        
        if ($this->category !== null) {
            $result['category'] = $this->category;
        }
        
        return $result;
    }
} 