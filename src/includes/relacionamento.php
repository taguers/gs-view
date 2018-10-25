<?php

include_once 'funcoes.php';

conectar();

$pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$data = $_REQUEST;
if (isset($data['page'])) {
    unset($data['page']);
}

$query = http_build_query($data);
if ($conn) {
    $termo = '';
    if (isset($_GET['termo']) and !empty($_GET['termo'])) {
        $trm = $_GET['termo'];
        $coluna = $_GET['coluna'];
        $tipo = $_GET['tipo'];
        $termo = " and (consultor like '%$trm%' OR cliente like '%$trm%' OR codigo like '%$trm%' OR contato like '%$trm%' OR conteudo like '%$trm%') order by $coluna $tipo";
    } else {
        $coluna = isset($_GET['coluna']) ? $_GET['coluna'] : 'datainclusao';
        $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'desc';
        $termo = " order by $coluna $tipo";
    }

    $base = "WITH Paginado AS (
		SELECT ROW_NUMBER() OVER(ORDER BY id ASC) AS linha, tbPesquisasRelacionamento.* FROM tbPesquisasRelacionamento)
		SELECT TOP ( $porPagina) Paginado.* FROM Paginado";
    $sql = "$base WHERE linha >  $porPagina * ($pagina_atual - 1) $termo ";
    $stmt = consultar($sql);

    $base = "$base $termo ";
    $base = str_replace("TOP ( $porPagina) Paginado.*", "count(*) as total ", $base);
    $base = str_replace(" and ", " where ", $base);
    $base = explode("order by", $base);
    $total = consultar($base[0]);
    $total = sqlsrv_fetch_array($total, SQLSRV_FETCH_ASSOC);
    $qtdLinha = $total['total'];
} else {
    echo "Infelizmente nao foi possivel se conectar a base de dados";
    dd(sqlsrv_errors(), true);
}

var_dump($total);
