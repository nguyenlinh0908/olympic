<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>$(document).ready( function () {
    $('#table_id').DataTable(
            );
    
} );
</script>
<style>
button:focus{
    border-width: 0px !important;
}
.btn-success:hover{
    color: white !important;
}
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.display thead tr th{
    text-align: center;
}
</style>
<div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'London')">Danh sách thí sinh</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Đăng ký</button>
</div>

<div id="London" class="tabcontent">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-3 form-group">
                <label for="mon">Môn</label>
                <select name="mon" id="mon" class="form-control">
                        <option value="tatca">Tất cả</option>
                    {foreach $MonThi as $mt}
                        <option value="{$mt.sMaMon}">{$mt.sTenMon}</option>
                    {/foreach}
                </select>
            </div>
            <br>
            <button type="submit" class="btn-success btn" style="margin-top: 5px;" name="xuatexcel" value="xuatexcel">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> | Xuất Excel
            </button>
        </div>
    </form>
    <div class="table-responsive">
        <table id="table_id" class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Trường</th>
                    <th>Khoa</th>
                    <th>Mã SV</th>
                    <th>Môn Thi</th>
                    <th>Ghi chú</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                {foreach $list as $stt => $r}
                <tr>
                    <td style="text-align: center">{$stt+1}</td>
                    <td>{$r.sHoTenDem} {$r.sTen}</td>
                    <td style="text-align: center">{$r.sGioiTinh}</td>
                    <td>{$r.sTruong}</td>
                    {if $r.FK_sMaKhoa == 14}
                        <td>{$r.sKhoa}</td>
                    {else}
                        <td>{$r.sTenKhoa}</td>
                    {/if}
                    <td>{$r.sMaSinhVien}</td>
                    <td style="text-align: center">{$r.sTenMon}</td>
                    <td style="text-align: center">{$r.sGhiChu}</td>
                    <td style="text-align: center">
                        <a class="tipS" title="Chỉnh sửa" style="margin-right: 10px;" href="{base_url('Cform/edit/')}{$r.sIdThisinh}" >
                            <i class="fa fa-pencil-square-o" style="font-size: 24px; color: #226ad6;" aria-hidden="true"></i>
                        </a>
                        
                        <a id="delete" data-toggle="modal" data-target="#confirm-delete" data-href="{base_url('Cform/delete/')}{$r.sIdThisinh}"
                        class="tipS verify_action" id="delete" title="Xóa" href="">
                            <i class="fa fa-times" style="font-size: 28px; color: red;" aria-hidden="true"></i>
                        </a>
                    </td>

                    
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

</div>

<div id="Paris" class="tabcontent">
    <form action="{base_url('Cimport/import')}" id="form_dangky" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
            {if ($MaKhoa==13)} 
                <div class="form-group">
                    <select name="khoa" id="khoa" class="form-control">
                        {foreach $listkhoa as $khoa}
                            <option value="{$khoa.sMaKhoa}">{$khoa.sTenKhoa}</option>
                        {/foreach}
                    </select>
                </div>
            {/if}
                <div class="form-group">
                    <input type="file" class="form-control" id="file" name="file" value=""><span class="error" id="error-file"></span>
                </div>
            </div>
            
            <div class="col-sm-6">
                <button style="border: none; background: none;" class="add-btn btn" id="dangky" disabled="disabled" value="dangky" type="submit" name="dangky">
                    <div class="hint-text"><i class="fa fa-plus" aria-hidden="true"></i> | Đăng ký</div>
                </button>
                <a href="{base_url('Cimport/filemau')}" class="import-btn">
                    <div class="hint-text"><i class="fa fa-file-excel-o" aria-hidden="true"></i> | File mẫu</div>
                </a>
            </div>
        </div>
    </form>
    <div id="excel_area"></div>
</div>


    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Xác nhận Xóa ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                    <a class="btn btn-danger btn-ok">Xóa</a>
                </div>
            </div>
        </div>
    </div>





<script>
        $(document).ready(function () {
            $('#file').on('change', function () {
                var file = $('#file')[0].files;
                if(file['length']>0){
                    //lấy ra kiểu file
                    var type = file['0']['type'];
                    //Xét kiểu file được upload
                    var match = ["application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];
                    if(type == match[0] || type == match[1]){
                        $('#dangky').removeAttr("disabled");
                        var formdata = new FormData()
                        formdata.append('file',file[0]);
                        $.ajax({
                            url:"{base_url('Cimport/preview')}",
                            method:"POST",
                            contentType:false,
                            data: formdata,
                            cache:false,
                            processData:false,
                            success:function(data)
                            {
                                $('#error-file').html('');
                                $('#excel_area').html(data);
                                $('#excel_area').attr('class','table-responsive');
                                $('table').css('width','100%');
                                $('#excel_area meta, #excel_area title').remove();
                                $('#excel_area style').last().remove();
                            }
                        })
                    }
                    else{
                        $('#error-file').html('<p><i class="fas fa-exclamation-circle"></i> Không phải file excel</p>');
                        $('#excel_area').html('');
                        $('#dangky').attr("disabled","disabled");
                        return;
                    }
                }
            });
            $("#nhap").hide();
            $("#show").click(function(){
                $("#nhap").toggle();
            });
        })
    </script>
    
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>

<script>
document.getElementById("defaultOpen").click();
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>