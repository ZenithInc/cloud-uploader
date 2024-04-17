<?php
declare(strict_types=1);

use Zenith\CloudUploader\Configs\ALiYunConfig;
use Zenith\CloudUploader\Exceptions\NotSupportedCloudException;
use Zenith\CloudUploader\Uploader;
use Zenith\CloudUploader\Utils\FilenameGenerator;

include 'vendor/autoload.php';

$config = new ALiYunConfig('LTAI5tMdM71YUtaGWji8D', 'F8Ar0j1V3n2cY6LVkojjlnjDw', 'oss-cn-hangzhou.aliyuncs.com');
try {
    $uploader = new Uploader(Uploader::ALIYUN, $config);
} catch (NotSupportedCloudException $e) {
    die('Not Supported Cloud');
}
$filename = (new FilenameGenerator())->uuid('putObject.txt');
$url = $uploader->put('zenith-he-storage-dev', $filename, 'tests/putObject.txt');
var_dump($url);
