MethvinApp.factory("MessageService", ['$rootScope', function($rootScope, $modal) {
    return {
        displaySuccess: function(message) {
            angular.element("#messageArea").text(message);
            angular.element("#messageArea").addClass("show").removeClass("hide");
            angular.element("#messageArea").fadeOut(5000, function() {
                angular.element("#messageArea").addClass("hide").removeClass("show");

            });
        },
        hideError: function(message) {
            angular.element("#errorMessageArea").addClass("hide").removeClass("show");
        },
        displayError: function(message) {
            angular.element("#errorMessageArea").html(message + " <br> (click here to dismiss this message)");
            angular.element("#errorMessageArea").addClass("show").removeClass("hide");

        },
        displayLoading: function() {
            angular.element("#messageArea").html("Loading ");
            angular.element("#messageArea").addClass("show").removeClass("hide");
        },
        hideLoading: function() {
            angular.element("#messageArea").html("");
            angular.element("#messageArea").addClass("hide").removeClass("show");
        }
    };
}]);
