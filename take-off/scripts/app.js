'use strict';

var MethvinApp = angular
    .module('MethvinApp', ['ui.bootstrap', 'angularFileUpload','xeditable', 'angularSpectrumColorpicker']);

var diagram = null;
var diagramSvg ;
var currentTool = null;
var canvas = null;
var svgPoints;

var snappingInterval = null;
var lastMouseEvent;
var circle = null;

var snapCurrentX = null;
var snapCurrentY = null;

MethvinApp.config(['$httpProvider', function( $httpProvider) {
	
	$httpProvider.interceptors.push(function($q, MessageService, settings) {
        var pendingRequests = 0;
        return {
            'request': function(config) {
                if (config.url.indexOf(".html") < 0 && config.url.indexOf(".json") < 0) { // if this is not a template load request
                    if (config.url.indexOf("http") != 0) { //skip modifying full qualified paths
                        config.url = settings.baseUrl + config.url;
                        MessageService.displayLoading(); 
                    }
                } 
                return config;
            },

            'response': function(response) {
                MessageService.hideLoading();
                MessageService.hideError();
                if(response.data.success && response.data.message)
                    MessageService.displaySuccess(response.data.message);
                else if(!response.data.success && response.data.message)
                    MessageService.displayError(response.data.message);
                return response;
            },

            'requestError': function(rejection) {
                MessageService.hideLoading();
                MessageService.displayError("There was an error in making the request.");
                return $q.reject(rejection);
            },

            'responseError': function(rejection) {
                if (rejection.status <= 0) {
                    MessageService.displayError("Request failed, retrying in 5 seconds...");
                }
                MessageService.hideLoading();
                var errorDesc = "Could not connect to server";
                if (rejection.status == 404) {
                    errorDesc = "Requested resource not found";
                } else if (rejection.status == 401) {
                    errorDesc = "Authentication required.";
                } else if (rejection.status == 403) {
                    errorDesc = "Forbidden request";
                } else if (rejection.status == 502) {
                    errorDesc = "Bad Gateway , Invalid Response.";
                } else if (rejection.status == 504) {
                    errorDesc = "Request TimeOut.";
                } else if (rejection.status == 500) {
                    errorDesc = "Request has been succeeded but there was some problem on server";
                }
                MessageService.displayError(errorDesc);
                return $q.reject(rejection);
            }
        };
    });
}]);

MethvinApp.run(function(editableOptions) {
  editableOptions.theme = 'bs3';  
}).factory('settings', ['$rootScope', function($rootScope) {
    var settings = {
        baseUrl: "http://25.54.121.199:8000/" 
    };
    return settings;
}]);


var tools = {
    line: new LineTool(), 
    slab: new PolygonTool(),
    wall: new PolygonTool(),
    area: new PolygonTool(),
    scale: new ScaleTool(),
    count: new CountTool(),
    select:new SelectTool()
};
