<?php
/**
 * Created by PhpStorm.
 * User: Nayeon
 * Date: 4/21/14
 * Time: 9:29 PM
 */

class Workshop extends Eloquent {

    //public $id;
    //public $title;
    //public $price;
    //public $speaker;
    public $quantity;

    public static function validate($input) {
        return Validator::make($input, [
            'title' => 'required',
            'price' => 'required|numeric'
        ]);
    }


    public function location() {
        return $this->belongsTo('location');
    }
    public function speaker() {
        return $this->belongsTo('speaker');
    }
    public function day() {
        return $this->belongsTo('day');
    }
    public function time() {
        return $this->belongsTo('time');
    }
    public function type() {
        return $this->belongsTo('type');
    }
} 