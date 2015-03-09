package no.haktho.json.logic;
import java.util.ArrayList;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;

import no.haktho.json.model.Node;
import no.haktho.json.model.NodeID;

import org.json.JSONArray;
import org.json.JSONObject;


public class NodeCreator {

	Node node;
	
	public void createNodesFromUrl(JSONArray json){
		
		Nodes nodes = new Nodes();
		Node node;
		NodeID nid;
		
		for (int i = 0; i < json.length()-1; i++) {
			
			JSONObject jsonO = (JSONObject) json.get(i);
			String name = jsonO.get("name").toString();
			
			int n;
			n = name.indexOf('_');
			char c = name.charAt(0);

			if(n >=0 && n < 3 && Character.isDigit(c)){
				name = name.substring(0,n);
			}
			
			if(c == 'c' || c == 'p'){
				name = "0";
			}

			name = "Node:"+name;
			
			if(name != "Power" && nodes.isUniqueNode(name)){
				
				if(!name.equals("Node:0") && !name.equals("Node:3") && !name.equals("Node:4")){
					node = new Node(name);
					nodes.add(node);
					nid = new NodeID(name);
					nodes.nids.add(nid);
				}
			}
			
			nodes.setValuesForNodes(jsonO);
		}
		nodes.setNodeIDs();
		NodeHistoryFetcher nhf;
		nhf = new NodeHistoryFetcher(nodes);
		
		nhf.retrieveHistoryForNode(); //fetching the history
		
		
			System.out.println(nodes.size());
		nodes.printNames();
		
		//Persist nodes to database
		EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
		EntityManager em = emf.createEntityManager();
		EntityTransaction t = em.getTransaction();
		
		
		for (Node n : nodes){
			t.begin();
			em.persist(n);
			t.commit();
		}
		
		em.close();
		emf.close();
	}
}
