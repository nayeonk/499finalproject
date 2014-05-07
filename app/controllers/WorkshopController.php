<?php

class WorkshopController extends BaseController {
    public function listWorkshops() {
        $locations = Location::all();
        $speakers = Speaker::all();
        $days = Day::all();
        $times = Time::all();
        $types = Type::all();

        $fridayWorkshops = Workshop::with('location', 'speaker', 'day','time', 'type')->where('day_id','=',1 )->get();
        $saturdayWorkshops = Workshop::with('location', 'speaker', 'day','time', 'type')->where('day_id','=',2 )->get();

        //dd($fridayWorkshops);

        return View::make('workshops', [
            'locations' => $locations,
            'speakers' => $speakers,
            'days' => $days,
            'times' => $times,
            'types' => $types,
            'fridayWorkshops' =>$fridayWorkshops,
            'saturdayWorkshops' =>$saturdayWorkshops
        ]);
    }

    public function calculateTotal($orders) {

        $finalTotal = 0;

        foreach ($orders as $order){
            $finalTotal += $order->total;
        }

        return $finalTotal;
    }

    public function checkout() {

        $workshops = Workshop::with('speaker')->get();
        $orders = array();

        foreach ($workshops as $workshop) {
            $order = new WorkshopOrder();
            $index = 'workshop' . "$workshop->id";

            if ($_POST[$index] !=NULL) {
                $order->id = $workshop->id;
                $order->title = Workshop::find($workshop->id)->title;
                $order->price = Workshop::find($workshop->id)->price;
                $order->speaker = Workshop::find($workshop->id)->speaker->firstname . ' ' . Workshop::find($workshop->id)->speaker->lastname;
                $order->quantity = $_POST[$index];
                $order->total = $order->price * $order->quantity;

                $orders[] = $order;
            }
        }

        $finalTotal = $this->calculateTotal($orders);

        return View::make('workshops/checkout',[
            'orders' => $orders,
            'finalTotal' => $finalTotal
        ]);
    }
}