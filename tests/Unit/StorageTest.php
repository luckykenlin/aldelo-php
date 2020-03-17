<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Storage;
use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId('D-181207-0001');
        Aldelo::setIsvKey('480a31cb-03e6-4718-9e16-2d7a27e7af8f');
        Aldelo::setAppKey('6eeeccfb-dd19-41a3-b2fa-a15586c23e64');
        Aldelo::setAppVersion('1.0.0.0');
        Aldelo::setStoreSubId('2296-1C2A');
    }

    /**
     * Retrieve group.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $fileName = 'a5f3458d-3e7a-4baf-bcbb-7d01bb4771ea';
        $file = Storage::retrieve($fileName);
        $this->assertNotNull($file);
    }
}
