<?php

function getMotsCles () {
    return DB::query("SELECT mot FROM Mots ORDER BY nombre DESC");
}