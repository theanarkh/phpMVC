<html>
<body>
<?php echo $name;?>
<ul>
	<?php foreach ($list as $key => $value): ?>
		<li><?php echo $value;?></li>
	<?php endforeach ?>
</ul>
</body>
</html>