<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
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
     * Fetch orders.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchTest()
    {
        $this->setUpEnv();
        $query = [];
        $requiredDate = now()->format('Ymd');
        $orders = Order::fetch($requiredDate, $query);
        $this->assertNotNull($orders);
    }

    /**
     * Create order.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testCreateTest()
    {
        $this->setUpEnv();
        $data = [
            "EmployeeID" => 1000000000000000003,
            "OrderType" => 1,
            "GuestCount" => 1,
            "SeatingID" => null,
            "BarTabName" => null,
            "CustomerID" => null,
            "CustomerPickupName" => null,
            "OrderDiscountID" => null,
            "CashPromoEmployeeID" => null,
            "CashPromoAmountApplied" => null,
            "OrderSurchargeID" => null,
            "DeliveryCharge" => null,
            "OrderGratuityPercent" => 0,
            "CashGratuityAmountUsed" => 0,
            "OrderNote" => null,
            "DoNotAutoPrint" => true,
            "OrderDetails" => [
                [
                    "ItemID" => 1000000000000000003,
                    "SeatNumber" => null,
                    "Qty" => 1,
                    "UnitPrice" => null,
                    "LineDiscountID" => null,
                    "LineNote" => null,
                    "CreatedByEmployeeID" => 1000000000000000003,
                    "OrderDetailModifiers" => []
                ]
            ]
        ];
        $order = Order::create($data);
        $this->assertNotNull($order);
    }

    /**
     * Retrieve Order
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $query = [
            'status' => 'open'
        ];
        $requiredDate = now()->format('Ymd');
        $orders = Order::fetch($query, $requiredDate);
        $order = null;
        if (!empty($orders)) {
            $order = Order::retrieve($orders[0]['OrderID']);
        }
        $this->assertNotNull($order);
        $this->assertArrayNotHasKey('err_code', $order);
    }

    /**
     * Update order.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testUpdateTest()
    {
        $this->setUpEnv();
        $query = [
            'status' => 'open'
        ];
        $requiredDate = now()->format('Ymd');
        $orders = Order::fetch($query, $requiredDate);
        $order = null;
        if (!empty($orders)) {
            $order = Order::retrieve($orders[0]['OrderID']);
        }
        $data = [
            "OrderID" => $order['OrderID'],
            "EmployeeID" => 1000000000000000003,
            "OrderType" => 1,
            "GuestCount" => 1,
            "SeatingID" => null,
            "BarTabName" => null,
            "CustomerID" => null,
            "CustomerPickupName" => null,
            "OrderDiscountID" => null,
            "CashPromoEmployeeID" => null,
            "CashPromoAmountApplied" => null,
            "OrderSurchargeID" => null,
            "DeliveryCharge" => null,
            "OrderGratuityPercent" => 0,
            "CashGratuityAmountUsed" => 0,
            "OrderNote" => null,
            "DoNotAutoPrint" => true,
            "DataSignature" => $order['DataSignature'],
            "OrderDetails" => [
                [
                    "ItemID" => 1000000000000000003,
                    "SeatNumber" => null,
                    "Qty" => 1,
                    "UnitPrice" => null,
                    "LineDiscountID" => null,
                    "LineNote" => null,
                    "CreatedByEmployeeID" => 1000000000000000003,
                    "OrderDetailModifiers" => []
                ]
            ]
        ];
        $result = Order::update($data);
        $this->assertEquals(0, $result['err_code']);
    }

    /**
     * Delete order.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testVoidTest()
    {
        $this->setUpEnv();
        $query = [
            'status' => 'open'
        ];
        $requiredDate = now()->format('Ymd');
        $orders = Order::fetch($query, $requiredDate);
        $order = null;
        $result = [];

        if (!empty($orders) && !array_key_exists('err_code', $orders)) {
            $result = Order::void($orders[0]['OrderID']);
        }
        $this->assertNotEmpty($result);
        $this->assertEquals(0, $result['err_code']);
    }
}
