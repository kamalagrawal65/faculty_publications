<head>
<title>Edit Requests</title>
</head>
<link rel="stylesheet" href="css/form.css">
<style>
	textarea{
		text-align:left;
		padding-left:0px;
	}
</style>
<form method="post" action="includes/final-verified.php">
    	<center>
    	<fieldset class='fieldset1'>
        	<legend>AUTHORS</legend>
            <table>
            	
              <tr id='auth'>
                	<td><span  class="col1" class="labelling">Authors:</span><br/></td>
                	<td><textarea class="col2" id='author_ta' rows=5 cols=60 name='author'><?php echo $author; ?></textarea></td>
              </tr>
                
            </table>
            
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
                        	<option <?php if($school == 'SBS'){echo("selected");}?> value='SBS'>SBS</option>
                            <option <?php if($school == 'SCEE'){echo("selected");}?> value='SCEE'>SCEE</option>
                            <option <?php if($school == 'HSS'){echo("selected");}?> value='HSS'>HSS</option>
                            <option <?php if($school == 'SE'){echo("selected");}?> value='SE'>SE</option>
                            <option <?php if($school == 'Interdisciplinary'){echo("selected");}?> value='Interdisciplinary'>Interdisciplinary</option>
                        </select>
                    </td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Document:</span><br/></td>
                	<td>
                    	<select id='doc' name="document" class="col2 dropdown">
                        	<option <?php if($document == 'Article'){echo("selected");}?> value='Article'>Article</option>
                            <option <?php if($document == 'Book'){echo("selected");}?> value='Book'>Book</option>
                            <option <?php if($document == 'Book Chapter'){echo("selected");}?> value='book_chapter'>Book Chapter</option>
                            <option <?php if($document == 'Conference Paper'){echo("selected");}?> value='conference_paper'>Conference Paper</option>
                            <option <?php if($document == 'Misc'){echo("selected");}?> value='Misc'>Misc</option>
                        </select>
                    </td>
                 </tr>
                
            </table>
        </fieldset>
        </center>
        
