<?php
require_once 'IPPCredential.php';
require_once 'PPConfigManager.php';
require_once 'exceptions/PPMissingCredentialException.php';

class PPCertificateCredential extends IPPCredential{
	
	private $certificatePath;

	private $passPhrase;

	private $subject;
	
	/**
	 * Constructs a new certificate credential object
	 * 
	 * @param string $userName	API username
	 * @param string $password	API password
	 * @param string $certPath	Path to PEM encoded client certificate file
	 * @param string $passPhrase	password need to use the certificate
	 * @param string $appId		Application Id from PayPal
	 */
	public function __construct($userName, $password, $certPath, $passPhrase, $appId, $subject="") {
		parent::__construct($userName, $password, $appId);
		$this->certificatePath = $certPath;
		$this->passPhrase = $passPhrase;
		$this->subject = $subject;
		$this->validate();
	}
	
	public function validate() {
		
		if ($this->userName == null || $this->userName == "") {
			throw new PPMissingCredentialException("username cannot be empty");
		}
		if ($this->password == null || $this->password == "") {
			throw new PPMissingCredentialException("password cannot be empty");
		}		
		if ($this->certificatePath == null || $this->certificatePath == "") {
			throw new PPMissingCredentialException("certificate cannot be empty");
		}
		if ($this->passPhrase == null || $this->passPhrase == "") {
			throw new PPMissingCredentialException("passphrase cannot be empty");
		}
		if ($this->applicationId == null || $this->applicationId == "") {
			throw new PPMissingCredentialException("applicationId cannot be empty");
		}
	}

	public function getUserName()
	{
		return $this->userName;
	}

	public function getPassword()
	{
		return $this->password;
	}
	
	public function getCertificatePath()
	{
		if (realpath($this->certificatePath))
		{
			return realpath($this->certificatePath);
		}
		else
		{
			return realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".."	. DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . $this->certificatePath);
		}
	}

	public function getPassPhrase()
	{
		return $this->passPhrase;
	}

	public function getApplicationId() {
		return $this->applicationId;
	}
	
	public function getSubject(){
		return $this->subject;
	}
}

?>