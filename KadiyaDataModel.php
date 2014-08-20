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
require_once("DataModel.php");
require_once("DB_Connector.php");
require_once("Task.php");

class KadiyaDataModel implements DataModel
{
    private $observers = array();
    
    public function KadiyaDataModel()
    {
    }
    
    public function addTask(Task $task)
    {
        //echo "task added to database<br>";
        $con   = db_connect();
        $query = "INSERT INTO tasks (tdate, info, length, color) VALUES ('" . $task->getDate() . "', '" . $task->getTitle() . "'," . $task->getLength() . ",'" . $task->getColor() . "')";
        
        mysqli_query($con, $query);
        mysqli_close($con);
        $id = $this->getTaskID();
        $task->setId($id);
        
        $this->notifyObservers("ADD", $task);
    }
    public function removeTask($taskId)
    {
        $con   = db_connect();
        $query = "DELETE FROM tasks WHERE id={$taskId}";
        
        mysqli_query($con, $query);
        mysqli_close($con);
        $task = new Task();
        $task->setId($taskId);
        
        $this->notifyObservers("REMOVE", $task);
    }
    
    private function getTaskID()
    {
        $con   = db_connect();
        $query = "SELECT MAX(id) as id  FROM tasks";
        
        $result = mysqli_query($con, $query);
        $maxID;
        while ($row = mysqli_fetch_array($result)) {
            $maxID = $row['id'];
        }
        
        return $maxID;
    }
    
    public function registerObserver(DataModelObserver $observer)
    {
        $this->observers[] = $observer;
    }
    public function removeObserver(DataModelObserver $observer)
    {
        if (($key = array_search($observer, $this->observers, true)) !== false) {
            unset($this->observers[$key]);
        }
    }
    public function notifyObservers($action, Task $task)
    {
        foreach ($this->observers as $o) {
            $o->updateView($action, $task);
        }
    }
}