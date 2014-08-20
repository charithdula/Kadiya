<?php
/*********************************************
    KADIYA - This is an online to do list program
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

require_once("DataModelObserver.php");

class KadiyaView implements DataModelObserver
{
    private $model;
    private $controller;
    
    public function KadiyaView(DataModel $model, Controller $controller)
    {
        $this->model      = $model;
        $this->controller = $controller;
        $this->model->registerObserver($this);
    }
    
    public function UpdateView($action, Task $task)
    {
        if ($action === "ADD") {
            echo json_encode(array(
                'task' => array(
                    'date' => "{$task->getDate()}",
                    'title' => "{$task->getTitle()}",
                    'id' => "{$task->getId()}",
                    'length' => "{$task->getLength()}",
                    'color' => "{$task->getColor()}"
                )
            ));
        } else if ($action === "REMOVE") {
            echo json_encode(array(
                'task' => array(
                    'removed' => true
                )
            ));
        }
    }
}