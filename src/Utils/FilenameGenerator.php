<?php
declare(strict_types=1);

namespace Zenith\CloudUploader\Utils;

use Ramsey\Uuid\Uuid;

class FilenameGenerator
{

    public function uuid(string $filename): string
    {
        $extension = $this->getExtension($filename);
        $uuid = Uuid::uuid4()->toString();

        return "$uuid.$extension";
    }

    private function getExtension(string $filename): string
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }
}