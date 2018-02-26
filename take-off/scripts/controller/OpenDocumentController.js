angular
    .module("MethvinApp")
    .controller("OpenDocumentController", ['$scope', '$http', '$rootScope', "$uibModal", '$uibModalStack', "UserService", "$modalInstance",
        function($scope, $http, $rootScope, $uibModal, $uibModalStack, UserService, $modalInstance) {

            $scope.openDocument = function(documentID){
                console.log(documentID)
                // rootScope.$emit("OpenDocument", documentID);
            }

            $scope.closeDocumentPopup = function(){
                $modalInstance.dismiss(null)
            }

        }    
    ]);
