package no.haktho.json.logic;
import java.io.*;
import java.net.URL;
import java.nio.charset.*;
import java.util.Calendar;

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
			NodeCreator nCreator = new NodeCreator();
		  	
			JSONArray json;
//			ArrayList<JSONArray> JSonList = new ArrayList<JSONArray>();
			try {
//				int id = 74; //ID for the feed.
//				int dp = 20; //Number of datapoints
//				String APIKey = "&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08";
//				long start = Calendar.getInstance().getTimeInMillis();
//				long end = Calendar.getInstance().getTimeInMillis();
				json = readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/list.json&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08"); //List of nodes with real time data
				
//				
//				json = readJsonFromUrl("http://cloud.cossmic.eu/emoncms/feed/data.json?id=75&start=1420074061000&end=1425477323137&dp=400&apikey=f3e4a2cf68ffda12cacd7d1e5bc44c08"); //histogram data

				nCreator.createNodesFromUrl(json);
				
//				for (int i = 0; i < json.length(); i++) {
//					System.out.println(json.get(i));
//				}
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			
	}
}
