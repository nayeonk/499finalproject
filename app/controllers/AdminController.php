<?php

class AdminController extends BaseController {

    public function processLogin() {
        $request = Request::createFromGlobals();

        $username =  $request->request->get('username'); //$_POST['username']
        $password = $request->request->get('password'); //$_POST['password']



        $session = new Session();

        if (Auth::attempt(array('username' => $username, 'password' => $password))) {

            echo "success!";

            $session->set('username',$username);
            $session->set('email', 'dtang@usc.edu');
            $session->set('loginTime', time());

            $session->getFlashBag()->set('success', 'You have sucessfully logged in!');

            $response = new RedirectResponse('dashboard.php');
            $response->send();

        }else {
            echo "fail";
            echo $username;
            echo $password;
        }
    }

}