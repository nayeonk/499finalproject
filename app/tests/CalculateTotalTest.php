<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 5/4/14
 * Time: 11:15 PM
 */

class CalculateTotalTest extends TestCase {

    public function test_calculate() {
        $order1 = new WorkshopOrder();
        $order2 = new WorkshopOrder();
        $order3 = new WorkshopOrder();

        $order1->id = 1;
        $order1->quantity = 5;
        $order1->price = 5;

        $order2->id = 2;
        $order2->quantity = 1;
        $order2->price = 5;

        $order3->id = 3;
        $order3->quantity = 8;
        $order3->price = 5;

        $array = [$order1, $order2, $order3];

        $response = $this->action('GET', 'WorkshopController@calculateTotal', $array );

        $this->assertEquals(70, $response->getContent());
    }
}
 