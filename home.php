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

require_once( "DB_Connector.php"); 
?>

<!DOCTYPE html>
<html id="lighthole_kadiya" lang="en">

<head>
    <title>
        KADIYA - A product of LightHole
    </title>

    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/colorpicker.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <script type="text/javascript" src="jquery-1.11.1.js"></script>

    <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>

    <script type="text/javascript" src="js/MVCEvent.js"></script>
    <script type="text/javascript" src="js/TaskModel.js"></script>
    <script type="text/javascript" src="js/TaskController.js"></script>
    <script type="text/javascript" src="js/TaskView.js"></script>
    <script type="text/javascript" src="kadiya_script.js"></script>
</head>

<body>
    <div id="maroonbox">
        <div id="lighthole_logo"></div>
    </div>
    <div id="contents">
        <div id="inner_content">
            <div id="task_list">

            <div id="input_box">
                <form id="kadiya_form" onsubmit="return false;">
                    <textarea name="kadiya_input" id="kadiya_input"></textarea>
                    <div id="button_set">
                        <ul class="action">
                            <li>
                                <a id="paint_but"></a>
                            </li>
                            <li>
                                <a id="length_but"><span>1</span></a>
                            </li>
                            <li>
                                <a id="add_but"><span>+</span></a>
                            </li>
                        </ul>
                    </div>
                </form>


            <ul id="length_menu">
                <li>
                    <a class="lmenu_item" data-length="1"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="2"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="3"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="4"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="5"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="6"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="7"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="8"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="9"></a>
                </li>
                <li>
                    <a class="lmenu_item" data-length="10"></a>
                </li>
            </ul>

            <div id="colorSelector" data-color="#B3B1AC"></div>


            </div>


            
            <div id="tasks">
                <?php $con=db_connect(); 
                      $query="SELECT id, DATE_FORMAT(tdate,'%Y-%m-%d') AS tdate, info, length, color from tasks" ; 
                      $result=mysqli_query($con, $query); 
                      while($row=mysqli_fetch_array($result)) 
                      { 
                         $id = $row['id']; 
                         $date = $row['tdate'];
                         $title = $row['info']; 
                         $length = $row['length'];
                         $color = $row['color']; 
                         
                         ?>

                <div class='task' data-task-id=<?php echo "'$id'";?> style=<?php echo "'background-color:#{$color}'";?>>
                    <div class="length_bar" style=<?php echo "'width: {$length}px'";?>></div>
                    <h2 class='date'><?php echo $date; ?></h2>
                    <h1 class='title'><?php echo $title;?></h1>
                    <a class='close'></a>
                </div>
                <?php } ?>
            </div>
        
            </div>


        </div>

        <div id="left_pane">
        <ul>
          <li class="kadiya-main-cat">My Tasks</li>
          <li class="kadiya-main-cat">Projects
             <ul>
                <li class="kadiya-sub-cat">Project1</li>
                <li class="kadiya-sub-cat">Project2</li>
                <li class="kadiya-sub-cat">Project3</li>
             </ul>
          </li>
          <li class="kadiya-main-cat">Groups
             <ul>
                <li class="kadiya-sub-cat">Group1</li>
                <li class="kadiya-sub-cat">Group2</li>
                <li class="kadiya-sub-cat">Group3</li>
             </ul>
          </li>
          <li class="kadiya-main-cat">Labels
             <ul>
                <li class="kadiya-sub-cat">label1</li>
                <li class="kadiya-sub-cat">label2</li>
                <li class="kadiya-sub-cat">label3</li>
             </ul>
          </li>
        </ul>
            </div>
            
    </div>
    

</body>

</html>