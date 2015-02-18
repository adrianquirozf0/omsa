

angular
 // .module('myApp', ['ngGeolocation'])
 //    .controller('geolocCtrl', ['$geolocation', '$scope', function($geolocation, $scope) {
 //        $geolocation.watchPosition({
 //            timeout: 60000,
 //            maximumAge: 0,
 //            enableHighAccuracy: true
 //        });
 //        $scope.myCoords = $geolocation.position.coords; // this is regularly updated
 //        $scope.myError = $geolocation.position.error; // this becomes truthy, and has 'code' and 'message' if an error occurs
 //    }]);
	.module("app",["uiGmapgoogle-maps",'ngGeolocation'])
	.config(['uiGmapGoogleMapApiProvider', function (GoogleMapApi) {
		  GoogleMapApi.configure({
		    v: '3.exp',
		  });
	}])
	.controller("maincontroller", ['$geolocation', '$scope',function($geolocation,$scope){
		 $geolocation.watchPosition({
            timeout: 60000,
            maximumAge: 0,
            enableHighAccuracy: true
        });

        $scope.$watch(function() {
        	return $geolocation.position.coords;
        }, function (new_val) {
        	console.log(new_val);
        	scope.map.marker.latitude=new_val.Coordinates.latitude;
        	scope.map.marker.latitude=new_val.Coordinates.longitude;
        });

		$scope.map = {
			marker: { 
				latitude:18,
				      longitude:-69,

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
	}]);