package no.haktho.json.logic;
import java.util.List;
import java.io.Serializable;
import java.util.ArrayList;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;
import javax.persistence.Query;

import no.haktho.json.model.Node;
import no.haktho.json.model.NodeID;

import org.json.JSONObject;


public class Nodes extends ArrayList<Node> implements Serializable{

	private static final long serialVersionUID = -4612385844126776249L;
	
	ArrayList<NodeID> nids = new ArrayList<NodeID>(); 

	public boolean isUniqueNode(String tag){
		boolean isPresent = false;
		
		if(this.size() == 0) return true;
		
		for (int i = 0; i < this.size(); i++) {
			if(get(i).getName().equals(tag)){ 
				isPresent = true;
				break;
			}
			
		}
		if(isPresent) return false;
		
		return true;
	}
	
	public void printNames(){
		
		for (int i = 0; i < this.size(); i++) {
			System.out.println(i+" : "+get(i).getName());
			System.out.println("consumption_kwh: "+ get(i).getConsumption_kwh());
			System.out.println("consumption_power: "+get(i).getConsumption_power());
			System.out.println("consumption_kwhd: "+get(i).getConsumption_kwhd());
			System.out.println("pv_kwh: "+get(i).getPv_kwh());
			System.out.println("pv_power: "+get(i).getPv_power());
			System.out.println("pv_kwhd: "+get(i).getPv_kwhd());
			System.out.println("consumption_kwh_time: "+get(i).getConsumption_kwh_time());
			System.out.println("consumption_power_time: "+get(i).getConsumption_power_time());
			System.out.println("consumption_kwhd_time: "+get(i).getConsumption_kwhd_time());
			System.out.println("pv_kwh_time: "+get(i).getPv_kwh_time());
			System.out.println("pv_power_time: "+get(i).getPv_power_time());
			System.out.println("pv_kwhd_time: "+get(i).getPv_kwhd_time());
			System.out.println("__________________________________________");
		}
		
	
	}
	
	public void setValuesForNodes(JSONObject jsonO){
		String name = jsonO.get("name").toString();
		
		
		int n = name.indexOf('_');
		for (int i = 0; i < this.size(); i++) {
			Node temp = this.get(i);
			NodeID nid = new NodeID(jsonO.get("tag").toString());
			
			String subStr = jsonO.get("name").toString().substring(0, n);
			
			if(jsonO.get("tag").toString().equals(get(i).getName())){
				
				for(char c : subStr.toCharArray()){
					
					if(n > 3 || !Character.isDigit(c)){
						switch (jsonO.get("name").toString()) {
						case "consumption_kwh":
							temp.setConsumption_kwh(jsonO.getDouble("value"));
							nid.setConsumption_kwh_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwh_time(0);
							}
							break;
						case "consumption_power":
							temp.setConsumption_power(jsonO.getDouble("value"));
							nid.setConsumption_power_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_power_time(0);
							}
							break;
						case "consumption_kwhd":
							temp.setConsumption_kwhd(jsonO.getDouble("value"));
							nid.setConsumption_kwhd_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwhd_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwhd_time(0);
							}
							break;
						case "pv_kwh":
							temp.setPv_kwh(jsonO.getDouble("value"));
							nid.setPv_kwh_id(jsonO.getInt("id"));
							try{
								temp.setPv_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_kwh_time(0);
							}
							break;
						case "pv_power":
							temp.setPv_power(jsonO.getDouble("value"));
							nid.setPv_power_id(jsonO.getInt("id"));
							try{
								temp.setPv_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_power_time(0);
							}
							break;
						case "pv_kwhd":
							temp.setPv_kwhd(jsonO.getDouble("value"));
							nid.setPv_kwhd_id(jsonO.getInt("id"));
							try{
								temp.setPv_kwhd_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_kwhd_time(0);
							}
						default:
							break;
						}
					}
					
					if(Character.isDigit(c)){

						String data_name = name.substring(n+1, name.length());
						switch (data_name) {
						case "consumption_kwh":
							System.out.println("********** Consumption kwh stage **********");
							temp.setConsumption_kwh(jsonO.getDouble("value"));
							System.out.println("Node consumption kwh value: "+temp.getConsumption_kwh());
							nid.setConsumption_kwh_id(jsonO.getInt("id"));
							System.out.println("NodeID consumption kwh id value: "+nid.getConsumption_kwh_id());
							try{
								temp.setConsumption_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwh_time(0);
							}
							break;
						case "consumption_power":
							System.out.println("********** Consumption power stage **********");
							temp.setConsumption_power(jsonO.getDouble("value"));
							nid.setConsumption_power_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_power_time(0);
							}
							break;
						case "consumption_kwhd":
							temp.setConsumption_kwhd(jsonO.getDouble("value"));
							nid.setConsumption_kwhd_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwhd_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwhd_time(0);
							}
							break;
						case "pv_kwh":
							temp.setPv_kwh(jsonO.getDouble("value"));
							nid.setPv_kwh_id(jsonO.getInt("id"));
							try{
								temp.setPv_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_kwh_time(0);
							}
							break;
						case "pv_power":
							temp.setPv_power(jsonO.getDouble("value"));
							nid.setPv_power_id(jsonO.getInt("id"));
							try{
								temp.setPv_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_power_time(0);
							}
							break;
						case "pv_kwhd":
							temp.setPv_kwhd(jsonO.getDouble("value"));
							nid.setPv_kwhd_id(jsonO.getInt("id"));
							try{
								temp.setPv_kwhd_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_kwhd_time(0);
							}
						default:
							break;
						}
					}
				}
			}
		}
	}
	
	@SuppressWarnings("unchecked")
	public void setNodeIDs (){
		List<NodeID> existingIDs = null;
		
		EntityManagerFactory emf = Persistence.createEntityManagerFactory("USER_DATA");
		EntityManager em = emf.createEntityManager();
		EntityTransaction et = em.getTransaction();
		
		try{
			Query q = em.createQuery("SELECT nid FROM NodeID nid");
			existingIDs = q.getResultList();
		}
		catch(Exception e){
			e.printStackTrace();
		}
		
		for (int i = 0; i < nids.size(); i++) {
			for (int j = 0; j < existingIDs.size(); j++) {
				if(!nids.get(i).getName().equals(existingIDs.get(j).getName())){
					et.begin();
					em.persist(nids.get(i));
					et.commit();
				}
			}
		}
		
		em.close();
		emf.close();
	}
}

