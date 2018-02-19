
"use strict";
var TaskItemClassName = 'drawable'

var menu = document.querySelector (".context-menu");
var menuState= 0;
var activeClassName = "context-menu--active";
var rightClickedElement;

 
function toggleMenuOn(xCord,yCord, targetObject) {
	$('.context-menu').css({top: yCord, left: xCord})

    if ( menuState == 0 ) {
    	menuState = 1;
    	menu.classList.add(activeClassName);
      angular.element("#contextMenu").scope().targetObject=targetObject;
      return false;
  	}
}

function toggleMenuOff() {
	if ( menuState == 1 ) {
	  	rightClickedElement = null;
	    menuState = 0;
	    menu.classList.remove(activeClassName);
	}
}
 

function clickListener() {
  document.addEventListener( "click", function(e) {
    var button = e.which || e.button;
    if ( button === 1 ) {
      toggleMenuOff();
    }
  });
}

function keyupListener() {
  window.onkeyup = function(e) {
    if ( e.keyCode === 27 ) {
      toggleMenuOff();
    }
  }
}

 
clickListener() 
