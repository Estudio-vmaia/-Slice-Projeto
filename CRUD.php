<?php
	
	include('conn_db.php');

	$acao = @$_GET['acao'];

	$imagem = rand(1, 5);

	$tableMySql = 'tb_veiculos';

	$QRY = '';

	${"array_DB_" . $tableMySql} = array();

		//Busca campos na tabela
		$busca_table = "SHOW FULL COLUMNS FROM ".$tableMySql;
	    $result_table = mysqli_query($conn, $busca_table) or die ("Erro 0x00110-SQLMaster - ".mysqli_error($conn)); 
	    $cont_rows_table = 0;

	    while($row_table = mysqli_fetch_array($result_table))
	    {
		    $SQL_Field		= $row_table['Field'];
		    $SQL_Type		= $row_table['Type'];
		    $SQL_Collation  = $row_table['Collation'];
		    $SQL_Null     	= $row_table['Null'];
		    $SQL_Key 		= $row_table['Key'];
		    $SQL_Default 	= $row_table['Default'];
		    $SQL_Extra 		= $row_table['Extra'];
		    $SQL_Privileges	= $row_table['Privileges'];
		    $SQL_Comment 	= $row_table['Comment'];

		    if($SQL_Field != 'ativo' && $SQL_Field != 'imagem')
			{
		   		${"array_DB_" . $tableMySql}[$SQL_Field] = $SQL_Field;
		   	}
	   
		    $cont_rows_table += 1;	   
		}


		//Lista os campos do POST e verifica se contem dados
		foreach (${"array_DB_" . $tableMySql} as $key => $value)
		{
			if (isset($_POST[$value]))
			{
				${$value} = $_POST[$value];
			}
		}

	//-----------------------------------------------

	if($acao == 'cadastrar')
	{			
		$QRY = ' INSERT '.$tableMySql;
		$QRY .= ' SET '; 

		foreach (${"array_DB_" . $tableMySql} as $key => $value)
		{
			if($value != 'id')
			{
				$QRY .= $value." = '".${$value}."', ";			
			}
		}

		$QRY .= "imagem = '".$imagem.".jpg', "; 
		$QRY .= "ativo = '1' "; 
	
		print $QRY;

	}

	//-----------------------------------------------

	if($acao == 'editar')
	{
		$id = @$_GET['id'];
		
		if($id == '')
		{
			$id = $_POST['idDelEdit'];

			$QRY = ' UPDATE '.$tableMySql;
			$QRY .= ' SET ';
			
			foreach (${"array_DB_" . $tableMySql} as $key => $value)
			{
				if($value != 'id')
				{
					$QRY .= $value." = '".${$value}."', ";			
				}
			}

			$QRY .= "ativo = '1' "; 			
			$QRY .= ' WHERE id = '.$id;
		}

	    $busca_veiculos = "select * from tb_veiculos where id = ".$id;

	    $result_veiculos = mysqli_query($conn, $busca_veiculos) or die ("Erro 0x00110-Veiculos - ".mysqli_error($conn)); 
	    $cont_rows_table = 0;

	    while($row_veiculos = mysqli_fetch_array($result_veiculos))
	    {	
	    	foreach (${"array_DB_" . $tableMySql} as $key => $value)
			{
				if($value != 'id')
				{
					${"db_".$value} = $row_veiculos[$value];
					//array_push($return_arr, $value, ${"db_".$value});				
					$return_arr[$value] = ${"db_".$value};
				}
			}

		}

		echo json_encode($return_arr);
	}


	//-----------------------------------------------

	if($acao == 'deletar')
	{	
		$QRY = ' DELETE FROM '.$tableMySql;
		$QRY .= ' WHERE id = '.$_POST['idDelEdit'];
	}

	//print $QRY;
	if($acao != '' && $QRY != '' )
	{
		$result_DataTable = mysqli_query($conn, $QRY) or die ('Erro 0x00130 => tb_veiculos => Insert Table - '.mysqli_error($conn)); 		
	}
	


?>