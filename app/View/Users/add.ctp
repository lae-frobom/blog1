
<div class="users form">
<fieldset>
  <legend>
            <?php echo __('Register Here') ; ?>
  </legend>
  <?php  echo $this->Form->create ('User') ; 
         echo $this->Form->input ('username') ;
         echo $this->Form->input ('email') ;
         echo $this->Form->input ('password') ;
         echo $this->Form->input ('password_confirm', array ('label'=>'Confirm Password ', 'title'=>'Confirm password', 'type'=>'password')) ;
         echo $this->Form->input ('role', array ('options'=>array ('admin'=>'admin', 'user'=>'user'))) ; 
         echo $this->Form->end ('Add User') ; 
  ?>
</fieldset>
</div>
<?php if ($this->Session->check ('Auth.User')) {
          echo $this->Html->link ( "Logout", array ('action'=>'logout')) ; 
      }else {
          echo $this->Html->link ( "Return to login", array ('action'=>'login'));
      }
?>


