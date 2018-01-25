<?php
/**
 * Created by PhpStorm.
 * User: ariel
 * Date: 1/25/18
 * Time: 3:59 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
class get_game_names
{
    public function GET_USER_INPUT_GAME_NAME($str){
        $str = strtolower($str);
        return $this->SEARCH_USR_GAME($str);

    }

    private function SEARCH_USR_GAME($str){
        $games_json = $this->LOAD_JSON();

        $results_array = array();

        foreach ($games_json as $item){
          if(strpos(strtolower($item["name"]),$str) !== false){
               array_push($results_array, $item);
           }
        }

        if(count($results_array)==0){
          array_push($results_array, 'no result');
        }

        return $results_array;


    }
    private function LOAD_JSON(){
        $str = file_get_contents('games.json');
        $json = json_decode($str, true);
        return $json;
    }
}

