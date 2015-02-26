import java.io.*;
import java.net.URL;
import java.nio.charset.*;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;

import org.json.JSONArray;
import org.json.JSONObject;

public class JsonReader {

	private static String readAll(Reader rd) throws IOException {
	    StringBuilder sb = new StringBuilder();
	    int cp;
	    while ((cp = rd.read()) != -1) {
	    	
	    		
	    	sb.append((char) cp);
	    }
	    return sb.toString();
	    
	}
	
	  public static JSONArray readJsonFromUrl(String url) throws IOException{
		    InputStream is = new URL(url).openStream();
		    try {
		      BufferedReader rd = new BufferedReader(new InputStreamReader(is, Charset.forName("UTF-8")));
		      String jsonText = readAll(rd);
		      
		      JSONArray json = new JSONArray(jsonText);
		      
		      return json;
		    } finally {
		      is.close();
		    }
		  }
	  
	  public static void main(String[] args) {
			JSONArray json;
			Nodes nodes = new Nodes();
			try {
				
				json = readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/list.json&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08");
				
				Node node;
				
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
						}
					}
					
					nodes.setValuesForNodes(jsonO);
				}
				
				for (int i = 0; i < json.length(); i++) {
					
					
					
				}
				
//				System.out.println(nodes.size());
				nodes.printNames();
				
//				System.out.println(json.toString());
				
			} catch (IOException e) {
				e.printStackTrace();
			}
			
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
