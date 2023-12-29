<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pasien extends CI_Model {
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/restful/api/'
        ]);

    }

    public function getPasien()
    {
        $this->db->where('status_pasien !=', 'probable');
        $this->db->where('status_plg', null);
        $this->db->where('jns_pr', 'ranap');
        $this->db->order_by('tgl_masuk', 'desc');
        return $this->db->get('tb_pasien');

    }

    public function rajal()
    {
        // $this->db->where('status_pasien !=', 'probable');
        $this->db->where('status_plg', null);
        $this->db->where('jns_pr', 'rajal');
        $this->db->order_by('tgl_masuk', 'desc');
        return $this->db->get('tb_pasien');

    }

    public function getConfirm()
    {
        $this->db->where('status_pasien', 'confirm');
        return $this->db->get('tb_pasien');
    }

    public function getSembuh()
    {
        $this->db->where('status_pasien', 'sembuh');
        return $this->db->get('tb_pasien');
    }

    public function getNoRm($keyword = null)
    {
        $res = $this->_client->request('GET', 'pasien', [
            'query' => [
                'no_rkm_medis' => $keyword
            ]
        ]);

         $result = json_decode($res->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getDataPasien($key = null)
    {
        $res = $this->_client->request('GET', 'pasien', [
            'query' => [
                'no_rkm_medis' => $key
            ]
        ]);

         $result = json_decode($res->getBody()->getContents(), true);
        return $result['data'][0];
    }

    public function cekPasien($no_rkm_mds)
    {
        $this->db->where('no_rkm_medis', $no_rkm_mds);    
        $this->db->where('status_pasien !=', 'pulang');
        return $this->db->get('tb_pasien');
    }

    public function addPasien($post)
    {
        if($post['status_pasien'] == 'suspect' OR $post['status_pasien'] == 'confirm'){
            $params = [
                'no_rkm_medis' => $post['no_rkm_medis'],
                'nm_pasien' => $post['nm_pasien'],
                'no_ktp' => $post['no_ktp'],
                'alamat' => $post['alamat'],
                'tmp_lahir' => $post['tmp_lahir'],
                'tgl_lahir' => $post['tgl_lahir'],
                'jk' => $post['jk'],
                'no_tlp' => $post['no_telp'],
                'jns_pr' => $post['jns_pr'],
                'rujukan' => $post['rujukan'],
                'tgl_masuk' => $post['tgl_masuk'],
                'id_bed' => $post['id_bed'],
                'diagnosa' => $post['diagnosa'],
                'status_pasien' => $post['status_pasien']
            ];
            return $this->db->insert('tb_pasien', $params);
        }elseif($post['status_pasien'] == 'probable'){
            $params = [
                'no_rkm_medis' => $post['no_rkm_medis'],
                'nm_pasien' => $post['nm_pasien'],
                'no_ktp' => $post['no_ktp'],
                'alamat' => $post['alamat'],
                'tmp_lahir' => $post['tmp_lahir'],
                'tgl_lahir' => $post['tgl_lahir'],
                'jk' => $post['jk'],
                'no_tlp' => $post['no_telp'],
                'rujukan' => $post['rujukan'],
                'tgl_masuk' => $post['tgl_masuk'],
                'diagnosa' => $post['diagnosa'],
                'status_pasien' => $post['status_pasien']
            ];
            return $this->db->insert('tb_pasien', $params);
        }
    }

    public function updKamarAP($post)
    {
        if($post['status_pasien'] == 'suspect'){
            $this->db->set('status_kamar', '2');
        }elseif($post['status_pasien'] == 'confirm'){
            $this->db->set('status_kamar', '1');
        }
        $this->db->set('status_jk_kamar', $post['jk']);
        $this->db->where('id_kamar', $post['id_kamar']);
        return $this->db->update('tb_kamar');
    }

    public function updKamarAPrajal($post)
    {
        if($post['status_pasien_upd'] == 'suspect'){
            $this->db->set('status_kamar', '2');
        }elseif($post['status_pasien_upd'] == 'confirm'){
            $this->db->set('status_kamar', '1');
        }
        $this->db->set('status_jk_kamar', $post['jk_upd']);
        $this->db->where('id_kamar', $post['id_kamar_upd']);
        return $this->db->update('tb_kamar');
    }

    public function updKamarAPra($post)
    {
        if($post['status_pasien_upd'] == 'suspect'){
            $this->db->set('status_kamar', '2');
        }elseif($post['status_pasien_upd'] == 'confirm'){
            $this->db->set('status_kamar', '1');
        }
        $this->db->set('status_jk_kamar', $post['jk_upd']);
        $this->db->set('jns_pr', 'ranap');
        $this->db->where('id_kamar', $post['id_kamar_upd']);
        return $this->db->update('tb_kamar');
    }

    public function getRuang()
    {
        return $this->db->get('tb_kamar');
    }

    public function getBed($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $this->db->where('status_bed', '0');
        $get = $this->db->get('tb_bed');
        return $get;
    }

    public function updBed($id)
    {
        $this->db->set('status_bed','1');
        $this->db->where('id_bed', $id);
        return $this->db->update('tb_bed');
    }


    public function upConfirm($post, $i, $h)
    {
        
        $this->db->set('status_pasien', $post['status_pasien']);
        $this->db->set('tgl_confirm', $post['tgl_confirm']);
        if($post['idbed'] == '23') {
            if($h < 6 ){
                $this->db->set('jns_pr', 'rajal');
            }
        }
        if($post['status_plg'] != ''){
            $this->db->set('status_plg', $post['status_plg']);
            $this->db->set('tgl_pulang', $post['tgl_confirm']);
        }
        if($post['status_plg'] == 'rujukex'){
            $this->db->set('rujuk_ex', $post['rujuk_ex']);
        }
        if($post['rujuk_lain'] != ''){
            $this->db->set('rujuk_lain', $post['rujuk_lain']);
        }
        $this->db->where('no_rkm_medis', $post['no_rkm_medis']);
        return $this->db->update('tb_pasien');
    }

    public function upPulang($post)
    {
        $this->db->set('status_pasien', $post['status_pasien']);
        $this->db->set('tgl_pulang', $post['tgl_sembuh']);
        $this->db->set('status_plg', $post['status_plg']);
        if($post['status_plg'] == 'rujukex'){
            $this->db->set('rujuk_ex', $post['rujuk_ex']);
        }

        if($post['rujuk_ex'] == 'lain'){
            $this->db->set('rujuk_lain', $post['rujuk_lain']);
        }
        $this->db->where('no_rkm_medis', $post['no_rkm_medis']);
        return $this->db->update('tb_pasien');
    }

    public function upd($id)
    {
        $this->db->set('status_bed','0');
        $this->db->where('id_bed', $id);
        return $this->db->update('tb_bed');
    }

    public function upPsuspect($post, $h, $i)
    {
        $this->db->set('status_pasien', 'suspect');
        $this->db->set('status_plg', $post['status_plgs']);
        if($post['idbed'] == '23') {
            if($h < 6 ){
                $this->db->set('jns_pr', 'rajal');
            }
        }
        if($post['status_plg'] == 'rujukex'){
            $this->db->set('rujuk_ex', $post['rujuk_ex']);
        }
        if($post['status_plg'] == 'lain'){
            $this->db->set('rujuk_lain', $post['rujuk_lain']);
        }
        $this->db->where('no_rkm_medis', $post['no_rkm_medis']);
        return $this->db->update('tb_pasien');
    }

    public function updis($post, $h, $i)
    {

        $this->db->set('tgl_discarded', $post['tgl_confirm']);
        $this->db->set('status_pasien', $post['status_pasien']);
        $this->db->set('status_plg', $post['status_plg']);
        if($post['idbed'] == '23') {
            if($h < 6 ){
                $this->db->set('jns_pr', 'rajal');
            }
        }
        if($post['status_plg'] != ''){
            $this->db->set('tgl_pulang', $post['tgl_confirm']);
        }
        if($post['status_plg'] == 'rujukex'){
            $this->db->set('rujuk_ex', $post['rujuk_ex']);
        }
        if($post['status_plg'] == 'rujukin'){
            $this->db->set('ket_discarded', $post['ket_discarded']);
        }
        if($post['rujuk_ex'] == 'lain'){
            $this->db->set('rujuk_lain', $post['rujuk_lain']);
        }

        
        

        $this->db->where('no_rkm_medis', $post['no_rkm_medis']);
        return $this->db->update('tb_pasien', $params);
    }
    
    public function upInkon($post, $h, $i)
    {
        $params = [
            'status_pasien' => $post['status_pasien'],
            'tgl_pulang' => $post['tgl_confirm'],
            'status_plg' => $post['status_plg_ink']
        ];
        if($post['idbed'] == '32') {
            if($h < 6 ){
                $this->db->set('jns_pr', 'rajal');
            }
        }
        $this->db->where('no_rkm_medis', $post['no_rkm_medis']);
        return $this->db->update('tb_pasien', $params);
    }
    


    public function getRsu()
    {
        return $this->db->get('tb_rs');
    }

    // chained
    public function chainedKamar($id, $jk)
    {
        if($id == 'confirm'){
            $res = $this->db->query("SELECT * FROM tb_kamar left join tb_bed using(id_kamar) left join
            (
                select * from tb_pasien where status_pasien = '$id' and jk = '$jk'
            ) as a on tb_bed.id_bed= a.id_bed 
            where status_bed = '0' and status_kamar ='1' and status_jk_kamar = '$jk' or status_jk_kamar = '0'  group by nama_kamar asc");
    
            return $res->result();
        }elseif($id == 'suspect'){
            $ress = $this->db->query("SELECT * FROM tb_kamar left join tb_bed using(id_kamar) left join
            (
                select * from tb_pasien WHERE status_pasien != '$id' and jk = '$jk'
            ) as a on tb_bed.id_bed= a.id_bed 
            where status_bed = '0' and status_kamar ='0' and status_jk_kamar = '$jk' or status_jk_kamar = '0'  group by nama_kamar asc");

            return $ress->result();
        }

    }

    public function chainedBed($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $this->db->where('status_bed', '0');
        return $this->db->get('tb_bed')->result();
    }

    public function cekKamarKosong($id)
    {
        $this->db->select('*');
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->where('id_bed', $id);
        return $this->db->get();
    }

    public function upStatusKamar($id_kamar)
    {
        $this->db->set('status_kamar', '0');
        $this->db->set('status_jk_kamar', '0');
        $this->db->where('id_kamar', $id_kamar);
        return $this->db->update('tb_kamar');
    }
    
    // akses chained
    public function cekAkses()
    {
        $this->db->where('nama_akses','chained_bed');
        return $this->db->get('akses_kamar');
    }

    public function AksKamar()
    {
        $this->db->select('*');
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->where('status_bed', '0');
        $this->db->group_by('nama_kamar');
        return $this->db->get();
    }

    public function updKamar($post)
    {
        $this->db->set('id_bed', $post['id_bed_upd']);
        $this->db->where('no_rkm_medis', $post['no_rkm_medis']);
        return $this->db->update('tb_pasien');
    }

    public function addrajal($post)
    {
        $params = [
            'no_rkm_medis' => $post['no_rkm_medis'],
                'nm_pasien' => $post['nm_pasien'],
                'no_ktp' => $post['no_ktp'],
                'alamat' => $post['alamat'],
                'tmp_lahir' => $post['tmp_lahir'],
                'tgl_lahir' => $post['tgl_lahir'],
                'jk' => $post['jk'],
                'no_tlp' => $post['no_telp'],
                'jns_pr' => $post['jns_pr'],
                'rujukan' => $post['rujukan'],
                'tgl_masuk' => $post['tgl_masuk'],
                'diagnosa' => $post['diagnosa'],
                'status_pasien' => $post['status_pasien']
        ];

        return $this->db->insert('tb_pasien', $params );
    }

    public function rencswab()
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->join('tb_rencswab', 'no_rkm_medis');
        return $this->db->get();
    }

    public function getPasiencvd($keyword = null)
    {
        $this->db->select('no_rkm_medis');
        $this->db->from('tb_pasien');
        $this->db->where('no_rkm_medis', $keyword);
        return $this->db->get()->result_array();
    }

    public function getDataPasiencvd($key)
    {
        $this->db->where('no_rkm_medis', $key);
        return $this->db->get('tb_pasien')->row();
    }

    public function addRen($post)
    {
        $params = [
            'no_rkm_medis' => $post['no_rkm_medis'],
            'tgl_renswab' => $post['tgl_ren'],
            'jns_ren' => $post['jns_ren']
        ];

        return $this->db->insert('tb_rencswab', $params);
    }

}

// query fix

// confirm
// SELECT * FROM tb_kamar left join tb_bed using(id_kamar) left join
//         (
//             select * from tb_pasien WHERE status_pasien = 'confirm' and jk = 'L' 
//         ) as a on tb_bed.id_bed= a.id_bed 
//         where status_kamar ='0' OR status_kamar = '1' and status_bed = '0' order by nama_kamar asc

// stats kamar 
// 0 = flxsible
// 1= confirm
// 2= suspect

// suspect
// SELECT * FROM tb_kamar left join tb_bed using(id_kamar) left join
//         (
//             select * from tb_pasien WHERE status_pasien = 'suspect' 
//         ) as a on tb_bed.id_bed= a.id_bed 
//         where status_kamar ='0' OR status_kamar = '2' and status_bed = '1' order by nama_kamar asc