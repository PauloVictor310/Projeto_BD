<?php
	
	include_once("conexao.php");
	$html = "";
	
	$result = "SELECT * FROM Time order by nome";
	$resultado = pg_query($con, $result);
	while($row = pg_fetch_assoc($resultado)){
		$html .= "Nome: ".$row['nome'] . "<br>";
		$html .= "Cidade: ".$row['cidade'] . "<br>";
		$html .= "Estado: ".$row['estado'] . "<br>";
		$html .= "País: ".$row['pais'] . "<br>";
		$html .= "Data de Criação: ".$row['data_criacao'] . "<br>";
		$html .= "Esporte: ".$row['esporte'] . "<br>";
		$html .= "Modalidade: ".$row['modalidade'] . "<br>";
		$html .= "Caixa: ".$row['caixa'] . "<hr>";
		
	}
	
	use Dompdf\Dompdf;
	require_once 'dompdf/autoload.inc.php';
	
	$pdf = new DOMPDF();
	
	$pdf->load_html('
		<h1 style="text-align: center">Relatório de Times</h1>
		'. $html .'
	');
	
	$pdf->render();
	$pdf->stream(
		"relatorio-times.pdf",
		array(
			"Attachment" => false
		)
	);
?>