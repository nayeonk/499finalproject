<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/admin', function() {
    if (Session::has('user')) {
        return View::make('admin/dashboard');
    }else {
        return View::make('admin/login');
    }
});

Route::post('/login-process', 'AdminController@processLogin');

Route::get('/admin/dashboard', function() {
    if (Auth::check()) {
        $workshops = Workshop::with('location', 'speaker', 'day', 'time', 'type')->get();
        $orders = Order::All();


        return View::make('admin/dashboard', [
            'workshops'=>$workshops
        ]);
    }
    else {
        return Redirect::to('admin');
    }

});

Route::get('/admin/orders', function() {
    if (Auth::check()) {
        $orders = Order::with('workshop')->get();

        //dd($orders);


        return View::make('admin/orders', [
            'orders'=>$orders
        ]);
    }
    else {
        return Redirect::to('admin');
    }

});

Route::get('/admin/add-user', function(){
    return View::make('admin/add-user');
});

Route::post('/admin/add-user','AdminController@addUser');

Route::get('/admin/add-workshop', function() {
    $locations = Location::all();
    $speakers = Speaker::all();
    $days = Day::all();
    $times = Time::all();
    $types = Type::all();

    $workshops = Workshop::with('location', 'speaker', 'day', 'time', 'type')->get();

    return View::make('admin/add-workshop', [
        'locations' => $locations,
        'speakers' => $speakers,
        'days' => $days,
        'times' => $times,
        'types' => $types,
        'workshops' =>$workshops
    ]);
});

Route::post('add-workshop-process', function() {
    $validation = Workshop::validate(Input::all());

    if($validation->passes()) {
        $workshop = new Workshop();
        $workshop->title = Input::get('title');
        $workshop->type_id = Input::get('type');
        $workshop->speaker_id = Input::get('speaker');
        $workshop->location_id = Input::get('location');
        $workshop->day_id = Input::get('day');
        $workshop->time_id = Input::get('time');
        $workshop->price = Input::get('price');
        $workshop->save();

        return Redirect::to('admin/add-workshop')
            ->with('success', 'Workshop has been successfully added');
    }
    return Redirect::to('admin/add-workshop')
        ->with('errors', $validation->messages());

});

Route::get('/workshops', 'WorkshopController@listWorkshops');
Route::post('/workshops/checkout', 'WorkshopController@checkout');

Route::post('/workshops/process-checkout', function() {

    // Use the config for the stripe secret key
    Stripe::setApiKey(Config::get('stripe.stripe.secret'));

    // Get the credit card details submitted by the form
    $token = Input::get('stripeToken');
    //dd(Input::get('finalTotal'));
    // Create the charge on Stripe's servers - this will charge the user's card
    try {
        $charge = Stripe_Charge::create(array(
                "amount" => Input::get('finalTotal') * 1000, // amount in cents
                "currency" => "usd",
                "card"  => $token,
                "description" => 'Charge for my product')
        );

    } catch(Stripe_CardError $e) {
        $e_json = $e->getJsonBody();
        $error = $e_json['error'];
        // The card has been declined
        // redirect back to checkout page
        return Redirect::to('checkout')
            ->withInput()->with('stripe_errors',$error['message']);
    }
    // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
    $workshops = $_POST['workshop'];
    $quantity = $_POST['qty'];
    for ($i=0; $i<sizeof($workshops); $i++) {
        $order = new Order();
        $order->firstname = Input::get('firstname');
        $order->lastname = Input::get('lastname');
        $order->email = Input::get('email');
        $order->quantity = $quantity[$i];
        $order->workshop_id = $workshops[$i];
        $order->total = Input::get('finalTotal');
        $order->save();
    }

    // Stripe charge was successful, continue by redirecting to a page with a thank you message
    return Redirect::to('/workshops/success');
});

Route::get('/workshops/success', function()
{
    return View::make('workshops/success');
});