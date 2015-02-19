package no.haktho.cossmic.forest.model;

import javax.persistence.*;
import java.io.Serializable;

@Entity
public class User implements Serializable{
	private static final long serialVersionUID = 7665916271235275367L;
	
	@TableGenerator(
			name="onlyOne",
			allocationSize=1,
			initialValue=0)
	@Id
	@Column(name="ID", nullable=false)
	@GeneratedValue(strategy=GenerationType.TABLE, generator="onlyOne")
	private long id;
	
	@Column(name="FIRST_NAME", nullable=false, length=50)
	private String firstName;
	
	@Column(name="LAST_NAME", nullable=false, length=50)
	private String lastName;
	
	@Column(name="USERNAME", nullable=false, length=50)
	private String username;
	
	@Column(name="PASSWORD", nullable=false, length=50)
	private String password;
	
	public long getId() {
		return id;
	}
	public void setId(long id) {
		this.id = id;
	}
	public String getFirstName() {
		return firstName;
	}
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}
	public String getLastName() {
		return lastName;
	}
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}
	public String getUsername() {
		return username;
	}
	public void setUsername(String username) {
		this.username = username;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	
}
