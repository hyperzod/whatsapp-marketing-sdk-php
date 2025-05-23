<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Data;

class UtilityMessageData
{
    /**
     * @param string $tenant_id Tenant identifier
     * @param string $template_id ID of the template to use
     * @param string $template_type Type of template (e.g., TEXT)
     * @param int $recipient Recipient phone number
     * @param string $currency Currency code (e.g., USD, INR)
     * @param array|null $variables Optional template variables
     */
    public function __construct(
        public readonly string $tenant_id,
        public readonly string $template_id,
        public readonly string $template_type,
        public readonly string $currency,
        public readonly int $recipient,
        public readonly ?array $variables = null,
    ) {
    }

    /**
     * Create a new instance from an array.
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['tenant_id'],
            $data['template_id'],
            $data['template_type'],
            $data['currency'],
            (int)$data['recipient'],
            $data['variables'] ?? null,
        );
    }
    
    /**
     * Convert to array for API request
     */
    public function toArray(): array
    {
        $result = [
            'tenant_id' => $this->tenant_id,
            'template_id' => $this->template_id,
            'template_type' => $this->template_type,
            'currency' => $this->currency,
            'recipient' => $this->recipient,
        ];
        
        if ($this->variables !== null) {
            $result['variables'] = $this->variables;
        }
        
        return $result;
    }
} 