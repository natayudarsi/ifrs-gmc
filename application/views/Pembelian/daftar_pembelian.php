
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Pembelian</h2>
                                    <a href="<?php echo base_url();?>index.php/pembelian/addpembelian" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>add</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-lg-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Transaksi</th>
                                                <th>Nama PBO</th>
                                                <th>Tanggal pengiriman</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                foreach ($data->result() as $row) {
                                                    ?>                                 
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $row->no_pembelian;?></td>
                                                <td><?php echo $row->nama_pbo;?></td>
                                                <td><?php echo date("d-m-Y", strtotime($row->tgl_pengiriman));?></td>
                                                <td>
                                                    <a style="text-align: center;" href="<?php echo base_url()?>index.php/pembelian/detailpembelian/<?php echo $row->no_pembelian; ?>"><span class="fas fa-file-text"></a>
                                                </td>
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
