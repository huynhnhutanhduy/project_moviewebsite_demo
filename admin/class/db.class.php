<?php
class db{
	public $conn = null;
	public $n;//số dòng
	function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost; dbname=aecaychuoi", "root", "");
		$this->conn->query("set names 'utf8' ");	
	}
	
	function selectQuery($sql, $arr= array())
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		$this->n = $stm->rowCount();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function updateQuery($sql, $arr= array())
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		$this->n = $stm->rowCount();
		return $this->n;
	}
	
	
}
//--------
