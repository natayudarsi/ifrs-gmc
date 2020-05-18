
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Detail Penjualan</h2>
                                    <a href="<?php echo base_url();?>index.php/penjualan" class="au-btn au-btn-icon au-btn--blue">Kembali</a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-30">
                            <div class="col-lg-4">
                                <div class="card border border-secondary">
                                    <div class="card-header">
                                        <strong class="card-title">Detail Penjualan</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        <?php 
                                                        foreach ($data2->result() as $key) {
                                                            ?>
                                                        <td width="130px">No. Nota</td>
                                                        <td><?php echo $key->no_penjualan;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal</td>
                                                        <td><?php echo date("d-m-Y", strtotime($key->tgl_penjualan));?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID Karyawan</td>
                                                        <td><?php echo $key->id_karyawan;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Pasien</td>
                                                        <td><?php echo $key->nama_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Telpon</td>
                                                        <td><?php echo $key->tlp_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td><?php echo $key->alamat_pasien;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url()?>index.php/penjualan/hapus/<?php echo $key->no_penjualan?>"><span class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Hapus</a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="col-lg-8">
                                <!-- DATA TABLE-->
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th width="70px">Id Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Harga</th>
                                                <th width="70px">Jumlah</th>
                                                <th>Total</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                
                                                foreach ($data->result() as $row) {
                                                    ?>                                 
                                                <td><?php echo $row->id_obat; ?></td>
                                                <td><?php echo $row->nama_obat; ?></td>
                                                <td><?php echo "Rp.",$row->harga_jual;?></td>
                                                <td><?php echo $row->jumlah;?></td>
                                                <td><?php echo "Rp.",$row->harga_jual * $row->jumlah;?></td>
                                            
                                            </tr>                                       
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
