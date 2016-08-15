/* This code adds the links to */
$(document).ready(function(){
	var domain = 'http://library.iitmandi.ac.in/';
	
	//About Us
	$('<a class="dropDown" href="'+domain+'aboutus/vision.html">Vision & Mission</a>').appendTo('#navBarAbt').hide();
	$('<a class="dropDown" href="'+domain+'aboutus/libcollection.html">Library Collection</a>').appendTo('#navBarAbt').hide();
	$('<a class="dropDown" href="'+domain+'aboutus/libteam.html">Library Team</a>').appendTo('#navBarAbt').hide();
	$('<a class="dropDown" href="'+domain+'aboutus/libusers.html">Library Users</a>').appendTo('#navBarAbt').hide();
	$('<a class="dropDown" href="'+domain+'aboutus/libtimings.html">Library Timings</a>').appendTo('#navBarAbt').hide();
	$('<a class="dropDown" href="'+domain+'aboutus/rules.html">Library Rules</a>').appendTo('#navBarAbt').hide();
	$('<a class="dropDown" href="'+domain+'aboutus/libcommittee.html">Library Advisory Council</a>').appendTo('#navBarAbt').hide();

               
	//Services
	$('<a class="dropDown" id="serv" href="'+domain+'services/doctdeliveryservice.html">Faculty Services</a>').appendTo('#navBarSrv').hide();
	$('<div id="subser"><a href="http://library.iitmandi.ac.in/local/Req_Book_IIT%20Mandi.pdf">Indent a Book</a><br><a href="http://library.iitmandi.ac.in/local/illstatus.html">ILL Status<a href="http://www.webopac.iitmandi.ac.in">Book Searching<a href="http://library.iitmandi.ac.in/local/Booksinprocess-2016-17.html">Books-in-Process<a href="http://library.iitmandi.ac.in/local/E-books%20Downloaded.html">Downloaded E-Books<a href="http://faculty.iitmandi.ac.in/research/publications/index.html">Faculty Publication detail<a href="http://library.iitmandi.ac.in/local/Budget%20&%20Expenditure/2016-17/Budget%20&%20Expenditure%20detail-2016-17.html">Budget & Expenditure<a href="http://insite.iitmandi.ac.in/moodle/">Moodle<a href="http://insite.iitmandi.ac.in/moodle_archive/">Moodle Archive<a href="http://vpn.iitmandi.ac.in/">Remote Access Service</a></div>').appendTo('#navBar li #serv').hide();	
	$('<a class="dropDown" href="'+domain+'services/borrowingfacility.html">Borrowing Facilities</a><a class="dropDown" href="'+domain+'services/computingfacility.html">Computing Facilities</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="'+domain+'services/doctdeliveryservice.html">Doct Delivery Service</a>').appendTo('#navBarSrv').hide();
    $('<a class="dropDown" href="'+domain+'services/ill.html">Inter Library Loan</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="'+domain+'services/liborientation.html">Library Orientation</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="http://library.iitmandi.ac.in/local/Booksinprocess.html">Reservation of Book</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="http://www.webopac.iitmandi.ac.in/">OPAC</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="http://library.iitmandi.ac.in/recommendSystem/login.php">Book Recommendation</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="http://library.iitmandi.ac.in/local/Digitallibrary/dlindex.html">Digital Library Service</a>').appendTo('#navBarSrv').hide();
	$('<a class="dropDown" href="http://library.iitmandi.ac.in/newsclippings/">Newspaper Clippings</a>').appendTo('#navBarSrv').hide();
		

	
	//Resources
	$('<a class="dropDown" id="books" href="'+domain+'resources/books.html">Books</a><a class="dropDown" href="http://www.webopac.iitmandi.ac.in/cgi-bin/koha/opac-search.pl?idx=kw&q=&idx=kw&q=&idx=kw&q=&limit=mc-itemtype%2Cphr%3ATHESIS&limit-yr=&limit=&sort_by=title_az&do=Search">Thesis Database</a><a class="dropDown" href="'+domain+'resources/pm.html">Print periodicals</a><a class="dropDown" href="'+domain+'resources/cdrom.html">CD-ROM Database</a><a class="dropDown" href="http://library.iitmandi.ac.in/local/E-books%20Downloaded.html">Downloaded E-Books</a>').appendTo('#navBarRes').hide();
	$('<div id="submenu"><a href="http://library.iitmandi.ac.in/onlineresources/ebooks.html">E-books</a><br><a href="http://www.webopac.iitmandi.ac.in/cgi-bin/koha/opac-search.pl?idx=kw&idx=kw&idx=kw&limit=mc-itemtype%2Cphr%3ARB&sort_by=title_az&do=Search">Reference</a><br><a href="http://library.iitmandi.ac.in/resources/TBLS.html">TBLS</a><br><a href="http://www.webopac.iitmandi.ac.in/cgi-bin/koha/opac-search.pl?idx=kw&idx=kw&idx=kw&limit=mc-itemtype%2Cphr%3AHB&sort_by=title_az&do=Search">Hindi Books</a><br><a href="http://www.webopac.iitmandi.ac.in/cgi-bin/koha/opac-search.pl?&limit=mc-itemtype,phr:GB&offset=0&sort_by=title_az">German Books</a></div>').appendTo('#navBar li #books').hide();	
	

	//Online Resources
    $('<a class="dropDown" href="'+domain+'onlineresources/er2016.html">e-Journals 2016</a>').appendTo('#navBarOre').hide();
	$('<a class="dropDown" href="'+domain+'onlineresources/fulltextdb.html">Full Text Databases</a><a class="dropDown" href="'+domain+'onlineresources/bibliographicresources.html">Bibliographic Resources</a>').appendTo('#navBarOre').hide();
	$('<a class="dropDown" href="'+domain+'onlineresources/ebooks.html">e-Books</a>').appendTo('#navBarOre').hide();
	$('<a class="dropDown" href="'+domain+'onlineresources/newoa.html">Open Access Resources</a>').appendTo('#navBarOre').hide();
    $('<a class="dropDown" href="http://nptel.iitm.ac.in" target="_blank">NPTEL</a>').appendTo('#navBarOre').hide();
	$('<a class="dropDown" href="'+domain+'onlineresources/trialaccess.html">Trial Access</a>').appendTo('#navBarOre').hide();
	$('<a class="dropDown" href="'+domain+'onlineresources/usage.html">E-resource usage policy</a>').appendTo('#navBarOre').hide();
	
	
	//Awareness Service
	$('<a class="dropDown" href="'+domain+'awarenessservices/publisheralerts.html">Alerts from Publishers</a>').appendTo('#navBarAwa').hide();
	$('<a class="dropDown" href="'+domain+'awarenessservices/newbooks.html">New Arrival of Books</a>').appendTo('#navBarAwa').hide();
	$('<a id="uses" class="dropDown" href="'+domain+'Jrs_Detail/graph.php">E-Journals Uses Stats</a>').appendTo('#navBarAwa').hide();
	// $('<div id="sub"><a href="http://library.iitmandi.ac.in/local/Usesstatus2014.html">2014</a><br><a href="http://library.iitmandi.ac.in/local/Usesstatus2015.html">2015</a></a><br><a href="http://library.iitmandi.ac.in/local/Usesstatus2016.html">2016</a></div>').appendTo('#navBar li #uses').hide();
	$('<a class="dropDown" href="'+domain+'awarenessservices/Library Uses/Library_uses.html">Library Uses (Comb)</a>').appendTo('#navBarAwa').hide();
	$('<a class="dropDown" href="http://10.8.11.147:8080/LibraryAttendance/VisitorReport.jsp">Library Uses Stats</a>').appendTo('#navBarAwa').hide();
});
