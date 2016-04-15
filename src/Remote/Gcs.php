<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Remote/Gcs.php
 */
namespace JaegerApp\Remote;

use League\Flysystem\AwsS3v2\AwsS3Adapter as Adapter; 
use Aws\S3\S3Client; 
 
/**
 * Jaeger - Google Cloud Storage Transfer Abstraction
 *
 * Simple intermediary between Flysystem and mithra62
 *
 * Note that this engine uses the S3 transport so Interoperability configuration is required on the Google side
 *
 * @package Remote
 * @author Eric Lamb <eric@mithra62.com>
 */
class Gcs extends Adapter
{

    /**
     * Returns the remote transport client
     * 
     * @param string $access_key            
     * @param string $secret_key            
     * @return \Aws\S3\S3Client
     */
    public static function getRemoteClient($access_key, $secret_key)
    {
        return S3Client::factory([
            'base_url' => 'http://storage.googleapis.com/',
            'key' => $access_key,
            'secret' => $secret_key
        ]);
    }
}