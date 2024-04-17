<?php
declare(strict_types=1);

namespace Zenith\CloudUploader\Utils;

use Ramsey\Uuid\Uuid;

class FilenameGenerator
{

    public function uuid(): string
    {
        return Uuid::uuid4()->toString();
    }

}