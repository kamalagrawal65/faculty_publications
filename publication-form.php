<head>
<title>Publication Form</title>
</head>
<link rel="stylesheet" href="css/form.css">
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
<?php
	include("includes/header.php");
	session_start();
	if(!isset($_SESSION['user_type'])){
		header("location:login.php");
		exit();	
	}
?>
<style>
.hideme{
	display:none;	
}
#fieldset_more_auth{
	display:none;	
}
</style>

<script>
	$(document).ready(function(){
		$("#add_more").click(function(){
			$("#fieldset_more_auth").fadeIn(2000);
			
			//$("#auth").append("<div class='add_more_ele'><input type='text' class='col2'/></div>");
		});
	});
	$(document).ready(function(){
		$("#add_more_auth").click(function(){
			$("#add_auth").append("<table><th><u><i>Author</i></u></th><tr><td><span  class='coladd1' class='labelling'>1. First Name:</span><br/></td><td><input class='coladd2' type='text' name='more_auth_first[]'></td></tr><tr><td><span  class='coladd1' class='labelling'>2. Middle Name:</span><br/></td><td><input class='coladd2' type='text' name='more_auth_middle[]'></td></tr><tr><td><span  class='coladd1' class='labelling'>3. Last Name:</span><br/></td><td><input class='coladd2' type='text' name='more_auth_last[]'></td></tr></table>");
			
		});
	});
	
	
	$(document).ready(function(){
		$(".dropdown").change(function(){
			var doc=$(this).val();
			if(doc=='Article'){
				$(".hideme").css("display","none");
				$(".clearme").text('');
				$("#fieldset_article").fadeIn(2000);	
			}
			else if(doc=='Book'){
				$(".hideme").css("display","none");
				$(".clearme").text('');
				$("#fieldset_book").fadeIn(2000);		
			}
			else if(doc=='book_chapter'){
				$(".hideme").css("display","none");
				$(".clearme").text('');
				$("#fieldset_book_chap").fadeIn(2000);		
			}
			else if(doc=='conference_paper'){
				$(".hideme").css("display","none");
				$(".clearme").text('');
				$("#fieldset_conf").fadeIn(2000);		
			}
			else if(doc=='Misc'){
				$(".hideme").css("display","none");
				$(".clearme").text('');
				$("#fieldset_misc").fadeIn(2000);		
			}
		});
	});
