angular
    .module("MethvinApp")
    .controller("ScalePopupController", ['$scope', '$rootScope', "$uibModal", '$uibModalStack', "UserService", "$modalInstance", "lineCoordinates", "DocumentService",
        function($scope, $rootScope, $uibModal, $uibModalStack, UserService, $modalInstance, lineCoordinates, DocumentService) {

            $scope.close = function() {
                $modalInstance.close(null);
            }


            $scope.cancelScale = function() {
                $modalInstance.close(null);
            }


            $scope.setScale = function() {
                var scaleValue = Number($scope.scale);
                if(isNaN(scaleValue) || scaleValue <= 0) {
                	$scope.displayError = true;
                	return;
                }
                var distance = (Math.sqrt(Math.pow((lineCoordinates[0].x - lineCoordinates[1].x), 2) + Math.pow((lineCoordinates[0].y - lineCoordinates[1].y), 2)))

                if (distance < 0)
                    distance = distance * -1;
                var doc=DocumentService.document;
                doc.pages[doc.currentPageIndex].scale.unitPerPixel=distance / scaleValue;
                doc.pages[doc.currentPageIndex].scale.measurementUnit = $scope.measurementUnit;
                $modalInstance.close(null);
                updateCalculationsOnAllDiagrams(doc);
            }


            function updateCalculationsOnAllDiagrams(doc){
                angular.element('.area-text').remove()
                angular.element('.perimeter-text').remove()

            	angular.forEach(doc.pages[doc.currentPageIndex].elements, function(element){
                    angular.forEach(element.drawings, function(drawing){
                        console.log(element)
                        if (drawing.type != 'count' && drawing.area != 0 ){
                            displayArea (drawing.points,"text-"+drawing.snapInstance.id)
                        }
                        else{
                            var distance = calculateDistance (drawing.points)
                            console.log(distance)
                            displayDistance(distance,drawing.points,"text-"+drawing.snapInstance.id)
                        }
                    })
            	})
            }
        }
    ]);
