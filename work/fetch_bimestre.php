<?php

//fetch.php

$api_url = "http://localhost/grupo2/api/test_api_bimestre.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->bimestre.'</td>
		
			<td><button type="button" name="edit" class="btn btn-success btn-raised btn-xs edit" id="'.$row->id_bimestre.'"><i class="zmdi zmdi-refresh"></button></td>
			<td><button type="button" name="delete" class="btn  btn-danger btn-raised btn-xs delete" id="'.$row->id_bimestre.'"><i class="zmdi zmdi-delete"></button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="7" align="center">No Data Found</td>
	</tr>
	';
}
echo 'hola ';
echo $output;

?>