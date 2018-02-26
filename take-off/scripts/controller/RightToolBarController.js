angular
    .module("MethvinApp")
    .controller("RightToolBarController", ['$scope', '$http', '$rootScope', "$uibModal", '$uibModalStack', "UserService", "FileUploader",
        function($scope, $http, $rootScope, $uibModal, $uibModalStack, UserService, FileUploader) {


            $scope.saveDocument = function(){
                console.log(" at saveDocument")
                var documentString = JSON.stringify($scope.document);
                console.log(documentString)

                $http({
                    method: "POST",
                    url: "http://172.168.8.98:9090/saveDocument",
                    headers: {
                       'Content-Type': 'application/json'
                    },
                    data: {   
                            documentString: "asajadamin",
                            documentID: 5256 
                    }
                }).then(function(){
                    console.log("document has been saved successfully")
                })

            } 
            $scope.zoomIn = function() {
                $scope.document.pages[$scope.document.currentPageIndex].zoomFactor += 0.1
                var zoomFactor = ($scope.document.pages[$scope.document.currentPageIndex].zoomFactor)
                diagram.zoomTo(zoomFactor, 500, null, function (err, diagram) {
                });
            }

            $scope.zoomOut = function() {
                $scope.document.pages[$scope.document.currentPageIndex].zoomFactor -= 0.1
                var zoomFactor = ($scope.document.pages[$scope.document.currentPageIndex].zoomFactor)
                diagram.zoomTo(zoomFactor, 500, null, function (err, diagram) {
                });
            }

            $scope.export = function() {
                var myData =[]
                var dataString = "";
                var csvContent = "PageName,ElementName,DrawingName,Area,Perimeter,Material,Section,Multiplier,Quantity,Unit" + "\n";
                

                for (var page in $scope.document.pages)
                {
                    var pageName = $scope.document.pages[page].name
                    for (var element in $scope.document.pages[page].elements ){
                        var elementName = $scope.document.pages[page].elements[element].name
                        for (var drawing in $scope.document.pages[page].elements[element].drawings)
                        {
                            // var drawingType = $scope.document.pages[page].elements[element].drawings[drawing].type
                            var drawingName = $scope.document.pages[page].elements[element].drawings[drawing].title
                            var area = $scope.document.pages[page].elements[element].drawings[drawing].area
                            var perimeter = $scope.document.pages[page].elements[element].drawings[drawing].perimeter

                            if ($scope.document.pages[page].elements[element].drawings[drawing].material.length > 0)
                                for (var material in $scope.document.pages[page].elements[element].drawings[drawing].material)
                                {
                                    var materialName = $scope.document.pages[page].elements[element].drawings[drawing].material[material].material
                                    var materialSection = $scope.document.pages[page].elements[element].drawings[drawing].material[material].section
                                    var materialMultiplier = $scope.document.pages[page].elements[element].drawings[drawing].material[material].multiplier
                                    var materialQuantity = $scope.document.pages[page].elements[element].drawings[drawing].material[material].quantity
                                    var materialUnit = $scope.document.pages[page].elements[element].drawings[drawing].material[material].unit
                                    var dataString = pageName +','+ elementName +','+ drawingName  +','+ area +','+ perimeter +','+ materialName +','+ materialSection+','+ materialMultiplier+','+ materialQuantity+','+ materialUnit
                                    csvContent += dataString + "\n"
                                }

                            else{
                                var dataString = pageName +','+ elementName +','+ drawingName +','+ area +','+ perimeter +', , , , ,'
                                csvContent += dataString + "\n"
                            }
                        }
                    }
                }

                var encodedUri = encodeURI(csvContent);

                var fileName =  $scope.document.name + ".csv";
                console.log("this  is the csvContent")
                console.log(csvContent)

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

            $scope.settings = function() {
                currentTool=tools['scale'];
            }

            $scope.displaySettingsPopup =function(lineCoordinates){
                currentTool.initialize()
                currentTool=tools['select'];
                var modalInstance = $uibModal.open({
                    animation: false,
                    backdrop:'static',
                    size: 'sm',
                    templateUrl: 'scripts/views/scalePopup.html',
                    controller: 'ScalePopupController',
                    resolve: {
                        lineCoordinates : function() { 
                            return angular.copy(lineCoordinates) ;
                        },
                    }
                });
                modalInstance.result.then(function() {
                    
                });
            }

            $scope.downloadCsv = function (){
                // var csvData = []
                
            }

            $scope.displayHelpPopup = function() {}

        }
    ]);
