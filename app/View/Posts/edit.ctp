

<html>
<head><title>Edit</title></head>
<body>
<div class="posts form">
<fieldset>
  <legend>
            <?php echo __('Edit Post') ; ?>
  </legend>
	<?php 	echo $this->Form->create ( 'Post', array ( 'enctype'=>'multipart/form-data' )) ;
			echo $this->Form->input ( 'title' ) ;
			echo $this->Form->input ( 'id', array ( 'type'=>'hidden' )) ;
			echo $this->Form->input ( 'body' ) ;
			echo $this->Form->input ( 'image', array ('type'=>'file' )) ;
			echo $this->Form->end ( 'Save Post' ) ;
	?>
</fieldset>
</div>
<?php if ($this->Session->check ('Auth.User')) {
            echo $this->Html->link ( "return to posts page", array ('action'=>'index')) ; 
       }
?> 
</body>
</html>