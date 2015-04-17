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
    unit: 'f',
    success: function(weather) {
      html = '<i class="icn-'+weather.code+'"></i><br />';
	  html += '<h2>'+weather.alt.temp+'&deg;C</h2><br />';
      html += '<ul><li>'+weather.city+'</li>';
      html += '<li class="currently">'+weather.currently+'</li></ul>';  
      
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
}
