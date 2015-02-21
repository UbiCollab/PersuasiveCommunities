package no.haktho.cossmic.forest.logic;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;
import javax.persistence.Query;

import no.haktho.cossmic.forest.model.User;

public class TestDB {

	static EntityManagerFactory emf;
	static EntityManager em;
	
	public static void main(String[]args){
		emf = Persistence.createEntityManagerFactory("Users");
		em = emf.createEntityManager();
		
		listAllUsers();
//		createAUser("Hakon", "Gulbrandsen", "hakongul", "lol123");
		
		em.close();
		emf.close();
	}
	
	public static void listAllUsers(){
		Query q = em.createQuery("SELECT u FROM User u");
		@SuppressWarnings("unchecked")
		List<User> userList = q.getResultList();
		for (User user : userList){
			System.out.println(user.getUsername());
		}
		System.out.println("User list size: "+userList.size());
	}
	
	public static void createAUser(String fName, String lName, String uName, String pw){
		EntityTransaction trans = em.getTransaction();
		
		trans.begin();
		User u = new User();
		u.setFirstName(fName);
		u.setLastName(lName);
		u.setUsername(uName);
		u.setPassword(pw);
		
		em.persist(u);
		trans.commit();
		
	}
}
