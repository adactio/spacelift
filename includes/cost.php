<?php

$launch = $_DATA['launches']['launch'][$_GET['launcher']-1];
$launcher = $launch['launcher'];
$rockets = ceil($weight/$launch['kgcapacity']);
$cost = $weight*$launch['kgcost'];
$pennykm = ($cost*100*1.55)/100000;
// cost in dollars
// multiplied by cents in 1 dollar
// multipled by height of penny in millimetres
// divided by number of millimetres in a kilometre

?>

<header>
<h1>
<?php echo $rockets; ?> <?php echo $launcher; ?>
<?php if ($rockets > 1) echo 's';?>
</h1>
<h2>
<abbr title="dollars">$</abbr><?php echo number_format($cost); ?>
</h2>
</header>

<p class="info">That&rsquo;s a tower of pennies <?php echo number_format($pennykm); ?><abbr title="Kilometres">KM</abbr> high.
<br>
<?php if ($pennykm > 3800):
$ratio = round($pennykm/3800);
if ($ratio >=2): ?>
That&rsquo;s <?php echo $ratio; ?> times larger than a space elevator.
<?php else: ?>
That&rsquo;s larger than a space elevator.
<?php endif;
else: ?>
That&rsquo;s smaller than a space elevator.
<?php endif; ?>
</p>
<?php if ($pennykm < 100000000 ): ?>
<figure>
<img src="img/penny.png" style="height: <?php echo round($pennykm/10); ?>px; width: 8px">
<img src="img/penny.png" style="height: 380px; width: 8px">
</figure>
<?php endif; ?>