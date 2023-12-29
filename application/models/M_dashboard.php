<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    
    public function dashLt4()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.tempat', 'LT 4');
        // $this->db->where('tb_bed.status_bed', '1');
        $this->db->group_by('tb_kamar.nama_kamar');
        return $this->db->get();
    }

    public function dashLt5()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.tempat', 'LT 5');
        // $this->db->where('tb_bed.status_bed', '1');
        $this->db->group_by('tb_kamar.nama_kamar');
        return $this->db->get();
    }

    public function bedRuang()
    {
        $this->db->select('*');
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        // $this->db->where('tb_pasien.status_pasien !=', 'sembuh');
        return $this->db->get();
    }

    public function igd()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.tempat', 'IGD');
        // $this->db->where('tb_pasien.status_bed', '1');
        $this->db->group_by('tb_kamar.nama_kamar');
        return $this->db->get();
    }

    public function td()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.tempat', 'Tenda Darurat');
        // $this->db->where('tb_bed.status_bed', '1');
        $this->db->group_by('tb_kamar.nama_kamar');
        return $this->db->get();
    }

    public function tbd()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.tempat', 'TB DOSTS');
        // $this->db->where('tb_bed.status_bed', '1');
        $this->db->group_by('tb_kamar.nama_kamar');
        return $this->db->get();
    }

    public function countSuspect()
    {
        $this->db->where('status_pasien', 'suspect');
        return $this->db->count_all_results('tb_pasien');
    }
    public function countConfirm()
    {
        $this->db->where('status_pasien', 'confirm');
        return $this->db->count_all_results('tb_pasien');
    }
    public function countSembuh()
    {
        $this->db->where('status_plg', 'blpc');
        return $this->db->count_all_results('tb_pasien');
    }
    public function countTotal()
    {
        $this->db->where('status_pasien', 'suspect');
        $this->db->or_where('status_pasien', 'confirm');
        return $this->db->count_all_results('tb_pasien');
    }

    public function dataPasien()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('tb_pasien.status_pasien !=', 'sembuh');

        return $this->db->get();
    }

    public function countTrlt4()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.klp ', 'LT4');

        return $this->db->count_all_results();
    }

    public function countKslt4()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '0');
        $this->db->where('tb_kamar.klp ', 'LT4');

        return $this->db->count_all_results();
    }

    public function counttrigd()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.klp ', 'LT5');

        return $this->db->count_all_results();
    }

    public function countksigd()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '0');
        $this->db->where('tb_kamar.klp ', 'LT5');

        return $this->db->count_all_results();
    }

    public function counttrtb()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.klp ', 'LT1');

        return $this->db->count_all_results();
    }
    public function countkstb()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '0');
        $this->db->where('tb_kamar.klp ', 'LT1');

        return $this->db->count_all_results();
    }

    public function counttrtd()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '1');
        $this->db->where('tb_kamar.tempat ', 'TNDL');

        return $this->db->count_all_results();
    }

    public function countkstd()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '0');
        $this->db->where('tb_kamar.tempat ', 'TNDL');

        return $this->db->count_all_results();
    }

    public function tndp()
    {
        $this->db->select("*");
        $this->db->from('tb_bed');
        $this->db->join('tb_kamar', 'id_kamar');
        $this->db->where('tb_bed.status_bed ', '0');
        $this->db->where('tb_kamar.tempat ', 'Tenda Darurat');

        return $this->db->count_all_results();
    }



    public function kosong()
    {
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.tempat', 'LT 4');
        // $this->db->where('tb_pasien.status_plg', null);
        $this->db->group_by('tb_kamar.nama_kamar');
        return $this->db->get();
    }

    public function GroupBed()
    {
        $this->db->group_by('tempat');
        return $this->db->get('tb_kamar');
    }

    public function ResBed()
    {
        return $this->db->query("SELECT *,tempat, 
        SUM(if(tb_bed.status_bed = '1', 1, 0)) AS Terisi, 
        SUM(if(tb_bed.status_bed = '0', 1, 0)) AS Kosong,
        SUM(if(tb_kamar.status_jk_kamar = 'L' && tb_bed.status_bed = '1', 1, 0)) AS 'L',
        SUM(if(tb_kamar.status_jk_kamar = 'P' && tb_bed.status_bed = '1', 1, 0)) AS 'P',
        SUM(if(tb_kamar.status_kamar = '1' && tb_bed.status_bed = '1', 1, 0)) AS 'C',
        SUM(if(tb_kamar.status_kamar = '2' && tb_bed.status_bed = '1', 1, 0)) AS 'S'
        FROM tb_kamar 
        INNER JOIN tb_bed USING(id_kamar) 
        group BY tempat");
    }
}