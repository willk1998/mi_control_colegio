<?php

//fetch.php

$api_url = "http://localhost/mi_control_colegio/api/test_api_profesor.php?action=fetch_all";

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
			<td>'.$row->papellido.'</td>
			<td>'.$row->sapellido.'</td>
			<td>'.$row->direccion.'</td>
			<td>'.$row->telefono.'</td>
			<td>'.$row->celular.'</td>
            <td>'.$row->dni.'</td>
            <td>'.$row->email.'</td>
           
			<td><button type="button" name="edit" class="btn btn-success btn-raised btn-xs edit" id="'.$row->id_persona.'"><i class="zmdi zmdi-refresh"></button></td>
			<td><button type="button" name="delete" class="btn  btn-danger btn-raised btn-xs delete" id="'.$row->id_persona.'"><i class="zmdi zmdi-delete"></button></td>
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