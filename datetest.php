<!DOCTYPE html>
<head>
<title>Get Current Position - Latitude & Longitude using HTML 5</title>
<script>
if(!navigator.geolocation){
	alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
}
navigator.geolocation.getCurrentPosition(success, error);
function success(position){
	var latitude  = position.coords.latitude;	
	var longitude = position.coords.longitude;	
	var accuracy  = position.coords.accuracy;
	document.getElementById("lat").value  = latitude;
	document.getElementById("lng").value  = longitude;
	document.getElementById("acc").value  = accuracy;
}
function error(err){
	alert('ERROR(' + err.code + '): ' + err.message);
}
</script>
<body>
Latitude: <input type="text" id="lat" /><br />
Longitude: <input type="text" id="lng" /><br />
More or Less <input type="text" id="acc" /> Meters.
</body>
</html>





<!-- 

<!DOCTYPE html>
<html>
<body>


lat:
    <input name="Lng"/><br>
Lng: 
    <input name="lat" /><br>
<p id="demo">
</p>

<script>
    var x=document.getElementById("demo");
    function getLocation(){
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else{
            x.innerHTML="Geolocation is not supported by this browser.";
        }
    }
    
    function showPosition(position){
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        x.innerHTML="Lat " + lat + 
        "<br>Longitude: " + lng;  
    }
    getLocation()
</script>

</body>
</html> -->