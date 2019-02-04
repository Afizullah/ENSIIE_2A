<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8"/>
		<link rel="stylesheet" href="./style/style.css"/>
		<title>APoD</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#likeLink").click(function(){
                    $("#date").val(dateImage);
                });
            });
        </script>
	</head>

	<body>

    <p>
        <form id=1 method=POST>
            <input type="hidden" id="date" name="date" value="2018-10-23">
        </form>
    </p>

        <p id="updateScore">
        </p>
		<header>
		<h1>Astronomy Picture of the Day</h1>
		</header>
		<div id="elementsCentraux">
		<nav>
			<h1>Menu</h1>
			<ul>
				<li><a href="index.php?page=imagesFavorites">Les images préférées des utilisateurs</a></li>
				<li><a href="">L'image du jour</a></li>
                <li><a href="index.php?page=imagesNote">Les images que vous avez noté</a></li>
                <li><a href="index.php?page=motsCles">Recherche par mots clés</a></li>
                <li><a href="index.php?page=imagesKeyword">Images suggérées</a></li>

            </ul>
		</nav>
		
		<div id="imageSection">
            <figure>
                <img src="./style/loader.gif" id="img" lt="astronomy picture of the day" class="apodPicture"/>
				
				<!-- Ce paragraphe (class score) est le bloc s'affichant sur la page lorsque l'utilisateur à voté pour l'image courante -->
				<p id="score">
					<br/><br/><br/>Score de l'image:
                    <br/>
                        Likes :
                        <span id=pos></span>
                    <br/>
                        Dislikes :
                        <span id=neg></span>
                    <br/>
					
					<a onclick="loadNewPicture()">Image suivante →</a>
					<br/><br/>
					<a href="" download = "" id="downloadLink">↓ Télécharger l'image</a> <!-- Remplacer "image.jpg" par l'url de l'image courante-->
				</p>
				
                <figcaption id="title"></figcaption>
                <p id="description" style="text-align: justify"></p>
            </figure>
            <div id="bandeauVote">
                <!-- <a onclick="loadNewPicture()">Image suivante</a> -->
				<a onclick="printScore(3)" id="dislikeLink">Dislike</a>
				<a onclick="printScore(2)" id="neutralLink">Neutre</a>
				<a onclick="printScore(1)" id="likeLink">Like</a>
            </div>
		</div>

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
        <script type="text/javascript" src="../commun/services.js"></script>
        <script>
            let serviceNasa = new NasaService();

            let imageNasa = document.getElementById("img");

            let affichageScore = document.getElementById("score");

            let boutonsVote = document.getElementById("bandeauVote");

            let boutonLike = document.getElementById("likeLink");

            let boutonDislike = document.getElementById("dislikeLink");

            let boutonNeutral = document.getElementById("neutralLink");

            let dateImage = "";

            let dateUrl = <?php echo json_encode($date); ?>;

            function loadRandomPicture() {
                document.getElementById("title").innerHTML = null;
                document.getElementById("description").innerHTML = null;
                return serviceNasa.getRandomPicture()
                    .then(function (data) {
                        imageNasa.setAttribute("src", data[0].hdurl);
                        document.getElementById("downloadLink").setAttribute("href",data[0].hdurl);
                        document.getElementById("downloadLink").setAttribute("download",data[0].title + ".jpg");
                        dateImage = data[0].date;
                        document.getElementById("title").innerHTML = dateImage + " : " + data[0].title;
                        document.getElementById("description").innerHTML = data[0].explanation;

                        document.getElementById("date").value=dateImage;
                        var fd = new FormData(document.getElementById(1));
                        $.ajax({
                            url: "index.php?page=voteState",
                            type: "POST",
                            data: fd,
                            processData: false,
                            contentType: false
                        }).done(function( data ) {
                            if(data==1){
                                boutonLike.style.textDecoration = "underline";
                                boutonNeutral.style.textDecoration = "none";
                                boutonDislike.style.textDecoration = "none";
                            }else if(data==2){
                                boutonLike.style.textDecoration = "none";
                                boutonNeutral.style.textDecoration = "underline";
                                boutonDislike.style.textDecoration = "none";
                            }else if(data==3){
                                boutonLike.style.textDecoration = "none";
                                boutonNeutral.style.textDecoration = "none";
                                boutonDislike.style.textDecoration = "underline";
                            }

                        });

                        boutonsVote.style.display = "flex";
                    })
            }

            function loadPicture(date) {
                document.getElementById("title").innerHTML = null;
                document.getElementById("description").innerHTML = null;
                return serviceNasa.getPictureByDate(date)
                    .then(function (data) {
                        imageNasa.setAttribute("src", data.hdurl);
                        document.getElementById("downloadLink").setAttribute("href",data.hdurl);
                        document.getElementById("downloadLink").setAttribute("download",data.title + ".jpg");
                        dateImage = data.date;
                        document.getElementById("title").innerHTML = dateImage + " : " + data.title;
                        document.getElementById("description").innerHTML = data.explanation;

                        document.getElementById("date").value=dateImage;
                        var fd = new FormData(document.getElementById(1));
                        $.ajax({
                            url: "index.php?page=voteState",
                            type: "POST",
                            data: fd,
                            processData: false,
                            contentType: false
                        }).done(function( data ) {
                            if(data==1){
                                boutonLike.style.textDecoration = "underline";
                                boutonNeutral.style.textDecoration = "none";
                                boutonDislike.style.textDecoration = "none";
                            }else if(data==2){
                                boutonLike.style.textDecoration = "none";
                                boutonNeutral.style.textDecoration = "underline";
                                boutonDislike.style.textDecoration = "none";
                            }else if(data==3){
                                boutonLike.style.textDecoration = "none";
                                boutonNeutral.style.textDecoration = "none";
                                boutonDislike.style.textDecoration = "underline";
                            }

                        });

                        boutonsVote.style.display = "flex";
                    })
            }

            function loadNewPicture() {
                affichageScore.style.display = "none";

                imageNasa.setAttribute("src", "./style/loader.gif");
                return loadRandomPicture();
            }

            function printScore(vote){
                    document.getElementById("date").value=dateImage;
                    var fd = new FormData(document.getElementById(1));
                    fd.append("vote",vote);
                    $.ajax({
                      url: "index.php?page=vote",
                      type: "POST",
                      data: fd,
                      processData: false,  
                      contentType: false   
                    }).done(function( data ) {
                        var tab=data.split("/");
                        if (tab.length!=2){
                            alert(data);   
                        }
                        document.getElementById("pos").innerHTML=tab[0];
                        document.getElementById("neg").innerHTML=tab[1];
                        affichageScore.style.display = "block";
                        boutonsVote.style.display = "none";
                    });
            }

            loadPicture(dateUrl);

            
  

        </script>
	</body>
</html>