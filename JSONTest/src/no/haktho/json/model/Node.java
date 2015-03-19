package no.haktho.json.model;
import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.TableGenerator;
import javax.persistence.PrePersist;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
@Table(name="USER_DATA")
public class Node implements Serializable{

	private static final long serialVersionUID = -1178957056634479706L;
	

	@TableGenerator(
			name="incrementByOne",
			allocationSize=1,
			initialValue=0)
	
	@Id
	@Column(name="ID", nullable=false)
	@GeneratedValue(strategy=GenerationType.TABLE, generator="incrementByOne")
	private long id;
	
	@Column(name="NODE_NAME", nullable=false)
	String name;
		
	double consumption_kwh;
	double consumption_power;
	double consumption_kwhd;
	double pv_power;
	double pv_kwhd;
	double pv_kwh;
	double grid2storage_kwh;
	double grid2storage_power;
	double grid2storage_kwhd;	
	double grid2household_kwh;
	double grid2household_power;
	double grid2household_kwhd;
	double pv2storage_kwh;
	double pv2storage_power;
	double pv2storage_kwhd;
	double pv2household_kwh;
	double pv2household_power;
	double pv2household_kwhd;
	double pv2grid_kwh;
	double pv2grid_power;
	double pv2grid_kwhd;
	double storage2grid_kwh;
	double storage2grid_power;
	double storage2grid_kwhd;
	double storage2household_kwh;
	double storage2household_power;
	double storage2household_kwhd;
	
	long consumption_kwh_time;
	long consumption_power_time;
	long consumption_kwhd_time;
	long pv_power_time;
	long pv_kwhd_time;
	long pv_kwh_time;
	long grid2storage_kwh_time;
	long grid2storage_power_time;
	long grid2storage_kwhd_time;	
	long grid2household_kwh_time;
	long grid2household_power_time;
	long grid2household_kwhd_time;
	long pv2storage_kwh_time;
	long pv2storage_power_time;
	long pv2storage_kwhd_time;
	long pv2household_kwh_time;
	long pv2household_power_time;
	long pv2household_kwhd_time;
	long pv2grid_kwh_time;
	long pv2grid_power_time;
	long pv2grid_kwhd_time;
	long storage2grid_kwh_time;
	long storage2grid_power_time;
	long storage2grid_kwhd_time;
	long storage2household_kwh_time;
	long storage2household_power_time;
	long storage2household_kwhd_time;

	@Temporal(TemporalType.TIMESTAMP)
	private Date timestamp;
	
	public Node(){}
	
	public Node(String name){
		this.name = name;
		
		this.consumption_kwh = 0;
		this.consumption_power = 0;
		this.consumption_kwhd = 0;
		this.pv_power = 0;
		this.pv_kwhd = 0;
		this.pv_kwh = 0;
		this.grid2storage_kwh = 0;
		this.grid2storage_power = 0;
		this.grid2storage_kwhd = 0;	
		this.grid2household_kwh = 0;
		this.grid2household_power = 0;
		this.grid2household_kwhd = 0;
		this.pv2storage_kwh = 0;
		this.pv2storage_power = 0;
		this.pv2storage_kwhd = 0;
		this.pv2household_kwh = 0;
		this.pv2household_power = 0;
		this.pv2household_kwhd = 0;
		this.pv2grid_kwh = 0;
		this.pv2grid_power = 0;
		this.pv2grid_kwhd = 0;
		this.storage2grid_kwh = 0;
		this.storage2grid_power = 0;
		this.storage2grid_kwhd = 0;
		this.storage2household_kwh = 0;
		this.storage2household_power = 0;
		this.storage2household_kwhd = 0;
		
		this.consumption_kwh_time= 0;
		this.consumption_power_time = 0;
		this.consumption_kwhd_time= 0;
		this.pv_power_time= 0;
		this.pv_kwhd_time = 0;
		this.pv_kwh_time = 0;
		this.grid2storage_kwh_time = 0;
		this.grid2storage_power_time = 0;
		this.grid2storage_kwhd_time = 0;	
		this.grid2household_kwh_time = 0;
		this.grid2household_power_time = 0;
		this.grid2household_kwhd_time = 0;
		this.pv2storage_kwh_time = 0;
		this.pv2storage_power_time = 0;
		this.pv2storage_kwhd_time = 0;
		this.pv2household_kwh_time = 0;
		this.pv2household_power_time = 0;
		this.pv2household_kwhd_time = 0;
		this.pv2grid_kwh_time = 0;
		this.pv2grid_power_time = 0;
		this.pv2grid_kwhd_time = 0;
		this.storage2grid_kwh_time = 0;
		this.storage2grid_power_time = 0;
		this.storage2grid_kwhd_time = 0;
		this.storage2household_kwh_time = 0;
		this.storage2household_power_time = 0;
		this.storage2household_kwhd_time = 0;
	}
	
