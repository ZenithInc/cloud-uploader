<?php
declare(strict_types=1);

namespace Zenith\CloudUploader;

use Throwable;
use Zenith\CloudUploader\Configs\ALiYunConfig;
use Zenith\CloudUploader\Exceptions\NotSupportedCloudException;
use Zenith\CloudUploader\Impls\ALiYunUploader;

class Uploader
{

    public const string ALIYUN = 'ALIYUN';

    private array $impls = [
        'ALIYUN' => ALiYunUploader::class
    ];

    private IUploader $uploader;

    /**
     * @throws NotSupportedCloudException
     */
    public function __construct(string $cloud, ALiYunConfig $config)
    {
        if (!isset($this->impls[$cloud])) {
            throw new NotSupportedCloudException("The $cloud not supported!");
        }
        $implClazz = $this->impls[$cloud];
        $this->uploader = new $implClazz($config);
    }

    public function put(string $bucket, string $filename, string $filepath): string
    {
        return $this->uploader->put($bucket, $filename, $filepath);
    }

    public function getException(): Throwable
    {
        return $this->uploader->getException();
    }

    public function getResult(): mixed
    {
        return $this->uploader->getResult();
    }
}
