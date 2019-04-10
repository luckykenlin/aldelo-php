<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Discount;
use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
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
     * Fetch discounts.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchTest()
    {
        $this->setUpEnv();
        $discounts = Discount::fetch();
        $this->assertNotNull($discounts);
    }

    /**
     * Retrieve discount.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $discountId = 1000000000000000001;
        $discount = Discount::retrieve($discountId);
        $this->assertNotNull($discount);
    }
}
