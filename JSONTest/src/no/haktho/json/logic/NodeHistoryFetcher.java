package no.haktho.json.logic;
import java.io.IOException;
import java.util.Calendar;

import no.haktho.json.model.Node;

import org.json.JSONArray;


public class NodeHistoryFetcher {

	int[] idArray = new int[6];
	
	public NodeHistoryFetcher(Node node) {
	
		idArray[0] = node.getConsumption_kwh_id();
		idArray[1] = node.getConsumption_power_id();
		idArray[2] = node.getConsumption_kwhd_id();
		idArray[3] = node.getPv_kwh_id();
		idArray[4] = node.getPv_power_id();
		idArray[5] = node.getPv_kwhd_id();
	}
	
	public void retrieveHistoryForNode(){
		
		JsonReader jsonReader = new JsonReader();
		
		JSONArray json;
		for (int i = 0; i < idArray.length; i++) {
			
			try {
				int id = 74; //ID for the feed.
				int dp = 20; //Number of datapoints
				String APIKey = "&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";
				long start = Calendar.getInstance().getTimeInMillis();
				long end = Calendar.getInstance().getTimeInMillis();
				
				json = JsonReader.readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id=75&start=1420074061000&end=1425477323137&dp=400&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08"); //histogram data
				
				for (int j = 0; j < json.length(); j++) {
					System.out.println(json.get(i));
				}
				
				
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
	}
}
