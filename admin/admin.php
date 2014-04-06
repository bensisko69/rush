<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>42 Shop</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<div id="div_logo"><a href="../index.php"><img id="logo" src="../img/42.jpg" title="logo" alt="logo" /></a></div>
			<div id="title"><h1>Starcraft shop.com</h1></div>
			<div id="div_client" ><a href="../inscription/inscription.php"><img id="client" src="../img/client.png" title="client" alt="client"></a></div>
			<?php
				session_start();
				if (isset($_SESSION['login']))
					echo "<p>Bonjour : " . $_SESSION['login'] . "</p>\n";
			?>
		</header>
		<section>
			<div id="menus_left">
				<div id="panier" ><a href="../panier/panier.php"><img id="size_panier"src="../img/panier.gif" title="panier" alt="panier" ><p id="p_panier" >Mon panier</p></a></div>
				<div class="vet" ><a href="../chemise/chemises.php"><img id="size_vet" src="../img/vet.png" title="chemises" alt="chemises" ></a></div>
				<div class="vet" ><a href="../pantalon/pantalon.php"><img id="size_pant" src="../img/pant.png" title="pantalon" alt="pantalon" ></a></div>
				<div class="vet" ><a href="../chaussures/chaussures.php"><img id="size_shoes" src="../img/chaussure.png" title="chaussure" alt="chaussure" ></a></div>
			</div>
			<div id="menus_center">
				<form method="post" action="admin_products.php">
					<fieldset>
						<legend>Add / Modify products</legend>
						<label>Name :</label><input type="text" name="name" value="" size="30"><br/>
						<label>Description :</label><input type="text" name="description" value="" size="30"><br/>
						<label>Minerals :</label><input type="text" name="minerals" value="" size="30"><br/>
						<label>Vespene :</label><input type="text" name="vespene" value="" size="30"><br/>
						<label>Faction :</label><input type="text" name="faction" value="" size="30"><br/>
						<label>Armor_type :</label><input type="text" name="armor_type" value="" size="30"><br/>
						<input type="checkbox" name="dump_csv" value="TRUE">flush<br/>
						<input class="ok" type="image" src="../img/envoyer.png" name="action" value="set" />
					</fieldset>
				</form>
				<form method="post" action="admin_products.php">
				<fieldset>
					<legend>Remove products</legend>
					<select name="name">
						<optgroup label="name">
						<?php
							$PRODUCT_DB_FILE = "../data/products.db";
							$products = unserialize(file_get_contents($PRODUCT_DB_FILE));
							foreach ($products['name'] as $name)
								echo "<option value=\"$name\">$name</option>";
						?>
						</optgroup>
					</select><br/>
					<input type="checkbox" name="dump_csv" value="TRUE">flush<br/>
					<input class="ok" type="image" src="../img/envoyer.png" name="action" value="del" />
				</fieldset>
				</form>
			</div>
		</section>
		<footer>
			<div>
				<h2>&copy; lrenoud- &amp; bnizard 42shop.com</h2>
			</div>
		</footer>
	</body>
</html>
