# Cloud Uploader 

Universal Cloud Storage Uploader is a PHP package enabling easy file uploads to multiple cloud services including Alibaba Cloud OSS, Qiniu, Tencent Cloud, and Google Cloud. It provides a simple, unified API for streamlined integration and management.

> This project is currently under development. Please be cautious when using it in a production environment.

## ALiCloud

Upload file to ALiCloud, for example:

```php
use Zenith\CloudUploader\Configs\ALiYunConfig;
use Zenith\CloudUploader\Exceptions\NotSupportedCloudException;
use Zenith\CloudUploader\Uploader;
use Zenith\CloudUploader\Utils\FilenameGenerator;

include 'vendor/autoload.php';

$config = new ALiYunConfig('LTAI5tMdM71yUtaGWji8D', 'F8Ar0n2chj1AlY6LVkojjlnjDw', 'oss-cn-hangzhou.aliyuncs.com');
try {
    $uploader = new Uploader(Uploader::ALIYUN, $config);
} catch (NotSupportedCloudException $e) {
    die('Not Supported Cloud');
}
$filename = (new FilenameGenerator())->uuid('putObject.txt');
$url = $uploader->put('zenith-he-storage-dev', $filename, 'tests/putObject.txt');
var_dump($url);
```