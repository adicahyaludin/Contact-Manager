<?php

require_once 'model/Contact.php';

class ContactController {

	private $contacts;

	public function __construct() {
		$this->contacts = new Contact();
	}

    public function index() {
    	$contacts = $this->contacts->getAllContacts();
    	include 'view/contact/index.php';
    }

    public function show() {
    	$contact = $this->contacts->getContact($_GET['id']);
        if (!$contact) {
            die('Page Not Found 404');    
        }
    	include 'view/contact/show.php';
    }

    public function add() {
        $errors = [];

        if (isset($_POST['submit'])) {

            if (empty($_POST['nama'])) {
                $errors['nama'] = 'Nama harus di isi';
            }
            if (!is_numeric($_POST['telepon']) && !empty($_POST['telepon'])) {
                $errors['telepon'] = 'Telepon harus berupa angka';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {
                $errors['email'] = 'Silahkan isi alamat email';
            }
            if (empty($_POST['alamat'])) {
                $errors['alamat'] = 'Alamat harus di isi';
            }
            
            if (empty($errors)) {
                $this->contacts->add($_POST);
                header('Location: index.php?c=contact');
            }
        }
        include 'view/contact/add.php';
    }

    public function edit() {
        $contact = $this->contacts->getContact($_GET['id']);
        if (!$contact) {
            die('Page Not Found 404');
        }

        $errors = [];

        if (isset($_POST['submit'])) {

            if (empty($_POST['nama'])) {
                $errors['nama'] = 'Nama harus di isi';
            }
            if (!is_numeric($_POST['telepon']) && !empty($_POST['telepon'])) {
                $errors['telepon'] = 'Telepon harus berupa angka';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {
                $errors['email'] = 'Silahkan isi alamat email';
            }
            if (empty($_POST['alamat'])) {
                $errors['alamat'] = 'Alamat harus di isi';
            }

            if (empty($errors)) {
                $this->contacts->edit($_POST,$_GET['id']);
                header('Location: index.php?c=contact');
            }
        }

        include 'view/contact/edit.php';   
    }

    public function delete()
    {
        $this->contacts->delete($_GET['id']);
        header('Location: index.php?c=contact');
    }
}