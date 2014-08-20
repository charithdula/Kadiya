<?php
/*********************************************
    KADIYA - An online to do list program
    Copyright (C) 2014  Charith Jayasekar@LightHole

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
	Email - charithdula@gmail.com
**********************************************/

require_once("DataModel.php");
require_once("KadiyaDataModel.php");
require_once("KadiyaController.php");
require_once("KadiyaView.php");

$info;
$id;
$length;
$color;
if (isset($_GET["info"])) {
    $info   = $_GET["info"];
    $length = $_GET["length"];
    $color  = $_GET["color"];
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($info)) {
    $model = new KadiyaDataModel();
    
    $controller = new KadiyaController($model);
    $view       = new KadiyaView($model, $controller);
    $date       = date("Y-m-d");
    
    $task = new Task();
    $task->setDate($date . "");
    
    $task->setTitle($info);
    $task->setLength($length);
    $task->setColor($color);
    
    $controller->addTask($task);
} else if (isset($id)) {
    $model = new KadiyaDataModel();
    
    $controller = new KadiyaController($model);
    $view       = new KadiyaView($model, $controller);
    
    $controller->removeTask($id);
}