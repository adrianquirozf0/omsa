

angular
	.module("app",["uiGmapgoogle-maps"])
	.config(['uiGmapGoogleMapApiProvider', function (GoogleMapApi) {
		  GoogleMapApi.configure({
		    v: '3.exp',
		  });
	}])
	.controller("maincontroller",function($scope){
		$scope.map = {
			marker: {

			},
			zoom: 16, 
			center: {
				latitude: 18.488044, 
				longitude: -69.962271, 
			},
		};

		$scope.prueba=function(){
			alert("vamos bien");
		};
	});