<?php
// renvoie le nombre d'image aimées
function positive($date){
    return DB::query("SELECT COUNT(user_id) FROM vote WHERE picture_date='".$date."' AND vote_type = 1")[0]['COUNT(user_id)'];
}
// renvoie le nombre d'image
function negative($date){
    return DB::query("SELECT COUNT(user_id) FROM vote WHERE picture_date='".$date."' AND vote_type = 3")[0]['COUNT(user_id)'];
}

function updateVote($date,$vote,$user){
    $voteType = DB::query("SELECT vote_type FROM vote WHERE user_id = '".$user."' AND picture_date='".$date."'");
    if($voteType!=$vote && $voteType!=null ){
        DB::execute("DELETE FROM vote WHERE user_id = '".$user."' AND picture_date='".$date."'");
        return DB::execute("INSERT INTO vote (picture_date, user_id, vote_type) VALUES ('".$date."', '".$user."', '".$vote."')");
    }else if($voteType==null ){
        return DB::execute("INSERT INTO vote (picture_date, user_id, vote_type) VALUES ('".$date."', '".$user."', '".$vote."')");
    }
}

function voteType($user,$date){
    return DB::query("SELECT vote_type FROM vote WHERE user_id = '".$user."' AND picture_date='".$date."'");
}

function popularImage(){
    return DB::query("SELECT picture_date FROM vote WHERE vote_type = 1 GROUP BY picture_date ORDER BY COUNT(user_id) DESC LIMIT 12");
}
function gradedImage($twelves_of_rows, $id){ //  entrée >= 1
    $twelves_of_rows = 12*$twelves_of_rows;
    $below = $twelves_of_rows-12;
    return DB::query("SELECT picture_date FROM vote  WHERE user_id = '".$id."' GROUP BY picture_date ORDER BY COUNT(user_id) DESC LIMIT $twelves_of_rows OFFSET $below "); //  OFFSET pour en avoir seulement 12
}
function favoriteKeyword($user){
    return DB::query("SELECT mot FROM MotsCles WHERE date IN (SELECT picture_date FROM vote WHERE vote_type = 1 AND user_id = '".$user."' GROUP BY picture_date) GROUP BY mot ORDER BY count(date) DESC LIMIT 1");
}
function keywordImage($twelves_of_rows,$user){
    $twelves_of_rows = 12*$twelves_of_rows;
    $below = $twelves_of_rows-12;
    $keyword=favoriteKeyword($user);
    $keyword=$keyword[0]['mot'];
    return DB::query("SELECT date FROM MotsCles WHERE mot = '".$keyword."' LIMIT $twelves_of_rows OFFSET $below ");
}
?>