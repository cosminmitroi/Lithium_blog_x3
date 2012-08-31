<?php
namespace app\controllers;

use app\models\Users;
use \lithium\security\Auth;
use lithium\storage\Session;

class UsersController extends \lithium\action\Controller{
	   
	   public function index() {
			if(Auth::check('member', $this->request)) {
				    $users = Users::all();
	              return compact('users');
			
				return $this->redirect('Users::index');	
			}else{
				return $this->redirect('Users::login');
			}
	        
	    
       }
	   

    
	   public function login() {
			if(Auth::check('member', $this->request)) {
				$this->request->isauth = 1;
				return $this->redirect('Posts::index');	
			}else{
				$this->request->isauth = 0;	
			}
		}
	   
	   
       public function logout(){
			Auth::clear('member');
			return $this->redirect('Posts::index');
        }
		 
		public function view() {
				if(!isset($this->request->params['id'])){
					  return $this->redirect('Users::index');
		 		}	
			  $user = Users::find($this->request->params['id']);
			 
				return compact('user');
			}
       

		public function newUser(){
			
			if(!Auth::check('member', $this->request)) {
				return $this->redirect('Users::login');	
			}
 			
			$user = Users::create($this->request->data);
	        if (($this->request->data) && $user->save()) {
	        	
	            return $this->redirect('Users::index');
	        }
	        return compact('user');
		}

	  // public function add(){
			    // $register = NULL;
// 			
			    // if ( $this->request->data ){
			        // $register = Users::create($this->request->data);
			        // if ( $register->save() ){
			            // $this->redirect(array('controller' => 'users', 'action' => 'index'));
			        // }
// 			
			    // }
// 				
				// // if ( !Auth::check('member', $this->request) ){
			    // // //User is not authenticated, redirect to login
			    // // return $this->redirect('/users/login/');
			 // // }
			    // $data = $this->request->data;
// 			
			    // return compact('register','data');
			// }
// 	   
		
		// public function edit(){
			// if(!$this->request->params['id']){
				 // return $this->redirect('Users::index');
			// }
			// if($this->request->data){
				// if(Users::update(array(
				            // 'username' => $this->request->data['username'],
				            // 'email' => $this->request->data['email'],
				            // 'firstname' => $this->request->data['firstname'],
				            // 'lastname' => $this->request->data['lastname'],       
// 				             
				 // ),
				   // array(
				        // 'id' => $this->request->data['id']
				    // )
// 				                      
				// ));
			// }
			// $user = Users::first( $this->request->params['id'] );
			// return compact('user');
		// }
		

 }
?>
