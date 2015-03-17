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
	int grid2storage_kwh;
	int grid2storage_power;
	int grid2storage_kwhd;	
	int grid2household_kwh;
	int grid2household_power;
	int grid2household_kwhd;
	int pv2storage_kwh;
	int pv2storage_power;
	int pv2storage_kwhd;
	int pv2household_kwh;
	int pv2household_power;
	int pv2household_kwhd;
	int pv2grid_kwh;
	int pv2grid_power;
	int pv2grid_kwhd;
	int storage2grid_khw;
	int storage2grid_power;
	int storage2grid_kwhd;
	int storage2household_kwh;
	int storage2household_power;
	int storage2household_kwhd;

	public NodeID(){
		
	}
	
	public NodeID(String name2) {
		this.name = name2;
	}
	
	public String toString(){
		System.out.println();
		return "NodeID name: "+getName()+"\nc_kwh: "+getConsumption_kwh_id()+"\nc_pow: "+getConsumption_power_id()+"\nc_kwhd: "+getConsumption_kwhd_id()+
				"\npv_kwh: "+getPv_kwh_id()+"\npv_pow: "+getPv_power_id()+"\npv_kwhd: "+getPv_kwhd_id();
	}
	
	public String getName(){
		return name;
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

	public int getGrid2storage_kwh() {
		return grid2storage_kwh;
	}

	public void setGrid2storage_kwh(int grid2storage_kwh) {
		this.grid2storage_kwh = grid2storage_kwh;
	}

	public int getGrid2storage_power() {
		return grid2storage_power;
	}

	public void setGrid2storage_power(int grid2storage_power) {
		this.grid2storage_power = grid2storage_power;
	}

	public int getGrid2storage_kwhd() {
		return grid2storage_kwhd;
	}

	public void setGrid2storage_kwhd(int grid2storage_kwhd) {
		this.grid2storage_kwhd = grid2storage_kwhd;
	}

	public int getGrid2household_kwh() {
		return grid2household_kwh;
	}

	public void setGrid2household_kwh(int grid2household_kwh) {
		this.grid2household_kwh = grid2household_kwh;
	}

	public int getGrid2household_power() {
		return grid2household_power;
	}

	public void setGrid2household_power(int grid2household_power) {
		this.grid2household_power = grid2household_power;
	}

	public int getGrid2household_kwhd() {
		return grid2household_kwhd;
	}

	public void setGrid2household_kwhd(int grid2household_kwhd) {
		this.grid2household_kwhd = grid2household_kwhd;
	}

	public int getPv2storage_kwh() {
		return pv2storage_kwh;
	}

	public void setPv2storage_kwh(int pv2storage_kwh) {
		this.pv2storage_kwh = pv2storage_kwh;
	}

	public int getPv2storage_power() {
		return pv2storage_power;
	}

	public void setPv2storage_power(int pv2storage_power) {
		this.pv2storage_power = pv2storage_power;
	}

	public int getPv2storage_kwhd() {
		return pv2storage_kwhd;
	}

	public void setPv2storage_kwhd(int pv2storage_kwhd) {
		this.pv2storage_kwhd = pv2storage_kwhd;
	}

	public int getPv2household_kwh() {
		return pv2household_kwh;
	}

	public void setPv2household_kwh(int pv2household_kwh) {
		this.pv2household_kwh = pv2household_kwh;
	}

	public int getPv2household_power() {
		return pv2household_power;
	}

	public void setPv2household_power(int pv2household_power) {
		this.pv2household_power = pv2household_power;
	}

	public int getPv2household_kwhd() {
		return pv2household_kwhd;
	}

	public void setPv2household_kwhd(int pv2household_kwhd) {
		this.pv2household_kwhd = pv2household_kwhd;
	}

	public int getPv2grid_kwh() {
		return pv2grid_kwh;
	}

	public void setPv2grid_kwh(int pv2grid_kwh) {
		this.pv2grid_kwh = pv2grid_kwh;
	}

	public int getPv2grid_power() {
		return pv2grid_power;
	}

	public void setPv2grid_power(int pv2grid_power) {
		this.pv2grid_power = pv2grid_power;
	}

	public int getPv2grid_kwhd() {
		return pv2grid_kwhd;
	}

	public void setPv2grid_kwhd(int pv2grid_kwhd) {
		this.pv2grid_kwhd = pv2grid_kwhd;
	}

	public int getStorage2grid_khw() {
		return storage2grid_khw;
	}

	public void setStorage2grid_khw(int storage2grid_khw) {
		this.storage2grid_khw = storage2grid_khw;
	}

	public int getStorage2grid_power() {
		return storage2grid_power;
	}

	public void setStorage2grid_power(int storage2grid_power) {
		this.storage2grid_power = storage2grid_power;
	}

	public int getStorage2grid_kwhd() {
		return storage2grid_kwhd;
	}

	public void setStorage2grid_kwhd(int storage2grid_kwhd) {
		this.storage2grid_kwhd = storage2grid_kwhd;
	}

	public int getStorage2household_kwh() {
		return storage2household_kwh;
	}

	public void setStorage2household_kwh(int storage2household_kwh) {
		this.storage2household_kwh = storage2household_kwh;
	}

	public int getStorage2household_power() {
		return storage2household_power;
	}

	public void setStorage2household_power(int storage2household_power) {
		this.storage2household_power = storage2household_power;
	}

	public int getStorage2household_kwhd() {
		return storage2household_kwhd;
	}

	public void setStorage2household_kwhd(int storage2household_kwhd) {
		this.storage2household_kwhd = storage2household_kwhd;
	}
	
}
