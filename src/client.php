<?php

// Include the SDK using the Composer autoloader
date_default_timezone_set('America/Los_Angeles');
require '../vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
        'version' => 'latest',
        'region'  => 'us-east-1',
        'endpoint' => 'http://localhost:19000',
        'use_path_style_endpoint' => true,
        'credentials' => [
                'key'    => 'FWNV0XYHBELUDZJ03UE9',
                'secret' => 'wWX8NyJ/e8n0ZvWq6ohVrCSJVcQL4rAmMxZqyMsr',
            ],
]);

return $s3;
