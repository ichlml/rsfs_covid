<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ruang extends CI_Model {

    public function getKamar()
    {
        return $this->db->get('tb_kamar');
    }

    public function addKamar($post)
    {
        $params = [
            'nama_kamar' => $post['nama_kamar'],
            'kapasitas' => $post['kapasitas'],
            'tempat' => $post['tempat']
        ];

        return $this->db->insert('tb_kamar', $params);
    }

    public function editKamar($post)
    {
        $params = [
            'nama_kamar' => $post['nama_kamar'],
            'kapasitas' => $post['kapasitas'],
            'tempat' => $post['tempat']
        ];
        $this->db->where('id_kamar', $post['id_kamar']);
        return $this->db->update('tb_kamar', $params);
    }

    public function delKamar($id)
    {
        $this->db->where('id_kamar', $id);
        return $this->db->delete('tb_kamar');
    }

    public function getBed()
    {
        $this->db->select('*');
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        return $this->db->get();
    }

    public function addBed($post)
    {
        $params = [
            'no_bed' => $post['no_bed'],
            'id_kamar' => $post['id_kamar'],
            'status_bed' => '0'
        ];

        return $this->db->insert('tb_bed', $params);
    }

    public function editBed($post)
    {
        $params = [
            'no_bed' => $post['no_bed'],
            'id_kamar' => $post['id_kamar']
        ];

        $this->db->where('id_bed', $post['id_bed']);
        return $this->db->update('tb_bed', $params);
    }

    public function delBed($id)
    {
        $this->db->where('id_bed', $id);
        return $this->db->delete('tb_bed');
    }

    // detail bed

    public function countlt4()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'LT 4');

        return $this->db->count_all_results();
    }

    public function countsLT4()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'LT 4');
        $this->db->where('tb_pasien.status_pasien', 'suspect');


        return $this->db->count_all_results();
    }

    public function countcLT4()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'LT 4');
        $this->db->where('tb_pasien.status_pasien', 'confirm');


        return $this->db->count_all_results();
    }


    public function countigd()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'IGD');

        return $this->db->count_all_results();
    }

    public function countsigd()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'IGD');
        $this->db->where('tb_pasien.status_pasien', 'suspect');


        return $this->db->count_all_results();
    }

    public function countcigd()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'IGD');
        $this->db->where('tb_pasien.status_pasien', 'confirm');


        return $this->db->count_all_results();
    }


    public function counttd()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'Tenda Darurat');

        return $this->db->count_all_results();
    }

    public function countstd()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'Tenda Darurat');
        $this->db->where('tb_pasien.status_pasien', 'suspect');


        return $this->db->count_all_results();
    }

    public function countctd()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'Tenda Darurat');
        $this->db->where('tb_pasien.status_pasien', 'confirm');


        return $this->db->count_all_results();
    }


    public function counttb()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'TB DOSTS');

        return $this->db->count_all_results();
    }

    public function countstb()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'TB DOSTS');
        $this->db->where('tb_pasien.status_pasien', 'suspect');


        return $this->db->count_all_results();
    }

    public function countctb()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'TB DOSTS');
        $this->db->where('tb_pasien.status_pasien', 'confirm');


        return $this->db->count_all_results();
    }

    public function askbed()
    {
        $this->db->where('nama_akses', 'chained_bed');
        return $this->db->get('akses_kamar');
    }

    public function updAkses($post)
    {
        $this->db->set('status_akses', $post['status_akses']);
        $this->db->where('id_akses', $post['id_akses']);
        return $this->db->update('akses_kamar');
    }
}