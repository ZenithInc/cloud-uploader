<?php
declare(strict_types=1);

namespace Zenith\CloudUploader\Configs;

class ALiYunConfig
{

    public function __construct(
        public string $accessKeyId,
        public string $accessKeySecret,
        public string $endpoint
    ) {}

    public function getAccessKeyId(): string
    {
        return $this->accessKeyId;
    }

    public function getAccessKeySecret(): string
    {
        return $this->accessKeySecret;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
