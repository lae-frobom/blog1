
<html>
<head><title>Add</title></head>
<body>
<div class="posts form">
<fieldset>
    <legend>
            <?php echo __('Add Post') ; ?>
  	</legend>
    <?php   echo $this->Form->create ('Post', array ( 'enctype'=>'multipart/form-data' ));
            echo $this->Form->input ( 'title' );
            echo $this->Form->input ( 'body', array ( 'rows'=>'3' )) ;
            echo $this->Form->input ( 'image', array ( 'type'=>'file' ));
            echo $this->Form->end ( 'Save Post' );
    ?>
</fieldset>
</div>
<?php if ($this->Session->check ('Auth.User')) {
            echo $this->Html->link ( "return to posts page", array ('action'=>'index')) ; 
       }
?>    
</body>
</html>
