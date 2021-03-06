
<?php

App::uses ('AppController', 'Controller') ;

class UsersController extends AppController {

  public $components = array('Paginator');

    public function beforeFilter ( ) {
      parent::beforeFilter( ) ;
      $this->Auth->allow ('add', 'logout') ;
    }

    public function login ( ) {
      if ( $this->request->is ('post')) {
          if ( $this->Auth->login ( )) {
              return $this->redirect(array ('controller'=>'posts','action'=>'index'));
          }
          $this->Flash->error (__( 'Invalid username or password!' )) ;
      }
    }

    public function logout ( ) {
        return $this->redirect ( $this->Auth->logout ( )) ;
    }
 

    public function index ( ) {
         $this->User->recursive = 0;
         $this->paginate=array('limit' => 5 );
         $this->set ( 'users', $this->paginate ( )) ;
    }

    public function add ( ) {
         if ( $this->request->is ('post')) {
              $this->User->create ( );
              if ($this->User->save ( $this->request->data )) {
                 $this->Flash->success (__( 'The user has been saved' )) ;
                 return $this->redirect (array ( 'action'=>'index' ));
              }
              $this->Flash->error (__( 'The user could not be saved.' ));
        }
    }

    public function edit ($id = null) {
            $this->User->id = $id;

            if ( !$this->User->exists ( )) {
                 throw new NotFoundException (__('Invalid user')) ;
            }

            if ( $this->request->is ('post') || $this->request->is ('put')) {
                 if ( $this->User->save ($this->request->data)) {
                      $this->Flash->success (__( 'The user has been saved' )) ;
                      return $this->redirect (array ( 'action' => 'index' )) ;
                 }
                 $this->Flash->error (__( 'The user could not be saved.' )) ;
            } else {
                 $this->request->data = $this->User->findById ($id) ;
                 unset ( $this->request->data ['User']['password']) ;
            }
    }

    public function delete ($id = null) {
            $this->request->is ('post') ;
            $this->User->id = $id;

            if ( !$this->User->exists ( )) {
                 throw new NotFoundException (__('Invalid user')) ;
            }

            if ( $this->User->delete ( )) {
                 $this->Flash->success (__( 'User deleted' )) ;
                 return $this->redirect (array ( 'action'=>'index' )) ;
            }
            $this->Flash->error (__( 'User was not deleted' )) ;
            return $this->redirect (array ( 'action'=>'index' )) ;
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function isAuthorized ($user) {
        if ( in_array ( $this->action, array ( 'edit', 'delete' ))) {
           if ( isset( $user['role'] ) && $user['role'] === 'admin') {
                   return true;
           }
           return false ;
        }
    }
}

?>