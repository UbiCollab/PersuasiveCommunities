package no.haktho.cossmic.forest.session;

import javax.faces.bean.*;
//Get validation jar from: http://mvnrepository.com/artifact/javax.validation/validation-api/1.1.0.Final
import javax.validation.constraints.*;

@ManagedBean(name="loginbean")
@RequestScoped
public class LoginBean {
	
	private String username;
	private String password;
	
	@NotNull
	public String getUsername(){
		return username;
	}
	
	public void setUsername(final String name){
		this.username = name;
	}
	
	@NotNull
	public String getPassword(){
		return password;
	}
	
	public void setPassword(final String password){
		this.password = password;
	}
	
}
