package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;

public final class index_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  static {
    _jspx_dependants = new java.util.ArrayList<String>(2);
    _jspx_dependants.add("/header.jsp");
    _jspx_dependants.add("/footer.jsp");
  }

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("<html>\n");
      out.write("<head>\n");
      out.write("<title>Search Book</title>\n");
      out.write("\n");
      out.write("<link href=\"css/home.css\" rel=\"stylesheet\" type=\"text/css\">\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <link href=\"css/header.css\" rel=\"stylesheet\" type=\"text/css\">\n");
      out.write("        <title>header</title>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("        ");

            String n = (String) session.getAttribute("name");
            if (n == null) {
      out.write("\n");
      out.write("        <div class=\"back\">\n");
      out.write("            <div class=\"menu1\">\n");
      out.write("                <ul>\n");
      out.write("                    <li><a href=\"index.jsp\">Home</a> </li>\n");
      out.write("                    <li><a href=\"books.jsp\">Books</a></li>  \n");
      out.write("                    <li><a href=\"books.jsp\">Category</a> </li>  \n");
      out.write("                    <li><a href=\"about.jsp\">About</a></li> \n");
      out.write("                    <li><a href=\"contactus.jsp\">Contact us</a></li> \n");
      out.write("                </ul>\n");
      out.write("                <div style=\"margin-top: 15px; margin-left: 180px;\">\n");
      out.write("                    <li><a href=\"login.jsp\" style=\"color:mintcream\">Sign in </a></li> &nbsp;&nbsp;\n");
      out.write("                    <li><a href=\"reg.jsp\" style=\"color:mintcream\">Sign up</a></li>\n");
      out.write("\n");
      out.write("                </div>\n");
      out.write("            </div>\n");
      out.write("        </div>\n");
      out.write("\n");
      out.write("\n");
      out.write("        ");
} else {
      out.write("\n");
      out.write("        <div class=\"back\">\n");
      out.write("            <div class=\"menu1\">\n");
      out.write("                <ul>\n");
      out.write("                    <li><a href=\"index.jsp\">Home</a> </li>\n");
      out.write("                    <li><a href=\"books.jsp\">Books</a></li>  \n");
      out.write("                    <li><a href=\"books.jsp\">Category</a> </li>  \n");
      out.write("                    <li><a href=\"about.jsp\">About</a></li> \n");
      out.write("                    <li><a href=\"contactus.jsp\">Contact us</a></li> \n");
      out.write("                </ul>\n");
      out.write("                <div style=\"margin-top: 15px; margin-left: 180px;\">\n");
      out.write("                    <li><a href=\"logout.jsp\" style=\"color:mintcream\">LogOut </a></li> &nbsp;&nbsp;\n");
      out.write("\n");
      out.write("\n");
      out.write("                </div>\n");
      out.write("            </div>\n");
      out.write("        </div>\n");
      out.write("        ");
}
        
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("    </body>\n");
      out.write("</html>\n");
      out.write("\n");
      out.write("</head>\n");
      out.write("<body>\n");
      out.write("    <div class=\"b\">\n");
      out.write("        <div class=\"img\">\n");
      out.write("            <img src=\"image/Book_icon.png\" width=\"200\" height=\"180\" id=\"image_spc\" style=\"margin-left: 60px;\">\n");
      out.write("        </div>\n");
      out.write("        <form action=\"SearchBook\">\n");
      out.write("        <div class=\"search_input\">\n");
      out.write("            \n");
      out.write("            <input name=\"search_boook\" placeholder=\"enter book name\" type=\"text\" size=\"50px;\" style=\"height: 70px; width: 300px;\"> </input>\n");
      out.write("            \n");
      out.write("        </div>\n");
      out.write("        <div class=\"search_button\">\n");
      out.write("            \n");
      out.write("            <input type=\"submit\" value=\"SEARCH\" style=\"height: 70px; width: 200px; margin-left: 70px; margin-right: auto;\" class=\"btn\"> </input>\n");
      out.write("            \n");
      out.write("        </div>\n");
      out.write("        </form>\n");
      out.write("    </div>\n");
      out.write("    \n");
      out.write("    \n");
      out.write("    \n");
      out.write("    \n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <link href=\"css/footer.css\" rel=\"stylesheet\" type=\"text/css\">\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>Footer</title>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("        <div class=\"footer\">\n");
      out.write("            <h1>footer</h1>\n");
      out.write("        </div>\n");
      out.write("        \n");
      out.write("    </body>\n");
      out.write("</html>\n");
      out.write("\n");
      out.write("</body>\n");
      out.write("</html> ");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
