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
      
	   public function delete($id = null){
	      if(!Auth::check('member', $this->request)){
	        	return $this->redirect('Users::index');
	      	
	        }
		   $id = (int) $id;
		   $users = Users::find($id);
		   if(empty($post)){
			   	    $this->redirect(array('controller' => 'users', 'action' => 'index'));
			   }
			   if($users->delete()){
			   	    $this->redirect(array('controller' => 'users', 'action' => 'index'));
			   }
		     	
		
		      return;
    	  }


  }
?>
