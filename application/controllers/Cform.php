 <?php
class Cform extends CI_Controller{
    function __construct(){
        parent::__construct();
        
    }

    function index(){
        if ($this->session->userdata('user')){
            $khoa = getSession()->sMaKhoa;
            $this->form($khoa);
        }
        else{
            $this->publicForm();
        }

    }

    function edit(){
        $session = getSession();
        if(isset($session)){
        $khoa = getSession()->sMaKhoa;
        $check = getSession()->sIDQuyen;
        }
        else{
            redirect('Clogin');
        }
        $this->load->Model('Mthisinh');
        $id = $this->uri->segment(3);
        $thisinh = $this->Mthisinh->get_info($id);
        if($thisinh->FK_sMaKhoa != getSession()->sMaKhoa && $check != 0){
            setToast('error', 'Không tồn tại sinh viên này');
            redirect('admindanhsach');
        }
        $this->load->model('Mmonthi');
        $listmon = $this->Mmonthi->get_list();
        $this->load->model('Mkhoa');
        $listkhoa = $this->Mkhoa->get_list();
        $this->load->library('form_validation');
        $this->load->helper('form');


        if($this->input->post())
        {
            if($check == 0)
            $this->form_validation->set_rules('khoa', 'Khoa', 'required');
            if($thisinh->FK_sMaKhoa == 14)
            $this->form_validation->set_rules('image', '', 'callback_file_check'); 
            $this->form_validation->set_rules('truong', 'Trường', 'required');
            $this->form_validation->set_rules('hoten', 'Họ và tên', 'required');
            $this->form_validation->set_rules('dob', 'Ngày sinh', 'required');
            $this->form_validation->set_rules('sdt', 'Số điện thoại', 'required|numeric|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('lop', 'Lớp', 'required');
            $this->form_validation->set_rules('masv', 'Mã Sinh Viên', 'required');
            $this->form_validation->set_rules('mon', 'Môn Thi', 'required');

            $dau = 'mc';
            if($this->form_validation->run() == true){
                if($check == 0)
                $khoa = $this->input->post('khoa');
                $truong = $this->input->post('truong');
                $ten = $this->input->post('hoten');
                $ten = $this->Mthisinh->tachten($ten);
                $dob = $this->input->post('dob');
                $dob = strtotime($dob);
                $sdt = $this->input->post('sdt');
                $mail = $this->input->post('mail');
                $lop = $this->input->post('lop');
                $masv = $this->input->post('masv');
                $mon = $this->input->post('mon');
                $gioitinh = $this->input->post('gioi-tinh');
                $hinhthuc = $this->input->post('hinhthuc');
                $info = array(
                    
                    'sMaSinhVien'	=> mb_convert_case($masv, MB_CASE_UPPER, "UTF-8"),
                    'sMaMon'		=> mb_convert_case($mon, MB_CASE_UPPER, "UTF-8"),
                    'sHoTenDem'		=> mb_convert_case($ten['hodem'], MB_CASE_TITLE, "UTF-8"),
                    'sTen'        	=> mb_convert_case($ten['ten'], MB_CASE_TITLE, "UTF-8"),
                    'sLop'       	=> mb_convert_case($lop, MB_CASE_UPPER, "UTF-8"),
                    'sGioiTinh' 	=> $gioitinh[0],
                    'dNgaySinh'     => $dob,
                    'sSDT'        	=> $sdt,
                    'sEmail'        => $mail,
                    'sTruong'       => mb_convert_case($truong, MB_CASE_TITLE, "UTF-8"),
                );
                if($thisinh->FK_sMaKhoa == 14){
                    $info['FK_sMaKhoa'] = 14;
                    $info['sKhoa']     = ucwords($khoa);
                    $info['sGhichu']    = 'Tự do';
                    if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
                        $t = './upload/minhchung/'.$thisinh->sMinhchung;   
                        if(file_exists($t))
                        {
                            unlink($t);
                        };
                        $this->load->library('upload_library');
                        $upload_path = './upload/minhchung';
                        $upload_data = $this->upload_library->upload($upload_path, 'image', $dau);
                        $image_link = '';
                        if(isset($upload_data['file_name'])){
                            $image_link = $upload_data['file_name']; //nếu có ảnh tải lên thì lấy tên ảnh
                        }
                        $info['sMinhchung']    = $image_link;
                    }
                }else{
                    $info['FK_sMaKhoa']     = $khoa;
                    $info['sGhiChu']    	= $hinhthuc[0];
                };
    
                if($this->Mthisinh->update($id, $info))
                    {
                        setToast('success', 'Cập nhật thành công');
                    }else{
                        setToast('error', 'Cập nhật thất bại');
                    }
                redirect('admindanhsach');
            }
            else{
                setToast('error', 'Cập thất bại');
            }
        }

        
        $dLeft = array(
            'listmon' => $listmon,
            'listkhoa'=> $listkhoa,
            't'   => $thisinh,
        );
        $page = array(
            'title' => 'Sửa thông tin thí sinh',
        );
        $messages = array(
            'messages'	=> $this->session->flashdata('messages'),
        );
        $data = array(
            'left'      => 'site/VupdateForm',
            'dLeft'     => $dLeft,
            'page'      => $page,
            
        );
        $data['messages'] = $messages;
        $this->load->view('layout/Vlayout', $data);
    }

