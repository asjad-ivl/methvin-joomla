'use strict';
angular.module('MethvinApp')
    .service('UserService', ['$http', '$q', '$window',  function($http,  $q, $window) {
        var service = {
            currentUser: null,
            getCurrentUser: function() {
                return service.currentUser;
            },

            getSessionFromServer: function() {
                var deferred = $q.defer();
                $http.get("api/currentcustomer", {
                    withCredentials: true
                }).then(
                    function(response) {

                        service.currentUser = response.data.customer;
                        deferred.resolve(service.currentUser);

                        if(response.data.customer && response.data.customer.UserName)
                            service.currentUser = response.data.customer;

                    },
                    function(error) {
                        return $q.reject(error);
                    }
                );
                return deferred.promise;
            },

        };
        return service;
    }]);
