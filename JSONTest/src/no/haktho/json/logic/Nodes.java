package no.haktho.json.logic;
import java.io.Serializable;
import java.util.ArrayList;

import no.haktho.json.model.Node;

import org.json.JSONObject;


public class Nodes extends ArrayList<Node> implements Serializable{

	private static final long serialVersionUID = -4612385844126776249L;

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
			System.out.println("consumption_kwh_id: "+get(i).getConsumption_kwh_id());
			System.out.println("consumption_power_id: "+get(i).getConsumption_power_id());
			System.out.println("consumption_kwhd_id: "+get(i).getConsumption_kwhd_id());
			System.out.println("pv_kwh_id: "+get(i).getPv_kwh_id());
			System.out.println("pv_power_id: "+get(i).getPv_power_id());
			System.out.println("pv_kwhd_id: "+get(i).getPv_kwhd_id());
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
		
			String subStr = jsonO.get("name").toString().substring(0, n);
			
			if(jsonO.get("tag").toString().equals(get(i).getName())){
				
				for(char c : subStr.toCharArray()){
					
					if(n > 3 || !Character.isDigit(c)){
						switch (jsonO.get("name").toString()) {
						case "consumption_kwh":
							temp.setConsumption_kwh(jsonO.getDouble("value"));
							temp.setConsumption_kwh_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwh_time(0);
							}
							break;
						case "consumption_power":
							temp.setConsumption_power(jsonO.getDouble("value"));
							temp.setConsumption_power_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_power_time(0);
							}
							break;
						case "consumption_kwhd":
							temp.setConsumption_kwhd(jsonO.getDouble("value"));
							temp.setConsumption_kwhd_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwhd_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwhd_time(0);
							}
							break;
						case "pv_kwh":
							temp.setPv_kwh(jsonO.getDouble("value"));
							temp.setPv_kwh_id(jsonO.getInt("id"));
							try{
								temp.setPv_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_kwh_time(0);
							}
							break;
						case "pv_power":
							temp.setPv_power(jsonO.getDouble("value"));
							temp.setPv_power_id(jsonO.getInt("id"));
							try{
								temp.setPv_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_power_time(0);
							}
							break;
						case "pv_kwhd":
							temp.setPv_kwhd(jsonO.getDouble("value"));
							temp.setPv_kwhd_id(jsonO.getInt("id"));
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
							temp.setConsumption_kwh(jsonO.getDouble("value"));
							temp.setConsumption_kwh_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwh_time(0);
							}
							break;
						case "consumption_power":
							temp.setConsumption_power(jsonO.getDouble("value"));
							temp.setConsumption_power_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_power_time(0);
							}
							break;
						case "consumption_kwhd":
							temp.setConsumption_kwhd(jsonO.getDouble("value"));
							temp.setConsumption_kwhd_id(jsonO.getInt("id"));
							try{
								temp.setConsumption_kwhd_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setConsumption_kwhd_time(0);
							}
							break;
						case "pv_kwh":
							temp.setPv_kwh(jsonO.getDouble("value"));
							temp.setPv_kwh_id(jsonO.getInt("id"));
							try{
								temp.setPv_kwh_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_kwh_time(0);
							}
							break;
						case "pv_power":
							temp.setPv_power(jsonO.getDouble("value"));
							temp.setPv_power_id(jsonO.getInt("id"));
							try{
								temp.setPv_power_time(jsonO.getLong("time"));
							}
							catch(Exception E){
								temp.setPv_power_time(0);
							}
							break;
						case "pv_kwhd":
							temp.setPv_kwhd(jsonO.getDouble("value"));
							temp.setPv_kwhd_id(jsonO.getInt("id"));
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
}

