<?php
$banco = new mysqli("localhost","root","","stoktool");
if($banco->connect_errno){
    echo "<p>Houve um erro na Conexão SQL: $banco->errno --> $banco->connect_error</p>";
    die();
}else
$banco->query("SET NAMES 'utf8'");
$banco->query("SET character_set_connection=utf8");
$banco->query("SET character_set_client=utf8");
$banco->query("SET character_set_results=utf8");
?>