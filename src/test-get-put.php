<?php

/* @var $s3 Aws\S3\S3Client */
$s3 = require 'client.php';

// Send a PutObject request and get the result object.
$insert = $s3->putObject([
     'Bucket' => 'testbucket',
     'Key'    => 'testkey',
     'Body'   => 'Hello from Minio!!'
]);

// Download the contents of the object.
$retrive = $s3->getObject([
     'Bucket' => 'testbucket',
     'Key'    => 'testkey',
     //'SaveAs' => 'testkey_local'
]);

// Print the body of the result by indexing into the result object.
echo $retrive['Body'];
