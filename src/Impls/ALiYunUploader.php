<?php
declare(strict_types=1);

namespace Zenith\CloudUploader\Impls;

use OSS\Core\OssException;
use OSS\Http\RequestCore_Exception;
use OSS\OssClient;
use Override;
use Throwable;
use Zenith\CloudUploader\Configs\ALiYunConfig;
use Zenith\CloudUploader\Exceptions\PutObjectFailedException;
use Zenith\CloudUploader\IUploader;

class ALiYunUploader implements IUploader
{

    private OssClient $client;

    private mixed $result;

    private Throwable $exception;

    public function __construct(ALiYunConfig $config)
    {
        $this->client = new OssClient(
            $config->getAccessKeyId(),
            $config->getAccessKeySecret(),
            $config->getEndpoint()
        );
    }

    /**
     * @param string $bucket
     * @param string $filename
     * @param string $filepath
     * @return string
     * @throws PutObjectFailedException
     */
    #[Override]
    public function put(string $bucket, string $filename, string $filepath): string
    {
        try {
            $this->result = $this->client->putObject($bucket, $filename, file_get_contents($filepath));
        } catch (OssException|RequestCore_Exception $e) {
            $this->exception = $e;
            throw new PutObjectFailedException($e->getMessage());
        }
        return $this->result['info']['url'];
    }

    #[Override]
    public function getException(): Throwable
    {
        return $this->exception;
    }

    #[Override]
    public function getResult(): mixed
    {
        return $this->result;
    }
}
