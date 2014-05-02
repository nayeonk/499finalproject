<?php
class Order extends Eloquent{

    public function workshop() {
        return $this->belongsTo('workshop');
    }
} 