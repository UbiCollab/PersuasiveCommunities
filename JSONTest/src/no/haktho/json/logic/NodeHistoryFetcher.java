package no.haktho.json.logic;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Calendar;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;
import javax.persistence.Query;

import no.haktho.json.model.Node;
import no.haktho.json.model.NodeID;

import org.json.JSONArray;

public class NodeHistoryFetcher {
	
	int[] idArray = new int[6];
	Nodes nodes;
	public NodeHistoryFetcher(Nodes nodes) {
		this.nodes = nodes;
	}
	
	public void writeHistoryToDB(Node node, ArrayList<JSONArray> jsonList, int[] idArray){
		
		long smallestTime = 0;
		int amountOfObjects = jsonList.size();
		System.out.println("Amounts of objects! "+amountOfObjects);
		ArrayList<Integer> timestamps = new ArrayList<Integer>();
		
		//Find out which feed is the longest (AKA, how long we have to keep iterating)
//		for (int i = 0; i < jsonList.size(); i++) {
//			amountOfObjects += jsonList.get(i).length();
//		}
				
		//Find the smallest timestamp amongst the first entry in the feeds
		for (int i = 0; i < jsonList.size(); i++) {
			for (int j = 0; j < jsonList.size(); j++) {
				JSONArray jsonO = (JSONArray) jsonList.get(i).get(j);
				long temp = jsonO.getLong(0);
				System.out.println(temp);
				if(smallestTime <= temp){
					smallestTime = temp;
				}
				
			}
		}
		
		//Once we have the smallest timestamp, start creating a Node object with the values from this exact timestamp
		while(amountOfObjects > 0){
			Node tempNode = new Node(node.getName());
			System.out.println();
			
			for (int i = 0; i < jsonList.size(); i++) {
				JSONArray jsonO = (JSONArray) jsonList.get(i);
				if(jsonO.length() >0){
					JSONArray jsonA = jsonO.getJSONArray(0);
					long temp = jsonA.getLong(0);
					
					if(smallestTime == temp){
						timestamps.add(idArray[i]);
					}
				}
			}
			
			for (int i = 0; i < timestamps.size(); i++) {
				System.out.println("In timestamps: "+timestamps.get(i));
			}
			
			System.out.println();
			
			//converting the ids to 0,1,2 .. so that the switch gets run.
			for (int i = 0; i < timestamps.size(); i++) {
				for (int j = 0; j < idArray.length; j++) {
					
					if(timestamps.get(i) == idArray[j]){
						timestamps.set(i, j);
					}
				}
			}
			
			for (int i = 0; i < timestamps.size(); i++) {
				
				JSONArray jsonO = (JSONArray) jsonList.get(i).get(0);
				
				switch (timestamps.get(i)) {
				case 0: //c_kwd
					tempNode.setConsumption_kwh(jsonO.getDouble(1));
					tempNode.setConsumption_kwh_time(smallestTime);
					System.out.println("Writing c_kwd for: "+tempNode.getName());
					jsonList.get(0).remove(0);
					amountOfObjects --;
					break;
	
				case 1: //c_power	
					tempNode.setConsumption_power(jsonO.getDouble(1));
					tempNode.setConsumption_power_time(smallestTime);
					System.out.println("Writing c_pwr at iteration: "+tempNode.getName());
					jsonList.get(1).remove(0);
					amountOfObjects --;
					break;
					
				case 2: //c_kwhd
					tempNode.setConsumption_kwhd(jsonO.getDouble(1));
					tempNode.setConsumption_kwhd_time(smallestTime);
					System.out.println("Writing c_kwhd for: "+tempNode.getName());
					jsonList.get(2).remove(0);
					amountOfObjects --;
					break;
					
				case 3: //pv_kwd
					tempNode.setPv_kwh(jsonO.getDouble(1));
					tempNode.setPv_kwh_time(smallestTime);
					System.out.println("Writing pv_kwd for: "+tempNode.getName());
					jsonList.get(3).remove(0);
					amountOfObjects --;
					break;
				
				case 4: //pv_power
					tempNode.setPv_power(jsonO.getDouble(1));
					tempNode.setPv_power_time(smallestTime);
					System.out.println("Writing pv_pwr for: "+tempNode.getName());
					jsonList.get(4).remove(0);
					amountOfObjects --;
					break;
				
				case 5: //pv_kwhd
					tempNode.setPv_kwhd(jsonO.getDouble(1));
					tempNode.setPv_kwhd_time(smallestTime);
					System.out.println("Writing pv_kwhd for: "+tempNode.getName());
					jsonList.get(5).remove(0);
					amountOfObjects --;
					break;
				default:
					
					break;
				}
			}
			
			timestamps = new ArrayList<Integer>();
			
			for (int i = 0; i < jsonList.size(); i++) {
				JSONArray jsonO = (JSONArray) jsonList.get(i);
				if(jsonO.length() >0){
					JSONArray jsonA = jsonO.getJSONArray(0);
					long temp = jsonA.getLong(0);

					if(smallestTime <= temp){
						smallestTime = temp;
					}
				}
			}
			
			System.out.println("Objects: "+amountOfObjects);
			System.out.println("Name: "+tempNode.getName());
			System.out.println("c_kwh: "+tempNode.getConsumption_kwh());
			System.out.println("c_kwh_time: "+tempNode.getConsumption_kwh_time());
			System.out.println("c_pwr: "+tempNode.getConsumption_power());
			System.out.println("c_pwr_time: "+tempNode.getConsumption_power_time());
			System.out.println("c_kwhd: "+tempNode.getConsumption_kwhd());
			System.out.println("c_kwhd_time: "+tempNode.getConsumption_kwhd_time());
			System.out.println("pv_kwh: "+tempNode.getPv_kwh());
			System.out.println("pv_kwh_time: "+tempNode.getPv_kwh_time());
			System.out.println("pv_pwr: "+tempNode.getPv_power());
			System.out.println("pv_pwr_time: "+tempNode.getPv_power_time());
			System.out.println("pv_kwhd: "+tempNode.getPv_kwhd());
			System.out.println("pv_kwhd_time: "+tempNode.getPv_kwhd_time());
			
			EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
			EntityManager em = emf.createEntityManager();
			EntityTransaction et = em.getTransaction();
			
			et.begin();
			em.persist(tempNode);
			et.commit();
			
			em.close();
			emf.close();
		}
	}
	
