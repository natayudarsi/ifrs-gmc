
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
                                        <form class="form-horizontal" method="POST" action="<?php echo base_url()?>index.php/penjualan/simpansemua">
                                            <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        <?php 
                                                        foreach ($data1->result() as $row) 
                                                            { ?>

                                                        <td width="130px">No. Nota</td>
                                                        <td>
                                                            <?php echo $row->no_penjualan;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal</td>
                                                        <td>
                                                            <?php echo $row->tgl_penjualan;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID Karyawan</td>
                                                        <td>
                                                            <?php echo $row->id_karyawan;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Pasien</td>
                                                        <td>
                                                            <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $row->nama_pasien;?>" class="form-control" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Telepon</td>
                                                        <td>
                                                            <input type="text" name="tlp_pasien" id="tlp_pasien" value="<?php echo $row->tlp_pasien;?>" class="form-control" readonly>
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>
                                                            <textarea name="alamat_pasien" id="alamat_pasien" rows="5" placeholder="Alamat Pasien" class="form-control" readonly><?php echo $row->alamat_pasien;?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Selesai</button>
                                                        </td>
                                                        <td>
                                                             <a href="<?php echo base_url()?>index.php/penjualan/hapus/<?php echo $row->no_penjualan;?>"><span class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Hapus</a>   
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <!-- DATA TABLE-->
                                <div class="card border border-secondary">
                                    <div class="card-header">
                                        <strong class="card-title">Detail Trasnsaksi</strong>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->session->flashdata('message');?>   
                                        <form class="form-vertical" method="POST" action="<?php echo base_url()?>index.php/penjualan/simpandetail">
                                            <table class="table table-borderless table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Id Obat</th>
                                                        <th>Nama Obat</th>
                                                        <th>Harga</th>
                                                        <th>Stok</th>
                                                        <th>Jumlah</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <input type="hidden" name="no_penjualan" id="no_penjualan" value="<?php echo $noinvoiceakhir;?>">
                                                        <td>
                                                            <input style="width: 100px" type="text" name="id_obat" id="id_obat" placeholder="id obat" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nama_obat" id="nama_obat" placeholder="nama obat" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input style="width: 130px" type="text" name="harga_jual" id="harga_jual" placeholder="harga" class="form-control" readonly>  
                                                        </td>
                                                        <td>
                                                            <input style="width: 140px" type="text" name="stok" id="stok" placeholder="stok" class="form-control" readonly>  
                                                        </td>
                                                        <td>
                                                            <input style="width: 130px" type="text" name="jumlah" id="jumlah" placeholder="jumlah" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <button type="submit" name="submit" style="width: 100px" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button> 
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                
                                                <th width="70px">Id Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Harga</th>
                                                <th width="70px">Jumlah</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                
                                                foreach ($data->result() as $row) 
                                                {
                                                    ?> 
                                                                          
                                                <td><?php echo $row->id_obat; ?></td>
                                                <td><?php echo $row->nama_obat; ?></td>
                                                <td><?php echo "Rp.",$row->harga_jual;?></td>
                                                <td><?php echo $row->jumlah;?></td>
                                                <td><?php echo "Rp.",$row->harga_jual * $row->jumlah;?></td>
                                                <td>
                                                    <a href="<?php echo base_url()?>index.php/penjualan/hapus_detail/<?php echo $row->id_obat;?>"><i class="fa fa-trash"></i></a>   
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
