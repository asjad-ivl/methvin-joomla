

function downloadCsv (){
	
	// var csvData = []
	var dataString = "";
	var csvContent = "PageName,ElementName,DrawingType,Area,Perimeter,Material,Section,Multiplier,Quantity,Unit" + "\n";
	
	var doc = angular.element("#wrapper").scope().document

	for (var page in doc)
	{
		var pageName = doc.pages[page].name
		for (var element in doc.pages[page].elements ){
			var elementName = doc.pages[page].elements[element].name
			for (var drawing in doc.pages[page].elements[element].drawings)
			{
				var drawingType = doc.pages[page].elements[element].drawings[drawing].type
				var area = doc.pages[page].elements[element].drawings[drawing].area
				var perimeter = doc.pages[page].elements[element].drawings[drawing].perimeter
				for (var material in doc.pages[page].elements[element].drawings[drawing].material)
				{
					var materialName = doc.pages[page].elements[element].drawings[drawing].material[material].name
					var materialSection = doc.pages[page].elements[element].drawings[drawing].material[material].section
					var materialMultiplier = doc.pages[page].elements[element].drawings[drawing].material[material].multiplier
					var materialQuantity = doc.pages[page].elements[element].drawings[drawing].material[material].quantity
					var materialUnit = doc.pages[page].elements[element].drawings[drawing].material[material].unit
					var dataString = pageName +','+ elementName +','+ drawingType +','+ area +','+ perimeter +','+ materialName +','+ materialSection+','+ materialMultiplier+','+ materialQuantity+','+ materialUnit
					csvContent += dataString + "\n"
				}
			}
		}
	}

	
	var encodedUri = encodeURI(csvContent);

	var fileName =  doc.name + ".csv";

	var buffer = myData.join("\n")

	var blob = new Blob([csvContent], {
	  "type": "text/csv;charset=utf8;"			
	});

	var link = document.createElement("a");
	if(link.download !== undefined) { // feature detection
	  // Browsers that support HTML5 download attribute
	  link.setAttribute("href", window.URL.createObjectURL(blob));
	  link.setAttribute("download", fileName);
	 }
	else {
	  // it needs to implement server side export
	  link.setAttribute("href", "http://www.example.com/export");
	}
	link.innerHTML = "";
	document.body.appendChild(link);
	link.click()

}

function getElements(toolName,callback){
	currentTool = tools[toolName]
	var data = []
	for ( var elementIndex = 0; elementIndex < (currentTool.properties.length -1); elementIndex++)
	{	
		var element = currentTool.properties[elementIndex];
		if(toolName == "polygon")
			data.push([element.name,"area",element.area])

		data.push( [element.name,"perimeter",element.distance])

		for (var material in element.materials)
			data.push([ element.name, element.materials[material].name  , element.materials[material].value ])

	}
	callback(data)
	
}

