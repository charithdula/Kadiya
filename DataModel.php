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
require_once("Task.php");
require_once("DataModelObserver.php");
interface DataModel
{
    public function addTask(Task $task);
    public function removeTask($taskId);
    public function registerObserver(DataModelObserver $observer);
    public function removeObserver(DataModelObserver $observer);
    public function notifyObservers($action, Task $task);
}