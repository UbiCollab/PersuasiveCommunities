package no.haktho.json.logic;

import java.io.IOException;
import java.util.concurrent.Executors;
import java.util.concurrent.ScheduledExecutorService;
import java.util.concurrent.TimeUnit;

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
			
			//create all the nodes listed on emoncms
			nCreator.createNodesFromUrl(json);
			
			
			
			System.out.println("Size of the nodes after everything!! : "+nCreator.getNodes().size());
			
			//start fetching data from nodes every x seconds
			RealtimeFetcher rf = new RealtimeFetcher(nCreator.getNodes());

			ScheduledExecutorService executor = Executors.newScheduledThreadPool(1);
			executor.scheduleAtFixedRate(rf, 0, 10, TimeUnit.SECONDS); //
			
			
		} catch (IOException e1) {
			e1.printStackTrace();
		}
		
}
	
}
