<!DOCTYPE html>
<html>
<head>
	<title>Tableau de multiplication</title>
</head>
<body>
	<h2>Tableau de multiplication</h2>
	<table border="1" cellpadding="0" cellspacing="0" width="300px">
		<tr>
			<td width="30"></td>
			<?php for($c=0;$c<10;$c++) :?>
				<th width="30"><?php print $c ?></th>
			<?php endfor?>
		</tr>
		<?php for ($l=0;$l<10;$l++):?>
			<tr>
				<th><?php print $l ?></th>
				<?php for ($c=0;$c<10;$c++):?>
					<td align=center><?php print $c*$l ?></td>
				<?php endfor;?>
			</tr>
		<?php endfor?>
	</table>
	</body>
	</html>