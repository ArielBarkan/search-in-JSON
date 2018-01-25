<?php
/**
 * Created by PhpStorm.
 * User: ariel
 * Date: 1/25/18
 * Time: 3:50 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Content-Type: application/json');

include("./utils/get_game_names.php");
$games = new get_game_names();

$result = $games->GET_USER_INPUT_GAME_NAME($_POST["q"]);

echo json_encode($result);
