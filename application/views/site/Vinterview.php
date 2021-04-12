<div class="main_left col-lg-12">
   <div class="b_left col-lg-12">
      <div class="l_content col-lg-12 album">
         <div class="tit-thongbao">
            <div class="clearfix vi-header">
               <div class="vi-left-title pull-left">
                  <img src="{public_url('site')}/img/t-album.png" alt="">
                  <!-- <div class="thongbao">Thông báo</div> -->
               </div>
            </div>
         </div>

        
         <div class="panel-body nd-thongbao wrapper_tp">
           {foreach $pre as $key => $pr}        
            {if $key == 2 || $key == 3 || $key == 6 || $key == 7}
               <div class="img col-lg-3" style="margin-bottom:1rem;">
                  <div class="interviewer">
                     <img class="inn-album" src="{base_url('upload/slide/')}{$pr.sLink}" title="{$pr.sMoTa}">
                     <div class="interview_text_left">{$pr.sMoTa}</div>
                  </div>
               </div>
            {else}
            <div class="img col-lg-3" style="margin-bottom:1rem;">
               <div class="interviewer">
                  <img class="inn-album" src="{base_url('upload/slide/')}{$pr.sLink}" title="{$pr.sMoTa}">
                  <div class="interview_text">{$pr.sMoTa}</div>
               </div>
            </div>
            {/if}
            {/foreach}
         </div>
      </div>
   </div>
</div>