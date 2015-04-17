angular



	.module("app",["uiGmapgoogle-maps",'ngGeolocation'])
	.config(['uiGmapGoogleMapApiProvider', function (GoogleMapApi) {
		  GoogleMapApi.configure({
		    v: '3.exp',
		  });
	}])
	.value("http_config",{
		host:"http://52.0.225.159/",
	})

	.controller("maincontroller", ['$geolocation', '$scope',"uiGmapIsReady","http_config","$http","$interval",
		function($geolocation,$scope,uiGmapIsReady,http_config,$http,$interval){
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
		            latitude: 18.487876,
		            longitude: -69.962292,
		        },
		        icon: "http://maps.google.com/mapfiles/kml/pal4/icon15.png",
		        options:{
		        	draggable:true


		        }


			},

			marker2: { 

				 id: 1,
		        coords: {
		            latitude: 18.487876,
		            longitude: -69.962292,
		        },
		         icon: "http://maps.google.com/mapfiles/kml/pal4/icon28.png",
		        options:{
		        	draggable:false

		        }

			},
			zoom: 16, 
			center: {
				latitude: 18.488044, 
				longitude: -69.962271, 
			},
		};
        $scope.$watch(function() {
             return $scope.map.marker.coords;
         }, function (new_val) {
        	if (!new_val) {
        		return;
        	}
        	
        	console.log(new_val.latitude,new_val.longitude);
        	
        	update();
		});

		$interval(function() {
			console.log("Interval occurred");
			update();
		},3000);

        function update() {
        	uiGmapIsReady.promise(1)
        		.then(function(instances) {
        			return $http.get(http_config.host+"/vehicles/1.json");
        		})
        		.then(function (data) {
        			console.log("datos", data.data.result);
        			return data.data.result;
        		})
        		.then(function(result){
        			
        			$scope.map.marker.coords.latitude=result.Fix.latitude;
        			$scope.map.marker.coords.longitude=result.Fix.longitude; 
        			console.log("vehicle moved", $scope.map.marker.coords.longitude);

	     			var origin1 = new google.maps.LatLng(result.Fix.latitude,result.Fix.longitude);
	     			console.log("longitud", result.Fix.longitude);
	    			var destinationB = new google.maps.LatLng($scope.map.marker2.coords.latitude,$scope.map.marker2.coords.longitude);
	    	         
		    		var service = new google.maps.DistanceMatrixService();
		    		service.getDistanceMatrix({
						origins: [origin1],
						destinations: [destinationB],
						travelMode: google.maps.TravelMode.DRIVING,
						avoidHighways: false,
						avoidTolls: false
					}, callback);
        		});
        }

   //      $scope.$watch(function() {
   //      	return $scope.map.marker.coords;
   //      }, function (new_val, old_val) {
   //      	if (!new_val || new_val == old_val) {
   //      		return;
   //      	}
   //      	if (!$scope.paused) {
   //      		$scope.submit();
   //      	}
   //      }, true);

   //         $scope.submit = function(){
   //         	var url = http_config.host + "/fixes.json";
   //         	var now = new Date();
   //         	var myDate = now.getFullYear()+"-"+("0"+(now.getMonth()+1)).slice(-2)+"-"+("0"+now.getDate()).slice(-2)+" "+
   //         	 ("0"+now.getHours()).slice(-2)+":"+("0"+now.getMinutes()).slice(-2)+":"+("0"+now.getSeconds()).slice(-2);
   //         	var data = {
   //         		Fix: {
   //         			vehicle_id:1,
   //         			latitude:$scope.map.marker.coords.latitude,
   //         			longitude: $scope.map.marker.coords.longitude,
   //         			fix_time: myDate,

           			
   //         		}
   //         	};
			// $http.post(url,data);
   //         };
       
      $scope.pause = function() {
      	$scope.paused = !$scope.paused;
      };


    function callback(response, status) {
	    $scope.$apply(function(){
	        var row = response.rows.shift();
	        var element = row.elements.shift();
	        if (element.status == "OK") {
	          var distance = element.distance.text;
	          var duration = element.duration.text;
	          $scope.distancia = distance;
	          $scope.duracion = duration;
	          console.log("Distancia: " + distance,  "Duracion: " + duration);
	        } else {
	          console.log("No se  pudo calcular la ruta.")
	        }
    	});
	};
    

		
	}]);