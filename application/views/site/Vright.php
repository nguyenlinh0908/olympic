        
        <div class="right col-lg-4">
            <!-- <div class="r_noidung col-lg-12">
                <div class="vongloai row">
                    
                    <div class="timeline_text col-lg-9">
                        Vòng loại: Ngày 20-01-2021
                    </div>
                    <div class="icon_timeline">
                        <span class="glyphicon glyphicon-check"></span>
                    </div>
                </div>
            </div>
            <div class="r_content col-lg-12">
                <div class="r-tit-thongbao">
                    <div class="clearfix vi-header">
                        <div class="vi-left-title">
                            <img src="{public_url('site')}/img/sblue.png" width="90%"alt="">
                            <div class="center_text">Timeline Cuộc Thi</div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- timeline -->
            <div class="b_right col-lg-12">
                <div class="r_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-right-title pull-right col-lg-12">
                                <img src="{public_url('site')}/img/title-right-blue.png" alt="">
                                <div class="center_text timeline-text">Timeline Cuộc Thi</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body r-nd-thongbao">
                        <div class="tintuc1 row">
                            <div class="timeline_icon">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            </div>
                                
                            <div class="r_tieude">
                                <a href="">{$timeline[0]['sTenVongThi']} : {date('d-m-Y', $timeline[0]['sThoiGian'])}</a>
                            </div>
                        </div>
                        
                        <div class="tintuc1 row">
                            <div class="timeline_icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                                
                            <div class="r_tieude">
                                <a href="">{$timeline[1]['sTenVongThi']} : {date('d-m-Y', $timeline[1]['sThoiGian'])}</a>
                            </div>
                        </div>

                        <div class="tintuc1 row">
                            <div class="timeline_icon">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            </div>
                                
                            <div class="r_tieude">
                                <a href="">{$timeline[2]['sTenVongThi']} : {date('d-m-Y', $timeline[2]['sThoiGian'])}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- thong bao -->
            <div class="b_right col-lg-12">
                <div class="r_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-right-title pull-right col-lg-12">
                                <img src="{public_url('site')}/img/title-right-blue.png" alt="">
                                <div class="center_text">THÔNG BÁO</div>
                            </div>
                        </div>
                    </div>
                    {foreach $thongbao as $r}
                    <div class="panel-body r-nd-thongbao">
                        <img src="{public_url('site')}/img/Olympic logo.png" alt="">
                        <div class="tintuc2 row">     
                            <div class="r_thongbao">
                                <p>
                                    
                                    {$r.tNoiDung}
                                    
                                </p>
                            </div>
                        </div>
                        <div class="xemthem">
                            <a href="{base_url('thongbao')}">Xem thêm >></a>
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>

            <!-- slide -->
            <div class="b_right col-lg-12">
                <div style="height: 380px;" class="r_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-right-title pull-right col-lg-12">
                                <img src="{public_url('site')}/img/title-right-blue.png" alt="">
                                <div class="center_text">CẢM NHẬN VỀ CUỘC THI</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body r-nd-thongbao">
                        <div class="tintuc2 row">     
                            <!-- <img src="{public_url('site')}/img/slide1.jpg" alt=""> -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    {foreach $des as $ds}
                                    <div class="item">
                                        <img src="{base_url('upload/slide/')}{$ds.sLink}" alt="ảnh của cuộc thi olympic">
                                        <div class="carousel-caption" style="width: 100%; ">
                                            <div class="text-caption" style="font-size: 14px;">
                                                {$ds.sMoTa}
                                             </div>
                                            
                                        </div>
                                    </div>
                                    {/foreach}
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- hết slide -->
    </div>


<script>
$( ".item" ).first().addClass( "active" );
</script>