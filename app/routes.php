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

    // Use the config for the stripe secret key
    Stripe::setApiKey(Config::get('stripe.stripe.secret'));

    // Get the credit card details submitted by the form
    $token = Input::get('stripeToken');

    // Create the charge on Stripe's servers - this will charge the user's card
    try {
        $charge = Stripe_Charge::create(array(
                "amount" => 2000, // amount in cents
                "currency" => "usd",
                "card"  => $token,
                "description" => 'Charge for my product')
        );

    } catch(Stripe_CardError $e) {
        $e_json = $e->getJsonBody();
        $error = $e_json['error'];
        // The card has been declined
        // redirect back to checkout page
        return Redirect::to('pay')
            ->withInput()->with('stripe_errors',$error['message']);
    }
    // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
    // Stripe charge was successful, continue by redirecting to a page with a thank you message
    return Redirect::to('/success');
});