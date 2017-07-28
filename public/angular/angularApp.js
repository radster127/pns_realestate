var app = angular.module("pns", [], function($interpolateProvider) {

    $interpolateProvider.startSymbol('{|');
    $interpolateProvider.endSymbol('|}');

});

var jsonConfig = {
    
    headers : {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }

};

var fileConfig = {

	transformRequest: angular.identity,
	header: {'Content-Type': undefined}

};



