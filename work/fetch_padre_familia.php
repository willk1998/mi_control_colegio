<?php

//fetch.php

$api_url = "http://localhost/grupo2/api/test_api_padre_familia.php?action=fetch_all";

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
			<td>'.$row->nombre.'</td>
			<td>'.$row->ap_pt.'</td>
			<td>'.$row->ap_mt.'</td>
			<td>'.$row->cargo.'</td>
			<td>'.$row->ci.'</td>
			<td>'.$row->password.'</td>
			<td>'.$row->direccion.'</td>
			<td>'.$row->celular.'</td>
			<td>'.$row->fecha.'</td>
			<td>'.$row->foto.'</td>
			<td><button type="button" name="edit" class="btn btn-success btn-raised btn-xs edit" id="'.$row->id_padre.'"><i class="zmdi zmdi-refresh"></button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-raised btn-xs delete" id="'.$row->id_padre.'"><i class="zmdi zmdi-delete"></i></button></td>
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

echo $output;

?>