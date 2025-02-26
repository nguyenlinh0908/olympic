<!-- head -->
<link rel="stylesheet" type="text/css" href="{public_url('site')}/bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="{public_url('site')}bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="titleArea">
   <div class="wrapper">
      <div class="pageTitle">
         <h5>Bài viết</h5>
         <span>Quản lý bài viết</span>
      </div>
      <div class="horControlB menu_action">
         <ul>
            <li><a href="{base_url('thembaiviet')}">
               <img src="{public_url('admin')}/images/icons/control/16/add.png">
               <span>Thêm mới</span>
               </a>
            </li>
            <li><a href="{base_url('adminbaiviet')}">
               <img src="{public_url('admin')}/images/icons/control/16/list.png">
               <span>Danh sách</span>
               </a>
            </li>
         </ul>
      </div>
      <div class="clear"></div>
   </div>
</div>
<div class="line"></div>
<div class="wrapper">
   <!-- Form -->
   <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
      <fieldset>
         <div class="widget">
            <div class="title">
               <img src="{public_url('admin')}/images/icons/dark/add.png" class="titleIcon">
               <h6>Thêm mới bài viết</h6>
            </div>
            <ul class="tabs">
               <li><a href="#tab1">Thông tin chung</a></li>
            </ul>
            <div class="tab_container">
               <div id="tab1" class="tab_content pd0">
                  <div class="formRow">
                     <label for="param_cat" class="formLeft">Danh Mục:<span class="req">*</span></label>
                     <div class="formRight">
                        <select name="loaitin"  class="left">
                           <option value=""></option>
                           {foreach $loaitin as $row}
                           <option value="{$row.sIDLoaiTin}"{if $row.sIDLoaiTin == $baiviet->FK_sIDLoaiTin}selected{/if}>{$row.sTenLoaiTin}</option>
                           {/foreach}
                        </select>
                        <span class="autocheck" name="cat_autocheck"></span>
                        <div class="clear error" name="cat_error">{form_error('loaitin')}</div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label class="formLeft" for="param_tieude">Tiêu đề:<span class="req">*</span></label>
                     <div class="formRight">
                        <input name="tieude" id="param_tieude" _autocheck="true" type="text" value="{$baiviet->sTieuDe}">
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error">{form_error('tieude')}</div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label class="formLeft" for="param_gifts">Tóm tắt:</label>
                     <div class="formRight">
                        <textarea name="tomtat" id="param_tomtat" rows="4" cols="" >{$baiviet->tTomTat}</textarea>
                        <span name="gifts_autocheck" class="autocheck"></span>
                        <div name="gifts_error" class="clear error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow hide"></div>
                  <div class="formRow">
                     <label class="formLeft">Nội dung:</label>
                     <div class="formRight">
                        <div class="formRightTop">
                           <textarea name="noidung" id="param_noidung" rows="4" cols="" >{$baiviet->tNoiDung}</textarea>
                           <span name="gifts_autocheck" class="autocheck"></span>
                           <div name="gifts_error" class="clear error"></div>
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow hide"></div>
               </div>
            </div>
            <div class="formSubmit">
               <input type="submit" value="Cập nhật" class="redB">
            </div>
            <div class="clear"></div>
         </div>
      </fieldset>
   </form>
</div>
<div class="clear mt30"></div>
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
   function readURL(input) {
   if (input.files && input.files[0]) {
   var reader = new FileReader();
   
   reader.onload = function(e) {
   $('#blah').attr('src', e.target.result);
   }
   
   reader.readAsDataURL(input.files[0]); // convert to base64 string
   }
   }
   
   $("#imgage").change(function() {
   readURL(this);
   });
</script>

<script type="text/javascript">               
										let editor = CKEDITOR.replace('param_noidung',{
										filebrowserBrowseUrl : '{public_url('plugins')}/ckfinder/ckfinder.html',
										filebrowserImageBrowseUrl : '{public_url('plugins')}/ckfinder/ckfinder.html?Type=Images',
										filebrowserFlashBrowseUrl : '{public_url('plugins')}/ckfinder/ckfinder.html?Type=Flash',
										filebrowserUploadUrl : '{public_url('plugins')}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Filess',
										filebrowserImageUploadUrl : '{public_url('plugins')}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
										filebrowserFlashUploadUrl : '{public_url('plugins')}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										filebrowserWindowWidth : '800',
										filebrowserWindowHeight : '480'
										});
									</script>