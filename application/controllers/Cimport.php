<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Color;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Font;
    use PhpOffice\PhpSpreadsheet\Reader\IReader;
    class Cimport extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('Excel');
            $this->load->helper('download');
        }
        
        public function preview()
        {
            if($this->input->is_ajax_request()){
                if(isset($_FILES["file"])){
                    if($_FILES["file"]["name"]!=''){
                        $allowed_extension = array('xls', 'xlsx');
                        $file_array = explode(".", $_FILES['file']['name']);
                        $file_extension = end($file_array);
                        if(in_array($file_extension, $allowed_extension)){
                            $reader = ($file_extension == 'xlsx')?IOFactory::createReader('Xlsx'):IOFactory::createReader('Xls');
                            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                            $writer = IOFactory::createWriter($spreadsheet, 'Html');
                            $message = $writer->save('php://output');
                        }
                        else{
                            $message = "<span class='error'><p>Không phải file excel</p></span>";
                        }
                        echo $message;
                    }
                    
                }  
            }
            else{
                return redirect('error404');
            }
        }
        public function import()
        {
            $this->load->model('Mthisinh');
            if($this->input->post()){ 
                if(isset($_FILES["file"])){
                    $allowed_extension = array('xls', 'xlsx');
                    $file_array = explode(".", $_FILES["file"]["name"]);
                    $file_extension = end($file_array);
                    if(in_array($file_extension, $allowed_extension)){
                        $file_name = time() . '.' . $file_extension;
                        move_uploaded_file($_FILES["file"]['tmp_name'], $file_name);
                        $file_type = IOFactory::identify($file_name);
                        $reader = IOFactory::createReader($file_type);
                        $spreadsheet = $reader->load($file_name);
                        unlink($file_name);
                        $data = $spreadsheet->getActiveSheet()->toArray();

                        //pre($data);

                        $user = $this->session->userdata('user');
                        $numRow = 1;
                        $today = date("d/m/Y");

                        $dssv = array();
                        if(isset($data)){
                            foreach($data as $k => $row){  
                                if($k > 0){

                                    if($row[0] == ''){
                                        break;
                                    }
                                    $ten = $row[1];
                                    if($ten != ''){
                                    $ten = $this->Mthisinh->tachten($ten);
                                    }
                                    
                                    //pre($data);
                                    if($row[8] == 'x'){
                                        $monThi = '2';
                                    }else if($row[9] == 'x'){
                                        $monThi = '1';
                                    }else{
                                        setToast('error', 'File import không giống file mãu');
                                        return redirect('admindanhsach');
                                    }

                                    if($row[10] == ''){
                                        $ghiChu = 'Chính thức';
                                    }else if($row[10] == 'db'){
                                        $ghiChu = 'Dự bị';
                                    }else{
                                        setToast('error', 'File import không giống file mẫu');
                                        return redirect('admindanhsach');
                                    }
                                    // pre($duLieuTruocKiemTra);
                                    
                                    
                                    $thisinh = array(
                                        'sMaSinhVien' => mb_convert_case($row[7], MB_CASE_UPPER, "UTF-8"),
                                        'FK_sMaKhoa'  => ($user->sMaKhoa != 13)?$user->sMaKhoa:$this->input->post('khoa'),
                                       // 'sMaMon'      => mb_convert_case($row[8], MB_CASE_TITLE, "UTF-8"),
                                        'sMaMon'      => $monThi,
                                        'sHoTenDem'   => mb_convert_case($ten['hodem'], MB_CASE_TITLE, "UTF-8"),
                                        'sTen'        => mb_convert_case($ten['ten'], MB_CASE_TITLE, "UTF-8"),
                                        'sLop'        => mb_convert_case($row[6], MB_CASE_TITLE, "UTF-8"),
                                        'sGioiTinh'   => mb_convert_case($row[3], MB_CASE_TITLE, "UTF-8"),
                                        'dNgaySinh'   => strtotime($row[2]),
                                        'sSDT'        => $row[5],
                                        'sEmail'      => $row[4],
                                        'sGhiChu'     => $ghiChu,
                                        'sTruong'     => 'ĐH Mở Hà Nội',
                                        'sNamThi'     => substr($today,6,4)
                                    );
                                    if($thisinh['sTen'] != ''){
                                        array_push($dssv, $thisinh);
                                        
                                    }
                                }
                                $numRow++;
                            }
                        }
                        $this->Mthisinh->create($dssv);
                        
                        $this->data['messages']	= $this->session->flashdata('messages');
                        setToast('success', 'Đăng kí thành công');
                        redirect('admindanhsach');
                        
                        
                    }
                }
            }
            else{
                return redirect('error404');
            }
        }

//FIle mẫu / Export

        public function filemau(){
            $fileName = "template.xls";
            $file = "template/".$fileName;
                // check file exists    
            if(file_exists ($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data );
            }else {
                // Redirect to base url
                redirect (base_url ());
            }
        }
    }
?>