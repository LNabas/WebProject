<?php
require '_header.php'
?><!DOCTYPE html>
<html>
<head>
	<title>BDE CESI Lyon</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>

<div id="header">
	<div class="wrap">
		<div class="menu">
				<a href="shop.php" class="logo">Shop</a>
				<h1><a href="../account.php" style="text-decoration: none; color:white;">EXIA</a></h1>

				<ul class="panier">
					<li class="caddie"><a href="panier.php">Caddie</a></li>
					<li class="items">
						ITEMS
						<span id="count"><?= $panier->count(); ?></span>
					</li>
					<li class="total">
						TOTAL
						<span><span id="total"><?= number_format($panier->total(),2,',',' '); ?></span> €</span>
					</li>
				</ul>
		</div>
	</div>
</div>






	<div id="main" class="clearfix">
