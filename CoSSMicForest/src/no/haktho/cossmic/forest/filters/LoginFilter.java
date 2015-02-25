package no.haktho.cossmic.forest.filters;

import java.io.IOException;

import javax.servlet.*;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import no.haktho.cossmic.forest.session.LoginBean;

public class LoginFilter implements Filter{

	/**
	 * Check if the user is logged in. If not, redirect back to the Login page
	 */
	public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain) throws IOException, ServletException{
		//Getting the login bean from the session attribute
		LoginBean loginBean = (LoginBean)((HttpServletRequest)request).getSession().getAttribute("loginbean");
		
		//For the first application request there is no loginBean in the session so user needs to log in
		//For other requests loginBean is present but we need to check if the user has logged in successfully
		if(loginBean == null || !loginBean.isLoggedIn()){
			String contextPath = ((HttpServletRequest)request).getContextPath();
			((HttpServletResponse)response).sendRedirect(contextPath + "/login.xhtml");
		}
		
		chain.doFilter(request, response);
	}

	@Override
	public void destroy() {
	}

	@Override
	public void init(FilterConfig filterConfig) throws ServletException {
	}
}
