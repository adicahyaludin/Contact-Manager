<?php

require_once 'model/Contact.php';

class ContactController {

	private $contacts;

	public function __construct() {
		$this->contacts = new Contact();
	}

    public function index($notifikasi = '') {
        $data['notifikasi'] = $notifikasi;
    	$data['contacts'] = $this->contacts->getAllContacts();
    	include 'view/contact/index.php';
        die;
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
                $add = $this->contacts->add($_POST);
                if ($add) {
                    $notifikasi = "Berhasil menambahkan $add kontak.";
                } else {
                    $notifikasi = "Gagal menambahkan kontak!";
                }
                $this->index($notifikasi); // redirect ke index
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
                $edit = $this->contacts->edit($_POST,$_GET['id']);
                if ($edit) {
                    $notifikasi = "Berhasil update $edit kontak.";
                } else {
                    $notifikasi = "Gagal/kontak tidak di update!";
                }
                $this->index($notifikasi); // redirect ke index
            }
        }

        include 'view/contact/edit.php';   
    }

    public function delete()
    {
        $del = $this->contacts->delete($_GET['id']);
        if ($del) {
            $notifikasi = "Berhasil menghapus $del kontak.";
        } else {
            $notifikasi = "Gagal menghapus kontak!";
        }
        $this->index($notifikasi); // redirect ke index
    }
}