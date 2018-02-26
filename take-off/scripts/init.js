function initializeDiagramClicks() {
    diagram.mousemove(function(e) {
        lastMouseEvent = e;
        if (currentTool) {
            currentTool.mousemove(e);
            if (currentTool.name == "Select" || currentTool.name == "Count") {
                if (circle != null) {
                    circle.remove();
                    circle = null;
                }
            } else {
                scheduleSnappingSearch();
            }
        }
        
    });

    diagram.mousedown(function(event) {
        if (!currentTool)
            return;
        currentTool.mousedown(event);
    });

    diagram.mouseup(function(event) {
        if (!currentTool)
            return;
        currentTool.mouseup(event);
    });

    diagram.click(function(event) {
        if (!currentTool)
            return;
        currentTool.click(event);
    });

    diagram.dblclick(function(event) {
        if (!currentTool)
            return;
        currentTool.dblclick(event);
    });
}
