function CountTool () {

	Tool.call(this, "Count", "Click set Scale");
	this.mouseCoords = { x: 0, y: 0}

	this.draw = true;
    this.clickTime = null;
}

CountTool.prototype.click = function(event) {

	if (this.draw){
		var drawing = initDrawing("count", this.currentElementArray, true);
		this.mouseCoords = adjustCoordinates(event.clientX, event.clientY)
		drawing.points.push({"x": this.mouseCoords.x, "y": this.mouseCoords.y})
		var  countTick =  drawTickMark(this.mouseCoords)
		countTick.parent = drawing;
		drawing.snapInstance = countTick;	
		this.addEventListeners(countTick);

		this.mouseCoords = { x: 0, y: 0}
		angular.element("#wrapper").scope().$apply();
	}
}


CountTool.prototype.addEventListeners = function(drawing) {
    drawing.mousedown(function(event) {
        if (event.button == 2)
            toggleMenuOn(event.clientX, event.clientY, this);
        event.stopPropagation();
    });

    drawing.mouseover(function(event){ 
        updatDesign(this,"stroke", "#d56772");
    });

    drawing.mouseout(function(event){
        updatDesign(this,"stroke", this.parent.designProperties.stroke);
    });
}


function drawTickMark (coords){

	console.log(coords)
	var tickCoords  = [0,2,2,12,20,-8,3.6,7];
	var finalDraw = diagram.polyline(tickCoords).attr({ 
                                                                "class": 'drawable',
                                                                "data-element-index": 0
                                                            });
	canvas.append(finalDraw)
	finalDraw.transform( 't'+(coords.x-5)+',' + (coords.y-5) );
	return finalDraw
		
}


CountTool.prototype.mousedown = function(event) {
	this.clickTime = new Date().getTime()
    this.draw = false
}
CountTool.prototype.mouseup = function(event) {
	if ( ((new Date().getTime()) - this.clickTime) < 300) {
        this.draw = true
    }
}
CountTool.prototype.mousemove = function(event) {}
CountTool.prototype.dblclick = function(event) {} 
CountTool.prototype.setCurrentElement = function(currentElementArray) {
	this.currentElementArray = currentElementArray;
};

