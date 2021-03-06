function MVCEvent(sender) {
    this._sender = sender;
    this._listeners = [];
}

MVCEvent.prototype = {
    attach : function (listener) {
        this._listeners.push(listener);
    },
    notify : function (args) {
        var index;

        for (index = 0, l = this._listeners.length; index < l; index++) {
            this._listeners[index](this._sender, args);
        }
    }
};