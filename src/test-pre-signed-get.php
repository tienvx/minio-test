<?php

/* @var $s3 Aws\S3\S3Client */
$s3 = require 'client.php';

// Get a command object from the client
$command = $s3->getCommand('GetObject', [
            'Bucket' => 'testbucket',
            'Key'    => 'testkey'
        ]);

// Create a pre-signed URL for a request with duration of 10 miniutes
$presignedRequest = $s3->createPresignedRequest($command, '+10 minutes');

// Get the actual presigned-url
$presignedUrl = (string)  $presignedRequest->getUri();

echo 'Pre-signed url: ' . $presignedUrl . "\n";
echo file_get_contents($presignedUrl);
