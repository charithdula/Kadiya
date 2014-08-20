/**
 * The Controller. Controller responds to user actions and
 * invokes changes on the model.
 */
function TaskController(model, view) {
    this._model = model;
    this._view = view;

    var _this = this;

    this._view.addButtonClicked.attach(function () {
         //task creation code here
        _this.addTask();
    });

    this._view.deleteButtonClicked.attach(function () {
        //code to get the index
        _this.deleteTask(_this._view._elements.taskId);

    });
}


function _addTask(view, model) {
        var color = view._elements.colorPicker.data("color")
        var text = "info=" + view._elements.inputBox.val() + "&length=" + view._elements.length + "&color=" + color;

        $.ajax({
            url: "RequestHandler.php",
            dataType: 'json',
            data: text,
            success: function (json) {
                
                var task = {
                   "id": json.task['id'],
                   "color" : json.task['color'],
                   "length" : json.task['length'],
                   "date" : json.task['date'],
                   "title" : json.task['title']
                };
                
               model.addTask(task);                
            }
        });
}

function _removeTask(taskid, model) {
        var data = "id=" + taskid;

        $.ajax({
            url: "RequestHandler.php",
            dataType: 'json',
            data: data,
            success: function (json) {
                if (json.task['removed'] == true) {
                    model.removeTaskAt(taskid);                                   
                }
            }
        });
}

TaskController.prototype = {
    addTask : function () {
        _addTask(this._view, this._model);
     
    },

    deleteTask : function (taskid) {
        _removeTask(taskid, this._model);
    },

  
};