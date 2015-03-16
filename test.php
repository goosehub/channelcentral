<?php

function getDurationSeconds($duration){
    preg_match_all('/[0-9]+[HMS]/',$duration,$matches);
    $duration=0;
    foreach($matches as $match){
        //echo '<br> ========= <br>';       
        //print_r($match);      
        foreach($match as $portion){        
            $unite=substr($portion,strlen($portion)-1);
            switch($unite){
                case 'H':{  
                    $duration +=    substr($portion,0,strlen($portion)-1)*60*60;            
                }break;             
                case 'M':{                  
                    $duration +=substr($portion,0,strlen($portion)-1)*60;           
                }break;             
                case 'S':{                  
                    $duration +=    substr($portion,0,strlen($portion)-1);          
                }break;
            }
        }
    }
     return $duration;
}

$youtube_id = "jadvt7CbH1o";
$api_key = "AIzaSyD_lT8RkN6KffGEfJ3xBcBgn2VZga-a05I";
$url = "https://www.googleapis.com/youtube/v3/videos?id=" . $youtube_id . "&key=" . $api_key . "%20&part=snippet,contentDetails,statistics,status";
$json = file_get_contents($url); 
$data = json_decode($json);
$public = $data->items;
if (! $public)
{
	echo 'Private';
}
else
{
	$status = $data->items[0]->status;
	$embeddable = $data->items[0]->status->embeddable;
	if (!$embeddable)
	{
		echo 'Not allowed';
	}
	else
	{
		$duration = $data->items[0]->contentDetails->duration;
		$duration = getDurationSeconds($duration);
	}
}

?>