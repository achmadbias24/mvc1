<?php
class Matkul extends Controller
{
  public function index()
  {
    $data['judul'] = 'Daftar Mata Kuliah';
    $data['mkl'] = $this->model('Matkul_model')->getAllMatkul();
    $this->view('templates/header', $data);
    $this->view('matkul/index', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    if ($this->model('Matkul_model')->tambahDataMatkul($_POST) > 0) {
      Flasher::setFlash('Mata Kuliah', 'berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/matkul');
      exit;
    } else {
      Flasher::setFlash('Mata Kuliah', 'gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/matkul');
      exit;
    }
  }
}
