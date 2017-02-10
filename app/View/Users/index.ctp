
<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th> Id       </th>
            <th> Username </th>
            <th> E-Mail   </th>
            <th> Created  </th>
            <th> Last Update </th>
            <th> Role     </th>
            <th> Actions  </th>
        </tr>
    </thead>
    <tbody>                       
        <tr>
        <?php foreach($users as $user): ?>                
            <td> <?php echo $user['User']['id'] ; ?> </td>
            <td> <?php echo $user['User']['username'] ; ?> </td>
            <td> <?php echo $user['User']['email'] ; ?> </td>
            <td> <?php echo $this->Time->niceShort( $user['User']['created'] ); ?> </td>
            <td> <?php echo $this->Time->niceShort( $user['User']['modified'] ); ?> </td>
            <td> <?php echo $user['User']['role'] ; ?> </td>
            <td>
                <?php echo $this->Html->link ("Edit", array ( 'action'=>'edit', $user['User']['id']) ); ?> 
                <?php echo $this->Html->link ("Delete", array ( 'action'=>'delete', $user['User']['id']), 
                                                            array ('confirm'=>'Are you sure?')); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
    </tbody>
</table>
<p> <?php echo $this->Paginator->numbers();?> </p>             
<p> <?php if ($this->Session->check ('Auth.User')) {
               echo $this->Form->button ( 'back', array( 'type'=>'button', 'onclick'=>'location.href=\'http://192.168.33.50/posts\';' ));
           }
    ?>
</p>	