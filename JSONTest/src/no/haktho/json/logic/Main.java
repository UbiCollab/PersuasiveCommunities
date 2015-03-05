package no.haktho.json.logic;

import java.io.IOException;

import org.json.JSONArray;

public class Main {

	public static void main(String[] args) {
		NodeCreator nCreator = new NodeCreator();
	  	
		JSONArray json;
		JsonReader jsonReader = new JsonReader();
//		ArrayList<JSONArray> JSonList = new ArrayList<JSONArray>();
		try {
//			int id = 74; //ID for the feed.
//			int dp = 20; //Number of datapoints
//			String APIKey = "&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";
//			long start = Calendar.getInstance().getTimeInMillis();
//			long end = Calendar.getInstance().getTimeInMillis();
			json = jsonReader.readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/list.json&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08"); //List of nodes with real time data
			
//			
//			json = readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id=75&start=1420074061000&end=1425477323137&dp=400&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08"); //histogram data

			nCreator.createNodesFromUrl(json);
			
//			for (int i = 0; i < json.length(); i++) {
//				System.out.println(json.get(i));
//			}
		} catch (IOException e1) {
			e1.printStackTrace();
		}
		
}
	
}
