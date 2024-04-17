<?php
declare(strict_types=1);

namespace Zenith\CloudUploader;

interface IUploader
{

    public function put(string $bucket, string $filename, string $filepath): string;

    public function getException();

    public function getResult();
}
