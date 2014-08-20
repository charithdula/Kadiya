/**
 * The View. View presents the model and provides
 * the UI events. The controller is attached to these
 * events to handle the user interraction.
 */
function TaskView(model, elements) {
    this._model = model;
    this._elements = elements;

    //this.taskModified = new MVCEvent(this);
    this.addButtonClicked = new MVCEvent(this);
    this.deleteButtonClicked = new MVCEvent(this);

    var _this = this;

    // attach model listeners
    this._model.taskAdded.attach(function (sender, task) {
       
        _this.AddToTaskList(task);
    });
    this._model.taskRemoved.attach(function (sender, taskid) {
        _this.RemoveFromTaskList(taskid);
    });

    // attach listeners to HTML controls
    
    this._elements.addButton.click(function () {
        _this.addButtonClicked.notify();
    });

   
    //this._elements.deleteButton.click(function () {

        //_this.deleteButtonClicked.notify();
    //});

}

TaskView.prototype = {
    show : function () {
        this.rebuildTaskList();
    },

    AddToTaskList : function (task) {
           //view code here -- will have to remove the code below
           $("#tasks").append("<div class='task' data-task-id='" + task.id + "' style='background-color:#" + task.color + "'><div class='length_bar' style='width:" + task.length + "px'></div><h2 class='date'>" + task.date + "</h2><h1 class='title'>" + task.title + "</h1><a class='close'></a></div>");

       
    },

    RemoveFromTaskList : function (taskid) {      
        this._elements.activeTask.remove();
    }
};