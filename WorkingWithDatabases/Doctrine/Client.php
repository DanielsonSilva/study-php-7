<?php 
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 */
class Client {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id_client;
	
	/** @ORM\Column(type="string", length=45) */
	private $name;
	
	/** @ORM\Column(type="string", length=100) */
	private $address;
	
	/** @ORM\Column(type="integer") */
	private $age;
	
	/** @ORM\Column(type="integer") */
	private $gender;
	
	/** @ORM\Column(type="integer") */
	private $document_id;
	
	/** @ORM\Column(type="string", length=15) */
	private $telephone;
	
	/** @ORM\Column(type="string", length=15) */
	private $mobile_fone;
}
?>