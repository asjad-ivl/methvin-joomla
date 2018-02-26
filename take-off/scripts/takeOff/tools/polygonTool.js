function PolygonTool() {
    Tool.call(this, "Polygon", "Click and drag to create polygon");

    this.state = "initial"
    this.mouseCoords = {
        x: 0,
        y: 0
    }
    this.currentObj = null
    this.draw = true;
    this.clickTime = null
    this.currentElementArray = null
}

PolygonTool.prototype.click = function(event) {
        this.drawElement(event.clientX,event.clientY,true)
}

PolygonTool.prototype.drawElement = function(pointX,pointY,addAsNewElement){
    if (this.state == "initial" && this.draw){
        this.state = "secondary"
        this.newDrawing = initDrawing("area", this.currentElementArray,addAsNewElement);
    }

    if (this.draw) {
        
        this.mouseCoords = adjustCoordinates(pointX, pointY)
        this.checkingIfLastPoint(this.newDrawing.points)
        this.currentObj = diagram.line(this.mouseCoords.x, this.mouseCoords.y, this.mouseCoords.x, this.mouseCoords.y).attr(emptyLineProperties())

        this.newDrawing.points.push({
            "x": this.mouseCoords.x,
            "y": this.mouseCoords.y
        })
        canvas.add(this.currentObj)
        displayCircle(this.mouseCoords.x, this.mouseCoords.y, "empty-lines")

        if (this.state == "final") {
            this.newDrawing.perimeter = calculateDistance(this.newDrawing.points) 
            this.newDrawing.area = calculateArea(this.newDrawing.points) 
            if (this.newDrawing.area < 0)
                this.newDrawing.area *= -1

            removeElements('empty-lines')
            var polygon = createPolygon(this.newDrawing.points, this.newDrawing.designProperties, false);
            toolBorderCircle(this.newDrawing.points, "circle-"+polygon.id)
            displayArea(this.newDrawing.points,"text-"+polygon.id)

            polygon.parent = this.newDrawing;
            this.newDrawing.snapInstance = polygon;
            this.addEventListeners(polygon);
            this.initilize()
        }
    }
}

PolygonTool.prototype.dblclick = function(event) {

    this.mouseCoords = adjustCoordinates(event.clientX, event.clientY)
    this.checkingIfLastPoint(this.newDrawing.points)
    this.newDrawing.points.push({
        "x": this.mouseCoords.x,
        "y": this.mouseCoords.y
    })
    this.removeIdentitcalCoords()
    this.newDrawing.perimeter = calculateDistance(this.newDrawing.points)

    if (this.newDrawing.perimeter < 0.01 ){
        
        console.log("zero distance drawing")
        return
    }

    removeElements('empty-lines')
    var polygon = createPolygon(this.newDrawing.points, this.newDrawing.designProperties, true);
    polygon.attr('class','polygon-line')
    toolBorderCircle(this.newDrawing.points, "circle-"+polygon.id)
    displayDistance(this.newDrawing.perimeter, this.newDrawing.points, "text-"+polygon.id)

    polygon.parent = this.newDrawing;
    this.newDrawing.snapInstance = polygon;
    this.addEventListeners(polygon);
    this.initilize()
}

PolygonTool.prototype.addEventListeners = function(drawing) {
    drawing.mousedown(function(event) {
        if (event.button == 2)
            toggleMenuOn(event.clientX, event.clientY, this);
        event.stopPropagation();
    });

    drawing.mouseover(function(event){ 
    	// updatDesign(this,"opacity", 0.8);
        updatDesign(this,"stroke", "#d56772");

    	//TODO highlight tree node.
    });

    drawing.mouseout(function(event){
    	// updatDesign(this,"opacity", this.parent.designProperties.opacity);
        updatDesign(this,"stroke", this.parent.designProperties.stroke);

    	//Unhighlight tree node.
    });
}


PolygonTool.prototype.checkingIfLastPoint = function(coords) {
    if (coords.length > 2) {
        var diffX = (coords[0].x - this.mouseCoords.x)
        var diffY = (coords[0].y - this.mouseCoords.y)
        if (diffX <= 7 && diffX >= -7 && diffY <= 7 && diffY >= -7) {
            this.mouseCoords.x = coords[0].x
            this.mouseCoords.y = coords[0].y
            this.currentObj.attr({
                "x2": this.mouseCoords.x,
                "y2": this.mouseCoords.y
            });
            this.state = "final"
        }
    }
}

PolygonTool.prototype.initilize = function() {
    this.state = "initial"
    this.mouseCoords = {
        x: 0,
        y: 0
    }
    this.currentObj = null
    this.draw = false;
}


PolygonTool.prototype.mousemove = function(event) {

    this.mouseCoords = adjustCoordinates(event.clientX, event.clientY);
    if (this.state === "secondary") {
        if (this.newDrawing.points.length > 2) {
            var diffX = (this.newDrawing.points[0].x - this.mouseCoords.x)
            var diffY = (this.newDrawing.points[0].y - this.mouseCoords.y)
            if (diffX <= 5 && diffX >= -5 && diffY <= 5 && diffY >= -5) {
                this.mouseCoords.x = this.newDrawing.points[0].x
                this.mouseCoords.y = this.newDrawing.points[0].y
            }
        }
        this.currentObj.attr({
                    "x2": this.mouseCoords.x,
                    "y2": this.mouseCoords.y
                });
    }

}

PolygonTool.prototype.setCurrentElement = function(currentElementArray) {
    this.currentElementArray = currentElementArray;
};


PolygonTool.prototype.mousedown = function(event) {
    this.clickTime = new Date().getTime()
    this.draw = false
}

PolygonTool.prototype.mouseup = function(event) {
    if ( ((new Date().getTime()) - this.clickTime) < 300) {
        this.draw = true
    }
}

PolygonTool.prototype.removeIdentitcalCoords = function() {
    for (var index = (this.newDrawing.points.length - 1); index > 1; index--) {
        if (this.newDrawing.points[index].x == this.newDrawing.points[index - 1].x &&
            this.newDrawing.points[index].y == this.newDrawing.points[index - 1].y
        )
        this.newDrawing.points.pop();
    }
}
