<?php

class table extends sheet{

	public static function get()
    {
    	$row=1;
    	if (($handle=fopen($_GET['filename'], "r")) !==false) // Reading and printing the content of a specific file.
    	
        {   echo '<table border="1">';
    		while(($info=fgetcsv($handle,1500,",")) !==false) // For Returning the value in an array.
    		
            {	$num=count($info);
    			if ($row == 1)
    			
                {echo'<thead><tr>';}
    			else
    			{echo '<tr>';}

    			for ($a=0; $a<$num; $a++)
    			{
    				if(empty($info[$a]))
    				{$output = "&nbsp;";} // For giving no break space.
    				else
    				{$output = $info[$a];}
    				
                    if ($row ==1)
    				{echo '<th>'.$output.'</th>';}
    				else
    				{echo '<td>'.$output.'</td>';}
    			}
    			    
    			    if ($row == 1)
    			    {echo '</tr></thead><tbody>';}
    			    else
    			    {echo '</tr>';}
                    $row++;
    		    }
    		        echo '</tbody></table>';
    	            fclose($handle); // For closing the file.
    	    }
        }
    }