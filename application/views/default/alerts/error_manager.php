<?php
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('msg');

if ($success) {
    $this->load->view("default/alerts/success", ['msg' => $success]);
}

if ($error) {
    $this->load->view("default/alerts/danger", ['msg' => $error]);
}
