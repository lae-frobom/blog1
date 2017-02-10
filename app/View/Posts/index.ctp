
<h1> Blog posts </h1>

<p> <?php 	echo $this->Html->link ( 'Add Post', array ( 'controller'=>'posts', 'action'=>'add' )); ?> </p>
<p> <?php 	if ($this->Session->check ('Auth.User')) {
				echo $this->Html->link ( "View Users List", array ( 'action' => 'index', 'controller' => 'users'));
			}
	?>
</p>
<table>
	<thead>
		<tr>
			<th> Title 		  </th>
			<th> Created_Date </th>
			<th> Modified_Date</th>
			<th> Actions      </th>	
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $posts as $post ): ?>
		<tr>
			<td>
				<?php echo $this->Html->link ( $post['Post']['title'], array ( 'action'=>'view', $post['Post']['id'] ));?>
			</td>
			<td>
				<?php echo $this->Time->niceShort($post['Post']['created']); ?>
			</td>
			<td>
				<?php echo $this->Time->niceShort($post['Post']['modified']); ?>
			</td>
			<td>
				<?php echo $this->Html->link ( 'Edit', array ( 'action'=>'edit', $post['Post']['id'] )); ?>
			</td>
			<td>
				<?php echo $this->Form->postLink ('Delete', array ('action'=>'delete', $post['Post']['id']), array ('confirm'=>'Are you sure?')); ?>
			</td>	
		</tr>
		<?php endforeach; ?>
		<?php unset($post); ?>
	</tbody>
</table>

<p>	<?php echo $this->Paginator->numbers();?> </p>

<p>	<?php 	if ($this->Session->check ('Auth.User')) { 
				echo $this->Form->button ( 'Logout', array( 'type'=>'button', 'onclick'=>'location.href=\'http://192.168.33.50/users/login\';' ));
		  	}else{
				echo $this->Form->button ( 'To Login Page', array( 'type'=>'button', 'onclick'=>'location.href=\'http://192.168.33.50/users/login\';' ));
			}
	?>
</p>