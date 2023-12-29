<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    public function getLap($post)
    {
        $a = $post['tglA'];
        $b = $post['tglB'];
        $tglA = date("$a 00:00:00");
        $tglB = date("$b 23:59:59");

        
        $this->db->select('*, tb_pasien.alamat as almt');
        $this->db->from('tb_pasien');
        $this->db->join('tb_rs', 'tb_pasien.rujuk_ex = tb_rs.id_rs', 'left');
        if($post['tglB'] == ''){
            $this->db->where('tgl_masuk', $post['tglA']);
        }else{
            $this->db->where('tgl_masuk >=', $tglA);
            $this->db->where('tgl_masuk <=', $tglB);
        }
        if($post['status_pasien'] != ''){
            $this->db->where('status_pasien', $post['status_pasien']);
        }

        if($post['status_plg'] != ''){
            $this->db->where('status_plg', $post['status_plg']);
        }
        return $this->db->get();

    }

    public function konRawat($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', null);
        
        return $this->db->get();
    }

    public function konbp($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'blpc');
        
        return $this->db->get();
    }

    public function konmgl($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'meninggal');
        
        return $this->db->get();
    }
    public function konaps($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'pulang aps');
        
        return $this->db->get();
    }
    public function konrjk($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'rujukex');
        
        return $this->db->get();
    }
    public function isoman($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'isomandiri');
        
        return $this->db->get();
    }
    public function noniso($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'ranap non iso');
        
        return $this->db->get();
    }
    public function karantina($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'confirm');
        $this->db->where('status_plg', 'isoex');
        
        return $this->db->get();
    }
    
    //discarded
    public function totdis($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg !=', null);
        
        return $this->db->get();
    }

    public function disbp($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg', 'blpc');
        
        return $this->db->get();
    }

    public function dismgl($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg', 'meninggal');
        
        return $this->db->get();
    }

    public function disrjk($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg', 'rujukex');
        
        return $this->db->get();
    }

    public function disisoman($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg', 'isomandiri');
        
        return $this->db->get();
    }

    public function disaps($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg', 'pulang aps');
        
        return $this->db->get();
    }

    public function disin($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('tgl_masuk >=', $post['tglA']);
        $this->db->where('tgl_masuk <=', $post['tglB']);
        $this->db->where('status_pasien', 'discarded');
        $this->db->where('status_plg', 'rujukin');
        
        return $this->db->get();
    }
    
    
    //inkonklusif
    public function totin($post)
    {
        $this->db->select('*');
        $this->db->from('tb_pasien');
        $this->db->where('status_pasien', 'inkonklusif');
        
        return $this->db->get();
    }
    
    //suspect
    public function totsus()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE DAY(tgl_masuk) = DAY(NOW()) and status_pasien = 'suspect'");
        
        return $q;
    }
    public function sustdy()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE DAY(tgl_masuk) = DAY(NOW()) and status_pasien = 'suspect' AND jns_pr = 'ranap'");
        
        return $q;
    }
    public function susrajal()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE DAY(tgl_masuk) = DAY(NOW()) and status_pasien = 'suspect' AND jns_pr = 'rajal'");
        
        return $q;
    }
    public function susranap()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE status_pasien = 'suspect' AND jns_pr = 'ranap' and status_plg != null");
        
        return $q;
    }
    public function susrjk()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE status_pasien = 'suspect' AND status_plg = 'rujukex'");
        
        return $q;
    }
    public function susaps()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE status_pasien = 'suspect' AND status_plg = 'pulang aps'");
        
        return $q;
    }
    public function susisoman()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE status_pasien = 'suspect' AND status_plg = 'isomandiri'");
        
        return $q;
    }

    public function insmgl()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE status_pasien = 'inkonklusif' AND status_plg = 'meninggal'");
        
        return $q;
    }
    public function inaps()
    {
        $q = $this->db->query("SELECT * FROM tb_pasien WHERE status_pasien = 'inkonklusif' AND status_plg = 'pulang aps'");
        
        return $q;
    }


    public function laplt1($post)
    {
        $bag = $post['bagian'];
        return $this->db->query("SELECT * FROM tb_kamar left join tb_bed using(id_kamar) left join
        (
            select * from tb_pasien where status_plg = null
        ) as a on tb_bed.id_bed= a.id_bed where klp = '$bag' group by nama_kamar asc");
    }

    public function bed($post)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.klp', $bag);
        // $this->db->where('tgl_masuk >=', $tgl_A);
        //     $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }
    public function pasien($post, $tgl_A, $tgl_B)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar', 'left');
        $this->db->join('tb_pasien', 'id_bed', 'left');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tgl_masuk >=', $tgl_A);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }

    public function kapsigs()
    {
        return $this->db->query("select tempat, count(no_bed) as tot, (select count(*) from tb_bed where status_bed ='1' and id_kamar ='23') as kosong from tb_kamar left join tb_bed using(id_kamar) where nama_kamar = 'ISOLASI IGD'");
    }

    public function kapstbd()
    {
        return $this->db->query("select tempat, count(no_bed) as tot, (select count(*) from tb_bed where status_bed ='1' and id_kamar ='24') as kosong from tb_kamar left join tb_bed using(id_kamar) where nama_kamar = 'Tenda Darurat'");
    }
    public function tbd()
    {
        return $this->db->query("select tempat, count(no_bed) as tot, (select count(*) from tb_bed where status_bed ='1' and id_kamar ='30') as kosong from tb_kamar left join tb_bed using(id_kamar) where nama_kamar = 'ISOLASI LT 1'");
    }

    public function pbaru($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tgl_masuk >=', $n);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }
    public function lt4rjx($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tb_pasien.rujuk_ex is not null');
        $this->db->where('tgl_masuk >=', $n);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }
    public function lt4aps($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tb_pasien.status_plg', 'pulang aps');
        $this->db->where('tgl_masuk >=', $n);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }

    public function lt4mng($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tb_pasien.status_plg', 'meninggal');
        $this->db->where('tgl_masuk >=', $n);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }

    public function lt4blpc($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tb_pasien.status_plg', 'blpc');
        $this->db->where('tgl_masuk >=', $n);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }
    public function lt4isoman($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        
        $this->db->where('tb_kamar.klp', $bag);
        $this->db->where('tb_pasien.status_plg', 'isomandiri');
        $this->db->where('tgl_masuk >=', $n);
            $this->db->where('tgl_masuk <=', $tgl_B);
        return $this->db->get();
    }

    public function lt4SWAB($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->join('tb_rencswab', 'no_rkm_medis');

         $this->db->where('tb_kamar.klp', $bag);
         $this->db->where('tb_rencswab.tgl_renswab', $post['tgl_masuk']);
         $this->db->where('tb_rencswab.jns_ren', 'swab');

         return $this->db->get();
    }

    public function lt4thx($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        $this->db->select("*");
        $this->db->from('tb_kamar');
        $this->db->join('tb_bed', 'id_kamar');
        $this->db->join('tb_pasien', 'id_bed');
        $this->db->join('tb_rencswab', 'no_rkm_medis');

         $this->db->where('tb_kamar.klp', $bag);
         $this->db->where('tb_rencswab.tgl_renswab', $post['tgl_masuk']);
         $this->db->where('tb_rencswab.jns_ren', 'thorax');

         return $this->db->get();
    }

    public function bedlt4($post, $tgl_B, $n)
    {
        $bag = $post['bagian'];
        return $this->db->query("select nama_kamar, count(no_bed) as bed from tb_kamar left join(select * from tb_bed where status_bed ='1') as a on tb_kamar.id_kamar=a.id_kamar WHERE klp='$bag' group by nama_kamar");
    }

    public function totlt4($post)
    {
        $bag = $post['bagian'];
        return $this->db->query("select count(*) as t from tb_kamar join tb_bed using (id_kamar) where status_bed='1' and klp ='$bag'");
    }
    public function sisalt4($post)
    {
        $bag = $post['bagian'];
        return $this->db->query("select count(*) as t from tb_kamar join tb_bed using (id_kamar) where status_bed='0' and klp ='$bag'");
    }

}