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
	
	int[] idArray = new int[6];
	Nodes nodes;
	public NodeHistoryFetcher(Nodes nodes) {
		this.nodes = nodes;
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
			
			System.out.println(nodes.get(i).getName());
			System.out.println("----------------------------------------------------------------------");
			
			for (int j = 0; j < idArray.length; j++) {
				if(idArray[j] != 0){
					try {
						System.out.println("Working on node: "+nodes.get(i).getName());
						int dp = 400; //Number of datapoints
						String APIKey = "apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";
						long end = 1425477323137L;
						
						
						//asking for specific feed based on the feed id.
						json = jReader.readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id="+idArray[j]+"&start=1420074061000&end="+end+"&dp="+dp+"&"+APIKey);
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
			if(!jsonList.isEmpty()) writeHistoryToDB(nodes.get(i), jsonList, idArray);
		}
	}
}
