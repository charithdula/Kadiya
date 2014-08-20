/**
 * The TaskModel. Model stores tasks and notifies
 * observers about changes.
 */
function TaskModel(tasks) {
    this._tasks = tasks;    

    this.taskAdded = new MVCEvent(this);
    this.taskRemoved = new MVCEvent(this);
    
}

TaskModel.prototype = {   
    
    getTasks: function () {
        return this._tasks;
    },

    addTask : function (task) {
        this._tasks[task.id] = task;

        this.taskAdded.notify(task);
    },

    removeTaskAt : function (taskid) {
        var task;        

        task = this._tasks[taskid];
        alert(taskid);
        delete this._tasks[taskid];
        this.taskRemoved.notify(taskid);
     
    }

};