<hgroup>
<h1><a href="/">Space<wbr>lift</a></h1>
<h2>Choose your payload&hellip;</h2>
</hgroup>

<nav>
<ul>
<?php foreach ($_DATA['payloads']['payload'] as $payload): ?>
<li>
<a href="?payload=<?php echo urlencode($payload['name']); ?>" <?php if (!empty($_GET['payload']) && $_GET['payload']==$payload['name']) echo ' class="active"'; ?>>
<?php echo $payload['name']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>

<?php if (!empty($weight)): ?>
<header>
<h1><?php echo $_GET['payload']; ?></h1>
<h2>
<?php echo number_format($weight); ?><abbr title="Kilograms">KG</abbr>
<img src="http://chart.apis.google.com/chart?
chs=200x100
&amp;chf=a,s,000000|bg,s,67676700
&amp;cht=gom
&amp;chd=t:<?php echo round(log($weight)*(log($weight))/6); ?>
&amp;chco=CCCCCC,000000
">
</h2>
</header>
<?php endif; ?>