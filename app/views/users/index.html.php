<h2>Users</h2>

<?php foreach($users as $user){ ?>
    <table class="nonospace" border="2">
    <thead style="background-color: #ddd">
    <tr>
    <td>UserName</td>
    <td>FirstName</td>
    <td>LastName</td>
    <td>Email</td>
    </tr>  
    <thead>
    <tbody>
    	<tr>
    	<td width="140"><h5><?=strtoupper($user->username) ?><h5></td>
    	<td width="140"><h6><?=$user->firstname; ?><h6></td>
    	<td width="140"><h6><?=$user->lastname; ?><h6></td>
    	<td width="140"><h6><?=$user->email; ?><h6></td>
    				
    	</tr>
    </tbody>

    </table>
<?php } ?>