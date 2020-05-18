<div class="card border border-secondary">
                                    <div class="card-header">
                                        <strong class="card-title">Pilih Tanggal</strong>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="<?php echo base_url()?>index.php/laporan/laporan_obat" target="_blank">
                                            <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Dari</td>
                                                        <td>
                                                            <input type="date" name="tgl_dari" class="form-control" style="width: 200px" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sampai</td>
                                                        <td>
                                                            <input type="date" name="tgl_sampai" class="form-control" style="width: 200px" readonly>
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
                                                <th>Id Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Jenis</th>
                                                <th>Stok</th>
                                                <th>Letak</th>
                                                
                                            </tr>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                 if( ! empty($data))
                                                foreach ($data->result() as $row) {
                                                    ?>                                 
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $row->id_obat;?></td>
                                                <td><?php echo $row->nama_obat;?></td>
                                                <td><?php echo $row->jenis;?></td>
                                                <td><?php echo $row->stok;?></td>
                                                <td><?php echo $row->letak;?></td>
                                                
                                            </tr>                                       
                                        <?php }

                                         ?>
                                        </tbody>
                                    </table>