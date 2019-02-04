<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" href="style/style.css"/>
    <title>Images suggérées</title>
    <script type="text/javascript" src="../commun/services.js"></script>
</head>

<body>
<header>
    <h1>Images suggérées</h1>
</header>
<div id="elementsCentraux">
    <nav>
        <h1>Menu</h1>
        <ul>
            <li><a href="index.php?page=accueil">Accueil</a></li>
        </ul>
        <ul>
            <form action="#" method="post">
                <button name="incremente" value="<?php echo($page+1)?>">Images suivantes</button>
            </form>
        </ul>
        <ul>
            <form action="#" method="post">
            <button name="incremente" value="<?php echo($page-1)?>">Images précèdentes</button>
            </form>
        </ul>
    </nav>

    <section id="imagesSection">

			<span class = "smallPicture">
				<a href="" id="l0"><img id="img0" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l1"><img id="img1" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l2"><img id="img2" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l3"><img id="img3" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l4"><img id="img4" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l5"><img id="img5" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l6"><img id="img6" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l7"><img id="img7" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>
        <span class = "smallPicture">
				<a href="" id="l8"><img id="img8" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l9"><img id="img9" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l10"><img id="img10" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

        <span class = "smallPicture">
				<a href="" id="l11"><img id="img11" src="./style/loader.gif" alt="astronomy picture of the day"></a>
			</span>

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

    let serviceNasa = new NasaService();

    let imagesToLoad = <?php echo json_encode(keywordImage($page,getUserId())); ?>;

    let promises = [];

    for (let i = 0; i < imagesToLoad.length; i++) {
        promises.push(serviceNasa.getPictureByDate(imagesToLoad[i].date));
    }

    Promise.all(promises)
        .then(function (values) {
            for (let i = 0; i < 12; i++) {
                let img = document.getElementById("img" + i);
                let link = document.getElementById("l" + i);
                if (i < values.length) {
                    img.setAttribute("src", values[i].hdurl);
                    link.setAttribute("href", "http://localhost/PIMA-GROUPE-15/vue/index.php?page=accueil&date=" + values[i].date);
                } else {
                    link.innerHTML = "";
                }
            }
        });

</script>

</body>
</html>