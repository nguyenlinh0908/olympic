<link rel="stylesheet" href="{public_url()}slide/css/style.css">
<div style="margin: 2rem">
  <marquee id="marq" scrollamount="8" direction="left" scrolldelay="0" behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()">
    {foreach $carousel as $r}
       <div class="marquee">
          <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
       </div>
    {/foreach}
    <div class="marquee">
      <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
   </div>
   <div class="marquee">
    <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
 </div>
 <div class="marquee">
  <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
</div>
<div class="marquee">
  <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
</div>
<div class="marquee">
  <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
</div>
<div class="marquee">
  <img src="{base_url('upload/slide/')}{$r.sLink}" alt="">
</div>
</marquee>
</div>