	public long getId(){
		return id;
	}
	
	public void setId(long id){
		this.id = id;
	}
	
	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public void setConsumption_kwh(double consumption_kwh) {
		this.consumption_kwh = consumption_kwh;
	}

	public void setConsumption_power(double consumption_power) {
		this.consumption_power = consumption_power;
	}

	public void setConsumption_kwhd(double consumption_kwhd) {
		this.consumption_kwhd = consumption_kwhd;
	}

	public void setPv_power(double pv_power) {
		this.pv_power = pv_power;
	}

	public void setPv_kwhd(double pv_kwhd) {
		this.pv_kwhd = pv_kwhd;
	}

	public void setPv_kwh(double pv_kwh) {
		this.pv_kwh = pv_kwh;
	}

	public double getConsumption_kwh() {
		return consumption_kwh;
	}

	public double getConsumption_power() {
		return consumption_power;
	}

	public double getConsumption_kwhd() {
		return consumption_kwhd;
	}

	public double getPv_power() {
		return pv_power;
	}

	public double getPv_kwhd() {
		return pv_kwhd;
	}

	public double getPv_kwh() {
		return pv_kwh;
	}
	
	public double getGrid2storage_kwh() {
		return grid2storage_kwh;
	}

	public void setGrid2storage_kwh(double d) {
		this.grid2storage_kwh = d;
	}

	public double getGrid2storage_power() {
		return grid2storage_power;
	}

	public void setGrid2storage_power(double grid2storage_power) {
		this.grid2storage_power = grid2storage_power;
	}

	public double getGrid2storage_kwhd() {
		return grid2storage_kwhd;
	}

	public void setGrid2storage_kwhd(double grid2storage_kwhd) {
		this.grid2storage_kwhd = grid2storage_kwhd;
	}

	public double getGrid2household_kwh() {
		return grid2household_kwh;
	}

	public void setGrid2household_kwh(double grid2household_kwh) {
		this.grid2household_kwh = grid2household_kwh;
	}

	public double getGrid2household_power() {
		return grid2household_power;
	}

	public void setGrid2household_power(double grid2household_power) {
		this.grid2household_power = grid2household_power;
	}

	public double getGrid2household_kwhd() {
		return grid2household_kwhd;
	}

	public void setGrid2household_kwhd(double grid2household_kwhd) {
		this.grid2household_kwhd = grid2household_kwhd;
	}

	public double getPv2storage_kwh() {
		return pv2storage_kwh;
	}

	public void setPv2storage_kwh(double pv2storage_kwh) {
		this.pv2storage_kwh = pv2storage_kwh;
	}

	public double getPv2storage_power() {
		return pv2storage_power;
	}

	public void setPv2storage_power(double pv2storage_power) {
		this.pv2storage_power = pv2storage_power;
	}

	public double getPv2storage_kwhd() {
		return pv2storage_kwhd;
	}

	public void setPv2storage_kwhd(double pv2storage_kwhd) {
		this.pv2storage_kwhd = pv2storage_kwhd;
	}

	public double getPv2household_kwh() {
		return pv2household_kwh;
	}

	public void setPv2household_kwh(double pv2household_kwh) {
		this.pv2household_kwh = pv2household_kwh;
	}

	public double getPv2household_power() {
		return pv2household_power;
	}

	public void setPv2household_power(double pv2household_power) {
		this.pv2household_power = pv2household_power;
	}

	public double getPv2household_kwhd() {
		return pv2household_kwhd;
	}

