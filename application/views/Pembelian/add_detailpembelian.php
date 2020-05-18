            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Detail Pembelian</h2>
                                    <a href="<?php echo base_url();?>index.php/pembelian" class="au-btn au-btn-icon au-btn--blue">Kembali</a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-30">
                            <div class="col-lg-4">
                                <div class="card border border-secondary">
                                    <div class="card-header">
                                        <strong class="card-title">Detail Pembelian</strong>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="<?php echo base_url()?>index.php/pembelian/simpansemua">
                                            <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        <?php 
                                                        foreach ($data1->result() as $row) 
                                                            { ?>

                                                        <td width="130px">No. Nota</td>
                                                        <td>
                                                            <?php echo $row->no_pembelian;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal</td>
                                                        <td>
                                                            <?php echo date("d-m-Y", strtotime($row->tgl_pengiriman));?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID Karyawan</td>
                                                        <td>
                                                            <?php echo $row->id_karyawan;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama PBF</td>
                                                        <td>
                                                            <input type="text" name="nama_pbo" id="nama_pbo" value="<?php echo $row->nama_pbo;?>" class="form-control" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Selesai</button>
                                                        </td>
                                                        <td>
                                                             <a href="<?php echo base_url()?>index.php/pembelian/hapus/<?php echo $row->no_pembelian;?>"><span class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Hapus</a>   
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
                                        <form class="form-vertical" method="POST" action="<?php echo base_url()?>index.php/pembelian/simpandetail">
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
                                                        <input type="hidden" name="no_pembelian" id="no_pembelian" value="<?php echo $noinvoiceakhir;?>">
                                                        <td>
                                                            <input type="text" name="id_obat" id="id_obat" placeholder="id obat" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nama_obat" id="nama_obat" placeholder="nama obat" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="harga_beli" id="harga_beli" placeholder="harga" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="stok" id="stok" placeholder="stok" class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="jumlah" id="jumlah" placeholder="jumlah" class="form-control" required>
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
                                                <td><?php echo "Rp.",$row->harga_beli;?></td>
                                                <td><?php echo $row->jumlah;?></td>
                                                <td><?php echo "Rp.",$row->harga_beli * $row->jumlah; ?> </td>
                                                <td>
                                                    <a href="<?php echo base_url()?>index.php/pembelian/hapus_detail/<?php echo $row->id_obat;?>"><i class="fa fa-trash"></i></a>   
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
