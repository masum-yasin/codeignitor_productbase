<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;



class SigninController extends BaseController

{
    protected $helpers=['form'];



    public function index()
    {
        return view('signin');
       
    }
    public function login(){
           $session = session(); 
           $userModel=new UserModel();
          $email= $this->request->getVar('email');
          $formpass= $this->request->getVar('password');
           $data=$userModel->where('email',$email)->first();
        //    print_r($data);
          if($data){
            $dbpass = $data['password'];
           $varified=  password_verify($formpass,$dbpass);
           if($varified){
            $userData =[
                "name" => $data['name'],
                "email" => $data['email'],
                'isLoggedIn' => TRUE
            ];
            $session->set($userData);
            return redirect()->to('/');
           }
           else{
            $session->setFlashdata("msg",'You password is incorrect');
            return redirect()->to('/signin');

           }
          
        }
        else{
            $session->setFlashdata('msg','your Email  incorrect');
            return redirect()->to('/signin');
        }
          
       

    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/signin');

        
    }
}
