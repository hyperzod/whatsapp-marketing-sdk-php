<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\DTO;

/**
 * DTO for fetching templates. Expects tenant_id and an optional category filter.
 */
class GetTemplatesRequestDTO {
    public string $tenant_id;
    public ?string $category;

    public function __construct(string $tenant_id, ?string $category = null) {
        $this->tenant_id = $tenant_id;
        $this->category = $category;
    }

    public static function fromArray(array $data): self {
        return new self(
            isset($data['tenant_id']) ? (string)$data['tenant_id'] : '',
            $data['category'] ?? null
        );
    }

    public function toArray(): array {
        $result = ['tenant_id' => $this->tenant_id];
        if ($this->category !== null) {
            $result['category'] = $this->category;
        }
        return $result;
    }
}

/**
 * DTO for sending a utility message. Expects tenant_id, template_id, template_type, recipient, and optional variables.
 */
class SendUtilityMessageRequestDTO {
    public string $tenant_id;
    public string $template_id;
    public string $template_type;
    public int $recipient;
    public ?array $variables;

    public function __construct(string $tenant_id, string $template_id, string $template_type, int $recipient, ?array $variables = null) {
        $this->tenant_id = $tenant_id;
        $this->template_id = $template_id;
        $this->template_type = $template_type;
        $this->recipient = $recipient;
        $this->variables = $variables;
    }

    public static function fromArray(array $data): self {
        return new self(
            isset($data['tenant_id']) ? (string)$data['tenant_id'] : '',
            isset($data['template_id']) ? (string)$data['template_id'] : '',
            isset($data['template_type']) ? (string)$data['template_type'] : '',
            isset($data['recipient']) ? (int)$data['recipient'] : 0,
            $data['variables'] ?? null
        );
    }

    public function toArray(): array {
        return [
            'tenant_id' => $this->tenant_id,
            'template_id' => $this->template_id,
            'template_type' => $this->template_type,
            'recipient' => $this->recipient,
            'variables' => $this->variables,
        ];
    }
}

/**
 * DTO for checking onboarding status. Expects tenant_id.
 */
class CheckOnboardingStatusRequestDTO {
    public string $tenant_id;

    public function __construct(string $tenant_id) {
        $this->tenant_id = $tenant_id;
    }

    public static function fromArray(array $data): self {
        return new self(
            isset($data['tenant_id']) ? (string)$data['tenant_id'] : ''
        );
    }

    public function toArray(): array {
        return [
            'tenant_id' => $this->tenant_id,
        ];
    }
} 