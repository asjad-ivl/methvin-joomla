function LineTool () {

	Tool.call(this, "Line", "Click to draw line");
	this.state = "initial"
	this.mouseCoords = {x: 0 , y: 0}
    this.drawCoords = []
    this.currentObj = null
    this.draw =false
 
}


LineTool.prototype.click = function(event) {

	if (this.draw){
		this.mouseCoords = adjustCoordinates(event.clientX,event.clientY)
		this.drawCoords.push({"x": this.mouseCoords.x , "y": this.mouseCoords.y})
		this.currentObj = diagram.line( this.mouseCoords.x, this.mouseCoords.y, this.mouseCoords.x, this.mouseCoords.y ).attr(emptyLineProperties())
		canvas.add(this.currentObj)
		if (this.state == "final"){
			toolBorderCircle(this.drawCoords)
			angular.element("#settingsButton").scope().displaySettingsPopup(this.drawCoords);
		}
		this.state = "final"
	}
			
}

LineTool.prototype.mousemove = function(event) {

	if (this.currentObj){
		this.mouseCoords = adjustCoordinates(event.clientX, event.clientY);
		this.currentObj.attr({ "x2": this.mouseCoords.x, "y2": this.mouseCoords.y });
		this.draw = false
	}
}

LineTool.prototype.initialize = function(){
	this.state = "initial"
	this.mouseCoords = {x: 0 , y: 0}
    this.drawCoords = []
    this.currentObj = null
    this.draw =false
}


LineTool.prototype.dbclick = function(event) {}
LineTool.prototype.mouseup = function(event) {}
LineTool.prototype.mousedown = function(event) { this.draw = true  }
LineTool.prototype.setCurrentElement = function(currentElementArray) {};