<%-- 
    Document   : userprofile
    Created on : Sep 29, 2016, 1:32:41 AM
    Author     : Oops
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/home.css" type="text/css" rel="stylesheet"/>
        <title>User Profile</title>
        <%@ include file="header.jsp"%>
    </head>
    <body>
        <%
         try{
        HttpSession session1=request.getSession(false);  
        if(session1!=null){  
        String name=(String)session1.getAttribute("name");  
        out.println(name);
        }
             
             Class.forName("com.mysql.jdbc.Driver");
          Connection  con = DriverManager.getConnection("jdbc:mysql://localhost:3306/safebook", "root", "");
          Statement stmt = con.createStatement();
          ResultSet rs = stmt.executeQuery("select * from register");
          rs.next();
          String name = rs.getString("name");
          String email = rs.getString("email");
          String mob = rs.getString("contact");
          %>
           <h1><%out.println(name);%></h1>
           <h1><%out.println(email);%></h1>
           <h1><%out.println(mob);%></h1>
           <%
         }catch(Exception e){
          out.println(e);
         }
     
          
       
        %>
        
       
        <%@ include file="footer.jsp"%>
    </body>
</html>