    function form($khoa){
        $check=getSession()->sIDQuyen;
        if(!isset($check)){
            redirect('Cform');
        }
        $this->load->model('Mthisinh');
        $this->load->model('Mkhoa');
        $listkhoa = $this->Mkhoa->get_list();
        $this->load->model('Mmonthi');
        $listmon = $this->Mmonthi->get_list();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->Mthisinh->joindb();

        if($this->input->post())
        {
            if($check == 0)
            $this->form_validation->set_rules('khoa', 'Khoa', 'required');
            $this->form_validation->set_rules('hoten', 'Họ và tên', 'required');
            $this->form_validation->set_rules('dob', 'Ngày sinh', 'required');
            $this->form_validation->set_rules('sdt', 'Số điện thoại', 'required|numeric|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('lop', 'Lớp', 'required');
            $this->form_validation->set_rules('masv', 'Mã Sinh Viên', 'required');
            $this->form_validation->set_rules('mon', 'Môn Thi', 'required');

            if($this->form_validation->run() == true){
                if($check == 0)
                $khoa = $this->input->post('khoa');
                $ten = $this->input->post('hoten');
                $ten = $this->Mthisinh->tachten($ten);
                $dob = $this->input->post('dob');
                $dob = strtotime($dob);
                $sdt = $this->input->post('sdt');
                $mail = $this->input->post('mail');
                $lop = $this->input->post('lop');
                $masv = $this->input->post('masv');
                $mon = $this->input->post('mon');
                $gioitinh = $this->input->post('gioi-tinh');
                $hinhthuc = $this->input->post('hinhthuc');

    
                $info = array(
                    'sMaSinhVien'	=> mb_convert_case($masv, MB_CASE_UPPER, "UTF-8"),
                    'FK_sMaKhoa'	=> mb_convert_case($khoa, MB_CASE_TITLE, "UTF-8"),
                    'sMaMon'		=> mb_convert_case($mon, MB_CASE_TITLE, "UTF-8"),
                    'sHoTenDem'		=> mb_convert_case($ten['hodem'], MB_CASE_TITLE, "UTF-8"),
                    'sTen'        	=> mb_convert_case($ten['ten'], MB_CASE_TITLE, "UTF-8"),
                    'sLop'       	=> mb_convert_case($lop, MB_CASE_UPPER, "UTF-8"),
                    'sGioiTinh' 	=> $gioitinh[0],
                    'dNgaySinh'     => $dob,
                    'sSDT'        	=> $sdt,
                    'sEmail'        => $mail,
                    'sGhiChu'       => $hinhthuc[0],
                    'sTruong'       => 'ĐH Mở Hà Nội',
                    'sNamThi'       => date("Y"),
                );
				$arrSv  = array();
                if($info['sMaSinhVien'] != ''){
					array_push($arrSv, $info);
				}
                if($this->Mthisinh->create($arrSv))
                    {
                        setToast('success', 'Đăng kí thành công');
                    }else{
                        setToast('error', 'Đăng kí thất bại');
                    }
                redirect('admindanhsach');
            }
            
        }
        
       
        $dLeft = array(
            'listmon' => $listmon,
            'listkhoa'=> $listkhoa,
        );
        $page = array(
            'title' => 'Đăng kí dự thi',
        );
        $messages = array(
            'messages'	=> $this->session->flashdata('messages'),
        );
        $data = array(
            'left'      => 'site/Vform',
            'dLeft'     => $dLeft,
            'page'      => $page,
        );
        $data['messages'] = $messages;
        
        $this->load->view('layout/Vlayout', $data);
    }


    
    function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Chỉ cho phép file ảnh');
                return false;
            }
        }

    }


    // Form public
    function publicForm(){
        $check=getSession();
        if(isset($check)){
            redirect('Cform');
        }
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Mthisinh');
        $this->load->model('Mduthi');
        if($this->input->post())
        {
            $this->form_validation->set_rules('hoten', 'Họ và tên', 'required');
            $this->form_validation->set_rules('dob', 'Ngày sinh', 'required');
            $this->form_validation->set_rules('image_hoso', 'Ảnh hồ sơ', 'callback_file_check');
            $this->form_validation->set_rules('sdt', 'Số điện thoại', 'required|numeric|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('truong', 'Đơn vị đào tạo', 'required');
            $this->form_validation->set_rules('khoa', 'Khoa', 'required');
            $this->form_validation->set_rules('lop', 'Lớp', 'required');
            $this->form_validation->set_rules('masv', 'Mã Sinh Viên', 'required');
            $this->form_validation->set_rules('mon', 'Môn Thi', 'required');
            $this->form_validation->set_rules('image', 'Minh chứng', 'callback_file_check');

            if($this->form_validation->run()){
                $ten = $this->input->post('hoten');
                $ten = $this->Mthisinh->tachten($ten);
                $dob = $this->input->post('dob');
                $dob = strtotime($dob);
                $truong = $this->input->post('truong');
                $sdt = $this->input->post('sdt');
                $mail = $this->input->post('mail');
                $khoa = $this->input->post('khoa');
                $lop = $this->input->post('lop');
                $masv = $this->input->post('masv');
                $mon = $this->input->post('mon');
                $gioitinh = $this->input->post('gioi-tinh');
                $hinhthuc = 'Tự do';

                $dau_hoso ='sv';
                $this->load->library('upload_library');
                $upload_path = './upload/hoso';
                // $dinhDanh = basename($_FILES["masv"]);
                $upload_data = $this->upload_library->upload($upload_path, 'image_hoso',$dau_hoso,'',$masv);
                $image_link_hoso = '';
                if(isset($upload_data['file_name'])){
                    $image_link_hoso = $upload_data['file_name']; //nếu có ảnh tải lên thì lấy tên ảnh
                }

                $dau ='mc';
                // $upload_path2 = './upload/minhchung';
                $upload_data = $this->upload_library->upload('./upload/minhchung', 'image', $dau,'',$masv);
                $image_link = '';
                if(isset($upload_data['file_name'])){
                    $image_link = $upload_data['file_name']; 
                }

                $info = array(
                    'sMaSinhVien'	=> mb_convert_case($masv, MB_CASE_UPPER, "UTF-8"),
                    'FK_sMaKhoa'	=> 14,
                    'sKhoa'			=> mb_convert_case($khoa, MB_CASE_TITLE, "UTF-8"),
                    'sMaMon'		=> mb_convert_case($mon, MB_CASE_TITLE, "UTF-8"),
                    'sHoTenDem'		=> mb_convert_case($ten['hodem'], MB_CASE_TITLE, "UTF-8"),
                    'sTen'         	=> mb_convert_case($ten['ten'], MB_CASE_TITLE, "UTF-8"),
                    'sLop'			=> mb_convert_case($lop, MB_CASE_UPPER, "UTF-8"),
                    'sGioiTinh'		=> $gioitinh[0],
                    'dNgaySinh'		=> $dob,
                    'sSDT'			=> $sdt,
                    'sEmail'        => $mail,
                    'sGhiChu'		=> $hinhthuc,
                    'sTruong'       => mb_convert_case($truong, MB_CASE_TITLE, "UTF-8"),
                    'sMinhchung'    => $image_link,
                    'sHoSo'         => $image_link_hoso,
                    'sNamThi'       => date("Y"),
                );

				$arrSv = array();
				if($info['sMaSinhVien'] != ''){
					array_push($arrSv, $info);
				}
                if($this->Mduthi->create($arrSv))
                    {
                        setToast('success', 'Đăng kí thành công');
                    }else{
                        setToast('error', 'Đăng kí thất bại');
                    }
                redirect('trangchu');
            }
            else{
                setToast('error', 'Đăng kí thất bại');
            }
        }
        $this->load->model('Mmonthi');
        $listmon = $this->Mmonthi->get_list();
        $dLeft = array(
            'listmon' => $listmon,
        );
        $page = array(
            'title' => 'Đăng kí dự thi',
        );
        $messages = array(
            'messages'	=> $this->session->flashdata('messages'),
        );
        $data = array(
            'left'      => 'site/VpublicForm',
            'dLeft'     => $dLeft,
            'page'      => $page,
        );
        $data['messages'] = $messages;
        $this->load->view('layout/Vlayout', $data);
    }

    function delete(){
        $khoa = getSession()->sMaKhoa;
        $check = getSession()->sIDQuyen;
        $this->load->Model('Mthisinh');
        $id = $this->uri->segment(3);
        $thisinh = $this->Mthisinh->get_info($id);
        if(!$thisinh)
        setToast('error', 'Không tồn tại sinh viên này');
        if($thisinh->FK_sMaKhoa != getSession()->sMaKhoa && $check != 0){
            setToast('error', 'Không tồn tại sinh viên này');
            redirect('Clist');
        }
        if($this->Mthisinh->delete($id)){
            $image_link = './upload/minhchung/'.$thisinh->sMinhchung;
            $image_link_hoso = './upload/hoso/'.$thisinh->sHoSo;
            if(file_exists($image_link && $image_link_hoso))
            {
                unlink($image_link && $image_link_hoso);
            }
            setToast('info', 'Xoá thành công');
            redirect('Clist');
        }
    }


}
