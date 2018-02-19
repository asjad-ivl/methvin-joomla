function updatDesign(instance, attribute,value){
	instance.node.style[attribute] = value
}


function updateHatch(instance,patternID){
	

}

//Randomly generate a hex color e.g #ffeecc
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

//Randomly generate a light hex color
function getRandomLightColor() {
    var letters = '9ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 7)];
    }
    return color;
}

/** Returns the darker/lighter shade of a hax color
https://www.sitepoint.com/javascript-generate-lighter-darker-color/
ColorLuminance("#69c", 0);		// returns "#6699cc"
ColorLuminance("6699CC", 0.2);	// "#7ab8f5" - 20% lighter
ColorLuminance("69C", -0.5);	// "#334d66" - 50% darker
ColorLuminance("000", 1);		// "#000000" - true black cannot be made lighter!
**/
function ColorLuminance(hex, lum) {

	// validate hex string
	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;

	// convert to decimal and change luminosity
	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}

	return rgb;
}


function enableSnapping(){
    disableSnapping();
    // snappingInterval = setInterval(startSnapping, 50); 
}

function disableSnapping(){
     clearInterval(snappingInterval);
}


var searchDeltas = [
    [0, 0],

    [-1,-1], [0,-1], [1,-1],
    [-1, 0]        , [1, 0],
    [-1, 1], [0, 1], [1, 1],    
    
    [-2,-2], [-1,-2], [0,-2], [1,-2], [2,-2],
    [-2,-1]                         , [2,-1],
    [-2, 0]                         , [2, 0],
    [-2, 1]                         , [2, 1],
    [-2, 2], [-1, 2], [0, 2], [1, 2], [2, 2],

    [-3,-3], [-2,-3], [-1,-3], [0,-3], [1,-3], [2,-3], [3,-3],
    [-3,-2]                                          , [3,-2],
    [-3,-1]                                          , [3,-1],
    [-3, 0]                                          , [3, 0],
    [-3, 1]                                          , [3, 1],
    [-3, 2]                                          , [3, 2],
    [-3, 3], [-2, 3], [-1, 3], [0, 3], [1, 3], [2,3] , [3, 3],

    [-4,-4], [-3,-4], [-2,-4]  [-1,-4], [0,-4], [1,-4], [2,-4], [3,-4], [4,-4],
    [-4,-3]                                                           , [4,-3],
    [-4,-2]                                                           , [4,-2],
    [-4,-1]                                                           , [4,-1],
    [-4, 0]                                                           , [4, 0],
    [-4, 1]                                                           , [4, 1],
    [-4, 2]                                                           , [4, 2],
    [-4, 3]                                                           , [4, 3],
    [-4, 4], [-3, 4], [-2, 4], [-1, 4], [0, 4], [1,4], [2, 4], [3, 4] , [4, 4]
];

var snappingContext = {
    snappingSearchTimeout: null,
    lastProcessedEvent : null,
    currentProcessingEvent : null,
    searchIndex : 0
};

function searchForSnapping(){
    //todo: may be unnecessary
    // if(!lastMouseEvent
    //     || (snappingContext.currentProcessingEvent && snappingContext.currentProcessingEvent == snappingContext.lastProcessedEvent)){
    //     console.log("Doing nothing");
    //     return;
    // }
    var element = null;
    if(!snappingContext.currentProcessingEvent 
        || snappingContext.currentProcessingEvent != lastMouseEvent ){
        //reset search
       // console.log("Resetting search");
        snappingContext.currentProcessingEvent = lastMouseEvent;
        snappingContext.searchIndex = 0;
    }
    
    var x = snappingContext.currentProcessingEvent.clientX + searchDeltas[snappingContext.searchIndex][0];
    var y = snappingContext.currentProcessingEvent.clientY + searchDeltas[snappingContext.searchIndex][1];
   // console.log("Resetting last snap point");
    snapCurrentX = null;
    snapCurrentY = null;
       if (circle)
            circle.remove();

    element = document.elementFromPoint(x, y);
   // console.log(element);
    if (element && (element.tagName == "path" )) { //|| element.tagName == "line"
        snapCurrentX = x;
        snapCurrentY = y;

        if (circle == null) {
            circle = diagram.circle(x, y, 4).attr({"class": "hover-circle"});
            circle.attr({ fill: "white", "stroke-width": "1px", stroke: "#ff8556"}) 
        } 
        circle.attr({
            x: x,
            y: y
        }, 0);
    } else {
        //      console.log("No match at " + x + ", " + y);
        if (circle)
            circle.remove();

        snapCurrentX = null;
        snapCurrentY = null;
        circle = null;
    }
    //are we at end of search?
    if(!snapCurrentX && snappingContext.searchIndex < searchDeltas.length - 1){
        snappingContext.searchIndex++;
      //  console.log("Continuing search, scheduling for " + snappingContext.searchIndex );
        scheduleSnappingSearch();
    } else {
       // console.log("End of search at searchIndex " +  snappingContext.searchIndex + " found at x " + snapCurrentX);
        snappingContext.lastProcessedEvent = snappingContext.currentProcessingEvent;
        snappingContext.currentProcessingEvent = null;
    }
}

function scheduleSnappingSearch(){
    clearTimeout(snappingContext.snappingSearchTimeout);
    snappingContext.snappingSearchTimeout = window.setTimeout(searchForSnapping, 0);
}

function stopSnapping(){
    clearInterval(snappingInterval);
}