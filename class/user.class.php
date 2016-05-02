<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author rosay
 */
class cUser {

	private $bValid = false;
	private $sLogin = "";
	private $sPassword = "";
	private $iId = 0;
	private $sName = "";
	private $sFirstName = "";
	private $sTheme = "";
	private $sDescr = "";
	private $sProfilPic = "";
	private $sRights = "";
	private $sLang = "";

	public function __construct($sLogin, $sPassword) {
		$this->sLogin = $sLogin;
		$this->sPassword = $sPassword;

		if ($this->fVerifyUser()) {
			$this->fLoadUserInfos();
		}
	}

	private function fVerifyUser() {
		global $oMysql;
		$sSqlVerify = "SELECT `id` FROM `".DB_USER."` WHERE `login` = '" . $this->sLogin . "' AND `password` = '" . $this->sPassword . "'";
		$oMysql->query($sSqlVerify);

		if ($oMysql->rcount() > 0) {
			$aSql = $oMysql->fetch();
			$this->bValid = true;
			$this->iId = $aSql[0]['id'];
		}

		return $this->bValid;
	}

	private function fLoadUserInfos() {
		global $oMysql;
		$sSqlSelect = "SELECT `id`, `name`, `firstname`, `theme`, `descr`, `profilpic`, `rights`, `lang` FROM `".DB_USER."` WHERE `id` = '" . $this->iId . "'";
		$oMysql->query($sSqlSelect);

		$aSql = $oMysql->fetch();

		$this->sName = $aSql[0]['name'];
		$this->sFirstName = $aSql[0]['firstname'];
		$this->iBirthdate = $aSql[0]['birthdate'];
		$this->sTheme = $aSql[0]['theme'];
		$this->sDescr = $aSql[0]['descr'];
		$this->sProfilPic = $aSql[0]['profilpic'];
		$this->sRights = $aSql[0]['rights'];
		$this->sLang = $aSql[0]['lang'];
	}

	public function fGetUserInfos($sInfo = null) {
		if (is_null($sInfo)) {
			return array(
				"Name" => $this->sName,
				"Firstname" => $this->sFirstName,
				"Theme" => $this->sTheme,
				"Descr" => $this->sDescr,
				"ProfilePic" => $this->sProfilPic,
				"Rights" => $this->sRights,
				"Lang" => $this->sLang,
				"Login" => $this->sLogin,
				"id" => $this->iId
			);
		} else {
			return $this->$sInfo;
		}
	}

	/*
	 *
	 * LOADING ALL USERS / BY REQUEST
	 *
	 */

	public static function fGetUsers(&$rSqlRessource) {
		global $oMysql;
		# If $rSqlRessource is empty, we didn't start the request
		if (empty($rSqlRessource)) {
			$sSqlSelect = "SELECT `login`, `password` FROM `".DB_USER."`";
			$rSqlRessource = $oMysql->query($sSqlSelect);
		}

		# We have the ressource, let's extract users
		if ($aData = $oMysql->fetchOne($rSqlRessource)) {
			# Return a new album object
			return new cUser($aData['login'], $aData['password']);
		}

		# We reached the end. Let's kill the loop.
		return false;
	}

	public static function fGetUserById($iId) {
		global $oMysql;

		$sSqlSelect = "SELECT `login`, `password` FROM `".DB_USER."` WHERE `id` = '" . $iId . "'";
		$rSqlRessource = $oMysql->query($sSqlSelect);
		$aSql = $oMysql->fetch();

		return new cUser($aSql[0]['login'], $aSql[0]['password']);
	}

}
