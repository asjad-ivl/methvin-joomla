function SelectTool () {
	Tool.call(this, "Select", "Click obj to Select");
	this.panning = false;
	this.startPosition={
		x1:0,
		y1:0
	}
}

SelectTool.prototype.click = function(event) {
	diagram.zpd({pan: true, zoom: true}, function(){
	});
}
SelectTool.prototype.setCurrentElement = function(currentElementArray) {}; 
SelectTool.prototype.mouseup = function(event) {}
SelectTool.prototype.mousedown = function(event) {}
SelectTool.prototype.mousemove = function(event) {}
SelectTool.prototype.dblclick = function(event) {} 