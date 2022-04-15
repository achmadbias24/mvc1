<?php
class MatkulMhs extends Controller
{
  public function index()
  {
    $data['judul'] = 'Daftar Mata Kuliah yang Diikuti Mahasiswa';
    $data['mkmhs'] = $this->model('Detail_model')->getAllMahasiswa();
    $this->view('templates/header', $data);
    $this->view('matkulmhs/index', $data);
    $this->view('templates/footer');
  }
}
