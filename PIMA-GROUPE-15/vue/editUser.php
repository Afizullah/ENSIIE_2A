<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<meta charset="utf-8"/>
		<title>Apod-Infos</title>
		<link rel="stylesheet" href="style/login.css"/>
	</head>
	
	<body>
	
		<header>
			<h1>Modifier vos informations</h1>
		</header>
		
		<div class = "belowHeader">
			<script type="text/javascript">
			  function testform(val){
					var fd = new FormData(document.getElementById(val));
					fd.append("ajax", val);
					$.ajax({
					  url: "index.php?page=editUser",
					  type: "POST",
					  data: fd,
					  processData: false,  
					  contentType: false   
					}).done(function( data ) {
					  if (data=='1'){
						document.getElementById("resu"+val).innerHTML="Mot de passe invalide";
						document.forms["f"+val]["mdp"].value="";
					  }
					  else if (data=='2'){
						document.getElementById("resu"+val).innerHTML="Les adresse saisies sont différentes";
						document.forms["f1"]["mail2"].value="";
					  }
					  else if(data=='3'){
						document.getElementById("resu"+val).innerHTML="Les mots de passe saisies sont différents";
						document.forms["f2"]["mdp1"].value="";
						document.forms["f2"]["mdp2"].value="";
					  }
					  else if(data=='5'){
						document.getElementById("resu"+val).innerHTML="Adresse email déjà utilisée";
						document.forms["f1"]["mail1"].value="";
						document.forms["f1"]["mail2"].value="";
					  }
					  else if(data=='6'){
						document.getElementById("resu"+val).innerHTML="Un mot de passe doit au moins contenir un caractère";
						document.forms["f2"]["mdp1"].value="";
						document.forms["f2"]["mdp2"].value="";
					  }
					  else if (data=='4'){
						document.getElementById("resu"+val).innerHTML="Modification effectuée";
						form_clear();
					  }
					  else if (data=='7'){
						document.location.href="Location:index.php?page=logout";
					  }
					  else {alert(data);}

					});
			  }

			  function form_clear(){
				document.forms["f2"]["mdp"].value="";
				document.forms["f2"]["mdp1"].value="";
				document.forms["f2"]["mdp2"].value="";
				document.forms["f1"]["mdp"].value="";
				document.forms["f1"]["mail1"].value="";
				document.forms["f1"]["mail2"].value="";
				document.forms["f3"]["mdp1"].value="";
			  }
			</script>
			
			<!-- <p id="demo"></p> -->
			
			<section>	
				<h1>Informations utilisateurs</h1>
				
			<div class="">
			<div class="input-group">
					<span class="input-group-addon">Email : </span>
					<span class="form-control form-control-static"><?php echo $email?></span>
					<button type="button" data-toggle="modal" data-target="#myModal1">Modifier</button>
				</div><br />
				<div class="input-group">
					<span class="input-group-addon">Mot de passe : </span>
					<span class="form-control form-control-static">*******</span>
					<button type="button" data-toggle="modal" data-target="#myModal2">Modifier</button>
				</div><br />
				<div class="input-group">
					<span class="input-group-addon">Supprimer son compte </span>
					<span class="form-control form-control-static"><?php echo $email?></span>
					<button type="button" data-toggle="modal" data-target="#myModal3">Je veux supprimer mon compte</button><p><?php echo($msg)?></p>

				</div><br />
			</div>
			
			</section>
			
			<section>
				<div class="container">

				  <!-- Formulaire email -->

				  <div class="modal fade" id="myModal1" role="dialog">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						 <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
						  
						  <h1 class="modal-title">Modifier votre adresse email</h1>
						  
						</div>
						<div id="resu1"></div>
						<div class="modal-body">
						  <form id=1 name="f1" method="POST">
						  <div class="input-group">
							  <input required style="width:190%;" type="password" name="mdp" placeholder="Votre mot de passe">
						  </div><br/>
						  <div class="input-group">
							  <input required style="width:190%" type="email" name="mail1" placeholder="Nouvelle adresse email">
						  </div><br/>
						  <div class="input-group">
							  <input required style="width:190%" type="email" name="mail2" placeholder="Confirmer votre adresse email">
						  </div><br/>
						  <div style="text-align: center;">
								<input type="button" onclick="testform(1)" name="addUser" value="Valider">
						  </div>
						  </form>
					  </div>
						<div class="modal-footer">
						  <button type="button" onclick="form_clear()" data-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				  </div>
			
			</section>
			  <!-- Formulaire mdp -->
			<section>
			  <div class="modal fade" id="myModal2" role="dialog">
				<div class="modal-dialog">

				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
					  <h1 class="modal-title">Modifier mot de passe</h1>
					</div>
					<div id=resu2></div>
					<div class="modal-body">
						<form id=2 name="f2" method="POST">
						<div class="input-group">
							<input required style="width:190%;" type="password"  name="mdp" placeholder="Votre mot de passe">
						</div><br/>
						<div class="input-group">
							<input required style="width:190%;" type="password" name="mdp1" placeholder="Votre nouveau mot de passe">
						</div><br/>
						<div class="input-group">
							<input required style="width:190%;" type="password" name="mdp2" placeholder="Confirmer votre mot de passe">
						</div><br/>
						<div style="text-align: center;">
							  <input type="button" onclick="testform(2)" name="addUser" value="Valider">
						</div>
					</form>
					</div>
					<div class="modal-footer">
					  <button type="button" onclick="form_clear()" data-dismiss="modal">Close</button>
					</div>
				  </div>

				</div>
			  </div>
			</section>
				<!-- Formulaire supression de mot de passe -->
			<section>
				<div class="modal fade" id="myModal3" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
								<h1 class="modal-title">Supprimer le compte</h1>
							</div>
							<div id=resu3></div>
							<div class="modal-body">
								<form id=3 name="f3" action=# method="POST">
									<div class="form-group">
										<input required style="width:100%;" type="password" name="mdp" placeholder="Votre mot de passe">
									</div><br/>
									<div style="text-align: center;">
										<input type="submit" name="delUser" value="Valider">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" onclick="form_clear()" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>
		</div>
		
		<footer>
			<a href="index.php?page=accueil">retour vers l'accueil</a>
		</footer>
	</body>
</html>
