<?php

class table extends sheet{

	public static function get()
    {
    	$row=1;
    	if (($handle=fopen($_GET['filename'], "r")) !==false)
    	{
    		echo '<table border="1">';
    		while(($info=fgetcsv($handle,1500,",")) !==false)
    		{
    			$num=count($info);
    			if ($row == 1)
    			{
    				echo'<thead><tr>';
    			}
    			else
    			{
    				echo '<tr>';
    			}

    			for ($c=0; $c<$num; $c++)
    			{
    				if(empty($info[$c]))
    				{
    					$output = "&nbsp;";
    				}
    				else
    				{
    					$output = $info[$c];
    				}
    				if ($row ==1)
    				{
    					echo '<th>'.$output.'</th>';
    				}
    				else
    				{
    					echo '<td>'.$output.'</td>';
    				}
    			}
    			    
    			    if ($row == 1)
    			    {
    				    echo '</tr></thead><tbody>';
    			    }
    			    else
    			    {
    				    echo '</tr>';
    			    }
                    $row++;
    		    }
    		        echo '</tbody></table>';
    	            fclose($handle);
    	    }
        }
    }