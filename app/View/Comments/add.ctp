
<h4>Add Comment</h4>

<?php  	echo $this->Form->create ('Comment') ;
		echo $this->Form->input ('text', array ('rows' => '1')) ;
		echo $this->Form->end ('Save Comment') ;
?>