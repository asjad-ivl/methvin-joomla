'use strict';
angular.module('MethvinApp')
    .service('DocumentService', ['$http', '$q', '$window',  function($http, $q, $window) {
        var service = {
            document : null,
            setCurrentDocument : function (document){
                service.document = document;
            },
            getCurrentDocument : function(){
                service.document;
            },
            getDocument : function(file){
                return $http.get("getDocument")
            },

            uploadDocument: function(file){
                return $http.post( "uploadFile")
            },
            uploadDocumentMock: function(){
                return $http.get("uploadDocument.json");
            },
            saveDocument : function (document, drawings){

            },

            exportToCSV : function(document){
                return $http.get("exportToCSV.json");
            },

            updatePageName : function(page){

            },
            newDocuments: function(file){
                
            }

        };
        return service;
    }]);