<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>HTML5 Geolocation</title>
<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFmlHCM28zEkLgsT5dnRmi9vGxnHO8yJ8&callback=initMap">></script>;
<script>
 
    if(navigator.geolocation) {
 
        function visitorLocation(position) {
            var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
 
            myOptions = {
                zoom: 15,
                center: point,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            },
 
            mapDiv = document.getElementById("mapDiv"),
            map = new google.maps.Map(mapDiv, myOptions),
 
            marker = new google.maps.Marker({
                position: point,
                map: map,
                title: "You are here"
            });
        }
        navigator.geolocation.getCurrentPosition(visitorLocation);
    }
</script>
<style>
#mapDiv {
    width:40%;
    height:300px;
    border:1px solid #efefef;
    margin:auto;
    -moz-box-shadow:5px 5px 10px #000;
    -webkit-box-shadow:5px 5px 10px #000;
}
</style>
</head>
<body>

<div id="findipwidget"></div><div class="findiplink" id="findipurl">Powered by <a href="http://www.find-ip.net/" target="_blank">Find-IP.net</a></div><script defer src="//api.find-ip.net/widget.js?width=260&border=Blue&textcol=Your%20IP&"></script>

<br>

<?php 
function get_ip(){
 $ipaddress = '';
 $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}

$ip =  get_ip();
echo $ip;
echo "<br/>";

$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success'){
echo "IP Address : ".$query['query']."<br/>";
echo "Country : ".$query['country']."<br/>";
echo "Region : ".$query['regionName']."<br/>";
echo "City : ".$query['city']."<br/>";
echo "Country Code : ".$query['countryCode']."<br/>";


echo "Timezone : ".$query['timezone']."<br/>";
echo "ORG : ".$query['org']."<br/>";
echo "Region : ".$query['region']."<br/>";
echo "Zip : ".$query['zip']."<br/>";

echo "ISP : ".$query['isp']."<br/>";
echo "Lat : ".$query['lat']."<br/>";
echo "Long : ".$query['lon']."<br/>";

}

 ?>
<div id="mapDiv"></div>
 
</body>
</html>
