

angular
	.module("app",[])
	.controller("maincontroller",function($scope){
		$scope.prueba=function(){
			alert("vamos bien");
		};
	});