<?php

// -------------------------- Conexão ------------------------------------
/**
 * Função para conexao com baco de dados
 *
 * @param array $config        	
 */
function conectar($config) {
	return pg_connect("
			host={$config['host']} 
			user={$config['user']} 
			password={$config['password']} 
			dbname={$config['dbname']}");
}

// --------------------------- INSERT--------------------------------------
/**
 * Funçao para inserir registros em uma tablea
 *
 * @param string $tabela  - nome da tabela 
 * @param array $dados  - campos e valores da tabela separados por virgula
 */
function inserir($tabela, $dados)
{
	foreach ( $dados as $campo => $valor) {
		$campos[] = $campo;
		$valores[] ="'$valor'";
	}
	$campos  = implode(',',$campos);
	$valores = implode(',',$valores);

	// INSERT INTO tabela (campos) VALUES valores
	$query = "INSERT INTO $tabela($campos) VALUES($valores)";

	return pg_query ( $query );

}
// --------------------------- UPDATE ------------------------------------
/**
 * Função para alterar um registro da tabela
 *
 * @param string $tabela        	
 * @param array $dados        	
 * @param string $where - (CAMPO = VALOR)
 */
function alterar($tabela, $dados, $where) {
	foreach ( $dados as $campo => $valor ) {
		$sets [] = "$campo='$valor'";
	}
	
	$sets = implode ( ', ', $sets );
	// UPDATE TABELA SET CAMPO = VALOR WHERE CONDIÇÂO
	$query = "UPDATE $tabela SET $sets WHERE $where";
	
	return pg_query($query);
}

// --------------------------- SELECT -------------------------------------
/**
 * Função para listar dados
 *
 * @param string $table  - Tabela na qual a ação sera realizada
 * @param string $campos - Campos que serão buscados
 * @param string $where  - Condição para a busca
 * @param string $order  - Organização dos resultados
 */
function listar($table, $campos = '*', $where = null, $order = null) {
	// SELECT campos FROM tabela WHERE condiçao ORDER BY ordem
	$query = "SELECT $campos FROM $table";
	
	if ($where) {
		
		$query .= " WHERE $where";
	}
	
	if ($order) {
		
		$query .= " ORDER BY $order";
	}
	
	$result = pg_query ( $query );
	return pg_fetch_all ( $result );
}
/**
 *
 * @param string $table        	
 * @param string $where        	
 * @param string $campos        	
 */
function buscaRegistro($table, $where, $campos = '*') {
	// SELECT * FROM tabela WHERE condicao
	$query = "SELECT $campos FROM $table WHERE $where";
	
	$result = pg_query ( $query );
	
	return pg_fetch_assoc ( $result );
}

// ---------------------------- DELETE ----------------------------------
/**
 * Funçao para excluir registros
 *
 * @param string $tabela - Tabela onde sera realizada a ação
 * @param string $where  - Condição para a ação
 */
function excluir($tabela, $where) {
	// DELETE FROM tabela WHERE condicao;
	$query = "DELETE FROM $tabela WHERE $where";
	
	return pg_query ( $query );
}