	public void retrieveHistoryForNode(){
		JSONArray json;
		JsonReader jReader = new JsonReader();
		for (int i = 0; i < nodes.size(); i++) { //nodes.size()
			ArrayList<JSONArray> jsonList = new ArrayList<JSONArray>();
			
			String name = nodes.get(i).getName();
			
			EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
			EntityManager em = emf.createEntityManager();
			
			Query q = em.createQuery("SELECT nid FROM NodeID nid WHERE nid.name = :n");
			q.setParameter("n", name);
			NodeID nid = (NodeID)q.getSingleResult();
			
			em.close();
			emf.close();
			
			idArray[0] = nid.getConsumption_kwh_id();
			idArray[1] = nid.getConsumption_power_id();
			idArray[2] = nid.getConsumption_kwhd_id();
			idArray[3] = nid.getPv_kwh_id();
			idArray[4] = nid.getPv_power_id();
			idArray[5] = nid.getPv_kwhd_id();
			
			System.out.println(nodes.get(i).getName());
			System.out.println("----------------------------------------------------------------------");
			
			for (int j = 0; j < idArray.length; j++) {
				if(idArray[j] != 0){
					try {
						System.out.println("Working on node: "+nodes.get(i).getName());
						int dp = 20; //Number of datapoints
						String APIKey = "apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";
						long start = Calendar.getInstance().getTimeInMillis();
						long end = 1425477323137L;
						
						
						//asking for specific feed based on the feed id.
						json = jReader.readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id="+idArray[j]+"&start=1420074061000&end="+end+"&dp=400&"+APIKey);
						System.out.println("json size for feed: "+json.length());
						jsonList.add(json);
						//writing each feeds entries to the database on the specific node.
						
						System.out.println(idArray[j]);
						for (int k = 0; k < json.length(); k++) {
							System.out.print(json.get(k));
						}
						
						System.out.println();
					} catch (IOException e1) {
					}
				}
			}
			writeHistoryToDB(nodes.get(i), jsonList, idArray);
		}
	}
}
