<?php
    $username = "thinkcolorful"; 
    $password = "2class12isok";   
    $host = "localhost";
    $database="thinkcolorful";
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
	
    //select all ip addresses that start with 100.
    $myquery = "SELECT `ID` FROM `tc_users` WHERE 1";
    $query = mysql_query($myquery);
    
    if ( ! $query ) {
        echo mysql_error();
        die;
    }
    
    $data = array();

	echo "var id = [";
    // we start up a for loop that goes from 0 ($x = 0;) to the number of returned rows in our query ($x < mysql_num_rows($query)) one step at a time ($x++)
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        //place our rows into our $data array
	    $data[] = mysql_fetch_assoc($query);
		//echo each row ip value enclosed by square brackets and separated by a comma;
        echo $data[$x]['ID'];
		//we don’t want a comma after the last ip address
        if ($x <= (mysql_num_rows($query)-2) ) {
			echo ",";
		}
    }
    
    	echo "];";
     
    mysql_close($server);
?>