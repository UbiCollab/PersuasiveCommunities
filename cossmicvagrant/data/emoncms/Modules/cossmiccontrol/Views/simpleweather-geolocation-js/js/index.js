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
      html = '<i class="icn-'+weather.code+'"></i><br />';
	  html += '<h2>'+weather.temp+'&deg;C</h2><br />';
      html += '<ul><li>'+weather.city+'</li>';
      html += '<li class="currently">'+weather.currently+'</li></ul>';  
	  
	  html1 = '<h3>TODAY</h3><br />';
	  html1 += '<i class="icn-'+weather.forecast[0].code+'"></i><br />';
	  html1 += '<h2>'+weather.forecast[0].high+'&deg;C</h2><br />';
      html1 += '<ul><li>'+weather.city+'</li>';
      html1 += '<li class="currently">'+weather.forecast[0].text+'</li></ul>'; 
	  
	  html2 = '<h3>'+weather.forecast[1].day+'</h3><br />';
	  html2 += '<i class="icn-'+weather.forecast[1].code+'"></i><br />';
	  html2 += '<h2>'+weather.forecast[1].high+'&deg;C</h2><br />';
      html2 += '<ul><li>'+weather.city+'</li>';
      html2 += '<li class="currently">'+weather.forecast[1].text+'</li></ul>'; 
	  
	  html3 = '<h3>'+weather.forecast[2].day+'</h3><br />';
	  html3 += '<i class="icn-'+weather.forecast[2].code+'"></i><br />';
	  html3 += '<h2>'+weather.forecast[2].high+'&deg;C</h2><br />';
      html3 += '<ul><li>'+weather.city+'</li>';
      html3 += '<li class="currently">'+weather.forecast[2].text+'</li></ul>'; 
	  
	  html4 = '<h3>'+weather.forecast[3].day+'</h3><br />';
	  html4 += '<i class="icn-'+weather.forecast[3].code+'"></i><br />';
	  html4 += '<h2>'+weather.forecast[3].high+'&deg;C</h2><br />';
      html4 += '<ul><li>'+weather.city+'</li>';
      html4 += '<li class="currently">'+weather.forecast[3].text+'</li></ul>'; 
	  
	  html5 = '<h3>'+weather.forecast[4].day+'</h3><br />';
	  html5 += '<i class="icn-'+weather.forecast[4].code+'"></i><br />';
	  html5 += '<h2>'+weather.forecast[4].high+'&deg;C</h2><br />';
      html5 += '<ul><li>'+weather.city+'</li>';
      html5 += '<li class="currently">'+weather.forecast[4].text+'</li></ul>'; 
	  
	  $("#weather").html(html);
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
