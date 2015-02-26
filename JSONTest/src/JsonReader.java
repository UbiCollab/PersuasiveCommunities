import java.io.*;
import java.net.URL;
import java.nio.charset.*;

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
			Boolean isTotal = false;
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
						isTotal = true;
					}
			
					name = "Node:"+name;
					
					if(name != "Power" && nodes.isUniqueNode(name)){
						node = new Node(name);
						node.setTotal(isTotal);
						nodes.add(node);
					}
					
					nodes.setValuesForNodes(jsonO);
				}
				
				nodes.printNames();
				
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
}
