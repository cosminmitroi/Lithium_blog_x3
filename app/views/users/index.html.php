<h2>Users</h2>

<?php foreach($users as $user){ ?>
 <table class="nonospace" border="2">
    <thead style="background-color: #ddd">
    <tr>
    <td>UserName</td>
    <td>FirstName</td>
    <td>LastName</td>
    <td>Email</td>
    <td style="text-align:center "><?=$this->html->image('user_edit.png')?></td>
    <td style="text-align:center"><?=$this->html->image('user_delete.png')?></td>
   </tr>  
    <thead>
    <tbody>
    	<tr>
    	<td width="135"><h5><?= $this->html->link($user->username,'users/view/'.$user->id); ?></h5></td>	
    	<td width="135"><h6><?=$user->firstname; ?><h6></td>
    	<td width="135"><h6><?=$user->lastname; ?><h6></td>
    	<td width="135"><h6><?=$user->email; ?><h6></td>
    	<td width="7" style="text-align:center"><h6><?=$this->html->link('Edit',array('controller' => 'users', 'action' => 'edit','args' => array($user->id)));?></h6>
       	<td width="7" style="text-align:center"><h6><?=$this->html->link('Delete',array('controller' => 'users','action'=>'delete',
    	'args' => array($user->id)),array('onclick' => 'return confirm("Do you want to delete this post?")')); ?></h6></td>		
    	</tr>
    </tbody>
 </table>
<?php } ?>