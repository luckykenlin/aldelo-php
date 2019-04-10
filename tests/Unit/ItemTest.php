<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId('D-190329-0002');
        Aldelo::setIsvKey('1cf35aac-be87-455b-815a-d2e04963f66d');
        Aldelo::setAppKey('90326b57-a7d2-41cb-ad2a-82f1243d1b24');
        Aldelo::setAppVersion('0.0.0.0');
        Aldelo::setStoreSubId('2437-F8BA');
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
