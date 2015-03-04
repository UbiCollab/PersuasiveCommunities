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
	int consumption_kwh_id;
	int consumption_power_id;
	int consumption_kwhd_id;
	int pv_power_id;
	int pv_kwhd_id;
	int pv_kwh_id;
	long consumption_kwh_time;
	long consumption_power_time;
	long consumption_kwhd_time;
	long pv_power_time;
	long pv_kwhd_time;
	long pv_kwh_time;
	
	@Temporal(TemporalType.TIMESTAMP)
	private Date timestamp;
	
	public Node(){}
	
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

	public Node(String name) {
		this.name = name;
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
}
