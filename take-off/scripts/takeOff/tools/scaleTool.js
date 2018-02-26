function ScaleTool () {

	Tool.call(this, "Line", "Click to draw line");
	this.state = "initial"
	this.mouseCoords = {x: 0 , y: 0}
    this.drawCoords = []
    this.currentObj = null
    this.draw =false
 
}


ScaleTool.prototype.click = function(event) {
	this.drawElement(event.clientX,event.clientY,true)		
}

ScaleTool.prototype.drawElement = function(pointX,pointY,addAsNewElement){
	if (this.draw){
		this.mouseCoords = adjustCoordinates(pointX,pointY)
		this.drawCoords.push({"x": this.mouseCoords.x , "y": this.mouseCoords.y})
		this.currentObj = diagram.line( this.mouseCoords.x, this.mouseCoords.y, this.mouseCoords.x, this.mouseCoords.y ).attr(emptyLineProperties()).attr('class','scale-line')
		canvas.add(this.currentObj)
		if (this.state == "final"){
			toolBorderCircle(this.drawCoords)
			angular.element("#settingsButton").scope().displaySettingsPopup(this.drawCoords);
			this.initialize()
			return
		}
		this.state = "final"
	}
}

ScaleTool.prototype.mousemove = function(event) {

	if (this.currentObj){
		this.mouseCoords = adjustCoordinates(event.clientX, event.clientY);
		this.currentObj.attr({ "x2": this.mouseCoords.x, "y2": this.mouseCoords.y });
		this.draw = false
	}
}

ScaleTool.prototype.initialize = function(){
	this.state = "initial"
	this.mouseCoords = {x: 0 , y: 0}
    this.drawCoords = []
    this.currentObj = null
    this.draw =false
}


ScaleTool.prototype.dbclick = function(event) {}
ScaleTool.prototype.mouseup = function(event) {}
ScaleTool.prototype.mousedown = function(event) { this.draw = true  }
ScaleTool.prototype.setCurrentElement = function(currentElementArray) {};