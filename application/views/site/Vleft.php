<div class="main_left col-lg-8">
            <div class="b_left col-lg-12">
                <div class="l_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-left-title pull-left">
                                <a href="{base_url('dvdangcai')}"><img src="{public_url('site')}/img/t-dangcai.png" alt=""></a>
                                <!-- <div class="thongbao">Thông báo</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="panel-body nd-thongbao">
                        <div class="tintuc row">
                            <a href="{base_url('baiviet/')}{$dangcai[0]['sIDBaiviet']}"  style="display: block; font-size: 16px;
    color: #337ab7; text-align:justify;">{$dangcai[0]['tTomTat']}</a>
                        </div>
                        <div class="xemthem">
                            <a href="{base_url('dvdangcai')}">Xem thêm >></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b_left col-lg-12">
                <div class="l_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-left-title pull-left">
                                <!-- <img src="{public_url('site')}/img/t-gioithieu.png" alt=""> -->
                                <a href="{base_url('gioithieu')}"><img src="{public_url('site')}/img/t-gioithieu.png" alt=""></a>
                                <!-- <div class="thongbao">Thông báo</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="panel-body nd-thongbao">
                    {foreach $gioithieu as $r}
                        <div class="tintuc row">
                            <div class="icon col-lg-1">
                            <img src="{public_url('site')}/img/logo-sach.png" alt="">
                            <!-- <i class="fa fa-file-text-o" aria-hidden="true"></i> -->
                            </div>
                            <div class="tieude col-lg-10">
                                <a href="{base_url('baiviet/')}{$r.sIDBaiviet}">{$r.sTieuDe}</a>
                                <div class="date">
                                    <i class="fa fa-calendar" aria-hidden="true"> {date("d-m-Y", $r.dNgayDang)}</i>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    </div>
                </div>
            </div>
            <div class="b_left col-lg-12">
                <div class="l_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-left-title pull-left">
                                <!-- <img src="{public_url('site')}/img/tittle11.png" alt=""> -->
                                <a href="{base_url('thongbao')}"><img src="{public_url('site')}/img/tittle11.png" alt=""></a>
                                <!-- <div class="thongbao">Thông báo</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="panel-body nd-thongbao">
                    {foreach $tb as $r}
                        <div class="tintuc row">
                            <div class="icon col-lg-1">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            </div>
                            <div class="tieude col-lg-10">
                                <a href="{base_url('baiviet/')}{$r.sIDBaiviet}">{$r.sTieuDe}</a>
                                <div class="date">
                                    <i class="fa fa-calendar" aria-hidden="true"> {date("d-m-Y", $r.dNgayDang)}</i>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    </div>
                </div>
            </div>
            <div class="b_left col-lg-12">
                <div class="l_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-left-title pull-left">
                                <a href="{base_url('ontap')}"><img src="{public_url('site')}/img/t-ontap.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body nd-thongbao">
                    {foreach $ontap as $r}
                        <div class="tintuc row">
                            <div class="icon col-lg-1">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                            <div class="tieude col-lg-10">
                                <a href="{base_url('baiviet/')}{$r.sIDBaiviet}">{$r.sTieuDe}</a>
                                <div class="date">
                                    <i class="fa fa-calendar" aria-hidden="true"> {date("d-m-Y", $r.dNgayDang)}</i>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    </div>
                </div>
            </div>

            <div class="b_left col-lg-12">
                <div class="l_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-left-title pull-left">
                                <a href="{base_url('ontap')}"><img src="{public_url('site')}/img/t-ontap.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body nd-thongbao">
                    {foreach $ontap as $r}
                        <div class="tintuc row">
                            <div class="icon col-lg-1">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                            <div class="tieude col-lg-10">
                                <a href="{base_url('baiviet/')}{$r.sIDBaiviet}">{$r.sTieuDe}</a>
                                <div class="date">
                                    <i class="fa fa-calendar" aria-hidden="true"> {date("d-m-Y", $r.dNgayDang)}</i>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    </div>
                </div>
            </div>

            <div class="b_left col-lg-12">
                <div class="l_content col-lg-12">
                    <div class="tit-thongbao">
                        <div class="clearfix vi-header">
                            <div class="vi-left-title pull-left">
                                <a href="{base_url('danhsach')}"><img src="{public_url('site')}/img/t-danhsach.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body nd-thongbao">
                    {foreach $danhsach as $r}
                        <div class="tintuc row">
                            <div class="icon col-lg-1">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                            <div class="tieude col-lg-10">
                                <a href="{base_url('baiviet/')}{$r.sIDBaiviet}">{$r.sTieuDe}</a>
                                <div class="date">
                                    <i class="fa fa-calendar" aria-hidden="true"> {date("d-m-Y", $r.dNgayDang)}</i>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    </div>
                </div>
            </div>
        </div>
