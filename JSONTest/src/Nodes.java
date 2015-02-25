import java.util.ArrayList;

import org.json.JSONObject;


public class Nodes extends ArrayList<Node> {

	
	
	public boolean checkForNode(String tag){
		boolean isPresent = false;
		
		for (int i = 0; i < this.size(); i++) {
			if(get(i).getName().equals(tag)) isPresent = true;
			
		}
		if(isPresent) return true;
		
		return false;
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
			System.out.println("__________________________________________");
		}
		
	
	}
	
	public void setValuesForNodes(JSONObject jsonO){
		String name = jsonO.get("name").toString();
		
		int n = name.indexOf('_');
		for (int i = 0; i < this.size(); i++) {
		
			String subStr = jsonO.get("name").toString().substring(0, n);
			
			if(jsonO.get("tag").toString().equals(get(i).getName())){

				for(char c : subStr.toCharArray()){
					
					if(n > 3 || !Character.isDigit(c)){
						switch (jsonO.get("name").toString()) {
						case "consumption_kwh":
							this.get(i).setConsumption_kwh(jsonO.getDouble("value"));
							break;
						case "consumption_power":
							this.get(i).setConsumption_power(jsonO.getDouble("value"));
							break;
						case "consumption_kwhd":
							this.get(i).setConsumption_kwhd(jsonO.getDouble("value"));
							break;
						case "pv_kwh":
							this.get(i).setPv_kwh(jsonO.getDouble("value"));
							break;
						case "pv_power":
							this.get(i).setPv_power(jsonO.getDouble("value"));
							break;
						case "pv_kwhd":
							this.get(i).setPv_kwhd(jsonO.getDouble("value"));
						default:
							break;
						}
					}
					
					if(Character.isDigit(c)){

						String data_name = name.substring(n+1, name.length());
						switch (data_name) {
						case "consumption_kwh":
							this.get(i).setConsumption_kwh(jsonO.getDouble("value"));
							break;
						case "consumption_power":
							this.get(i).setConsumption_power(jsonO.getDouble("value"));
							break;
						case "consumption_kwhd":
							this.get(i).setConsumption_kwhd(jsonO.getDouble("value"));
							break;
						case "pv_kwh":
							this.get(i).setPv_kwh(jsonO.getDouble("value"));
							break;
						case "pv_power":
							this.get(i).setPv_power(jsonO.getDouble("value"));
							break;
						case "pv_kwhd":
							this.get(i).setPv_kwhd(jsonO.getDouble("value"));
						default:
							break;
						}
					}
				}
			}
		}
		
		
		
	}
	
}

