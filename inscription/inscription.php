<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>42 Shop</title>
		<link rel="stylesheet" type="text/css" href="inscription.css">
	</head>
	<body>
		<header>
			<div id="div_logo"><a href="../index.php"><img id="logo" src="../img/42.png" title="logo" alt="logo" /></a></div>
			<div id="title"><h1>42shop.com</h1></div>
			<div id="div_client" ><a href="inscription.php"><img id="client" src="../img/client.png" title="client" alt="client"></a></div>
			<?php
				session_start();
				if (isset($_SESSION['connect']))
				{
					$name = $_SESSION['connect']['name'];
					$surname = $_SESSION['connect']['surname'];
					$email = $_SESSION['connect']['email'];
					$phone = $_SESSION['connect']['phone'];
					echo "<p>Bonjour $name $surname ($email) $phone</p>\n";
				}
			?>
		</header>
		<section>
			<div id="menus_left">
				<div id="panier" ><img src="../img/panier.png" title="panier" alt="panier" ><a href="../panier/panier.html"><p id="p_panier" >Mon panier</p></a></div>
				<div class="vet" ><img id="size_vet" src="../img/vet.png" title="chemises" alt="chemises" ><a href="../chemise/chemises.html"><p id="p_chem" >Chemises</p></a></div>
				<div class="vet" ><img src="../img/pant.png" title="pantalon" alt="pantalon" ><a href="../pantalon/pantalon.html"><p id="p_pant" >Pantalons</p></a></div>
				<div class="vet" ><img id="size_shoes" src="../img/chaussure.png" title="chaussure" alt="chaussure" ><a href="../chaussures/chaussures.html"><p id="p_chau" >Chaussures</p></a></div>
			</div>
			<div id="menus_center">
				<form method="post" action="login.php">
					<fieldset>
						<legend>Déjà inscrit</legend>
						<label class="label_pseudo" >Votre pseudo :</label><input type="text" name="login" value="" size="30" placeholder="Ex : ZAZ"><br/>
						<label>Votre mot de passe</label> : <input type="text" name="password" value="" size="30" placeholder="Ex : 12345"><br/>
						<input class="ok" type="image" src="../img/envoyer.png" name="connect" value="OK" />
					</fieldset>
				</form>
				<form method="post" action="register.php">
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
						<label id="label_name">Votre prénom :</label><input type="text" name="name" value="" size="30" placeholder="Ex : pierre"><br/>
						<label id="label_surname">Votre nom :</label><input type="text" name="surname" value="" size="30" placeholder="Ex : richard"><br/>
						<label id="label_mail">Votre Email :</label><input type="email" name="email" value="" size="30" placeholder="Ex : richard@gmail.com"><br/>
						<label id="label_tel">Votre Téléphone :</label><input type="tel" name="phone" value="" size="30" placeholder="Ex : 0123456789"><br/>
						<label class="label_pseudo" >Votre pseudo :</label><input type="text" name="login" value="" size="30" placeholder="Ex : ZAZ"><br/>
						<label>Votre mot de passe</label> : <input  type="text" name="password" value="" size="30" placeholder="Ex : 12345"><br/>
						<input class="ok" type="image" src="../img/envoyer.png" name="register" value="OK" />
					</fieldset>
				</form>
				<?php
					session_start();
					if (isset($_SESSION['connect']))
					{
						// Logout
						echo '<form method="post" action="logout.php">';
						echo '<fieldset>';
						echo '<legend>Logout</legend>';
						echo '<input type="submit" value="logout" name="action"/>';
						echo '</fieldset>';
						echo '</form>';
						// Unsubscribe
						echo '<form method="post" action="unregister.php">';
						echo '<fieldset>';
						echo '<legend>Unsubscribe</legend>';
						echo '<input type="submit" value="unsubscribe" name="action"/>';
						echo '</fieldset>';
						echo '</form>';
					}
				?>
			</div>
		</section>
		<footer>
			<div>
				<h2>&copy; lrenoud- &amp; bnizard 42shop.com</h2>
			</div>
		</footer>
	</body>
</html>
