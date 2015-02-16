<style type="text/css">
.angular-google-map-container {
	height:400px;
	width:800px;
}
</style>
<div ng-app="app">
	<div ng-controller="maincontroller">
			<button ng-click="prueba()"> cclick</button> 

			<div id="map_canvas" style="height:600px;width:800px">
				 <ui-gmap-google-map center="map.center" zoom="map.zoom">
        		<!-- <ui-gmap-marker coords="map.marker.coords" idkey="map.marker.id" options="map.marker.options"></ui-gmap-marker>
 -->    		</ui-gmap-google-map>
			</div>
	</div>
</div>