	public void setPv2household_kwhd(double pv2household_kwhd) {
		this.pv2household_kwhd = pv2household_kwhd;
	}

	public double getPv2grid_kwh() {
		return pv2grid_kwh;
	}

	public void setPv2grid_kwh(double pv2grid_kwh) {
		this.pv2grid_kwh = pv2grid_kwh;
	}

	public double getPv2grid_power() {
		return pv2grid_power;
	}

	public void setPv2grid_power(double pv2grid_power) {
		this.pv2grid_power = pv2grid_power;
	}

	public double getPv2grid_kwhd() {
		return pv2grid_kwhd;
	}

	public void setPv2grid_kwhd(double pv2grid_kwhd) {
		this.pv2grid_kwhd = pv2grid_kwhd;
	}

	public double getStorage2grid_kwh() {
		return storage2grid_kwh;
	}

	public void setStorage2grid_kwh(double storage2grid_kwh) {
		this.storage2grid_kwh = storage2grid_kwh;
	}

	public double getStorage2grid_power() {
		return storage2grid_power;
	}

	public void setStorage2grid_power(double storage2grid_power) {
		this.storage2grid_power = storage2grid_power;
	}

	public double getStorage2grid_kwhd() {
		return storage2grid_kwhd;
	}

	public void setStorage2grid_kwhd(double storage2grid_kwhd) {
		this.storage2grid_kwhd = storage2grid_kwhd;
	}

	public double getStorage2household_kwh() {
		return storage2household_kwh;
	}

	public void setStorage2household_kwh(double storage2household_kwh) {
		this.storage2household_kwh = storage2household_kwh;
	}

	public double getStorage2household_power() {
		return storage2household_power;
	}

	public void setStorage2household_power(double storage2household_power) {
		this.storage2household_power = storage2household_power;
	}

	public double getStorage2household_kwhd() {
		return storage2household_kwhd;
	}

	public void setStorage2household_kwhd(double storage2household_kwhd) {
		this.storage2household_kwhd = storage2household_kwhd;
	}

	public long getConsumption_kwh_time() {
		return consumption_kwh_time;
	}

	public void setConsumption_kwh_time(long consumption_kwh_time) {
		this.consumption_kwh_time = consumption_kwh_time;
	}

	public long getConsumption_power_time() {
		return consumption_power_time;
	}

	public void setConsumption_power_time(long consumption_power_time) {
		this.consumption_power_time = consumption_power_time;
	}

	public long getConsumption_kwhd_time() {
		return consumption_kwhd_time;
	}

	public void setConsumption_kwhd_time(long consumption_kwhd_time) {
		this.consumption_kwhd_time = consumption_kwhd_time;
	}

	public long getPv_power_time() {
		return pv_power_time;
	}

	public void setPv_power_time(long pv_power_time) {
		this.pv_power_time = pv_power_time;
	}

	public long getPv_kwhd_time() {
		return pv_kwhd_time;
	}

	public void setPv_kwhd_time(long pv_kwhd_time) {
		this.pv_kwhd_time = pv_kwhd_time;
	}

	public long getPv_kwh_time() {
		return pv_kwh_time;
	}

	public void setPv_kwh_time(long pv_kwh_time) {
		this.pv_kwh_time = pv_kwh_time;
	}

	@PrePersist
	protected void onCreate(){
		timestamp = new Date();
	}

	public long getGrid2storage_kwh_time() {
		return grid2storage_kwh_time;
	}

	public void setGrid2storage_kwh_time(long grid2storage_kwh_time) {
		this.grid2storage_kwh_time = grid2storage_kwh_time;
	}

	public long getGrid2storage_power_time() {
		return grid2storage_power_time;
	}

	public void setGrid2storage_power_time(long grid2storage_power_time) {
		this.grid2storage_power_time = grid2storage_power_time;
	}

	public long getGrid2storage_kwhd_time() {
		return grid2storage_kwhd_time;
	}

	public void setGrid2storage_kwhd_time(long grid2storage_kwhd_time) {
		this.grid2storage_kwhd_time = grid2storage_kwhd_time;
	}

	public long getGrid2household_kwh_time() {
		return grid2household_kwh_time;
	}

