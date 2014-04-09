<?php

namespace ITP\API;

class StripeCheckout {
    public function checkout() {
        $apiKey = "pxa8jt8uapkr4qbxcraanper";
        $endpoint = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=". $apiKey . "&q=" . $input . "&page_limit=1";
        $json = file_get_contents($endpoint);
        return json_decode($json);

    }
}