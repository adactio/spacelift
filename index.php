<?php

$_DATA = array();

$_DATA['launches'] = json_decode(file_get_contents('data/launches.json'),true);
$_DATA['payloads'] = json_decode(file_get_contents('data/payloads.json'),true);

$rgb = array('r' => 204, 'g' => 204, 'b' => 204);

if (!empty($_GET['payload'])) {
	foreach ($_DATA['payloads']['payload'] as $payload) {
		if ($_GET['payload'] == $payload['name']) {
			$cargo = $payload['name'];
			$weight = $payload['kg'];
			$hex = substr(md5($_GET['payload']),0,6);
			$rgb = array(
				'r' => hexdec(substr($hex,0,2)),
				'g' => hexdec(substr($hex,2,2)),
				'b' => hexdec(substr($hex,4,2))
			);
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
Spacelift<?php if (!empty($cargo)): echo ' &mdash; '.$cargo; endif;?>
</title>
<meta name="viewport" content="width=device-width; initial-scale=0.75">
<link rel="stylesheet" media="all" href="css/global.css">
<link rel="stylesheet" media="print" href="css/print.css">
<style>
body {
	background-color: rgba(<?php echo $rgb['r'].','.$rgb['g'].','.$rgb['b']; ?>,0.2);
}
</style>
</head>
<body>

<?php
include 'includes/nav.php';
if (!empty($cargo)) {
	if (empty($_GET['launcher'])) {
		include 'includes/table.php';
		include 'includes/sources.php';
	} else {
		include 'includes/cost.php';
	}
}
?>

</body>
</html>