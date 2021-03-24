<?php
class Mthisinh extends MY_Model{
    var $table = 'tbl_thisinh';
    var $key ='sIdThisinh';

    function tachten($ten){
        $fullName   = $ten;
        $arrName    = explode(" ", $fullName);
        $firstName  = array_shift($arrName);
        $lastName   = array_pop($arrName); 
        $middleName = implode(" ", $arrName);
        $hotendem   = $firstName. " " .$middleName;

        $ten = array(
            'ten'     => $lastName,
            'hodem'   => $hotendem,
        );
        return $ten;
    }

    public function joindb()
	{
        $this->db->join('tbl_khoa AS khoa', 'tbl_thisinh.FK_sMaKhoa = khoa.sMaKhoa', 'left');
        $this->db->join('tbl_monthi AS monthi', 'tbl_thisinh.sMaMon = monthi.sMaMon', 'left');

	}

    public function getdata($makhoa)
    {
        $this->db->where('FK_sMaKhoa ', $makhoa);
        $this->db->select('*');
        $this->db->join('tbl_khoa AS khoa', 'tbl_thisinh.FK_sMaKhoa = khoa.sMaKhoa', 'left');
        $this->db->join('tbl_monthi AS monthi', 'tbl_thisinh.sMaMon = monthi.sMaMon', 'left');
		$this->db->order_by('sTruong asc, sGhiChu asc, tbl_thisinh.sMaMon desc, sTen asc, sHoTenDem asc');
    
        $get = $this->db->get('tbl_thisinh')->result_array();
		return $get;
    }

    public function list_thisinh(){
        $today = date("d/m/Y"); 
        $this->db->select('*')
                -> from('tbl_thisinh AS sv')
                -> join('tbl_khoa AS k', 'sv.FK_sMaKhoa = k.sMaKhoa', 'inner')
                -> join('tbl_monthi AS m', 'sv.sMaMon = m.sMaMon', 'inner')
                -> where('sv.sNamThi',substr($today,6,4))
                ->order_by('sv.sGhiChu ASC, sv.sMaMon DESC,  sv.sTen ASC, k.sTenKhoa ASC');
                $result = $this->db->get();
        if($result->num_rows()!=0){
            return $result->result_array();
        }else{
            return false;
        }

    }
    

    public function layDanhSachThiSinh($khoa, $mon){

        $today = date("d/m/Y");
        $this->db->select('sv.sMaSinhVien, sv.sKhoa, sv.sHoTenDem, sv.sTen, sv.sGhiChu, sv.sTruong, m.sTenMon, m.sMaMon, k.sMaKhoa, k.sTenKhoa')
                -> from('tbl_thisinh AS sv')
                -> join('tbl_khoa AS k', 'sv.FK_sMaKhoa = k.sMaKhoa', 'inner')
                -> join('tbl_monthi AS m', 'sv.sMaMon = m.sMaMon', 'inner')
                -> where('sv.sNamThi',substr($today,6,4));
                if($khoa != '13'){
                    $this->db-> where('sv.FK_sMakhoa', $khoa);
                }

                if($mon){
                   $this->db-> where('sv.sMaMon', $mon);
                }
               $this->db->order_by('sv.sGhiChu ASC, sv.sMaMon DESC,  sv.sTen ASC, k.sTenKhoa ASC');
        $sql = $this->db->get()->result_array();
        return $sql;
    }
    public function listKhoa($makhoa = 13)
    {
        $data = '';
        if($makhoa == 13){
            $data = $this->db->query('SELECT sMaKhoa, sTenKhoa FROM tbl_khoa WHERE not sMaKhoa = '.$makhoa)->result_array();
        }
        else{
            $data = $this->db->query('SELECT sMaKhoa, sTenKhoa FROM tbl_khoa WHERE sMaKhoa = '.$makhoa)->result_array();
        }
        return $data;
    }
    public function listMon($mon = null)
    {
        $data = $this->db->get('tbl_monthi')->result_array();
        return $data;
    }

}
