<?php
class Matkul_model
{
  private $db;
  private $table = 'matkul';
  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMatkul()
  {
    $this->db->query('SELECT a.*,b.NAMA_JURUSAN FROM matkul a join jurusan b on a.ID_JURUSAN=b.ID_JURUSAN ORDER BY B.NAMA_JURUSAN ASC;');
    return $this->db->resultSet();
  }

  public function tambahDataMatkul($data)
  {
    $query = "INSERT INTO matkul
                    VALUES
                  (null, :ID_JURUSAN, :NAMA_MATKUL)";

    $this->db->query($query);
    $this->db->bind('ID_JURUSAN', $data['jurusan']);
    $this->db->bind('NAMA_MATKUL', $data['nama']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
