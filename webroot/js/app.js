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
  .value("http_config",{
    host:"http://52.0.225.159/",
  })

  .controller("maincontroller", ['$geolocation', '$scope',"uiGmapIsReady","http_config","$http",
    function($geolocation,$scope,uiGmapIsReady,http_config,http){
     $geolocation.watchPosition({
            timeout: 60000,
            maximumAge: 0,
            enableHighAccuracy: true

        });

     $scope.paused = false;
     $scope.duracion = "Calculando...";
     $scope.distancia = "Calculando...";

     $scope.map = {
      control: {},
      marker: { 

         id: 0,
            coords: {
                latitude: 18.488044,
                longitude: -64.96300,
            },
            options:{
              draggable:true
            }

      },
      zoom: 16, 
      center: {
        latitude: 18.488044, 
        longitude: -69.962271, 
      },
    };
             $scope.$watch(function() {
          return $geolocation.position.coords;
        }, function (new_val) {
          if (!new_val) {
            return;
          }
          
          console.log(new_val.latitude,new_val.longitude);
          $scope.map.marker.coords.latitude=new_val.latitude;
          $scope.map.marker.coords.longitude=new_val.longitude;
        });


        $scope.$watch(function() {
          return $scope.map.marker.coords;
        }, function (new_val, old_val) {
          if (!new_val || new_val == old_val) {
            return;
          }
          if (!$scope.paused) {
            $scope.submit();
          }
        }, true);

           $scope.submit = function(){
            var url = http_config.host + "/fixes.json";
            var now = new Date();
            var myDate = now.getFullYear()+"-"+("0"+(now.getMonth()+1)).slice(-2)+"-"+("0"+now.getDate()).slice(-2)+" "+
             ("0"+now.getHours()).slice(-2)+":"+("0"+now.getMinutes()).slice(-2)+":"+("0"+now.getSeconds()).slice(-2);
            var data = {
              Fix: {
                vehicle_id:1,
                latitude:$scope.map.marker.coords.latitude,
                longitude: $scope.map.marker.coords.longitude,
                fix_time: myDate,

                
              }
            };
      http.post(url,data);
           };
       
      $scope.pause = function() {
        $scope.paused = !$scope.paused;
      };

uiGmapIsReady.promise(1).then(function(instances) {
     var origin1 = new google.maps.LatLng(18.487826949218416,-69.96467035609737);
    var destinationB = new google.maps.LatLng(18.4878797,-69.9631046);

    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix(
      {
        origins: [origin1],
        destinations: [destinationB],
        travelMode: google.maps.TravelMode.DRIVING,
        avoidHighways: false,
        avoidTolls: false
      }, callback);

    function callback(response, status) {
    $scope.$apply(function(){
        var row = response.rows.shift();
        var element = row.elements.shift();
        if (element.status == "OK") {
          var distance = element.distance.text;
          var duration = element.duration.text;
          $scope.distancia = distance;
          $scope.duracion = duration;
        } else {
          console.log("No se  pudo calcular la ruta.")
        }
        
    })};
    });

    
  }]);