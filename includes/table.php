<table>
<tbody>
<?php
$count = 0;
foreach ($_DATA['launches']['launch'] as $launch):
$count++;
$rockets = ceil($weight/$launch['kgcapacity']);
$cost = $weight*$launch['kgcost'];
?>
<tr title="Getting one <?php echo $cargo; ?> into Geostationary Transfer Orbit requires <?php echo $rockets; ?> <?php echo $launch['launcher']; ?><?php if ($rockets>1) echo 's'; ?>">
<th><?php echo $launch['launcher']; ?></th>
<td><?php echo number_format($rockets); ?></td>
<td>
<?php
if ($rockets > 100 ):
	$total = sqrt($rockets);
	$height = round(100/log($total));
else:
	$total = $rockets;
	$height = 50;
endif;
for ($i=0; $i<$total; $i++): ?>
<img src="img/rocket.png" style="height: <?php echo $height; ?>px; float: left">
<?php endfor; ?>
</td>
<td title="<?php echo number_format(($cost*100*1.55)/100000); ?> kilometer tower of pennies">
<a href="?payload=<?php echo urlencode($cargo); ?>&amp;launcher=<?php echo $count; ?>">
<abbr title="dollars">$</abbr><?php echo number_format($cost); ?>
</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>