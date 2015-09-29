<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SecurityTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    use DatabaseTransactions;

    /**
     * This variable represents the relative path to your
     * composer lock file
     */
    private $lock;
    private $checker = 'https://security.sensiolabs.org/check_lock';
    private $timeout = 20;

    public function __construct()
    {
    	//$this->lock = new CURLFile('./composer.lock', 'text/plain', 'lock');
    	$this->lock = './composer.lock';
    }

    protected function doCheck($lock)
    {
        if (false === $curl = curl_init()) {
            throw new RuntimeException('Unable to create a cURL handle.');
        }
        $postFields = array('lock' => PHP_VERSION_ID >= 50500 ? new \CurlFile($lock) : '@'.$lock);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_URL, $this->checker);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: text/plain'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        $response = curl_exec($curl);
        if (false === $response) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new RuntimeException(sprintf('An error occurred: %s.', $error));
        }
        $headersSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $headersSize);
        $body = substr($response, $headersSize);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if (400 == $statusCode) {
            throw new RuntimeException($body);
        }
        if (200 != $statusCode) {
            throw new RuntimeException(sprintf('The web service failed for an unknown reason (HTTP %s).', $statusCode));
        }
        return $body;
    }

    /**
	 * This test try to find some know issues 
	 * using your composer file.
	 */
    public function testIfComposerHaventKnowIssues()
    {
    	$response = $this->doCheck($this->lock);
    	$this->assertContains("No known* vulnerabilities detected.\n", $response);
    }
}
