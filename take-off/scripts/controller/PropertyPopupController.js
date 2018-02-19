angular
    .module("MethvinApp")
    .controller("PropertyPopupController", ['$scope','$rootScope',"$uibModal", '$uibModalStack', "UserService", "$modalInstance", "targetObject",
        function($scope, $rootScope,  $uibModal, $uibModalStack, UserService, $modalInstance, targetObject) {
            
             $scope.targetObject = targetObject;
             $scope.updateDesign = function(attribute){
             	updatDesign($scope.targetObject.parent.snapInstance, attribute, $scope.targetObject.parent.designProperties[attribute])
             }

             $scope.updateHatch = function(patternID){
             	$scope.targetObject.parent.designProperties.fill = "url(#"+patternID+")"
             	$scope.targetObject.parent.snapInstance.node.style['fill'] = "url(#"+patternID+")"
             }
            
            $scope.closePropertyModal = function(element){
            }
            $scope.close =function(){
                $modalInstance.dismiss(null);   
            }
        }
    ]);
