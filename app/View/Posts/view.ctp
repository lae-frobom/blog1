
<html>
<head>
    <title></title>
</head> 
<body>

    <h1> 
    	<?php echo h ( $post['Post']['title'] ) ; ?> 
    </h1>
    <p>  
    	<?php echo $this->Html->image ('./posts/' . $post['Post']['image'], array( 'alt'=>'Image', 'style'=>'width:200px;' )); ?> 
    </p>
    <p>  
    	<?php echo h ( $post['Post']['body'] ); ?> 
    </p>
    <p> <small> Created: 
    		<?php echo $this->Time->niceShort( $post['Post']['created'] ); ?> 
    	</small> 
    </p>
    <p>
    	<?php echo $this->Html->link ( 'Add Comment', array ('controller' => 'comments', 'action' => 'add', $post['Post']['id'])); ?>
    </p>	
    
    <div class="Comment Form">
        <h4> Comments </h4> 
        <table>
                <?php foreach ( $comments as $comment ): ?>
                <tr>
                    <td>
                        <?php echo $comment['Comment']['username']. " : ". $comment['Comment']['text']; ?>
                        <p> <small> Created: <?php echo $this->Time->niceShort( $post['Post']['created'] ); ?> </small> </p>
                    </td>

                    <td>
                        <?php   echo $this->Form->postlink ( 'x', array ( 'controller'=>'comments' ,'action' => 'delete', $comment['Comment']['id'],
                                        $comment['Comment']['post_id'] ), array ( 'confirm'=>'Are you sure?' ));
                                
                        ?>
                    </td>   
                </tr>
                <?php endforeach; ?>
                <?php unset($comment); ?>
        </table> 
    </div> 
    <p> <?php   echo $this->Html->link ( "back", array ('action'=>'index')) ; ?> </p>
</body>
</html>