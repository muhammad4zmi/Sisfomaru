$('document').ready(function() {
	// checkbox untuk mencentang semua
	jQuery('#pilih_semua').on('click', function(e) {
		if($(this).is(':checked',true)) {
			$(".pgw_checkbox").prop('checked', true);
		}
		else {
			$(".pgw_checkbox").prop('checked',false);
		}
		// mengatur semua jumlah checkbox yang dicentang
		$("#jumlah_pilih").html($("input.pgw_checkbox:checked").length+" Dipilih");
	});
	// mengatur jumlah checkbox tertentu yang dicentang
	$(".pgw_checkbox").on('click', function(e) {
		$("#jumlah_pilih").html($("input.pgw_checkbox:checked").length+" Dipilih");
	});
	// hapus record yang dicentang
	jQuery('#hapus_record').on('click', function(e) {
		var pegawai = [];
		$(".pgw_checkbox:checked").each(function() {
			pegawai.push($(this).data('pwg-id'));
		});
		if(pegawai.length <=0)  {
			alert("Silahkan pilih record.");
		}
		else {
			var message = "Apakah Anda yakin ingin menghapus record yang dipilih?";
			var checked = confirm(message);
			if(checked == true) {
				var selected_values = pegawai.join(",");
				$.ajax({
					type: "POST",
					url: "hapus.php",
					cache:false,
					data: 'pwg_id='+selected_values,
					success: function(response) {
						// menghilangkan baris pegawai yang dihapus
						var pgw_ids = response.split(",");
						for (var i=0; i<pgw_ids.length; i++ ) {
							$("#"+pgw_ids[i]).remove();
						}
					}
				});
			}
		}
	});
});
