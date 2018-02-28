<%-- 
    Document   : index
    Created on : Sep 28, 2016, 4:40:42 PM
    Author     : Oops
--%>

<html>
<head>
<title>Search Book</title>

<link href="css/home.css" rel="stylesheet" type="text/css">
<%@ include file="header.jsp"%>
</head>
<body>
    <div class="b">
        <div class="img">
            
        </div>
        <form action="books.jsp" method="post">
        <div class="search_input">
            
            <input name="search_boook" placeholder="Enter book's name..." type="text" size="50px;" style="height: 70px; width: 300px;font-size: 30px;"> </input>
            
        </div>
        <div class="search_button">
            
            <input type="submit" value="SEARCH" style="height: 70px; width: 200px; margin-left: 70px; margin-right: auto;" class="btn"> </input>
            
        </div>
        </form>
    </div>
    
    
    
    
    
<%@ include file="footer.jsp"%>
</body>
</html> 