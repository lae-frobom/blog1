
<?php
class Comment extends AppModel {
	var $name 	   = 'Comment';
	var $belongsTo = array ('Post'=> array ('className'=>'Post'));

	public $validate = array(
        'text' => array( 'rule' => 'notBlank' )
    );

	public function isOwnedBy ($comment, $user) {
    	return $this->field ('id', array ( 'id'=>$comment, 'user_id'=>$user )) !== false ;
	}
   
}