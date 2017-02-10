<?php

class Post extends AppModel {
	var $name 	 = 'Post';
	var $hasMany = array ( 'Comment'=>array ( 'className'=>'Comment',
							'conditions' =>array ('Comment.post_id'=>'Post') )) ;

	public $validate = array ( 'title' => array ( 'rule' => 'notBlank' ),
        					   'body' => array ( 'rule' => 'notBlank' )
    );
   
	public function isOwnedBy($post, $user) {
    	return $this->field('id', array ('id' => $post, 'user_id' => $user)) !== false;
	}

	
}

?>