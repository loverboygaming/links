<?php
include('simple_html_dom.php');
$muni= $_POST['link'];
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
  "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
);  

$html = file_get_html($muni, false, stream_context_create($arrContextOptions));

echo('<br><br><h3 style="color:red;">links in these page:<h3><br><br>');
echo'<html>
      <body>
        <table>
          <tr>
           <td style="width:400px;text-align: center;padding:10px;color:red;border:2px solid lightgreen;">links</td>
            <td style="width:100px;text-align: center;color:red;padding:10px;border:2px solid lightgreen;">class names</td>
          </tr>';
foreach($html->find('a') as $element){
       echo '<tr style="width:500px;border:2px solid green;">';
       echo '<td style="width:400px;border:2px solid green;padding:8px;">'.$element->href. '</td>';
       echo '<td style="width:100px;text-align: center;padding:10px;border:2px solid green;">'.$element->class.'</td>';
       echo '</tr>';
}
echo'</table></body></html>';
?>
