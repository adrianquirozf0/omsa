
<?php
echo $this->Html->script("app");
?>
<style type="text/css">
.angular-google-map-container {
	height:400px;
	width:800px;
}
</style>
<div ng-app="app">
	<div ng-controller="maincontroller">
			<button ng-click="submit()"> enviar posicion</button>
			<button ng-click="calculateDistance()"> calc</button>
			<button ng-click="pause()"> {{ paused ? "Resumir" : "Pausar" }}</button> 
			<div>distancia:{{distancia}}</div>
			<div>duracion:{{duracion}}</div>
<input type="text" ng-model="map.marker.coords.latitude">
<input type="text" ng-model="map.marker.coords.longitude">
			<div id="map_canvas" style="height:400px;width:800px">
				 <ui-gmap-google-map center="map.center" zoom="map.zoom" control="map.control">
        		<ui-gmap-marker coords="map.marker.coords" idkey="map.marker.id" options="map.marker.options"></ui-gmap-marker>
    		</ui-gmap-google-map>
			</div>
			<div>

			</div>
	</div>
</div>


