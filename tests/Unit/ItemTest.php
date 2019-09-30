<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId(env("ALDELO_ISV_ID", 'D-181207-0001'));
        Aldelo::setIsvKey(env("ALDELO_ISV_KEY", '480a31cb-03e6-4718-9e16-2d7a27e7af8f'));
        Aldelo::setAppKey(env("ALDELO_APP_KEY", '6eeeccfb-dd19-41a3-b2fa-a15586c23e64'));
        Aldelo::setAppVersion(env("ALDELO_APP_VERSION", '1.0.0.0'));
        Aldelo::setStoreSubId(env("ALDELO_STORE_SUB_ID", '2296-1C2A'));
        Aldelo::setStoreSubId(env("ALDELO_STORE_APP_TOKEN", '72ce5c21-9885-4de8-9f07-7dcc3202e83a'));
    }

    /**
     * Fetch items.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchTest()
    {
        $this->setUpEnv();
        $groupId = 1000000000000000003;
        $query = [];
        $items = Item::fetch($groupId, $query);
        $this->assertNotNull($items);
    }

    /**
     * Retrieve item.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $itemId = 1000000000000000008;
        $item = Item::retrieve($itemId);
        $this->assertNotNull($item);
    }
}
