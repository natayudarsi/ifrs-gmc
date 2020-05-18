    <script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_obat" ).autocomplete({
              source: "<?php echo site_url('penjualan/get_autocomplete/?');?>",

              select: function (event, ui) {
                $('[name="nama_obat"]').val(ui.item.label);
                $('[name="id_obat"]').val(ui.item.id_obat);
                $('[name="harga_jual"]').val('Rp.'+ ui.item.harga_jual);
                $('[name="stok"]').val(ui.item.stok +' ' + ui.item.jenis);
              }
            });
        });
    </script>