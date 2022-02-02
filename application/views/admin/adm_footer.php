		</div>		
	</div>
	<div class="clearfix"></div>
	<footer>		
		<nav class="col-md-10 col-md-offset-2 navbar navbar-default navbar-footer admin-navbar-footer" role="navigation">
			<div class="container-fluid">				
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">						
						<li><a href="#"><?php //echo $this->m_dah->get_option('blog_name'); ?></a></li>						
					</ul>					
					<ul class="nav navbar-nav navbar-right">
						<li><a target="_blank" href="http://defryhamdhana.unimal.ac.id"></a></li>						
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</footer>
	<script type="text/javascript">
		$(document).ready(function(){
			// sidebar menu admin
			$(".admin-sidebar-menu > li > a.tutup").click(function(e){
				e.preventDefault();
				if($(this).hasClass("buka")){
					$(this).removeClass("buka");
					$(this).parent().children("ul").stop(true,true).slideUp("normal");
				}else{
					$(".admin-sidebar-menu a.tutup.buka").removeClass("buka");
					$(this).addClass("buka");
					$(".sub").filter(":visible").slideUp("normal");
					$(this).parent().children("ul").stop(true,true).slideDown("normal");
				}
			});
			// akhir sidebar menu admin

			$('.sidebar-toggle').click(function(){			
				$('.admin-sidebar').toggle();
				$('.navbar-top-admin').toggleClass('col-md-offset-2 col-md-10 col-md-12');
				$('.admin-navbar-footer').toggleClass('col-md-offset-2 col-md-10');
				$('.admin-content').toggleClass('col-md-10 col-md-12');
			});

			// disable submit form dengan enter
			$("input[type='text'],input[type='password'],input[type='email']").on('keypress', function(e) {
				return e.which !== 13;
			});
			// end

			// disable double insert record double click
			$('input[type="submit"]').on("click",function(){
				$(this).addClass('disabled');
			});

			$('body').on("click",".btn-hide-alert",function(){						
				var alert = $(this).parent();
				$(alert).slideUp();	
			});

			$('body').on("click",".btn-delete",function(){
				var link = $(this).attr('id');
				$('.modal-delete').modal();
				$('.btn-delete-oke').click(function(){
					location.replace(link);
				});
			});
			
			$('#table-datatable').dataTable();		

			$('input[type="text"]').attr("autocomplete","off");

			$('body').on("change", ".btn-image-cover", function() {
            var file = this.files[0];
            var jumlah = this.files.length;
            for (i = 0; i < jumlah; i++) {
            	if (this.files && this.files[i]) {
	            		var filerdr = new FileReader();
	            		filerdr.onload = function(e) {
	            			$('.tampil-image-cover').append("<img class='gambar-cover-sementara' src='" + e.target.result + "'>");
	            			$('.btn-hapus-cover').show();
	            			$('.btn-image-cover').hide();
            			}
            			filerdr.readAsDataURL(this.files[i]);
            		}
	            }
	        });

	        $('body').on("click", ".btn-hapus-cover", function() {            
            	$(this).hide();
         		$('.btn-image-cover').val("");
         		$('.tampil-image-cover img').hide();
         		$('.btn-image-cover').show();
	        });	        

	        $('body').on("click",".hapus-cover-image",function(){
	        	var id = $(this).attr('id');
	        	var data = "id="+id;
	        	if(confirm("Apakah anda yakin ingin menghapus gambar cover ini ?")){
	        		$.ajax({
	        			type: 'POST',
	        			url: "<?php echo base_url() ?>" + "admin/hapus_cover_page",
	        			data: data,
	        			success: function() {               		   	            		            		
	        				location.reload();
	        			}
	        		});
	        	}
	        });

	        $('body').on("click",".hapus-cover-image-post",function(){
	        	var id = $(this).attr('id');
	        	var data = "id="+id;
	        	if(confirm("Apakah anda yakin ingin menghapus gambar cover ini ?")){
	        		$.ajax({
	        			type: 'POST',
	        			url: "<?php echo base_url() ?>" + "admin/hapus_cover_post",
	        			data: data,
	        			success: function() {               		   	            		            		
	        				location.reload();
	        			}
	        		});
	        	}
	        });

	         $('body').on("click",".tambah-widget",function(){
	        	var location = $(this).attr('id');
	        	$('.muncul_lokasi').html(location);	        	
	        	$('#modalwidget').modal();
	        });


	         $('body').on("click",".btn-tambah-widget",function(){
	        	var widget = $(this).attr('id');
	        	var location = $(".muncul_lokasi").html();	        	
	        	var data = "widget="+widget+"&location="+location; 	        	
        		$.ajax({
        			type: 'POST',
        			url: "<?php echo base_url() ?>" + "admin/tambah_widget",
        			data: data,
        			success: function() {          				            		   	            		            	
        				window.location.reload();        				
        			}
        		});        	
	        });

	         // $('.widget').sortable();	         
	         

			$('body').on("change",".update-option",function(){		
				var option = $(this).attr('id');							
				var value = $(this).val();		

				var data = "option="+option+"&value="+value;				
				$.ajax({
					type: 'POST',
					url: "<?php echo base_url() ?>" + "admin/update_option",
					data: data,
					success: function() {               		   	            		            		
						$('.xxx').hide();            														                    		            		            		         
					},
					beforeSend: function(){            			
						$(".ajax-save").after().hide();  
						$("#"+option).after("<img class='xxx' src='<?php echo base_url()?>dah_image/system/123_ajax_loader.gif'></img>");						        			
					},
					complete: function(){        			
						$("#"+option).after('<span class="ajax-save">saved</span>'); 
					},
					error: function() {
						alert("Failed !");
					}
				});
			});

			$("ul.sort-widget").sortable({
				cursor: 'move',
				update: function () {      
					var posisi = $(this).attr('id');          
					var widget = $(this).sortable("serialize");                
					var data = widget+"&posisi="+posisi;
					$.ajax({
						type:'POST',
						url:"<?php echo base_url() ?>"+"admin/update_sort_widget",
						data:data,
						success:function(){
							alert("widget-saved!!");
						}
					});               
				}
	        });


						
			$("ul.sort-menu").sortable({
				cursor: 'move',
				connectWith: $('ul'),	
				placeholder: 'tujuan',			
				items: 'li',
				update: function (event,ui) { // syarat mengambil atribut id li yang di pilih 
					var selected = ui.item.attr('ini');					
					var parent = ui.item.parent().attr('parent'); //ui.item untuk berarti list yang di seret															
					var mother_tujuan = ui.item.parent().attr('id');										
					var mother = $(this).attr('id');          					
					var menu = $(this).sortable("serialize");					             				
					var data = menu+"&mother="+mother+"&selected="+selected+"&parent="+parent+"&mother_tujuan="+mother_tujuan;					
					$.ajax({
						type:'POST',
						url:"<?php echo base_url() ?>"+"admin/update_sort_menu",
						data:data,
						success:function(){

						},
						beforeSend: function(){            										 
							$('.tampil-loader').html("<img class='xxx pull-right' src='<?php echo base_url()?>dah_image/system/123_ajax_loader.gif'></img>");
						},
						complete: function(){        			
							$('.tampil-loader').html('');
						}
					});    
					
				}
				
	        });	

			$(".slider-sort").sortable({
				cursor:'move',
				update:function(){
					var xx = $(".slider-sort").sortable('serialize');
					$.ajax({
						type:'POST',
						data: xx,
						url:"<?php echo base_url().'admin/slider_sort' ?>",
						success:function(){
							alert("Slider berhasil di urutkan !");
						}
					});					
				}
			});

	        $( "ul.sort-menu" ).disableSelection();	

	   //      $("ul.sort-menu").sortable({
				// cursor: 'move',
				// connectWith: $('ul'),
				// items: 'li',
				// update: function () { 					
				// 	var mother = $(this).attr('id');          
				// 	var menu = $(this).sortable("serialize");					             				
				// 	var data = menu+"&mother="+mother;					
				// 	$.ajax({
				// 		type:'POST',
				// 		url:"<?php echo base_url() ?>"+"admin/update_sort_menu",
				// 		data:data,
				// 		success:function(){
				// 			alert('Menu Sorted !');
				// 		}
				// 	});               
				// }
	   //      });		


			// $("ul.sort-menu").sortable({
			// 	cursor: 'move',
			// 	connectWith: $('ul'),
			// 	items: 'li',
			// 	update: function () { 					

			// 	        // console.log(dataToSend);

			// 		// var parent = $("ul.sort-menu li").attr('x');
			// 		var posisi = $(this).attr('id');          
			// 		var menu = $(this).sortable("serialize");
			// 		var parent = $(this).sortable('serialize', {attribute: 'x'});                					
			// 		// // var parent = $(this).attr('x');                					
			// 		var data = menu+parent+"&posisi="+posisi;
			// 		console.log(data);
			// 		$.ajax({
			// 			type:'POST',
			// 			url:"<?php echo base_url() ?>"+"admin/update_sort_menu",
			// 			data:data,
			// 			success:function(html){
			// 				alert(html);
			// 			}
			// 		});               
			// 	}
	  //       });		
	
		});

		//untuk menghapus file dokumen di menu download
		$('body').on("click",".hapus-file-dokumen-page",function(){
        	var id = $(this).attr('id');
        	var data = "id="+id;
        	if(confirm("Apakah anda yakin ingin menghapus file dokumen ini ?")){
        		$.ajax({
        			type: 'POST',
        			url: "<?php echo base_url() ?>" + "admin/hapus_file_dokumen",
        			data: data,
        			success: function() {
        				location.reload();
        			}
        		});
        	}
        });

        //untuk menghapus foto headline
		$('body').on("click",".hapus-cover-headline",function(){
        	var id = $(this).attr('id');
        	var data = "id="+id;
        	if(confirm("Apakah anda yakin ingin menghapus cover headline ini ?")){
        		$.ajax({
        			type: 'POST',
        			url: "<?php echo base_url() ?>" + "admin/hapus_cover_headline",
        			data: data,
        			success: function() {
        				location.reload();
        			}
        		});
        	}
        });
	</script>



<!-- modal hapus -->
<div class="modal fade modal-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Peringatan</h4>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin Ingin Menghapus Data Ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-delete-oke">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- akhir modal hapus -->




</body>
</html>