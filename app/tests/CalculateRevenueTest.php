<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 5/6/14
 * Time: 10:58 PM
 */

class CalculateRevenueTest extends PHPUnit_Framework_TestCase {

    public function test_revenue_calculate() {
        $order1 = new Order();
        $order2 = new Order();
        $order3 = new Order();

        $order1->id = 1;
        $order1->quantity = 5;
        $order1->workshop_id = 1;

        $order2->id = 1;
        $order2->quantity = 5;
        $order2->workshop_id = 2;

        $order3->id = 1;
        $order3->quantity = 5;
        $order3->workshop_id = 3;

        $array = [$order1, $order2, $order3];

        $response = $this->action('GET', 'AdminController@calculateRevenue', $array );

        $this->assertEquals(130, $response->getContent());

    }

}
 