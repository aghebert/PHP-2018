<?php
/**
 * Created by PhpStorm.
 * User: helpdesk
 * Date: 5/21/2018
 * Time: 2:18 PM
 */

// Hardcoded credentials
    $s3Client = new S3Client([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => [
            'key'    => 'AKIAJY6W4SFQ57A7B33A',
            'secret' => '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',
        ],
    ]);

    $dynamoClient = new DynamoDbClient([
        'version'     => 'latest',
        'region'      => 'us-west-2',
        'credentials' => [
            'key'    => 'AKIAJY6W4SFQ57A7B33A',
            'secret' => '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',
        ],
    ]);