<?php	
		if($document=='Article'){
?>
		<center>
    	<fieldset class='fieldset1 hideme' id='fieldset_article'>
        	<legend>ARTICLE</legend>
            <table> 
            	<tr>
                	<td><span  class="col1" class="labelling">Title:</span></td>
  					<td><textarea class="col2" rows=5 cols=60 name="article_title" id='title'><?php echo $title; ?></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Source/Journal Name:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="article_source" id='stitle'><?php echo $source; ?></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" value='<?php echo $year; ?>' name='article_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" value='<?php echo $subject; ?>' name='article_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" value='<?php echo $publisher; ?>' type="text" name='article_publisher'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" name='article_language' value="<?php echo $language ?>"></td>
                 </tr>
                <tr>
                	<td><span class="col1" class="labelling clearme">Volume:</span><br/></td>
                	<td><input value="<?php echo $volume; ?>" class="col2" type="text" name='article_volume'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Issue:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $issue; ?>" name='article_issue'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">ISSN:</span><br/></td>
                	<td><input class="col2" value="<?php echo $issn; ?>" type="text" name='article_issn'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Page Start:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $page_start; ?>" name='article_pagestart'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Page End:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $page_end; ?>" name='article_pageend'></td>
                 </tr>
                 
            </table>
        </fieldset>
        </center>
<?php
		}
		else if($document=='Book'){
?>
		<center>
    	<fieldset class='fieldset1 hideme' id='fieldset_book'>
        	<legend>BOOK</legend>
            <table> 
                <tr>
                	<td><span  class="col1" class="labelling">Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="book_title" id='title'><?php echo $title; ?></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Source:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="book_source" id='stitle'><?php echo $source; ?></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" value="<?php echo $year; ?>" type="text" name='book_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $subject; ?>" name='book_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input value="<?php echo $publisher; ?>" class="col2" type="text" name='book_publisher'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" value="<?php echo $language; ?>" type="text" name='book_language' value="English"></td>
                 </tr>
                <tr>
                	<td><span  class="col1" class="labelling clearme">ISBN:</span><br/></td>
                	<td><input class="col2" value="<?php echo $isbn; ?>" type="text" name='book_isbn'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling clearme">Total Pages:</span><br/></td>
                	<td><input class="col2" value="<?php echo $pages; ?>" type="text" name='book_pages'></td>
                 </tr>
                 
            </table>
        </fieldset>
        </center>
<?php
		}
		else if($document=='Book Chapter'){	
?>

		<center>
    	<fieldset class='fieldset1 hideme' id='fieldset_book_chap'>
        	<legend>BOOK CHAPTER</legend>
            <table> 
                <tr>
                	<td><span  class="col1" class="labelling">Chapter Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="book_chap_title" id='title'><?php echo $title; ?></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Book Title:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="book_chap_source" id='stitle'><?php echo $source; ?></textarea></td>
                 </tr>
                 
                 <tr>
                    <td><span  class="col1" class="labelling">Book Editor:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="book_chap_editor" id='stitle'><?php echo $book_editor; ?></textarea></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input value="<?php echo $year; ?>" class="col2" type="text" name='book_chap_year'></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $subject; ?>" name='book_chap_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $publisher; ?>" name='book_chap_publisher'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $language; ?>" name='book_chap_language' value="English"></td>
                 </tr>
                <tr>
                	<td><span  class="col1" class="labelling clearme">ISBN:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $isbn; ?>" name='book_chap_isbn'></td>
                 </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Pages Start:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $page_start; ?>" name='book_chap_start'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Page End:</span><br/></td>
                	<td><input class="col2" type="text" name='book_chap_end' value="<?php echo $page_end; ?>"></td>
                </tr>
                 
            </table>
            
        </fieldset>
        </center>
<?php
	}
	else if($document=='Conference Paper'){
		
?>
	<center>
    	<fieldset class='fieldset1 hideme' id='fieldset_conf'>
        	<legend>CONFERENCE PAPER</legend>
            <table> 
            	<tr>
                	<td><span  class="col1" class="labelling">Paper Title:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="conf_title" id='title'><?php echo $title; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Organiser:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="conf_source" id='stitle'><?php echo $source; ?></textarea></td>
                 </tr>
                  
                 <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" value="<?php echo $year; ?>" type="text" name='conf_year'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Subject:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $subject; ?>" name='conf_subject'></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" value="English" type="text" value="<?php echo $language; ?>" name='conf_language'></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Name:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $conf_name; ?>" name='conf_name'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Date:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $conf_date; ?>" name='conf_date'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Location:</span><br/></td>
                	<td><input class="col2" type="text" <?php echo $conf_loc; ?> name='conf_loc'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Conference Detail:</span><br/></td>
                	<td><textarea class="col2" type="text" name='conf_detail' id='title'name='conf_det'><?php echo $conf_det; ?></textarea></td>
                </tr>
                 
                 
            </table>
        </fieldset>
        </center>

<?php
	}
	else if($document=='Misc'){
	
?>
	<center>
    	<fieldset class='fieldset1 hideme' id='fieldset_misc'>
        	<legend>MISC</legend>
            <table> 
                <tr>
                	<td><span  class="col1" class="labelling">Title of Document:</span></td>
                	<td><textarea class="col2" rows=5 cols=60 name="misc_title" id='title'><?php echo $title; ?></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Source:</span></td>
                    <td><textarea class="col2 textareas" rows=5 cols=60 name="misc_source" id='stitle'><?php echo $source; ?></textarea></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Publisher:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $publisher; ?>" name='misc_publisher'></td>
                 </tr>
                 
                <tr>
                	<td><span  class="col1" class="labelling">Year:</span><br/></td>
                	<td><input class="col2" type="text" name='misc_year' value="<?php echo $year; ?>"></td>
                 </tr>
                 
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Language:</span><br/></td>
                	<td><input class="col2" type="text" name='misc_language' value="<?php echo $language; ?>"></td>
                 </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Pages Start:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $page_start; ?>" name='misc_start'></td>
                </tr>
                
                <tr>
                	<td><span  class="col1" class="labelling clearme">Page End:</span><br/></td>
                	<td><input class="col2" type="text" value="<?php echo $page_end; ?>" name='misc_end'></td>
                </tr>
                 
            </table>
        </fieldset>
        </center>

<?php	
	}
?>
	<center>
    	<fieldset class='fieldset1' id='fieldset_more'>
        	<legend>More Info ...</legend>
            <table>
            	<tr>
                	<td><span  class="col1" class="labelling">Abstract:</span></td>
                	<td><textarea class="col2 abs_idx" name='abstract'><?php echo $abstract; ?></textarea></td>
                </tr>
                <tr>
                    <td><span  class="col1" class="labelling">Indexed Keywords:</span></td>
                    <td><textarea class="col2 abs_idx" name="idx_keyword" ><?php echo $keyword; ?></textarea></td
                 ></tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">DOI:</span><br/></td>
                	<td><input class="col2" type="text" name='doi' value='<?php echo $doi; ?>'></input></td>
                 </tr>
                 
                 <tr>
                	<td><span  class="col1" class="labelling">Access Type:</span><br/></td>
                	<td><input class="col2" type="text" name='access_type' value='<?php echo $access_type; ?>'></input></td>
                 </tr>
         		          
            </table>
        </fieldset>
        <input type="hidden" value="<?php echo $_GET['record']; ?>" name='record' />
        </center>
        
        <center>
 		<input type="submit" value="SUBMIT" id='submit'/>
		</center>

	</form>