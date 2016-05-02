<?php

/**
 * MYSQL
 * mysql.class.php
 *
 * --------------------
 * Author:		DIM @ 23.06.2014
 * MODIFICATION LIST:
 *
 * DIM 23.06.2014 : Version Mysqli de la classe Mysql 2013.
 * */
class cMysqli {

	public $host;   // SQL HOST
	public $user;   // SQL USER
	public $password;  // SQL PASSWORD
	public $database;  // SQL DATABASE
	public $oMysqli;  // Object mysqli
	public $res;   // mysql_query ressource

	function __construct($aConfig = null) {
		$this->setConfig($aConfig);
	}

	/**
	 * setConfig
	 */
	public function setConfig($aConfig) {
		(isset($aConfig['host']) ? $this->host = $aConfig['host'] : null);
		(isset($aConfig['user']) ? $this->user = $aConfig['user'] : null);
		(isset($aConfig['password']) ? $this->password = $aConfig['password'] : null);
		(isset($aConfig['database']) ? $this->database = $aConfig['database'] : null);
	}

	/**
	 * connect
	 */
	public function connect() {
		$this->oMysqli = new mysqli($this->host, $this->user, $this->password, $this->database);

		if (mysqli_connect_errno()) {
			die("Failed to connect to MySQL : " . mysqli_connect_error());
		}
	}

	/**
	 * query
	 */
	public function query($sSqlQuery) {
		$this->res = mysqli_query($this->oMysqli, $sSqlQuery) or die("Mysql error (" . mysqli_errno($this->oMysqli) . "): " . mysqli_error($this->oMysqli));
		return $this->res;
	}

	/**
	 * multiple query
	 */
	public function multiQuery($sSqlQuery) {
		$aRet = array();
		$sRes = '';
		$i = 0;

		# exécute les requêtes
		mysqli_multi_query($this->oMysqli, $sSqlQuery) or die("Mysql error on query #1: " . mysqli_error($this->oMysqli));

		# Pour chaque requête
		do {
			# fetch si une ressource est retournée
			if ($sRes = mysqli_store_result($this->oMysqli)) {
				$aRet[$i] = $this->fetch($sRes);

				mysqli_free_result($sRes);
			} else {
				$aRet[$i] = 'Ok';
			}

			$i++;
		} while (mysqli_next_result($this->oMysqli));

		# si une erreur est survenue
		$sError = mysqli_error($this->oMysqli);
		if (!empty($sError)) {
			die("Mysql error on query #" . (1 + $i) . " : $sError");
		}

		# renvoie un tableau contenant les résultats de chaque requête
		return $aRet;
	}

	/**
	 * error
	 */
	public function error() {
		return mysqli_error($this->oMysqli);
	}

	/**
	 * rcount
	 */
	public function rcount($res = null) {
		$i = mysqli_num_rows(($res != null ? $res : $this->res));
		return $i;
	}

	/**
	 * str_escape
	 */
	public function str_escape($s) {
		$s = mysqli_real_escape_string($this->oMysqli, $s);
		return $s;
	}

	/**
	 * lastId
	 */
	public function insertId() {
		$id = mysqli_insert_id($this->oMysqli);
		return $id;
	}

	/**
	 * affectedRows
	 */
	public function affectedRows() {
		$nbRows = mysqli_affected_rows($this->oMysqli);
		return $nbRows;
	}

	/**
	 * fetch
	 */
	public function fetch($res = null) {
		$aRet = array();
		while ($a = mysqli_fetch_assoc(($res != null ? $res : $this->res))) {
			$aRet[] = $a;
		}
		return $aRet;
	}

	public function fetchOne($res = null) {
		$a = mysqli_fetch_assoc(($res != null ? $res : $this->res));

		return $a;
	}

}

// End of class
?>