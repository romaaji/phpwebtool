<?php 
$json_url = "https://nthanfp.me/api/get/instagramUserdata?apikey=NTHANFP-8EWHT5K00B&username=insideheartz";
$json = file_get_contents($json_url);
$json=str_replace('},

]',"}

]",$json);
$data = json_decode($json);

echo "<pre>";
print_r($data);
echo "</pre>";
?>