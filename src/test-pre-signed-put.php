<?php

/* @var $s3 Aws\S3\S3Client */
$s3 = require 'client.php';

// Get a command object from the client
$command = $s3->getCommand('PutObject', [
            //'ACL'      => 'public-read',
            'Bucket'   => 'testbucket',
            'Key'      => 'testkey',
            /*'Metadata' => [
                'test'  => 123,
                'test2' => 'abc',
            ],*/
            // Limit 100M
            'content-length-range' => '0,104857600',
        ]);

// Create a pre-signed URL for a request with duration of 10 miniutes
$presignedRequest = $s3->createPresignedRequest($command, '+10 minutes');

// Get the actual presigned-url
$presignedUrl = (string)  $presignedRequest->getUri();

$filename = __DIR__ . '/../misc/test-file';
$file = fopen($filename, 'r');

$curl = curl_init();
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $presignedUrl);

curl_setopt($curl, CURLOPT_PUT, 1);
curl_setopt($curl, CURLOPT_INFILE, $file);
curl_setopt($curl, CURLOPT_INFILESIZE, filesize($filename));

$result = curl_exec($curl);
curl_close($curl);

echo 'Pre-signed url: ' . $presignedUrl . "\n";
echo $result;
