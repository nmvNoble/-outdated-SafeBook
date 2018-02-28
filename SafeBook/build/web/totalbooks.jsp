<%-- 
    Document   : totalbooks
    Created on : Sep 29, 2016, 4:34:10 PM
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
        <link href="css/home.css" rel="stylesheet" type="text/css">
        <title>total Books</title>
        
        <%@ include file="header.jsp"%>
    </head>
    <body>
        <div>
        <%
     try{
         
          Class.forName("com.mysql.jdbc.Driver");
          Connection  con = DriverManager.getConnection("jdbc:mysql://localhost:3306/safebook", "root", "");
            
         
          Statement stmt = con.createStatement();
           ResultSet rs = stmt.executeQuery("select * from book");
         
         while(rs.next())
         {
             String book = rs.getString("bname");
             String book_des = rs.getString("bdes");
             String book_author = rs.getString("bauthor");
             //String book_loc = rs.getString("book_location");
             %>
             <h1 style="width: 800px"> <%out.print(book);
              out.print( "     "+book_des);
              out.print( "     "+book_author);
            // out.print( " "+book_loc);%>
          
             
            <%
         }
        }catch(Exception e){
            
        }
     %>
     </div>
     
     <div>
     <%@ include file="footer.jsp"%>
     </div>
    </body>
    
    

</html>
