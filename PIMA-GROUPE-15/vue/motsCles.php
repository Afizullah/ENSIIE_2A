<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8"/>
		<link rel="stylesheet" href="style/style.css"/>
		<title>Recherche par mots clés</title>
		<script type="text/javascript" src="../commun/services.js"></script>
	</head>

	<body>
	
	<header>
		<h1>Recherche par mots clés</h1>
	</header>
	
	<div id="elementsCentraux">
	
		<nav>
			<h1>Menu</h1>
			<ul>
				<li><a href="index.php?page=accueil">Accueil</a></li>
			</ul>
			<ul>
				<li>🔍 <input placeholder="Rechercher" id="research" type="text" value=""/></li>
			</ul>
		</nav>

		<section id="motsClesSection">


			<?php
				$i = 0;
				foreach ($mots_cles as $value) {
					echo "<a class='motCle' id='mot_cle".$i."' href='index.php?page=imageMotsCles&mot_cle=".$value['mot']."' >";
					echo "&nbsp;";
					echo $value['mot'];
					echo "&nbsp;";
					echo "</a>";
					echo "<span id='espace".$i."'>&nbsp;&nbsp;</span>";
					$i++;
			}
			?>

		</section>

		<aside>
			<h1>Mon compte</h1>
			<ul>
				<li><a href="index.php?page=editUser">Mes informations</a></li>
				<li><a href="index.php?page=logout">Se déconnecter</a></li>
			</ul>
		</aside>
		
	</div>
	
	<footer>
		<p>
			Projet de PIMA du groupe 15
		</p>
	</footer>

	<script>

		function compare(mot1,mot2) {
			let n = mot2.length;
			let res = false;
			for (let i =0;i<n;i++) {
				if (mot1[i+1]===mot2[i]) {
					res = true;
				}
				else {
					return false;
				}
			}
			return res;
		}

		let target = document.getElementById('research');
		target.addEventListener('input',
			function () {
				let mot = document.getElementById("research").value;
				mot = mot.toLowerCase();
				let n = <?php echo count($mots_cles);?>;
				if (mot !== "") {
					for (let i = 0; i < n; i++) {
						let mot_cle = document.getElementById("mot_cle" + i);
						if (!compare(mot_cle.textContent.toLowerCase(), mot)) {
							mot_cle.style.display = "none";
							document.getElementById("espace"+i).style.display="none";
						}
						else {
							mot_cle.style.display = "inline";
							document.getElementById("espace"+i).style.display="inline";
						}
					}
				}
				else {
					for (let i = 0; i < n; i++) {
						let mot_cle = document.getElementById("mot_cle" + i);
						mot_cle.style.display = "inline";
						document.getElementById("espace"+i).style.display="inline";
					}
				}
			}
		);
	</script>

	</body>
</html>