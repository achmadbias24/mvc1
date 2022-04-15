<?php
class Detail_model
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMahasiswa()
  {
    $this->db->query("SELECT c.NAMA,GROUP_CONCAT(b.NAMA_MATKUL SEPARATOR', ') AS NAMA_MATKUL FROM detail a join matkul b on a.ID_MATKUL=b.ID_MATKUL left join mahasiswa c on a.ID=c.ID GROUP by c.NAMA;");
    return $this->db->resultSet();
  }
}