</script>
<body>
	<div >
    	<?php
			
			if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2)
				echo "<a href='logout.php' style='float:right; padding:10px; border-radius:10px; height:20px; background-color:#F60;'>Logout<div></div></a>";
		?>
    
    </div>
	<center><i><h1><u>Research Publication Form</u></h1></i></center>
	<form method="post" action="thankyou.php">
    	<center>
    	<fieldset class='fieldset1'>
        	<legend>AUTHORS</legend>
            <table>
            	
              <tr id='auth'>
                	<td><span  class="col1" class="labelling">First Name:</span><br/></td>
                	<td><input class="col2" type="text" name='more_first'></td>
              </tr>
              <tr>  
              	<td><span  class="col1" class="labelling">Middle Name:</span><br/></td>
                <td><input class="col2" type="text" name='more_middle'></td>
              </tr>
              <tr>
                  <td><span  class="col1" class="labelling">Last Name:</span><br/></td>
               	  <td><input class="col2" type="text" name='more_last'></td>
                  
                </tr>
                
            </table>
            <td><a href="#" id="add_more"><div id="all_authors">&nbsp;Add more Authors</div></a></td>
            
        </fieldset>
        </center>
        
        <center>
    	<fieldset class='fieldset1' id='fieldset_more_auth'>
        	<legend>More AUTHORS...</legend>
            <table>
            	<th><u><i>Secondary Author</i></u></th>
        	       <tr>
                        <td><span  class='coladd1' class='labelling'>1. First Name:</span><br/></td>
                        <td><input class='coladd2' type='text' name='more_auth_first[]'></td>
                   </tr>
                   <tr>
                        <td><span  class='coladd1' class='labelling'>2. Middle Name:</span><br/></td>
                        <td><input class='coladd2' type='text' name='more_auth_middle[]'></td>
                   </tr>
                   <tr>
                        <td><span  class='coladd1' class='labelling'>3. Last Name:</span><br/></td>
                        <td><input class='coladd2' type='text' name='more_auth_last[]'></td>
                    </tr>
                
            </table>
            <hr/>
            <div id='add_auth'>
                 
            </div>
            <a href="#" id="add_more_auth"><div id="all_authors">&nbsp;Add more</div></a>
        </fieldset>
        </center>
        
        
        
        <center>
    	<fieldset class='fieldset1'>
        	<legend>PUBLICATION DETAILS</legend>
            <table>
            	 <tr>
                	<td><span  class="col1" class="labelling">School:</span><br/></td>
                	<td>         
                    	<select id='school' name="school" class="col2 dropdown">
                        	<option disabled selected value> -- select an option -- </option>
                        	<option value='SBS'>SBS</option>
                            <option value='SCEE'>SCEE</option>
                            <option value='HSS'>HSS</option>
                            <option value='SE'>SE</option>
                            <option value='Interdisciplinary'>Interdisciplinary</option>
                        </select>
                    </td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Document:</span><br/></td>
                	<td>
                    	<select id='doc' name="document" class="col2 dropdown">
                        	<option disabled selected value> -- select an option -- </option>
                        	<option value='Article'>Article</option>
                            <option value='Book'>Book</option>
                            <option value='book_chapter'>Book Chapter</option>
                            <option value='conference_paper'>Conference Paper</option>
                            <option value='Misc'>Misc</option>
                        </select>
                    </td>
                 </tr>
                
            </table>
        </fieldset>
        </center>
        
        
        
        
        
        
        <center>
    	<fieldset class='fieldset1 hideme' id='fieldset_article'>
        	<legend>ARTICLE</legend>
            <table> 
            	<tr>
                	<td><span  class="col1" class="labelling">Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="article_title" id='title'></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Source/Journal Name:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="article_source" id='stitle'></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" name='article_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" name='article_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" type="text" name='article_publisher'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" name='article_language' value="English"></td>
                 </tr>
                <tr>
                	<td><span  class="col1" class="labelling clearme">Volume:</span><br/></td>
                	<td><input class="col2" type="text" name='article_volume'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Issue:</span><br/></td>
                	<td><input class="col2" type="text" name='article_issue'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">ISSN:</span><br/></td>
                	<td><input class="col2" type="text" name='article_issn'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Page Start:</span><br/></td>
                	<td><input class="col2" type="text" name='article_pagestart'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Page End:</span><br/></td>
                	<td><input class="col2" type="text" name='article_pageend'></td>
                 </tr>
                 
            </table>
        </fieldset>
        </center>
        
        <center>
    	<fieldset class='fieldset1 hideme' id='fieldset_book'>
        	<legend>BOOK</legend>
            <table> 
                <tr>
                	<td><span  class="col1" class="labelling">Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="book_title" id='title'></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Source:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="book_source" id='stitle'></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" name='book_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" name='book_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" type="text" name='book_publisher'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" name='book_language' value="English"></td>
                 </tr>
                <tr>
                	<td><span  class="col1" class="labelling clearme">ISBN:</span><br/></td>
                	<td><input class="col2" type="text" name='book_isbn'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Total Pages:</span><br/></td>
                	<td><input class="col2" type="text" name='book_pages'></td>
                 </tr>
                 
            </table>
        </fieldset>
        </center>
        
        
        <center>
    	<fieldset class='fieldset1 hideme' id='fieldset_book_chap'>
        	<legend>BOOK CHAPTER</legend>
            <table> 
                <tr>
                	<td><span  class="col1" class="labelling">Chapter Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="book_chap_title" id='title'></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Book Title:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="book_chap_source" id='stitle'></textarea></td>
                 </tr>
                 
                 <tr>
                    <td><span  class="col1" class="labelling">Book Editor:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="book_chap_editor" id='stitle'></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_publisher'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_language' value="English"></td>
                 </tr>
                <tr>
                	<td><span  class="col1" class="labelling clearme">ISBN:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_isbn'></td>
                 </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Pages Start:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_start'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Page End:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_end'></td>
                </tr>
                 
            </table>
        </fieldset>
        </center>
        
        <center>
    	<fieldset class='fieldset1 hideme' id='fieldset_conf'>
        	<legend>CONFERENCE PAPER</legend>
            <table> 
            	<tr>
                	<td><span  class="col1" class="labelling">Paper Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="conf_title" id='title'></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Organiser:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="conf_source" id='stitle'></textarea></td>
                 </tr>
                  
                 <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" name='conf_year'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" name='conf_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" value="English" type="text" name='conf_language'></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Name:</span><br/></td>
                	<td><input class="col2" type="text" name='conf_name'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Date:</span><br/></td>
                	<td><input class="col2" type="text" name='conf_date'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Location:</span><br/></td>
                	<td><input class="col2" type="text" name='conf_loc'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Detail:</span><br/></td>
                	<td><textarea class="col2" type="text" name='conf_detail' id='title'name='conf_det'></textarea></td>
                </tr>
                 
                 
            </table>
        </fieldset>
        </center>
        
        
        
        <center>
    	<fieldset class='fieldset1 hideme' id='fieldset_misc'>
        	<legend>MISC</legend>
            <table> 
                <tr>
                	<td><span  class="col1" class="labelling">Title of Document:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="misc_title" id='title'></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Source:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="misc_source" id='stitle'></textarea></td>
                 </tr>
                 
                 <tr>
                    <td><span  class="col1" class="labelling">Publisher</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="misc_publisher" id='stitle'></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" name='misc_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" name='misc_language' value="English"></td>
                 </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Pages Start:</span><br/></td>
                	<td><input class="col2" type="text" name='misc_start'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Page End:</span><br/></td>
                	<td><input class="col2" type="text" name='misc_end'></td>
                </tr>
                 
            </table>
        </fieldset>
        </center>
        
        
        
        <center>
    	<fieldset class='fieldset1' id='fieldset_more'>
        	<legend>More Info ...</legend>
            <table>
            	<tr>
                	<td><span  class="col1" class="labelling">Abstract:</span></td>
                	<td><textarea class="col2 abs_idx" name='abstract'></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Indexed Keywords:</span></td>
                    <td><textarea class="col2 abs_idx" name="idx_keyword" ></textarea></td
                 ></tr>
                   
            </table>
        </fieldset>
        </center>
        <center>
 		<input type="submit" value="SUBMIT" id='submit'/>
		</center>
    </form>
</body>