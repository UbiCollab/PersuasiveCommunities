package no.haktho.json.model;
import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="NODE_IDS")
public class NodeID implements Serializable{

	private static final long serialVersionUID = 6739918989686032682L;
	
	@Id
	@Column(name="NODE_NAME", nullable=false, unique=true)
	String name;
	
	int consumption_kwh_id;
	int consumption_power_id;
	int consumption_kwhd_id;
	int pv_power_id;
	int pv_kwhd_id;
	int pv_kwh_id;
	
	public NodeID(){
		
	}
	
	public NodeID(String name2) {
		this.name = name2;
	}

	public int getConsumption_kwh_id() {
		return consumption_kwh_id;
	}

	public void setConsumption_kwh_id(int consumption_kwh_id) {
		this.consumption_kwh_id = consumption_kwh_id;
	}

	public int getConsumption_power_id() {
		return consumption_power_id;
	}

	public void setConsumption_power_id(int consumption_power_id) {
		this.consumption_power_id = consumption_power_id;
	}

	public int getConsumption_kwhd_id() {
		return consumption_kwhd_id;
	}

	public void setConsumption_kwhd_id(int consumption_kwhd_id) {
		this.consumption_kwhd_id = consumption_kwhd_id;
	}

	public int getPv_power_id() {
		return pv_power_id;
	}

	public void setPv_power_id(int pv_power_id) {
		this.pv_power_id = pv_power_id;
	}

	public int getPv_kwhd_id() {
		return pv_kwhd_id;
	}

	public void setPv_kwhd_id(int pv_kwhd_id) {
		this.pv_kwhd_id = pv_kwhd_id;
	}

	public int getPv_kwh_id() {
		return pv_kwh_id;
	}

	public void setPv_kwh_id(int pv_kwh_id) {
		this.pv_kwh_id = pv_kwh_id;
	}
}
