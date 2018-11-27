<?php
namespace App\Message;
if(!isset($_SESSION['message'])){
    session_start();
}
class Message{
    
    public static function blue($message){
       echo $tag="<div class='custom-alert custom-alert-info'>".$message."</div>";
    }
    public static function green($message){
        echo   $tag="<div class='custom-alert custom-alert-success'>".$message."</div>";
}
    public static function yellow($message){
        echo   $tag="<div class='custom-alert custom-alert-warning'>".$message."</div>";
}
    public static function red($message){
        echo    $tag="<div class='custom-alert custom-custom-alert-danger'>".$message."</div>";

}




}