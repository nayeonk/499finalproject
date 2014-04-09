<html>
    <head>
        <title>Checkout</title>
    </head>

    <body>
        <form action="/process-checkout" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_hYCEaZkuGzZednG0RuGgFo20"
                data-amount="2000"
                data-name="Demo Site"
                data-description="2 widgets ($20.00)"
                data-image="/128x128.png">
            </script>
        </form>
    </body>
</html>