<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./tests/GcsTest.php
 */
namespace JaegerApp\tests\Remote;

use JaegerApp\Remote\Gcs;

/**
 * mithra62 - Gcs Remote Object Unit Tests
 *
 * Contains all the unit tests for the \mithra62\Remote\Gcs object
 *
 * @package mithra62\Tests
 * @author Eric Lamb <eric@mithra62.com>
 */
class GcsTest extends \PHPUnit_Framework_TestCase
{

    private function getGcsInstance()
    {
        $settings = $this->getGcsCreds();
        $gcs = new Gcs(Gcs::getRemoteClient($settings['gcs_access_key'], $settings['gcs_secret_key']), $settings['gcs_bucket']);
        return $gcs;
    }

    public function testInstance()
    {
        $gcs = $this->getGcsInstance();
        $this->assertInstanceOf('\League\Flysystem\AdapterInterface', $gcs);
    }

    public function testGetRemoteClient()
    {
        $settings = $this->getGcsCreds();
        $this->assertInstanceOf('\Aws\S3\S3Client', Gcs::getRemoteClient($settings['gcs_access_key'], $settings['gcs_secret_key']));
    }

    /**
     * The Google Cloud Storage Test Credentials
     */
    protected function getGcsCreds()
    {
        return include 'data/gcscreds.config.php';
    }
}