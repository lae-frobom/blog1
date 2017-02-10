
<div class="users form">
<?php  echo $this->Form->create ('User') ; ?>
    <fieldset>
        <legend>
            <?php echo __('Edit User') ; ?>
        </legend>
        <?php   echo  $this->Form->input ('username') ;
                echo  $this->Form->input ('email') ;
                //echo  $this->Form->input ('password') ;
                //echo  $this->Form->input ('password_confirm', array ('label'=>'Confirm Password', 'maxLength'=>25, 'title'=>'Confirm password'
                                            //, 'type'=>'password')) ;
                echo  $this->Form->input ('role', array ('options'=>array ('admin'=>'admin', 'user'=>'user'))) ; 
                echo  $this->Form->submit ('Edit User', array ('class'=>'form-submit', 'title'=>'Click here to edit the user')) ; 
        ?>
    </fieldset>
    <?php echo $this->Form->end ( ); ?>
</div>
    
<?php if ($this->Session->check ('Auth.User')) {
               echo $this->Html->link ( "back to page", array ('action'=>'index', 'controller'=>'posts')) ; 
      }
?>
