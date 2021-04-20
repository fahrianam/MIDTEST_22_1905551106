<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Sistem KRS Mahasiswa</title>

		<meta name="description" content="Common UI Features &amp; Elements" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('style/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="{{ asset('style/assets/css/jquery-ui.custom.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('style/assets/css/jquery.gritter.min.css')}}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('style/assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('style/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('style/assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('style/assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		<style>
			/* some elements used in demo only */
			.spinner-preview {
				width: 100px;
				height: 100px;
				text-align: center;
				margin-top: 60px;
			}
			
			.dropdown-preview {
				margin: 0 5px;
				display: inline-block;
			}
			.dropdown-preview  > .dropdown-menu {
				display: block;
				position: static;
				margin-bottom: 5px;
			}
		</style>

		<!-- ace settings handler -->
		<script src="{{ asset('style/assets/js/ace-extra.min.js')}}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                        <span class="sr-only">Toggle sidebar</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-header pull-left">
                        <a href="/" class="navbar-brand">
                            <small>
                                <i class="fa fa-leaf"></i>
                                SISTEM KRS MAHASISWA
                            </small>
                        </a>
                    </div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>


				<ul class="nav nav-list">
					<li class="">
						<a href="/">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Mahasiswa
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="/mahasiswa">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Mahasiswa
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-briefcase"></i>
							<span class="menu-text"> Dosen </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="active">
								<a href="/dosen">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Dosen
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-credit-card"></i>
							<span class="menu-text"> Mata Kuliah </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="/matakuliah">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Mata Kuliah
								</a>

								<b class="arrow"></b>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Dosen
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Daftar Dosen
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form  action="/dosen/{{$dosen->id}}" method="POST" class="form-horizontal" role="form" novalidate>
									@csrf
                                    @method('PUT')
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Masukkan Nama Anda" class="col-xs-10 col-sm-5" id="nama" name="nama" value="{{$dosen->nama_dosen}}" required/>
										</div>
									</div>

                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NIK </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Masukkan NIK Anda" class="col-xs-10 col-sm-5" id="nik" name="nik" value="{{$dosen->NIK}}" required/>
										</div>
									</div>
                                   
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis Kelamin &nbsp; </label> 
                                        <div class="col-sm-9">
                                            <select class="col-xs-10 col-sm-4" id="form-field-1-1" id="jenis_kelamin" name="jenis_kelamin" required >
                                                <option value=""></option>
                                                <option value="Pria" @if($dosen->jenis_kelamin == 'Pria') selected='selected' @endif>Pria</option>
                                                <option value="Wanita" @if($dosen->jenis_kelamin == 'Wanita') selected='selected' @endif>Wanita</option>
                                            </select>
                                        </div>
									</div>
                                   
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Lahir </label>

										<div class="col-sm-9">
											<input type="date" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Masukkan Tanggal Lahir Anda" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$dosen->tanggal_lahir}}" required/>
										</div>
									</div>

                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Masukkan Alamat Anda" class="col-xs-10 col-sm-5" id="alamat" name="alamat" value="{{$dosen->alamat}}" required/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No.Telp </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Masukkan No.Telp Anda" class="col-xs-10 col-sm-5" id="telepon" name="telepon" value="{{$dosen->no_telp}}" required/>
										</div>
									</div>

                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1-1" placeholder="Masukkan Email Anda" class="col-xs-10 col-sm-5" id="email" name="email" value="{{$dosen->email}}" required/>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
                                            
                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-danger" type="button" onclick="location.href='/dosen'">
												<i class="ace-icon fa fa-reply bigger-110"></i>
												Kembali
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>

									<div class="space-24"></div>
								</form>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							SISTEM KRS MAHASISWA
						</span>
						<p></p>
						Author: Fahri Choirul Anam 1905551106
						&nbsp; &nbsp;
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{ asset('style/assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('style/assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
		</script>
		<script src="{{ asset('style/assets/js/bootstrap.min.js')}}"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="{{ asset('style/assets/js/jquery-ui.custom.min.js')}}"></script>
		<script src="{{ asset('style/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
		<script src="{{ asset('style/assets/js/bootbox.js')}}"></script>
		<script src="{{ asset('style/assets/js/jquery.easypiechart.min.js')}}"></script>
		<script src="{{ asset('style/assets/js/jquery.gritter.min.js')}}"></script>
		<script src="{{ asset('style/assets/js/spin.js')}}"></script>

		<!-- ace scripts -->
		<script src="{{ asset('style/assets/js/ace-elements.min.js')}}"></script>
		<script src="{{ asset('style/assets/js/ace.min.js')}}"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				/**
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				  //console.log(e.target.getAttribute("href"));
				})
					
				$('#accordion').on('shown.bs.collapse', function (e) {
					//console.log($(e.target).is('#collapseTwo'))
				});
				*/
				
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
					//if($(e.target).attr('href') == "#home") doSomethingNow();
				})
			
				
				/**
					//go to next tab, without user clicking
					$('#myTab > .active').next().find('> a').trigger('click');
				*/
			
			
				$('#accordion-style').on('click', function(ev){
					var target = $('input', ev.target);
					var which = parseInt(target.val());
					if(which == 2) $('#accordion').addClass('accordion-style2');
					 else $('#accordion').removeClass('accordion-style2');
				});
				
				//$('[href="#collapseTwo"]').trigger('click');
			
			
				$('.easy-pie-chart.percentage').each(function(){
					$(this).easyPieChart({
						barColor: $(this).data('color'),
						trackColor: '#EEEEEE',
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: 8,
						animate: ace.vars['old_ie'] ? false : 1000,
						size:75
					}).css('color', $(this).data('color'));
				});
			
				$('[data-rel=tooltip]').tooltip();
				$('[data-rel=popover]').popover({html:true});
			
			
				$('#gritter-regular').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a regular notice!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: '{{ asset('style/assets/images/avatars/avatar1.png')}}', //in Ace demo ./dist will be replaced by correct assets path
						sticky: false,
						time: '',
						class_name: (!$('#gritter-light').get(0).checked ? 'gritter-light' : '')
					});
			
					return false;
				});
			
				$('#gritter-sticky').on(ace.click_event, function(){
					var unique_id = $.gritter.add({
						title: 'This is a sticky notice!',
						text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="red">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: '{{ asset('style/assets/images/avatars/avatar.png')}}',
						sticky: true,
						time: '',
						class_name: 'gritter-info' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
			
			
				$('#gritter-without-image').on(ace.click_event, function(){
					$.gritter.add({
						// (string | mandatory) the heading of the notification
						title: 'This is a notice without an image!',
						// (string | mandatory) the text inside the notification
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="orange">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						class_name: 'gritter-success' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
			
			
				$('#gritter-max3').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a notice with a max of 3 on screen at one time!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="green">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: '{{ asset('style/assets/images/avatars/avatar3.png')}}', //in Ace demo ./dist will be replaced by correct assets path
						sticky: false,
						before_open: function(){
							if($('.gritter-item-wrapper').length >= 3)
							{
								return false;
							}
						},
						class_name: 'gritter-warning' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
			
			
				$('#gritter-center').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a centered notification',
						text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
						class_name: 'gritter-info gritter-center' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
				
				$('#gritter-error').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a warning notification',
						text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
						class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
					
			
				$("#gritter-remove").on(ace.click_event, function(){
					$.gritter.removeAll();
					return false;
				});
					
			
				///////
			
			
				$("#bootbox-regular").on(ace.click_event, function() {
					bootbox.prompt("What is your name?", function(result) {
						if (result === null) {
							
						} else {
							
						}
					});
				});
					
				$("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm("Are you sure?", function(result) {
						if(result) {
							//
						}
					});
				});
				
			/**
				$("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm({
						message: "Are you sure?",
						buttons: {
						  confirm: {
							 label: "OK",
							 className: "btn-primary btn-sm",
						  },
						  cancel: {
							 label: "Cancel",
							 className: "btn-sm",
						  }
						},
						callback: function(result) {
							if(result) alert(1)
						}
					  }
					);
				});
			**/
				
			
				$("#bootbox-options").on(ace.click_event, function() {
					bootbox.dialog({
						message: "<span class='bigger-110'>I am a custom dialog with smaller buttons</span>",
						buttons:
						{
							"success" :
							 {
								"label" : "<i class='ace-icon fa fa-check'></i> Success!",
								"className" : "btn-sm btn-success",
								"callback": function() {
									//Example.show("great success");
								}
							},
							"danger" :
							{
								"label" : "Danger!",
								"className" : "btn-sm btn-danger",
								"callback": function() {
									//Example.show("uh oh, look out!");
								}
							}, 
							"click" :
							{
								"label" : "Click ME!",
								"className" : "btn-sm btn-primary",
								"callback": function() {
									//Example.show("Primary button");
								}
							}, 
							"button" :
							{
								"label" : "Just a button...",
								"className" : "btn-sm"
							}
						}
					});
				});
			
			
			
				$('#spinner-opts small').css({display:'inline-block', width:'60px'})
			
				var slide_styles = ['', 'green','red','purple','orange', 'dark'];
				var ii = 0;
				$("#spinner-opts input[type=text]").each(function() {
					var $this = $(this);
					$this.hide().after('<span />');
					$this.next().addClass('ui-slider-small').
					addClass("inline ui-slider-"+slide_styles[ii++ % slide_styles.length]).
					css('width','125px').slider({
						value:parseInt($this.val()),
						range: "min",
						animate:true,
						min: parseInt($this.attr('data-min')),
						max: parseInt($this.attr('data-max')),
						step: parseFloat($this.attr('data-step')) || 1,
						slide: function( event, ui ) {
							$this.val(ui.value);
							spinner_update();
						}
					});
				});
			
			
			
				//CSS3 spinner
				$.fn.spin = function(opts) {
					this.each(function() {
					  var $this = $(this),
						  data = $this.data();
			
					  if (data.spinner) {
						data.spinner.stop();
						delete data.spinner;
					  }
					  if (opts !== false) {
						data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
					  }
					});
					return this;
				};
			
				function spinner_update() {
					var opts = {};
					$('#spinner-opts input[type=text]').each(function() {
						opts[this.name] = parseFloat(this.value);
					});
					opts['left'] = 'auto';
					$('#spinner-preview').spin(opts);
				}
			
			
			
				$('#id-pills-stacked').removeAttr('checked').on('click', function(){
					$('.nav-pills').toggleClass('nav-stacked');
				});
			
				
				
				
				
				
				///////////
				$(document).one('ajaxloadstart.page', function(e) {
					$.gritter.removeAll();
					$('.modal').modal('hide');
				});
			
			});
		</script>
	</body>
</html>