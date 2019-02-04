<?php
function voteType($user,$date){
    return DB::query("SELECT vote_type FROM vote WHERE picture_date='".$date."' AND user_id = '".$user."' LIMIT 1")[0]['vote_type'];
}
?>