angular
    .module("MethvinApp")
    .controller("MaterialPopupController", ['$scope', '$rootScope', "$uibModal", '$uibModalStack', "UserService", "DocumentService", "$modalInstance", "targetObject",
        function($scope, $rootScope, $uibModal, $uibModalStack, UserService, DocumentService, $modalInstance, targetObject) {


            $scope.targetObject = angular.copy(targetObject);

            $scope.addMaterial = function() {
                $scope.targetObject.parent.material[$scope.targetObject.parent.material.length] = new Material();
            }

            $scope.removeMaterial = function(index) {
                $scope.targetObject.parent.material.splice(index, 1);
            }

            $scope.close = function() {
            	$modalInstance.dismiss(null);
            }

            $scope.save = function(){
            	$modalInstance.close($scope.targetObject.parent.material);
            }

        }
    ]);
