package no.haktho.cossmic.forest.session;

import java.io.Serializable;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean(name="navigationbean")
@SessionScoped
public class NavigationBean implements Serializable{

	private static final long serialVersionUID = -7774381101149396296L;
	
	/**
	 * Redirect to Login page
	 */
	public String redirectToLogin(){
		return "/login.xhtml?faces-redirect=true";
	}
	
	/**
	 * Flat link to login page
	 */
	public String toLogin(){
		return "/login.xhtml";
	}
	
	/**
	 * Redirect to welcome page
	 */
	public String redirectToWelcome(){
		return "/secure/welcome.xhtml?faces-redirect=true";
	}
	
	/**
	 * Flat link to welcome page
	 */
	public String toWelcome(){
		return "/secure/welcome.xhtml";
	}
	
	/**
	 * Redirect to user page / account page
	 */
	public String redirectToUser(){
		return "/secure/userpage.xhtml?faces-redirect=true";
	}
	
	/**
	 * Flat link to user page / account page
	 */
	public String toUser(){
		return "/secure/userpage.xhtml";
	}

}
