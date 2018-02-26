function Document (){
	this.name = "New document";
	this.basePath = "";
	this.pages = [];
	this.currentPageIndex = null;
}

function Page(name, path){
	this.name = name;
	this.path = path;
	this.scale = {
		unitPerPixel : 1,
		measurementUnit : "cm"
	}
	this.zoomFactor = 1;
	this.elements = [];
	this.currentElementIndex=-1;
}

function Element(type, name){
	this.type = type;
	this.name = name;
	this.drawings = [];
	this.currentDrawingIndex=-1;
	this.defaultDesignPorperties = new DesignProperties()
}

function Drawing(type){
	this.area = 0;     
	this.type = type;
	this.perimeter = 0;
	this.title = type;
	this.snapInstance=null;
	this.designProperties = null;
	this.points = [];
	this.material = [];
}

function Material(name, section, multiplier, quantity, unit){
	this.name=name;
	this.section=section;
	this.multiplier=multiplier;
	this.quantity=quantity;
	this.unit=unit;
}

function DesignProperties(){
	this.stroke = "#595454",
	this.fill = randomColor({
	   luminosity: 'bright',
	   format: 'rgb' // e.g. 'rgb(225,200,20)'
	}),
    this.hatch = false,
    this.opacity = 0.5,
    this.fillOpacity = 0.5,
    this.strokeWidth = 4,
    this.style = "5,0",
    this.patternUrl = "",
    this["stroke-linejoin"]="butt"
}
