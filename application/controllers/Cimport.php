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
                        foreach($data as $k => $row)
                        {  
                            if($k > 0){
                                $ten = $row[1];
                                if($ten != ''){
                                $ten = $this->Mthisinh->tachten($ten);
                                }
                                $thisinh = array(
                                    'sMaSinhVien' => $row[7],
                                    'FK_sMaKhoa'  => ($user->sMaKhoa != 13)?$user->sMaKhoa:$this->input->post('khoa'),
                                    'sMaMon'      => $row[8],
                                    'sHoTenDem'   => $ten['hodem'],
                                    'sTen'        => $ten['ten'],
                                    'sLop'        => $row[6],
                                    'sGioiTinh'   => $row[3],
                                    'dNgaySinh'   => strtotime($row[2]),
                                    'sSDT'        => $row[5],
                                    'sEmail'      => $row[4],
                                    'sGhiChu'     => $row[9],
                                    'sTruong'     => 'ĐH Mở Hà Nội',
                                    'sNamThi'     => substr($today,6,4)
                                );
                                if($thisinh['sTen'] != ''){
                                    array_push($dssv, $thisinh);
                                    
                                }
                            }
                            $numRow++;
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

        public function filemau()
        {
            $objPHPExcel = new PHPExcel();
            $sheet = $objPHPExcel->getActiveSheet();
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(11);

            $array_can = array ('A1','B1','C1','D1','E1','F1','G1','H1','I1','J1');
            $array_bold = array('A1:J1');
            for ($i=0; $i < 3; $i++) {
                $data[$i] = array(
                    'hoten' => 'Sinh viên '.$i,
                    'sGioiTinh' => 'Nam',
                    'dNgaySinh' => '19-06-2002',
                    'sEmail' => 'ltanh1906@gmail.com',
                    'sSDT' => '0961962002',
                    'sLop' => '1501',
                    'sMaSinhVien' => '10',
                    'sMaMon' => rand(1,2),
                    'sGhiChu' => (rand(0,1)==1)?'Dự bị':'',
                );
            }
            $array_content = array(
                "A1" => "STT",
                "B1" => "Họ và tên",
                "C1" => "Ngày sinh",
                "D1" => "Giới tính",
                "E1" => "Email",
                "F1" => "Số điện thoại",
                "G1" => "Lớp hành chính",
                "H1" => "Mã Sinh Viên",
                "I1" => "Môn thi",
                "J1" => "Ghi chú",
            );
            //Thêm data vào bảng
            $numRow = 2;
            if(!empty($data)){
                foreach ($data as $k => $v) {
                    $array_content['A'.$numRow] = $k+1;
                    $array_content['B'.$numRow] = $v['hoten'];
                    $array_content['C'.$numRow] = $v['dNgaySinh'];
                    $array_content['D'.$numRow] = $v['sGioiTinh'];
                    $array_content['E'.$numRow] = $v['sEmail'];
                    $array_content['F'.$numRow] = $v['sSDT'];
                    $array_content['G'.$numRow] = $v['sLop'];
                    $array_content['H'.$numRow] = $v['sMaSinhVien'];
                    $array_content['I'.$numRow] = $v['sMaMon'];
                    $array_content['J'.$numRow] = $v['sGhiChu'];
                    $array_can[] = 'A'.$numRow;
                    $array_can[] = 'C'.$numRow;
                    $array_can[] = 'D'.$numRow;
                    $array_can[] = 'H'.$numRow;
                    $array_can[] = 'I'.$numRow;
                    $array_can[] = 'J'.$numRow;
                    $numRow++;
                }
                // kết thức bằng $numRow++ để xuống dòng tiếp theo
            }
/*            $array_content['A'.($numRow+1)] = '- Dữ liệu thông tin thí sinh bắt đầu từ dòng thứ 2';
            $array_content['A'.($numRow+2)] = '- Thí sinh thi môn Tin Học ghi 1 ở cột môn thi';
            $array_content['A'.($numRow+3 )] = '- Thí sinh thi môn Tiếng Anh ghi 2 ở cột môn thi';*/
            //$array_merge = array('A'.($numRow+1).':J'.($numRow+1), 'A'.($numRow+2).':J'.($numRow+2), 'A'.($numRow+3).':J'.($numRow+3));
/*            $array_bold[] = 'A'.($numRow+1);
            $array_bold[] = 'A'.($numRow+2);
            $array_bold[] = 'A'.($numRow+3);*/

            foreach($array_content as $key => $value){
                $sheet->setCellValue($key,$value);
            }
/*            foreach ($array_merge as $key => $cell) {
                $sheet->mergeCells($cell);
            }*/
            foreach($array_can as $cell){
                $sheet->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            }
            foreach($array_bold as $cell){
                $sheet->getStyle($cell)->getFont()->setBold(true);
            }
            // Chỉnh độ rộng cột
            $array_column = array(
                'A' => 7,
                'B' => 30,
                'C' => 15,
                'D' => 11,
                'E' => 28,
                'F' => 19,
                'G' => 18,
                'H' => 18,
                'I' => 13,
                'J' => 15,
            );
            foreach ($array_column as $key => $value) {
                $sheet->getColumnDimension($key)->setAutoSize(false);
                $sheet->getColumnDimension($key)->setWidth($value);
            }

            //in file
            $filename = 'File mẫu';
            ob_end_clean();
            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: anhachment;filename=".$filename.".xls");
            header("Cache-Control: max-age=0");
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
        }
    }
?>