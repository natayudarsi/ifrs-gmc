<div class="card border border-secondary">
                                    <div class="card-header">
                                        <strong class="card-title">Pilih Tanggal</strong>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="<?php echo base_url()?>index.php/laporan/laporan_pembelian" target="_blank">
                                            <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Dari</td>
                                                        <td>
                                                            <input type="date" name="date_dari" class="form-control" style="width: 200px" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sampai</td>
                                                        <td>
                                                            <input type="date" name="date_sampai" class="form-control" style="width: 200px" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                                        </td>
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
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
                                                <td><?php echo $row->tgl_pengiriman;?></td>
                                                <td>
                                                    <a style="text-align: center;" href="<?php echo base_url()?>index.php/pembelian/detailpembelian/<?php echo $row->no_pembelian; ?>"><span class="fas fa-file-text"></a>
                                                </td>
                                            </tr>                                       
                                        <?php } ?>
                                        </tbody>
                                    </table>