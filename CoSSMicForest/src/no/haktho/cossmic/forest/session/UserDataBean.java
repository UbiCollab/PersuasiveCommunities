package no.haktho.cossmic.forest.session;

import java.io.Serializable;

import javax.faces.application.FacesMessage;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.SessionScoped;
import javax.faces.context.FacesContext;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;

import no.haktho.cossmic.forest.model.Node;

@ManagedBean(name="userdata")
@SessionScoped
public class UserDataBean implements Serializable{
	
	private static final long serialVersionUID = -2173378275576789739L;

	@ManagedProperty(value="#{navigationbean}")
	private NavigationBean navigationBean;
	
	Node node = null;
//	private boolean notPopulated = true;
	private boolean populated = false;
	
	public String getData(){
		EntityManagerFactory emf = Persistence.createEntityManagerFactory("Users");
		EntityManager em = emf.createEntityManager();
		Query q = em.createQuery("SELECT n FROM Node n WHERE n.name = :nn ORDER BY n.timestamp DESC");
		q.setParameter("nn", "Node:9");
		q.setMaxResults(1);
		
		try{
			setNode((Node)q.getSingleResult());
//			setNotPopulated(false);
			setPopulated(true);
		}
		catch(Exception e){
			FacesMessage msg = new FacesMessage("Error fetching data from server", "ERROR MSG");
			msg.setSeverity(FacesMessage.SEVERITY_ERROR);
			FacesContext.getCurrentInstance().addMessage(null, msg);
		}
		
		em.close();
		emf.close();
		
		return navigationBean.toUser();
	}
	
	public void setNavigationBean(NavigationBean navigationBean){
		this.navigationBean = navigationBean;
	}

//	public boolean isNotPopulated() {
//		return notPopulated;
//	}
//
//	public void setNotPopulated(boolean isNotPopulated) {
//		this.notPopulated = isNotPopulated;
//	}

	public boolean isPopulated() {
		return populated;
	}

	public void setPopulated(boolean isPopulated) {
		this.populated = isPopulated;
	}

	public Node getNode() {
		return node;
	}

	public void setNode(Node node) {
		this.node = node;
	}
}
