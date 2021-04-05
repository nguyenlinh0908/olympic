{$user = getSession()}
<form class="form" id="form" action="{base_url('Cform/publicForm')}" onsubmit="return validateFormPublic()" method="post" enctype='multipart/form-data'>
    <div class="main_center col-lg-12">
        <div class="b_center col-lg-12 row">
            <div class="c_content col-lg-6">
                <div class="tit-thongbao">
                    <div class="clearfix vi-header">
                        <div class="form-horizontal">
                            <div class="header">Thông tin cá nhân</div>
                            <div class="form-content">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label><b>Họ và Tên:</b></label>
                                            <span style="color: red;">*</span>
                                            <input type="text" class="form-control" placeholder="Họ của bạn" value="{set_value('hoten')}" id="param_hoten" name="hoten">
                                            <div name="name_error" class="clear error">{form_error('hoten')}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label><b>Giới tính:</b></label>
                                                <span style="color: red;">*</span>
                                                <div class="" data-toggle="buttons">
                                                    <div class="gender">
                                                        <label id="btn" class="btn btn-outline-secondary active" for="nam">Nam
                                                            <input checked type="radio" name="gioi-tinh[]" value="Nam" id="nam">
                                                        </label>
                                                        <label id="btn" class="btn btn-outline-secondary" for="nu">Nữ
                                                            <input type="radio" name="gioi-tinh[]" value="Nữ" id="nu">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <label for=""><b>Ngày Sinh:</b></label>
                                                <span style="color: red;">*</span>
                                                <div class="date">
                                                    <input id="dob" name="dob" value="{set_value('dob')}" type="date" class="form-control">
                                                    <div name="name_error" class="clear error">{form_error('dob')}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="select col-lg-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label><b>Email:</b></label>
                                            <span style="color: red;">*</span>
                                            <input type="text" placeholder="Email của bạn" value="{set_value('mail')}" class="form-control" id="mail" name="mail">
                                            <div name="name_error" class="clear error">{form_error('mail')}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label><b>Số điện thoại:</b></label>
                                            <span style="color: red;">*</span>
                                            <input type="text" placeholder="Số điện thoại của bạn" id="sdt" class="form-control" value="{set_value('sdt')}" name="sdt">
                                            <div name="name_error" class="clear error">{form_error('sdt')}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
<<<<<<< HEAD
                                    <div class="col-lg-12">
                                        <label><b>Ảnh hồ sơ (*Tải ảnh hồ sơ tỷ lệ 3x4)</b></label>
                                        <span style="color: red;">*</span>
                                        
                                        <input type="file" class="form-control" id="image_hoso" name="image_hoso" multiple="true">
                                        <a style="text-align:right !important;
=======
                                        <div class="col-lg-12">
                                            <label><b>Ảnh hồ sơ (*Tải ảnh hồ sơ tỷ lệ 3x4)</b></label>
                                            <span style="color: red;">*</span>
                                            <input type="file" class="form-control" id="image_hoso" name="image_hoso" multiple="true">
                                            <a style="text-align:right !important;
>>>>>>> 7e1f64461646bc7c91b6061406d4a49494323b63
    border-width: 0 2px 2px;
    font-weight: bold;
    border-color: #ad9a9a;
    margin-top: -2px;" class="btn" width="100%" alt="" data-toggle="modal" data-target="#myModal">Xem trước</a>
                                        </div>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
<<<<<<< HEAD
                                                        <img frameborder="0" scrolling="no" class="hide-album" id="output" src="#" 
                                                        class="fluid modal-title" style="overflow:hidden;height:100%;width:100%" 
                                                        height="100%" width="100%" alt="image_hoso">
                                                        <figcaption  class="figure-caption text-center"></figcaption>
=======
                                                        <img frameborder="0" scrolling="no" class="hide-album" id="blah" src="#" class="fluid modal-title" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%" alt="image_hoso">
                                                        <figcaption class="figure-caption text-center"></figcaption>
>>>>>>> 7e1f64461646bc7c91b6061406d4a49494323b63
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div name="name_error" style="margin-top: -25px;" class="clear error">{form_error('image')}</div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="c_content col-lg-6">
                <div class="tit-thongbao">
                    <div class="clearfix vi-header">
                        <div class="form-horizontal">
                            <div class="header1">Thông tin dự thi</div>
                            <div class="form-content">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="">
                                                <label><b>Đơn vị đào tạo(Trường):</b></label>
                                                <span style="color: red;">*</span>
                                                <input type="text" class="form-control" placeholder="vd: Đại Học Mở Hà Nội" value="{set_value('truong')}" id="truong" name="truong">
                                                <div name="name_error" class="clear error">{form_error('truong')}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select">
                                            <label><b>Khoa</b></label>
                                            <span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="khoa" placeholder="Khoa" value="{set_value('khoa')}" name="khoa">
                                        </div>
                                        <div name="name_error" class="clear error">{form_error('khoa')}</div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>Lớp hành chính: </b></label>
                                                <span style="color: red;">*</span>
                                                <input type="text" class="form-control" id="lop" placeholder="Lớp hành chính của bạn" value="{set_value('lop')}" name="lop">
                                                <div name="name_error" class="clear error">{form_error('lop')}</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Mã Sinh Viên: </b></label>
                                                <span style="color: red;">*</span>
                                                <input type="text" class="form-control" id="masv" placeholder="Mã sinh viên của bạn" value="{set_value('masv')}" name="masv">
                                                <div name="name_error" class="clear error">{form_error('masv')}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select" style="text-align:right;">
                                            <label style="text-align:left !important;"><b>Ảnh minh chứng (*Tải lên ảnh chụp thẻ sinh viên, CCCD hoặc CMND)</b></label>
                                            <span style="color: red;">*</span>
                                            <input type="file" class="form-control" id="image" name="image" multiple="true">
                                            <a style="text-align: right;
    border-width: 0 2px 2px;
    font-weight: bold;
    border-color: #ad9a9a;
    margin-top: -2px;" class="btn" width="100%" alt="" data-toggle="modal" data-target="#myModal">Xem trước</a>
                                        </div>                                    
                                        <div name="name_error" style="    margin-top: -25px;" class="clear error">{form_error('image')}</div>
                                    </div>
                                    <div class="form-group">
                                        <div class="monthi">
                                            <label><b>Môn Thi</b></label>
                                            <span style="color: red;">*</span>
                                            <select class="form-control" id="mon" name="mon">
                                                <option value="" selected>---Môn thi---</option>
                                                {foreach $listmon as $k}
                                                <option value="{$k['sMaMon']}">{$k.sTenMon}</option>
                                                {/foreach}
                                            </select>
                                            <div name="name_error" class="clear error">{form_error('mon')}</div>
                                        </div>
                                    </div>




                                </div>
                                <div class="footer clearfix">
                                    <button id="add-thisinh_submit" name="action" value="add-thisinh" type="submit" class="confirm btn btn-default">Đăng ký ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("btn");
    var btns = header.getElementsByClassName("btn-outline-secondary");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

<script>
$(function(){
    var imagesPreview = function (input){
        if(input.files){
            var filesAmount  =   input.files.length;
            for(i = 0; i < filesAmount; i++){
                var reader = new FileReader();
                
                reader.onload = function(e){
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
    $("#image, #image_hoso").change(function() {
        imagesPreview(this);
    });
})
</script>

<!-- <script src ="{base_url()}public/js/publicForm.js"></script> -->
