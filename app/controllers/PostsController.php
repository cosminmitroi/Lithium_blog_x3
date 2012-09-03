<?php
namespace app\controllers;

use app\models\Posts;
//use app\models\Comments;

use app\models\Users;
use lithium\security\Auth;
use lithium\storage\Session;
use lithium\data\model\Query;

class PostsController extends \lithium\action\Controller {

    public function index() {
        $page = 1;
        $limit = 15;
        $order = 'created desc';
       
        if (isset($this->request->params['page'])) {
            $page = $this->request->params['page'];

            if (!empty($this->request->params['limit'])) {
                $limit = $this->request->params['limit'];
            }
        }

        $offset = ($page - 1) * $limit;
        $total = Posts::find('count');
		$user_id = Session::read('member.id');
	    $fields = array(
						    'Posts.id AS id',
							'Posts.title AS title',
							'Posts.body AS body',	
							'Users.username AS username',
							'CONCAT_WS(" ", Users.firstname, Users.lastname) AS Name',
						);
		$joins =   array(
							'type' => 'LEFT',
							'source' => 'users',
							'alias' => 'Users',
							'constraint' => 'Users.id = Posts.user_id'
						);				
							
		if(Auth::check('member', $this->request)) {
			  $posts = Posts::all(array(
				 	'conditions' => array(
				 		'user_id' => $user_id
					),
					
					'fields' => array(
									   $fields
					),
					
					'joins' => array(
					   			      $joins
					),
					'page' => $page,
					'limit' => $limit,
					'order' => $order
				 ));
				 $posts = $posts ? $posts->data() : array();
 			}else{
				
				 $posts = Posts::all(array(
					'fields' => array(
						              $fields
					                  ),	
					'joins' => array(
					                  $joins
								    ),	
					'page' => $page,
					'limit' => $limit,
					'order' => $order
					
				 ));
				 $posts = $posts ? $posts->data() : array();	
		
	 }
 		
        $title = 'Home';

		$is_auth = 1;
        return compact('posts', 'limit', 'page', 'total', 'title', 'is_auth');
    }
    
	public function view($id = null) {
        $post = Posts::find($id);
          if(!Auth::check('member', $this->request)) {
			 return $this->redirect('Users::login');	
		 }
 		
        if (!$post) {
            throw new \Exception ('Invalid post if provided');
        }
 
        $post = $post->to('array');
        $title = $post['title'];
 
        return compact('post', 'id', 'title');
    }
    
    public function add() {
    	  if(!Auth::check('member', $this->request)) {
			 return $this->redirect('Users::login');	
		 }
 		
        if ($this->request->data) {
            // Create a post object and add the posted data to it
            $user_id = Session::read('member.id');
            $post = Posts::create($this->request->data);
			$post->user_id = $user_id;
		    
             if ($post->save()) {
                 $this->redirect('Posts::index');
             }
        }

        if (empty($post)) {
            // Create an empty post object
            $post = Posts::create();
			
        }     
       		 $title = 'Add post';
  
        return compact('post', 'title');
    }
	
	
    public function edit($id = null) {
        $id = (int)$id;
        $post = Posts::find($id);
         if(!Auth::check('member', $this->request)) {
			 return $this->redirect('Users::login');	
		 }
 		
        if (empty($post)) {
            $this->redirect(array('controller' => 'posts', 'action' => 'index'));
        }

        if ($this->request->data) {
            if ($post->save($this->request->data)) {
                $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            }
        }

        $title = 'Edit post';
        return compact('post', 'title');
    }

    public function delete($id = null) {
    	if(!Auth::check('member', $this->request)) {
			 return $this->redirect('Users::login');	
		 }
        $id = (int)$id;

        $post = Posts::find($id);
       
        if (empty($post)) {
            $this->redirect(array('controller' => 'posts', 'action' => 'index'));
        }

        if ($post->delete()) {
            $this->redirect(array('controller' => 'posts', 'action' => 'index'));
        }
		
        $this->redirect(array('controller' => 'posts', 'action' => 'index'));

        return;
    }

	
}
