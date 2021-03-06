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

import com.sun.org.apache.xalan.internal.xsltc.compiler.sym;

public class NodeHistoryFetcher {
	
	int[] idArray = new int[25];
	Nodes nodes;
	long start, end;
	public NodeHistoryFetcher(Nodes nodes) { //
		this.nodes = nodes;
		start = 1420074061000l;
		end = System.currentTimeMillis();
	}
	
	public NodeHistoryFetcher(Nodes nodes, long start, long end) {
		this.nodes = nodes;
		this.start = start;
		this.end = end;
	}
	public void writeHistoryToDB(Node node, ArrayList<JSONArray> jsonList, int[] idArray){
		
		//combining the different feeds and matches the correct ones.
		for (int i = 0; i < 3; i++) {
			
			switch (i) {
			case 0:
				for (int j = 0; j < jsonList.get(0).length(); j++) { // 0 and 1; c_kwh
					Node tempNode = new Node(node.getName());
					
					JSONArray json1 = (JSONArray) jsonList.get(0).get(j);
					JSONArray json2	= (JSONArray) jsonList.get(1).get(j);
					
					tempNode.setConsumption_kwh(json1.getDouble(1));
					tempNode.setConsumption_kwh_time(json1.getLong(0));
	
					tempNode.setConsumption_power(json2.getDouble(1));
					tempNode.setConsumption_power_time(json2.getLong(0));
					
					EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
					EntityManager em = emf.createEntityManager();
					EntityTransaction et = em.getTransaction();
					
					et.begin();
					em.persist(tempNode);
					et.commit();
					
					em.close();
					emf.close();
				}
				
				break;
				
			case 1:
				
				for (int j = 0; j < jsonList.get(3).length(); j++) { // 0 and 1; c_kwh
					Node tempNode = new Node(node.getName());
					
					JSONArray json1 = (JSONArray) jsonList.get(3).get(j);
					JSONArray json2	= (JSONArray) jsonList.get(4).get(j);
					
					tempNode.setPv_kwh(json1.getDouble(1));
					tempNode.setPv_kwh_time(json1.getLong(0));
	
					tempNode.setPv_power(json2.getDouble(1));
					tempNode.setPv_power_time(json2.getLong(0));		
						
					EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
					EntityManager em = emf.createEntityManager();
					EntityTransaction et = em.getTransaction();
					
					et.begin();
					em.persist(tempNode);
					et.commit();
					
					em.close();
					emf.close();
				}
				
				break;
				
			case 2:
				
				for (int j = 0; j < jsonList.get(2).length(); j++) { // 0 and 1; c_kwh
					Node tempNode = new Node(node.getName());
					
					JSONArray json1 = (JSONArray) jsonList.get(2).get(j);
					JSONArray json2	= (JSONArray) jsonList.get(5).get(j);
					
					tempNode.setConsumption_kwhd(json1.getDouble(1));
					tempNode.setConsumption_kwhd_time(json1.getLong(0));
	
					tempNode.setPv_kwhd(json2.getDouble(1));
					tempNode.setPv_kwhd_time(json2.getLong(0));
					
					EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
					EntityManager em = emf.createEntityManager();
					EntityTransaction et = em.getTransaction();
					
					et.begin();
					em.persist(tempNode);
					et.commit();
					
					em.close();
					emf.close();
				}
				
				break;
			default:
				break;
			}
			
		}
//		

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
			idArray[6] = nid.getGrid2household_kwh_id();
			idArray[7] = nid.getGrid2household_power_id();
			idArray[8] = nid.getGrid2household_kwhd_id();
			idArray[9] = nid.getGrid2storage_kwh_id();
			idArray[10] = nid.getGrid2storage_power_id();
			idArray[11] = nid.getGrid2storage_kwhd_id();
			idArray[12] = nid.getGrid2storage_kwhd_id();
			idArray[13] = nid.getPv2grid_kwh_id();
			idArray[14] = nid.getPv2grid_power_id();
			idArray[15] = nid.getPv2grid_kwhd_id();
			idArray[16] = nid.getPv2household_kwh_id();
			idArray[17] = nid.getPv2household_power_id();
			idArray[18] = nid.getPv2household_kwhd_id();
			idArray[19] = nid.getStorage2grid_kwh_id();
			idArray[20] = nid.getStorage2grid_power_id();
			idArray[21] = nid.getStorage2grid_kwhd_id();
			idArray[22] = nid.getStorage2household_kwh_id();
			idArray[23] = nid.getStorage2household_power_id();
			idArray[24] = nid.getStorage2household_kwhd_id();
			
			System.out.println(nodes.get(i).getName());
			System.out.println("----------------------------------------------------------------------");
			
			for (int j = 0; j < idArray.length; j++) {
				if(idArray[j] != 0){
					try {
						System.out.println("Working on node: "+nodes.get(i).getName());
						int dp = 400; //Number of datapoints
						String APIKey = "apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";

						System.out.println("Feed: "+idArray[j]+" End: "+end+". Start: "+start);
						//asking for specific feed based on the feed id.
						json = jReader.readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id="+idArray[j]+"&start="+start+"&end="+end+"&dp="+dp+"&"+APIKey);
						System.out.println("json size for feed: "+json.length());
						jsonList.add(json);
						//writing each feeds entries to the database on the specific node.
						
						System.out.println(idArray[j]);
						for (int k = 0; k < json.length(); k++) {
							System.out.print(json.get(k));
						}
						
						System.out.println();
					} catch (IOException e1) {
						break;
					}
				}
			}
			if(!jsonList.isEmpty()) writeHistoryToDB(nodes.get(i), jsonList, idArray);
		}
	}
}
