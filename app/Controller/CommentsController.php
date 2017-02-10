
<?php

include 'PostsController.php';

class CommentsController extends AppController {
	public $helpers = array ('Html', 'Form') ;

    public function  add ( $id = null ) {
        if ($this->request->is ('post')) {
            $this->Comment->create ( );
    		$post = new PostsController ;
            $this->request->data ['Comment']['user_id']  = $this->Auth->user ('id') ; 
            $this->request->data ['Comment']['username'] = $this->Auth->user ('username') ;
            
            $postfield = $post->Post->findById ($id) ;
            $postid    = $postfield['Post']['id'];
            $this->request->data ['Comment']['post_id'] = $postid ;

            if ($this->Comment->save ( $this->request->data )) {
                $this->Flash->success (__( 'Your comment has been saved.' ));
                return $this->redirect( array ( 'controller'=>'posts', 'action'=>'view', $postid )) ;
            }
            $this->Flash->error (__ ( 'Unable to add your comment.' )) ;
        }
    }

    public function delete ( $id, $postid ) {
        if ( $this->request->is ( 'get' )) {
              throw new MethodNotAllowedException ( );
        }

        $post 		= 	new PostsController ;
        $postfield	=	$post->Post->findById ($postid) ;
        $postid 	=	$postfield ['Post']['id'] ;
        $commentuid	=	$this->Comment->findById ($id) ;
        $userid 	=	$this->Auth->user ('id') ;

        if( $userid == $commentuid ['Comment']['user_id'] ){
            if($this->Comment->delete ( $id )) {
               $this->Flash->success (__ ( 'Successfully Deleted.'));
               $this->redirect ( array ( 'controller'=>'posts', 'action'=>'view', $postid )) ;
            }else{
                $this->Flash->error (__ ( 'Failed to delete.'));
                $this->redirect ( array ( 'controller'=>'posts', 'action'=>'view', $postid )) ;
            }
        }
    }

    public function isAuthorized ( $user ) {
        if ($this->action === 'add') {
            return true;
        }
        if ( in_array ( $this->action, array ('delete'))) {
              $commentId = (int) $this->request->params ['pass'][0] ;
              if ( $this->Comment->isOwnedBy ( $commentId, $user['id'] )) {
                  return true;
              }
        }
    }
    
}
?>