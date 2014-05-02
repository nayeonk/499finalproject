<html>
<head>
    <title>Workshops</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        // This identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_test_hYCEaZkuGzZednG0RuGgFo20');

        var stripeResponseHandler = function(status, response) {
            var $form = $('#payment-form');

            if (response.error) {
                // Show the errors on the form
                $form.find('.payment-errors').text(response.error.message);
                $form.find('button').prop('disabled', false);
            } else {
                // token contains id, last4, and card type
                var token = response.id;
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $form.get(0).submit();
            }
        };

        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);

                // Disable the submit button to prevent repeated clicks
                $form.find('button').prop('disabled', true);

                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from submitting with the default action
                return false;
            });
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wrapper">
                <div class="row">
                    <div class="col-md-12 header">
                        <h3>Checkout</h3>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <form class="form-horizontal" role="form" id="payment-form" action="process-checkout" method="post">
                            <span class="payment-errors"></span>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" name="firstname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lname" name="lastname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Card Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" size="20" data-stripe="number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">CVC</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" size="4" data-stripe="cvc"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Expiration</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" size="2" data-stripe="exp-month" placeholder="MM"/>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" size="4" data-stripe="exp-year" placeholder="YYYY"/>
                                </div>
                            </div>
                            <div class="col-md-12 total-box">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <strong>TOTAL</strong>
                                    </div>
                                    <div class="col-sm-6">
                                        ${{ $finalTotal }}
                                    </div>
                                    <div class="col-sm-3">
                                        <button style="width:100%" type="submit" class="btn btn-primary">Purchase</button>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="finalTotal" value="{{$finalTotal}}"/>
                            @foreach ($orders as $order)
                            <input type="hidden" name="workshop[]" value="{{$order->id}}"/>
                            <input type="hidden" name="qty[]" value="{{$order->quantity}}"/>
                            @endforeach

                        </form>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 order-box">
                                <div class="row">
                                    <div class=" col-md-12 heading">ORDER DETAILS</div>
                                </div>
                                @foreach($orders as $workshop)
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 single-order">
                                        <p><strong>{{ $workshop->title }}</strong> <br/>
                                        <em>{{ $workshop->speaker }}</em></p>

                                            <div class="col-md-6">
                                                {{$workshop->quantity}} x ${{ $workshop->price }}
                                            </div>
                                            <div class="col-md-6">
                                                ${{ $workshop->total }}
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                                <button style="width:100%" class="btn btn-primary">Update Quantity</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>