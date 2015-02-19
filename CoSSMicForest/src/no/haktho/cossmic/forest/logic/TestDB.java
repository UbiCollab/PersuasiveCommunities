package no.haktho.cossmic.forest.logic;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;
import javax.persistence.Query;

import no.haktho.cossmic.forest.model.User;

public class TestDB {

	public static void main(String[]args){
		EntityManagerFactory emf = Persistence.createEntityManagerFactory("CoSSMicForest");
		EntityManager em = emf.createEntityManager();
		EntityTransaction trans = em.getTransaction();
		
		Query q = em.createQuery("SELECT u FROM user u");
		@SuppressWarnings("unchecked")
		List<User> userList = q.getResultList();
		for (User user : userList){
			System.out.println(user.getUsername());
		}
		System.out.println("User list size: "+userList.size());
		
		trans.begin();
		User test = new User();
		test.setFirstName("Hakon");
		test.setLastName("Gulbrandsen");
		test.setUsername("hakongul");
		test.setPassword("lol123");
		
		em.persist(test);
		trans.commit();
		
		em.close();
		emf.close();
	}
}
