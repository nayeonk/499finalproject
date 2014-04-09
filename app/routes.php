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

Route::get('/checkout', function() {
   return View::make('checkout');
});

Route::post('/process-checkout', function() {
    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here https://manage.stripe.com/account
    Stripe::setApiKey("sk_test_3OUTh5ZtMnGAVXw0VWBfw915");

    // Get the credit card details submitted by the form
    $token = $_POST['stripeToken'];

    // Create the charge on Stripe's servers - this will charge the user's card
    try {
        $charge = Stripe_Charge::create(array(
                "amount" => 1000, // amount in cents, again
                "currency" => "usd",
                "card" => $token,
                "description" => "payinguser@example.com")
        );
    } catch(Stripe_CardError $e) {
        // The card has been declined
    }
});