<?php
require_once "db.php";
$usersor = $db->prepare("SELECT * FROM users ");
$usersor->execute();  
?>
<html>
<head>
	<title>Users List</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script language="javascript" src="users.js" type="text/javascript"></script>
</head>
<body>
	<form name="frmUser" method="post" action="">
		<div style="width:500px;">
			<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
				<tr class="listheader">
					<td></td>
					<td>Username</td>
					<td>First Name</td>
					<td>Last Name</td>
				</tr>
				<?php
				$i=0;
				while ($usercek = $usersor->fetch(PDO::FETCH_ASSOC)) {
					if($i%2==0)
						$classname="evenRow";
					else
						$classname="oddRow";
					?>
					<tr class="<?php if(isset($classname)) echo $classname;?>">
						<td><input type="checkbox" name="userss[]" value="<?php echo $usercek["userId"]; ?>" ></td>
						<td><?php echo $usercek["userName"]; ?></td>
						<td><?php echo $usercek["firstName"]; ?></td>
						<td><?php echo $usercek["lastName"]; ?></td>
					</tr>
					<?php
					$i++;
				}
				?>
				<tr class="listheader">
					<td colspan="4"><input type="button" name="update" value="Update" onClick="setUpdateAction();" /> 

				</tr>
			</table>
		</form>
		<input type="button"  value="Delete"  onClick="setDeleteAction();" /></td>
	</div>
</body></html>