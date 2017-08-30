<?php

require_once 'ConnectDB.php';

class Contact extends ConnectDB {

	public function getAllContacts() {
		return $this->conn->query("SELECT * FROM contacts")->fetchAll();
	}

	public function getContact($id) {
		$q = $this->conn->prepare("SELECT * FROM contacts WHERE id=?");
		$q->execute( array($id) );
		return $q->fetch();
	}

	public function add($post)
	{
		$q = $this->conn->prepare("INSERT INTO contacts (nama, telepon, email, alamat) VALUES (?,?,?,?)");
		$q->execute( array($post['nama'],$post['telepon'],$post['email'],$post['alamat']) );
		return $q->rowCount();
	}

	public function edit($post,$id)
	{
		$q = $this->conn->prepare("UPDATE contacts SET nama=?,telepon=?,email=?,alamat=? WHERE id=?");
		$q->execute( array($post['nama'],$post['telepon'],$post['email'],$post['alamat'],$id) );
		return $q->rowCount();
	}

	public function delete($id)
	{
		$q = $this->conn->prepare("DELETE FROM contacts WHERE id = ?");
		$q->execute( array($id) );
		return $q->rowCount();
	}
}