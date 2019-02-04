<?php

function dateByMotCle($mot_cle) {
    return DB::query("SELECT date FROM MotsCles WHERE mot='$mot_cle' ORDER BY date DESC");
}