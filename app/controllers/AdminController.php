<?php

class AdminController extends BaseController {

    public function processLogin() {

        //validate
        $rules = array(
            'username'    => 'required', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password')
            );

            if (Auth::attempt($userdata)) {

                return Redirect::to('admin/dashboard');
            }
            else {
                return Redirect::to('admin');
            }
        }

    }

    public function addUser() {

        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'username' => 'required',
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        $user = new User();
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        return Redirect::to('admin/add-user')
            ->with('success', 'User has been successfully added');
    }

    

}