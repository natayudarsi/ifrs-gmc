<script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_obat" ).autocomplete({
              source: "<?php echo site_url('pembelian/get_autocomplete/?');?>",

              select: function (event, ui) {
                $('[name="nama_obat"]').val(ui.item.label);
                $('[name="id_obat"]').val(ui.item.id_obat);
                $('[name="harga_beli"]').val("Rp." + ui.item.harga_beli);
                $('[name="stok"]').val(ui.item.stok + " " + ui.item.jenis);
              }
            });
        });
    </script>