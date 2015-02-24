package no.haktho.cossmic.forest.session;

import java.io.Serializable;

import javax.faces.bean.*;
import javax.faces.context.FacesContext;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;
//Get validation jar from: http://mvnrepository.com/artifact/javax.validation/validation-api/1.1.0.Final
import javax.validation.constraints.*;

import no.haktho.cossmic.forest.model.User;

@ManagedBean(name="loginbean")
@SessionScoped
public class LoginBean implements Serializable{
	
	private static final long serialVersionUID = 1L;
	
	private String username;
	private String password;
	private boolean loggedIn = false;
	
	public LoginBean() {}
	
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
	
	public boolean isLoggedIn() {
		return loggedIn;
	}

	public void setLoggedIn(boolean loggedIn) {
		this.loggedIn = loggedIn;
	}

	public String validateUser(){
		String flag = "failure";
		EntityManagerFactory emf = Persistence.createEntityManagerFactory("Users");
		EntityManager em = emf.createEntityManager();
		Query q = em.createQuery("SELECT u FROM User u WHERE u.username = :un AND u.password = :pw");
		q.setParameter("un", username);
		q.setParameter("pw", password);
		
		try{
			User user = (User)q.getSingleResult();
			if(username.equalsIgnoreCase(user.getUsername())&&password.equalsIgnoreCase(user.getPassword())){
				flag = "success";
				setLoggedIn(true);
			}
		}
		catch(Exception e){
				return null;
		}
		return flag;
	}
	
	public String invalidateUser(){
		setLoggedIn(false);
		
		FacesContext.getCurrentInstance().getExternalContext().invalidateSession();
		
		return "logout";
	}
}
