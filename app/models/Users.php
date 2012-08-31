<?php
namespace app\models;
use lithium\security\Password;

class Users extends  \lithium\data\Model{
	
		    //Basic validation
public $validates = array(
	        'username' => array(
	            array('notEmpty', 'message'=>'You must include a username.'),
		        ),
	        'password' => array(
	            array('notEmpty', 'message'=>'You must include a password.')
	        ),
	        'firstname' => array(
			    array('notEmpty', 'message'=>'You must include your First Name.')
			),
			'lastname' => array(
			    array('notEmpty','message'=>'You must include your Last Name.')
			 ),
			 'email' => array(
			     array('notEmpty','message'=>'Email cannot be empty.'),
			   
			 ),
			 
	    );
		
protected static $_current = null;

public static function current($refreshFromDatabase = false) {
	      if (!$refreshFromDatabase && static::$_current) {
	            return static::$_current;
	        }
	        if ($refreshFromDatabase) {
	          
	            return $userEntity;
	        }
        $sessionData = Session::read('username'); 
	        if (!$sessionData) {
	           
	        }
        $userEntity = static::create($sessionData, array('exists' => true));
	        static::$_current = $userEntity;
			
	        return $userEntity;
    }    		

}



?>
