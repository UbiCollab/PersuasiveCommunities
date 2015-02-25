import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.TableGenerator;


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
	
}
