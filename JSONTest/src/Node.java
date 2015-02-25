
public class Node {

	double consumption_kwh;
	double consumption_power;
	double consumption_kwhd;
	double pv_power;
	double pv_kwhd;
	double pv_kwh;
	String name;
	
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
