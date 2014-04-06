<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>42 Shop</title>
		<link rel="stylesheet" type="text/css" href="inscription.css">
	</head>
	<body>
		<header>
			<div id="div_logo"><a href="../index.php"><img id="logo" src="../img/42.jpg" title="logo" alt="logo" /></a></div>
			<div id="title"><h1>Starcraft shop.com</h1></div>
			<div id="div_client" ><a href="inscription.php"><img id="client" src="../img/client.png" title="client" alt="client"></a></div>
			<?php
				session_start();
				if (isset($_SESSION['connect']))
				{
					$infos = $_SESSION['connect'];
					echo "<p>Bonjour : " . $infos['login'] . "</p>\n";
					if ($infos['is_admin'])
						echo "<p><a href=\"../admin/admin.php\">administration</a></p>";
				}
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
				<form method="post" action="login.php">
					<fieldset>
						<legend>Déjà inscrit</legend>
						<label class="label_pseudo" >Votre pseudo :</label><input type="text" name="login" value="" size="30" placeholder="Ex : ZAZ"><br/>
						<label class="label_passe" >Votre mot de passe</label> : <input type="text" name="password" value="" size="30" placeholder="Ex : 12345"><br/>
						<input class="ok" type="image" src="../img/envoyer.png" name="connect" value="OK" />
					</fieldset>
				</form>
				<form method="post" action="login.php">
					<fieldset>
						<legend>Pas encore inscrit</legend>
						<label id="label_civilite" >Votre civilité ?</label>
							<select >
								<optgroup label="Civilité">
									<option value="monsieur">Monsieur</option>
									<option value="madame">Madame</option>
									<option value="mademoiselle">Mademoiselle</option>
								</optgroup>
							</select><br/>
						<label id="label_name" >Votre prénom :</label><input type="text" name="name" value="" size="30" placeholder="Ex : pierre"><br/>
						<label id="label_surname" >Votre nom :</label><input type="text" name="surname" value="" size="30" placeholder="Ex : richard"><br/>
						<label id="label_mail" >Votre Email :</label><input type="email" name="email" value="" size="30" placeholder="Ex : richard@gmail.com"><br/>
						<label class="label_pseudo" >Votre pseudo :</label><input type="text" name="login" value="" size="30" placeholder="Ex : ZAZ"><br/>
						<label class="label_passe" >Votre mot de passe</label> : <input  type="text" name="password" value="" size="30" placeholder="Ex : 12345"><br/>
						<input class="ok" type="image" src="../img/envoyer.png" name="register_new" value="OK" />
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