	public void setGrid2household_kwh_time(long grid2household_kwh_time) {
		this.grid2household_kwh_time = grid2household_kwh_time;
	}

	public long getGrid2household_power_time() {
		return grid2household_power_time;
	}

	public void setGrid2household_power_time(long grid2household_power_time) {
		this.grid2household_power_time = grid2household_power_time;
	}

	public long getGrid2household_kwhd_time() {
		return grid2household_kwhd_time;
	}

	public void setGrid2household_kwhd_time(long grid2household_kwhd_time) {
		this.grid2household_kwhd_time = grid2household_kwhd_time;
	}

	public long getPv2storage_kwh_time() {
		return pv2storage_kwh_time;
	}

	public void setPv2storage_kwh_time(long pv2storage_kwh_time) {
		this.pv2storage_kwh_time = pv2storage_kwh_time;
	}

	public long getPv2storage_power_time() {
		return pv2storage_power_time;
	}

	public void setPv2storage_power_time(long pv2storage_power_time) {
		this.pv2storage_power_time = pv2storage_power_time;
	}

	public long getPv2storage_kwhd_time() {
		return pv2storage_kwhd_time;
	}

	public void setPv2storage_kwhd_time(long pv2storage_kwhd_time) {
		this.pv2storage_kwhd_time = pv2storage_kwhd_time;
	}

	public long getPv2household_kwh_time() {
		return pv2household_kwh_time;
	}

	public void setPv2household_kwh_time(long pv2household_kwh_time) {
		this.pv2household_kwh_time = pv2household_kwh_time;
	}

	public long getPv2household_power_time() {
		return pv2household_power_time;
	}

	public void setPv2household_power_time(long pv2household_power_time) {
		this.pv2household_power_time = pv2household_power_time;
	}

	public long getPv2household_kwhd_time() {
		return pv2household_kwhd_time;
	}

	public void setPv2household_kwhd_time(long pv2household_kwhd_time) {
		this.pv2household_kwhd_time = pv2household_kwhd_time;
	}

	public long getPv2grid_kwh_time() {
		return pv2grid_kwh_time;
	}

	public void setPv2grid_kwh_time(long pv2grid_kwh_time) {
		this.pv2grid_kwh_time = pv2grid_kwh_time;
	}

	public long getPv2grid_power_time() {
		return pv2grid_power_time;
	}

	public void setPv2grid_power_time(long pv2grid_power_time) {
		this.pv2grid_power_time = pv2grid_power_time;
	}

	public long getPv2grid_kwhd_time() {
		return pv2grid_kwhd_time;
	}

	public void setPv2grid_kwhd_time(long pv2grid_kwhd_time) {
		this.pv2grid_kwhd_time = pv2grid_kwhd_time;
	}

	public long getStorage2grid_kwh_time() {
		return storage2grid_kwh_time;
	}

	public void setStorage2grid_kwh_time(long storage2grid_kwh_time) {
		this.storage2grid_kwh_time = storage2grid_kwh_time;
	}

	public long getStorage2grid_power_time() {
		return storage2grid_power_time;
	}

	public void setStorage2grid_power_time(long storage2grid_power_time) {
		this.storage2grid_power_time = storage2grid_power_time;
	}

	public long getStorage2grid_kwhd_time() {
		return storage2grid_kwhd_time;
	}

	public void setStorage2grid_kwhd_time(long storage2grid_kwhd_time) {
		this.storage2grid_kwhd_time = storage2grid_kwhd_time;
	}

	public long getStorage2household_kwh_time() {
		return storage2household_kwh_time;
	}

	public void setStorage2household_kwh_time(long storage2household_kwh_time) {
		this.storage2household_kwh_time = storage2household_kwh_time;
	}

	public long getStorage2household_power_time() {
		return storage2household_power_time;
	}

	public void setStorage2household_power_time(long storage2household_power_time) {
		this.storage2household_power_time = storage2household_power_time;
	}

	public long getStorage2household_kwhd_time() {
		return storage2household_kwhd_time;
	}

	public void setStorage2household_kwhd_time(long storage2household_kwhd_time) {
		this.storage2household_kwhd_time = storage2household_kwhd_time;
	}
	
	
}
