// Docs at http://simpleweatherjs.com

/* Where in the world are you? */
/*$(document).ready(function() {
  navigator.geolocation.getCurrentPosition(function(position) {
    loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
  });
  summarySetup();
}); */

function loadWeather(location, woeid) {
  $.simpleWeather({
    location: location,
    woeid: woeid,
    unit: 'c',
    success: function(weather) {
		var html0;
		var wcode1;
		var wcode2;
		var wcode3;
		var wcode4;
		var wcode5;
		
		for(i=0;i<6;i++){
			if(i==0){
				if(weather.code == '3200'){
					html0 = '<br /><br /><img src="../../Modules/cossmiccontrol/Views/simpleweather-geolocation-js/errorWeatherIcon.png" /><br /><br />';
				}
				else{
					html0 = '<i class="icn-'+weather.code+'"></i><br />';
				}
			}
			else if(i==1){
				if(weather.forecast[i-1].code == '3200'){
					wcode1 = '<br /><br /><img src="../../Modules/cossmiccontrol/Views/simpleweather-geolocation-js/errorWeatherIcon.png" /><br /><br />';
				}
				else{
					wcode1 = '<i class="icn-'+weather.forecast[i-1].code+'"></i><br />';
				}
			}
			else if(i==2){
				if(weather.forecast[i-1].code == '3200'){
					wcode2 = '<br /><br /><img src="../../Modules/cossmiccontrol/Views/simpleweather-geolocation-js/errorWeatherIcon.png" /><br /><br />';
				}
				else{
					wcode2 = '<i class="icn-'+weather.forecast[i-1].code+'"></i><br />';
				}
			}
			else if(i==3){
				if(weather.forecast[i-1].code == '3200'){
					wcode3 = '<br /><br /><img src="../../Modules/cossmiccontrol/Views/simpleweather-geolocation-js/errorWeatherIcon.png" /><br /><br />';
				}
				else{
					wcode3 = '<i class="icn-'+weather.forecast[i-1].code+'"></i><br />';
				}
			}
			else if(i==4){
				if(weather.forecast[i-1].code == '3200'){
					wcode4 = '<br /><br /><img src="../../Modules/cossmiccontrol/Views/simpleweather-geolocation-js/errorWeatherIcon.png" /><br /><br />';
				}
				else{
					wcode4 = '<i class="icn-'+weather.forecast[i-1].code+'"></i><br />';
				}
			}
			else if(i==5){
				if(weather.forecast[i-1].code == '3200'){
					wcode5 = '<br /><br /><img src="../../Modules/cossmiccontrol/Views/simpleweather-geolocation-js/errorWeatherIcon.png" /><br /><br />';
				}
				else{
					wcode5 = '<i class="icn-'+weather.forecast[i-1].code+'"></i><br />';
				}
			}
		}
		
		
		html0 += '<h2>'+weather.temp+'&deg;C</h2><br />';
		html0 += '<ul><li>'+weather.city+'</li>';
		html0 += '<li class="currently">'+weather.currently+'</li></ul>';  

		html1 = '<h3>TODAY</h3><br />';
		html1 += wcode1;
		html1 += '<h2>'+weather.forecast[0].high+'&deg;C</h2><br />';
		html1 += '<ul><li>'+weather.city+'</li>';
		html1 += '<li class="currently">'+weather.forecast[0].text+'</li></ul>'; 

		html2 = '<h3>'+weather.forecast[1].day+'</h3><br />';
		html2 += wcode2;
		html2 += '<h2>'+weather.forecast[1].high+'&deg;C</h2><br />';
		html2 += '<ul><li>'+weather.city+'</li>';
		html2 += '<li class="currently">'+weather.forecast[1].text+'</li></ul>'; 

		html3 = '<h3>'+weather.forecast[2].day+'</h3><br />';
		html3 += wcode3;
		html3 += '<h2>'+weather.forecast[2].high+'&deg;C</h2><br />';
		html3 += '<ul><li>'+weather.city+'</li>';
		html3 += '<li class="currently">'+weather.forecast[2].text+'</li></ul>'; 

		html4 = '<h3>'+weather.forecast[3].day+'</h3><br />';
		html4 += wcode4;
		html4 += '<h2>'+weather.forecast[3].high+'&deg;C</h2><br />';
		html4 += '<ul><li>'+weather.city+'</li>';
		html4 += '<li class="currently">'+weather.forecast[3].text+'</li></ul>'; 

		html5 = '<h3>'+weather.forecast[4].day+'</h3><br />';
		html5 += wcode5;
		html5 += '<h2>'+weather.forecast[4].high+'&deg;C</h2><br />';
		html5 += '<ul><li>'+weather.city+'</li>';
		html5 += '<li class="currently">'+weather.forecast[4].text+'</li></ul>'; 

		$("#weather").html(html0);
		$("#weather1").html(html1);
		$("#weather2").html(html2);
		$("#weather3").html(html3);
		$("#weather4").html(html4);
		$("#weather5").html(html5);
    },
    error: function(error) {
		$("#weather").html('<p>'+error+'</p>');
		$("#weather1").html('<p>'+error+'</p>');
		$("#weather2").html('<p>'+error+'</p>');
		$("#weather3").html('<p>'+error+'</p>');
		$("#weather4").html('<p>'+error+'</p>');
		$("#weather5").html('<p>'+error+'</p>');
    }
  });
}

function errorWeather(location){
	if(location == ""){
		err = '<h3>Location unavailable</h3></ br>';
		err += '<h4>Please set location</h4>';
		err += '<h4>in your profile</h4>';
		err += '<h4>(Account)</h4>';
		$("#weather").html(err);
	}
	else{
		loadWeather(location);
	}
}
