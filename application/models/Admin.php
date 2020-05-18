<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

	//fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function namalogin()
    {
        $user = $this->session->userdata('id_karyawan');
        $data = ("select * from karyawan_ifrs where id_karyawan = '$user'");
        return $this->db->query($data);    
    }

    public function totaluser()
    {
        $data ="select count(id_karyawan) as jumlah FROM user_login order by id_user";
        return $this->db->query($data);
    }

    public function penjualan()
    {
        $data ="select a.nama_obat, sum(b.jumlah) as jumlah FROM obat a 
                JOIN detail_penjualan b on a.id_obat=b.id_obat 
                WHERE b.id_obat GROUP BY b.id_obat DESC LIMIT 1";
        return $this->db->query($data);
    }

    public function total_obatkeluar()
    {
        $data ="select sum(jumlah) as jumlah FROM detail_penjualan order by id_obat";
        return $this->db->query($data);
    }

    public function totalpembelian()
    {
        $data ="select sum(jumlah) as jumlah FROM detail_pembelian order by id_obat";
        return $this->db->query($data);
    }
}