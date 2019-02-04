/**
 * Le service NasaService regroupe l'ensemble des fonctions permettant de récupérer les images de la Nasa à l'aide de
 * l'API APOD.
 *
 * Les réponses aux requêtes http sont des json de la forme :
 * {
 *  date : "YYYY-MM-DD"
 *  explanation : "paragraphe"
 *  hdurl : "url de l'image"
 *  media_type : "image"
 *  service_version : "v1"
 *  title : "titre"
 * }
 */
function NasaService() {

    /**
     * La fonction getDailyPicture retourne une promesse asynchrone dont la résolution permet de récupérer un json
     * contenant l'image du jour au format décrit ci-dessus.
     */
    this.getDailyPicture = function () {
        return makeRequest("https://api.nasa.gov/planetary/apod?api_key=aIobKeUnYLJneX9w791HtgWDTKzgXmfjEEgHdt0h");
    };

    /**
     * La fonction getPictureByDate prent un argument de type string (YYYY-MM-DD) et retourne une promesse asynchrone dont la
     * résolution permet de récupérer un json contenant l'image de la date indiquée format décrit ci-dessus.
     */
    this.getPictureByDate = function (d) {
        let url = "https://api.nasa.gov/planetary/apod?api_key=aIobKeUnYLJneX9w791HtgWDTKzgXmfjEEgHdt0h&date=" + d;
        return makeRequest(url);
    };

    /**
     * La fonction getRandomPicture retourne une promesse asynchrone dont la résolution permet de récupérer un json
     * contenant une image aléatoire au format décrit ci-dessus.
     */
    this.getRandomPicture = function () {
      let url = "https://api.nasa.gov/planetary/apod?api_key=aIobKeUnYLJneX9w791HtgWDTKzgXmfjEEgHdt0h&count=1";
      return makeRequest(url);
    };

    function makeRequest(url) {
        return Promise.resolve(
            fetch(url, {method : "GET", mode : "cors"}
            ).then(function (response) {
                if (response.status === 400) {
                    response.json().then(function (data) {
                        alert(data.msg);
                    });
                }
                else if (response.status !== 200) {
                    console.log("Request Error. Status Code : " +
                        response.status);
                    return {status:response.status};
                }
                return response.json().then(function (data) {
                    return data;
                });
            }).catch(function (err) {
                console.log("Fetch Error : " + err);
            })
        )
    }
}