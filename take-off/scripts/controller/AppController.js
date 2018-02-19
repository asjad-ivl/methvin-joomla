  angular
    .module("MethvinApp")
    .controller("AppController", ['$scope', '$rootScope', "$uibModal", '$uibModalStack', "UserService", "DocumentService", "FileUploader", "settings", "MessageService",
        function($scope, $rootScope, $uibModal, $uibModalStack, UserService, DocumentService,FileUploader, settings, MessageService) {

            $scope.UserService = UserService;
            $scope.document = null; 
            $scope.targetObject={};
            $scope.pageProperties = {
                showleft: false,
                showright: false,
            }


            $scope.setCurrentElement = function(index){
                var element = $scope.document.pages[$scope.document.currentPageIndex].elements[index]
               currentTool=tools[element.type];
               currentTool.setCurrentElement(element)
            }       

            $scope.highlightDrawing = function(drawing, event){
                updatDesign(drawing.snapInstance,"stroke", "#d56772");
                event.stopPropagation();
            }

            $scope.unhighlightDrawing = function(drawing, event){
                updatDesign(drawing.snapInstance,"stroke", drawing.designProperties.stroke);
                event.stopPropagation();
            }


            $scope.highlightChildDrawings = function(element){
                
                angular.forEach(element.drawings, function(drawing){
                    if(drawing.type === "count"){
                        updatDesign(drawing.snapInstance,"stroke", "#d56772");
                    }else{
                        updatDesign(drawing.snapInstance,"stroke", "#d56772");    
                    }
                    
                })
            }     

            $scope.unhighlightChildDrawings = function(element){
                angular.forEach(element.drawings, function(drawing){
                    
                    if(drawing.type === "count"){
                        updatDesign(drawing.snapInstance,"stroke", "000");
                    }else{
                        updatDesign(drawing.snapInstance,"stroke", drawing.designProperties.stroke);   
                    }
                })
            }

            $scope.displayMaterialPopup = function(element){
                var modalInstance = $uibModal.open({
                    animation: false, 
                    size: 'lg',
                    templateUrl: 'scripts/views/materialPopup.html',
                    controller: 'MaterialPopupController',
                    resolve: {
                        targetObject : function() { 
                            return element || $scope.targetObject ;
                        },
                    }
                });
                modalInstance.result.then(function(materialArray) {
                    if(materialArray){
                        $scope.targetObject.parent.material = materialArray;
                    }
                }); 
            } 

            $scope.displayPropertyPopup = function(){
                var modalInstance = $uibModal.open({
                    animation: false, 
                    size: 'sm',
                    templateUrl: 'scripts/views/propertyPopup.html',
                    controller: 'PropertyPopupController',
                    resolve: {
                        targetObject : function() { 
                            return $scope.targetObject ;
                        },
                    }
                });
                modalInstance.result.then(function() {
                    
                }); 
            }

            $scope.displayDocumentPopup = function(){
                var modalInstance = $uibModal.open({
                    animation: false, 
                    size: 'md',
                    templateUrl: 'scripts/views/openDocument.html',
                    controller: 'OpenDocumentController',
                    resolve: {
                        targetObject : function() { 
                            return $scope.targetObject ;
                        },
                    }
                });
                modalInstance.result.then(function() {
                    
                }); 
            }

            $scope.removeDrawing = function() {
                
                angular.forEach($scope.document.pages[$scope.document.currentPageIndex].elements, function(element,elementIndex){
                    angular.forEach(element.drawings, function(drawing,drawingIndex){
                        if (drawing.snapInstance.id == $scope.targetObject.id){
                            $scope.document.pages[$scope.document.currentPageIndex].elements[elementIndex].drawings.splice(drawingIndex,1)
                            removeElements('circle-'+$scope.targetObject.id)
                            removeElements('text-'+$scope.targetObject.id)
                            delete $scope.targetObject.parent
                            $scope.targetObject.remove()
                        }
                        
                    })
                })
            }

            function createPages(pages){
                angular.forEach(pages, function(page, index){
                    $scope.document.pages.push(new Page("Page "+index, page.path));
                })
            }

            $rootScope.$on("DocumentUploaded", function(response,result) {
                var documentId = 1;
                if (result.success) {

                    $scope.document = new Document(); 
                    
                    DocumentService.setCurrentDocument($scope.document);
                    createPages(result.pages);
                    $scope.pageProperties.showright = true;
                    currentTool=tools['select'];
                    $scope.currentTool=currentTool;
                    $scope.selected=5; // select index of the top toolbar;
                    $scope.loadFileOnCanvas($scope.document.pages[0], 0);
                    
                }
            });

            $rootScope.$on("OpenDocument", function(documentID) {
                var documentId = documentID;
                DocumentService.getDocument(documentId).then(function(response) {
                    if (response.data.success) {

                        $scope.document = new Document(); 
                        $scope.document.currentPageIndex=0;
                        DocumentService.setCurrentDocument($scope.document);
                        createPages(response.data.pages);
                        $scope.pageProperties.showright = true;
                        currentTool=tools['select'];
                        $scope.currentTool=currentTool;
                        $scope.selected=5; // select index of the top toolbar;
                        $scope.loadFileOnCanvas($scope.document.pages[$scope.document.currentPageIndex], $scope.document.currentPageIndex);
                        
                    }
                })
            });

            $scope.activateEditable = function(event){
                event.stopPropagation();
                //$activate(name)
            }

            $scope.deleteElement = function(element, elementIndex){
                var element = $scope.document.pages[$scope.document.currentPageIndex].elements[elementIndex]
                angular.forEach(element.drawings,function(drawingElement){
                    removeElements('circle-'+drawingElement.snapInstance.id)
                    removeElements('text-'+drawingElement.snapInstance.id)
                    delete (drawingElement.snapInstance.parent)
                    drawingElement.snapInstance.remove()
                })
                $scope.document.pages[$scope.document.currentPageIndex].elements.splice(elementIndex, 1);4
                currentTool = null;
            }

            $scope.selectTool = function(toolType){
                currentTool=tools[toolType];
                
                var currentPage=$scope.document.pages[$scope.document.currentPageIndex];
                currentPage.elements.push(new Element(toolType, toolType+" "+currentPage.elements.length));
                currentTool.setCurrentElement(currentPage.elements[currentPage.elements.length-1]);
            }

            $scope.loadFileOnCanvas = function(page, index) {
                currentTool = null;
                stopSnapping()

                if (index == $scope.document.currentPageIndex )
                    return

                $scope.document.currentPageIndex=index;
                angular.element("#canvasArea").html("");
                angular.element("#canvasArea").append("<svg id='foxkit-svg' xmlns:svg='http://www.w3.org/2000/svg' class='main-svg-element' id='element-value-'" + page.name + "'> </svg>")
                diagram = Snap('#foxkit-svg');
                diagramSvg = $('#foxkit-svg')[0]
                svgPoints = diagramSvg.createSVGPoint();

                Snap.load(page.path, function(f) {
                    diagram.attr({
                        class: "main-svg-element",
                        height: $(window).height(),
                        width: $(window).width()
                    });
                    diagram.append(f);
                    diagram.zpd(function(){
                    });
                    diagram.updateMouseWheelEvent(function(axis){
                        console.log("axis value "+ axis)  
                    })
                    canvas = Snap.select("#snapsvg-zpd-" + diagram.id);
                    createElement($scope.document.pages[index])
                    initializeDiagramClicks();
                });

            }

            $scope.canvasUploader = new FileUploader({
                    url: settings.baseUrl + 'uploadFile',
                    onSuccessItem: function(item,response,status,headers){
                        MessageService.hideLoading();
                        $rootScope.$emit("DocumentUploaded", response);
                    }
            });

            $scope.canvasUploader.onAfterAddingFile = function onAfterAddingFile(item) {
                $scope.isFileChoosen = true;
                $scope.userProfilePath = "";
                MessageService.displayLoading("Uploading and processing the file, please wait."); 
                $scope.canvasUploader.uploadAll();
            }

            $scope.uploadDocument = function() {
                angular.element("#canvasFileUploader").trigger("click");
            }


        }
    ]);
