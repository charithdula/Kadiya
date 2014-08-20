/**
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
**/
$(document).ready(function () {
    
    
    $("#length_menu li a").each(function (index) {
        $(this).width((index + 1) * 12);
    });


    $("#length_but").click(function (event) {
        event.stopPropagation();
        $("#length_menu").show();
    });

    $(document).click(function () {
        $("#length_menu").hide();
    });

/***************task related*************/
    
    var taskid; // the id of the task
    var length = 10; // the length of the task
    var color = $("#colorSelector").data("color"); // the color of the task
    var activeTask; // active task
    var title = $('#kadiya_input').val();


    // setting the length
    $("#length_menu li").click(function () {
        viewItems.length = $(this).children().first().data("length");
        viewItems.length = 2 * 12 * viewItems.length;
        $("#length_but span").html(viewItems.length / 24);
        
    });

    // setting the color
    $('#colorSelector').ColorPicker({
        color: '#0000ff',
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#colorSelector').css('backgroundColor', '#' + hex);
            $('#colorSelector').data("color", hex);
        }
    });

   // MVC initialization - implemented only for the tasks
   viewItems = {           
       'addButton' : $('#add_but'), 
       'deleteButton':  $(".close")[0],
       'activeTask' : activeTask,
       'inputBox': $('#kadiya_input'),
       'taskId' : taskid, 
       'length' : length,
       'colorPicker' : $("#colorSelector")
   }
   model = new TaskModel({}),
   view = new TaskView(model, viewItems),
   controller = new TaskController(model, view);
  
   // setting the task id
    $(document).on("click", ".close", function (event) {
        viewItems.taskId = $(this).parent().data("task-id")
        viewItems.activeTask = $(this).parent();
        viewItems.deleteButton = $(this);
        view.deleteButtonClicked.notify();
        alert("hello");
        //removeTask($(this).parent().data("task-id"), $(this).parent());

    });
   //view.show();

/*********end of task related***************/

    
});