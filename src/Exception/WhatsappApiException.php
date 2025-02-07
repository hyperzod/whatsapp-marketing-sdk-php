<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Exception;

class WhatsappApiException extends ApiErrorException
{
    /**
     * @var string|null
     */
    protected $templateId;

    /**
     * @var string|null
     */
    protected $recipient;

    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    public function getTemplateId()
    {
        return $this->templateId;
    }

    public function getRecipient()
    {
        return $this->recipient;
    }
} 