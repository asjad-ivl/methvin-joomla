


function initDrawing(type, currentElement,addAsNewElement){
    var drawing = new Drawing(type)
    drawing.designProperties = angular.copy(currentElement.defaultDesignPorperties);
    if (addAsNewElement)
        currentElement.drawings.push(drawing);
    return drawing;
}

function adjustCoordinates(eventX,eventY){
    

    if (snapCurrentX != null){
        svgPoints.x = snapCurrentX;
        svgPoints.y = snapCurrentY;
    }
    else{
        svgPoints.x = eventX;
        svgPoints.y = eventY;   
    }

    return svgPoints.matrixTransform( diagramSvg.firstElementChild.getScreenCTM().inverse()  )
}



function emptyLineProperties(){

	return  {
				"class": "empty-lines", 
                "stroke-width": 4,
                "stroke": "rgba(51,51,51,0.5)",
                "fill-opacity": 1,
                "stroke-linecap":"butt"
			}
}
function removeElements(className){
	$("."+className).remove()
}

function calculateDistance (coords){
    var doc=angular.element("#wrapper").scope().document;
    var unitPerPixel = doc.pages[doc.currentPageIndex].scale.unitPerPixel
	var distance = 0;

	for (var coord = 0; coord < (coords.length-1); coord++)
	{
		var x1 = coords[coord].x
		var y1 = coords[coord].y
		var x2 = coords[coord+1].x
		var y2 = coords[coord+1].y
		distance += Math.sqrt( Math.pow(( x2-x1 ),2) + Math.pow((y2-y1),2) )
	}
	return (distance/unitPerPixel).toFixed(2)
}

function calculateArea(coords){

    var doc=angular.element("#wrapper").scope().document;
    var unitPerPixel = doc.pages[doc.currentPageIndex].scale.unitPerPixel

	var area = 0
	for (var coord = 0; coord < (coords.length-1); coord++)
	{
		var x1 = coords[coord].x
		var y1 = coords[coord].y
		var x2 = coords[coord+1].x
		var y2 = coords[coord+1].y

		area += ( (x1*y2 - y1*x2) )
	}
	return ((area/2) /unitPerPixel  ).toFixed(2)
}

function createPolygon(coords,design,fill){

	var polylinePath = []
	for (var coord = 0; coord < coords.length; coord++ )
    {   
        var x = coords[coord].x;
        var y = coords[coord].y;

        polylinePath.push( x )
        polylinePath.push( y )
    }

    var polygon = diagram.polyline(polylinePath).attr({ 
                                                                "class": 'drawable',
                                                                "data-element-index": 0
                                                            });

  	polygon.attr(design);
    polygon.attr('strokeWidth', design.strokeWidth)

  	if (fill){
  		polygon.attr("fill","none")
  		design.fill = "none"
  	}

  	canvas.add(polygon)
  	return polygon;
}

function toolBorderCircle (coords,className){
	for (var coord = 0; coord < (coords.length); coord++){
		displayCircle(coords[coord].x,coords[coord].y,className)
	}
}

function displayCircle (x,y,className){
	var borderCircle =  diagram.circle(x,y, 3)
                                            .attr({
                                            		"class": className, 
                                                    "fill": "white",
                                                    "stroke": "black", 
                                                    "stroke-width": 1,
                                                }); 
     canvas.add(borderCircle)
}

function displayArea (coords,className){

    var doc=angular.element("#wrapper").scope().document;
    var measurementUnit = doc.pages[doc.currentPageIndex].scale.measurementUnit
    var unitPerPixel = doc.pages[doc.currentPageIndex].scale.unitPerPixel

	var midPointX = 0
	var midPointY = 0
	var area = calculateArea(coords)

	for (var coord = 0; coord < (coords.length-1); coord++){
		var x1 = coords[coord].x,
            y1 = coords[coord].y,
            x2 = coords[coord +1].x,
            y2 = coords[coord +1].y;
        midPointX += ( (x1 +x2) * (x1*y2 - x2*y1) / unitPerPixel )
        midPointY += ( (y1 +y2) * (x1*y2 - x2*y1) /unitPerPixel )
	}

	midPointX = (1 / (6 * area) ) * midPointX
    midPointY = (1 / (6 * area) ) * midPointY
    
    if (area < 0)
    	area *= -1
    var areaText= diagram.text( Number(midPointX), 
                                Number(midPointY), 
                                (area+measurementUnit+'\xB2') );

    areaText.attr({ 
                    'class': 'area-text '+className,
                    'font-family':'Days One'  ,
                    'font-size':12,
                    'text-anchor':'middle' , 
                    "fill":'navy',
                    "stroke":'none', 

                }); 
   	canvas.add(areaText)

}

function displayDistance(distance, coords,className){

    var doc=angular.element("#wrapper").scope().document;
    var measurementUnit = doc.pages[doc.currentPageIndex].scale.measurementUnit
	var coordsX = coords[coords.length-1].x
	var coordsY = coords[coords.length-1].y
	var distanceText

	if (coords[0].y < coordsY )
		distanceText = diagram.text(coordsX+20, coordsY+15, distance+measurementUnit);
	else
		distanceText = diagram.text(coordsX+20, coordsY-10, distance+measurementUnit);


    distanceText.attr({ 
                    'class':  "perimeter-text " +  className,
                    'font-family':'Days One'  ,
                    'font-size':12,
                    'text-anchor':'middle' , 
                    "fill":'navy',
                    "stroke":'none', 
                }); 
   	canvas.add(distanceText)	
}

function removeScaleLine(){
	removeEmptyElements()
}




function createElement(doc){

    for (var element in doc.elements)
    {
        var elementRef = doc.elements[element]
        for (var drawing in elementRef.drawings)
        {
            var drawingRef = elementRef.drawings[drawing];
            var currentTool = tools[drawingRef.type];
            var drawingElement = null;

            if (elementRef.type!="count"){
                drawingElement = createPolygon(drawingRef.points, drawingRef.designProperties,false)
                console.log(drawingRef.points)
                toolBorderCircle(drawingRef.points,"circle-"+drawingElement.id)
                if(drawingRef.area == 0)
                    displayDistance(drawingRef.perimeter,drawingRef.points,"text-"+drawingElement.id)     
                else
                    displayArea(drawingRef.points,"text-"+drawingElement.id)
            }

            else
                drawingElement = drawTickMark (drawingRef.points[0])

            drawingElement.parent = drawingRef
            drawingRef.snapInstance = drawingElement;
            currentTool.addEventListeners(drawingElement);
        }
    }

}
