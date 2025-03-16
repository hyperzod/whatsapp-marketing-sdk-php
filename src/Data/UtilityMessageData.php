<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Data;

class UtilityMessageData
{
    /**
     * @param string $tenant_id Tenant identifier
     * @param string $template_id ID of the template to use
     * @param string $template_type Type of template (e.g., TEXT)
     * @param int $recipient Recipient phone number
     * @param array|null $variables Optional template variables
     */
    public function __construct(
        public readonly string $tenant_id,
        public readonly string $template_id,
        public readonly string $template_type,
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
            'recipient' => $this->recipient,
        ];
        
        if ($this->variables !== null) {
            $result['variables'] = $this->variables;
        }
        
        return $result;
    }
} 