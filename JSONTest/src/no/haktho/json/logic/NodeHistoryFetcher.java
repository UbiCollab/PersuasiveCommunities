package no.haktho.json.logic;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Calendar;

import no.haktho.json.model.Node;

import org.json.JSONArray;


public class NodeHistoryFetcher {
	
	int[] idArray = new int[6];
	Nodes nodes;
	public NodeHistoryFetcher(Nodes nodes) {
		this.nodes = nodes;
		
	}
	
	public void writeHistoryToDB(Node node, ArrayList<JSONArray> jsonList, int[] idArray){
		
		Node tempNode;
		
		long smallestTime = 0;
		int fID = 0;
		int amountOfObjects = 0;
		
		//Find out which feed is the longest (AKA, how long we have to keep iterating)
		for (int i = 0; i < jsonList.size(); i++) {
			amountOfObjects += jsonList.get(i).length();
		}
				
		//Find the smallest timestamp amongst the first entry in the feeds
		for (int i = 0; i < jsonList.size(); i++) {
			long temp = jsonList.get(i).getLong(0);
			
			if(smallestTime <= temp){
				smallestTime = temp;
				fID = idArray[i];
			}
		}
		
		//Once we have the smallest timestamp, start creating a Node object with the values from this exact timestamp
		while(amountOfObjects != 0){
			tempNode = new Node();
			switch (fID) {
			case 0:
				tempNode.setConsumption_kwh(jsonList.get(fID).getDouble(1));
				jsonList.get(fID).remove(0);
				for (int i = 0; i < 6; i++) {
					if(i == fID) break;
					if(jsonList.get(i).getLong(0) == smallestTime && i == 1){
							
						}
					}
				}
				break;
	
			default:
				break;
			}
		}
		
		
		System.out.println("Smallest time: "+smallestTime);
		
	}
	
	public void retrieveHistoryForNode(){
		JSONArray json;
		JsonReader jReader = new JsonReader();
		for (int i = 0; i < 1; i++) {
			ArrayList<JSONArray> jsonList = new ArrayList<JSONArray>();
			
			idArray[0] = nodes.get(i).getNodeID().getConsumption_kwh_id();
			idArray[1] = nodes.get(i).getNodeID().getConsumption_power_id();
			idArray[2] = nodes.get(i).getNodeID().getConsumption_kwhd_id();
			idArray[3] = nodes.get(i).getNodeID().getPv_kwh_id();
			idArray[4] = nodes.get(i).getNodeID().getPv_power_id();
			idArray[5] = nodes.get(i).getNodeID().getPv_kwhd_id();
			
			System.out.println(nodes.get(i).getName());
			System.out.println("----------------------------------------------------------------------");
			
			for (int j = 0; j < idArray.length; j++) {
				if(idArray[j] != 0){
					try {
						int dp = 20; //Number of datapoints
						String APIKey = "apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";
						long start = Calendar.getInstance().getTimeInMillis();
						long end = 1425477323137L;
						
						json = jReader.readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id="+idArray[j]+"&start=1420074061000&end="+end+"&dp=40&"+APIKey);
						jsonList.add(json);
						//writing each feeds entries to the database on the specific node.
						
//						System.out.println(idArray[j]);
//						for (int k = 0; k < json.length(); k++) {
//							System.out.print(json.get(k));
//						}
						
						System.out.println();
					} catch (IOException e1) {
						// TODO Auto-generated catch block
					}
				}
			}
			writeHistoryToDB(nodes.get(i), jsonList, idArray);
		}
	}
}
