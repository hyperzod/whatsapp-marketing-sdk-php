<?php

namespace Hyperzod\WhatsappMarketingSdkPhp\Client;

use Exception;
use GuzzleHttp\Client;
use Hyperzod\WhatsappMarketingSdkPhp\Enums\EnvironmentEnum;
use Hyperzod\WhatsappMarketingSdkPhp\Exception\InvalidArgumentException;
use Hyperzod\WhatsappMarketingSdkPhp\Exception\WhatsappApiException;

class BaseWhatsappMarketingClient implements WhatsappMarketingClientInterface
{
    /** @var string default base URL for Whatsapp Marketing API */
    const DEV_API_BASE = 'https://whatsapp-marketing.apps.hyperzod.dev/api';
    const PRODUCTION_API_BASE = 'https://whatsapp-marketing.apps.hyperzod.com/api';

    /** @var array<string, mixed> */
    private $config;

    /**
     * Initializes a new instance of the {@link BaseWhatsappMarketingClient} class.
     *
     * @param string $api_key the API key of the client
     * @param string $env the environment
     * @param string|null $token the auth token
     */
    public function __construct($api_key, $env, $token = null)
    {
        $config = $this->validateConfig(array(
            "api_key" => $api_key,
            "env" => $env,
            "token" => $token
        ));

        if ($config['env'] == EnvironmentEnum::DEV) {
            $config['api_base'] = self::DEV_API_BASE;
        } else {
            $config['api_base'] = self::PRODUCTION_API_BASE;
        }

        $this->config = $config;
    }

    /**
     * @param array<string, mixed> $config
     * @throws InvalidArgumentException
     */
    private function validateConfig($config)
    {
        if (!is_string($config['api_key'])) {
            throw new InvalidArgumentException('api_key must be a string');
        }

        if (!in_array($config['env'], [EnvironmentEnum::DEV, EnvironmentEnum::PRODUCTION])) {
            throw new InvalidArgumentException('env must be either dev or production');
        }

        return $config;
    }

    public function request($method, $path, $params = [])
    {
        $client = new Client();

        $headers = [
            'Content-Type' => 'application/json',
            'x-api-key' => $this->config['api_key']
        ];

        if (!empty($this->config['token'])) {
            $headers['Authorization'] = 'Bearer ' . $this->config['token'];
        }

        $options = [
            'headers' => $headers,
            'json' => $params
        ];

        try {
            $response = $client->request($method, $this->config['api_base'] . $path, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getApiKey()
    {
        return $this->config['api_key'];
    }

    public function getApiBase()
    {
        return $this->config['api_base'];
    }

    /**
     * Gets the env.
     *
     * @return string the env
     */
    public function getEnv()
    {
        return $this->config['env'];
    }

    /**
     * Gets the token.
     *
     * @return string|null the token
     */
    public function getToken()
    {
        return $this->config['token'];
    }

    private function validateResponse($response)
    {
        $status_code = $response->getStatusCode();

        if ($status_code >= 200 && $status_code < 300) {
            $response = json_decode($response->getBody(), true);
            if (isset($response["success"]) && boolval($response["success"])) {
                if (isset($response["data"])) {
                    return $response["data"];
                }
                if (isset($response["message"])) {
                    return $response["message"];
                }
                throw new Exception("Data node or message node not set in server response");
            }
            if (isset($response["success"]) && !boolval($response["success"])) {
                $message = null;
                if (isset($response["message"])) {
                    $message = $response["message"];
                }
                if (isset($response["data"])) {
                    $message = $message . json_encode($response["data"]);
                }
                throw new Exception($message);
            }
        }

        throw new Exception("Error Processing Response");
    }
}
