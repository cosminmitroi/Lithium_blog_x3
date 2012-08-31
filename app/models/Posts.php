<?php
namespace app\models;

use \lithium\util\Validator;
use \lithium\data\Connections;

class Posts extends \lithium\data\Model {
    public $validates = array(
                             'title' => array(
                                         array('notEmpty', 'message' => 'Title cannot be empty'),
                                         array('isUniqueTitle', 'message' => 'Title must be unique'),
                                        ),
                             'body' => 'Please enter some content for this post',
                            );
	
	public $belongsTo = array(
		'Users' => array('id' => 'user_id')
	);
	

    public static function __init(array $options = array()) {
    	
        parent::__init($options);
        $self = static::_instance(__CLASS__);

        $self->_finders['count'] = function($self, $params, $chain) use (&$query, &$classes) {
            $db = Connections::get($self::meta('connection'));
            $records = $db->read('SELECT count(*) as count FROM posts', array('return' => 'array'));

            return $records[0]['count'];
        };
	   
	     
	    Posts::applyFilter('save', function($self, $params, $chain) {
            date_default_timezone_set('Europe/Bucharest');
			
			if ($params['data']) {
		        $params['entity']->set($params['data']);
		        $params['data'] = array();
				$params['entity']->modified = date('Y-m-d H:i:s');
		    }
		    if (!$params['entity']->exists()) {
		        $params['entity']->created = date('Y-m-d H:i:s');
		    }
            
            return $chain->next($self, $params, $chain);
        });
        
		  //implementation for validaion rule
        Validator::add('isUniqueTitle', function ($value, $format, $options) {
            $conditions = array('title' => $value);

            // skip the current post
            if (isset($options['values']['id'])) {
                $conditions[] = 'id != ' . $options['values']['id'];
            }

            //  posts with same title
            return !Posts::find('first', array('conditions' => $conditions));
        });
		

    }
}

?>
