(function () {

    'use strict';

    angular
        .module('app', [])

        /**
         * AppController
         * Description: Sets up a controller
         */
        .controller('AppController', ['$scope', function ($scope) {
            $scope.financeArr = [];

            $scope.addFinance = function () {
                $scope.financeArr.push({});
            };
            $scope.removeFinance = function ($index) {
                $scope.financeArr.splice($index, 1);
            }


            $scope.performerArr = [];

            $scope.addPerformer = function () {
                $scope.performerArr.push({});
            };

            $scope.removePerformer = function ($index) {
                $scope.performerArr.splice($index, 1);
            }

        }]);

})();
