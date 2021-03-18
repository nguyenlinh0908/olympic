<div class="topNav">
	<div class="wrapper">
		<div class="welcome">
			<span>Xin chào: <b>admin!</b></span>
		</div>
		
		<div class="userNav">
			<ul>
				<li><a href="{base_url('admintrangchu')}">
					<span><i class="fas fa-home"></i> Trang chủ</span>
				</a></li>
				<li><a href="{base_url('adminbaiviet')}" >
					<span><i class="far fa-file-alt"></i> Bài viết</span>
				</a></li>
				<li><a href="{base_url('admintainguyen')}" >
					<span><i class="far fa-images"></i> Ảnh,video</span>
				</a></li>
				<li><a class="active" id="current" href="{base_url('admintimeline')}" >
					<span><i class="fas fa-volume-up"></i> Timeline</span>
				</a></li>
				<li><a class="active" id="current" href="{base_url('admintaikhoan')}" >
					<span><i class="fas fa-user"></i> Accounts</span>
				</a></li>
				<!-- Logout -->
				<li><a href="{admin_url('Caccount/logout')}">
					<img src="{public_url('admin')}/images/icons/topnav/logout.png" alt="">
					<span>Đăng xuất</span>
				</a></li>			
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>