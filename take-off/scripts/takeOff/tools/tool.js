

function Tool(name, tooltip) {

    Object.defineProperties(this, {
        name: {
            value: name,
            enumerable: true,
            configurable: true,
            writable: true
        },
        toolTip: {
            value: tooltip,
            enumerable: true,
            configurable: true,
            writable: true
        },
        currentElementArray : {
            value:null,
            enumerable: true,
            configurable: true,
            writable: true
        }
    }); 
}

Tool.prototype.toString = function() {
    return "Drawing tool: " + this.name;
    
}

Tool.prototype.setCurrentElement = function(currentElementArray){}
Tool.prototype.mouseup = function(event) {}
Tool.prototype.mousedown = function(event) {}
Tool.prototype.mousemove = function(event) {}
Tool.prototype.dblclick = function(event) {}
Tool.prototype.click = function(event) {};
