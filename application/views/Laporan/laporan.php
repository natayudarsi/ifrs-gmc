
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Laporan</h2>
                                    <a href="<?php echo base_url();?>index.php/laporan" class="au-btn au-btn-icon au-btn--blue">Kembali</a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-30">
                            <div class="col-lg-4">
                                <div class="card border border-secondary">
                                    <div class="card-header">
                                        <strong class="card-title">Pilih Laporan</strong>
                                    </div>
                                    <div class="card-body">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="btn btn-primary" style="width:180px" name="obat" type="button" value="Obat" onclick="window.location.href='<?php echo base_url()?>index.php/laporan/obat'">&nbsp;&nbsp;&nbsp;
                                        <input class="btn btn-primary" style="width:180px" type="button" value="Penjualan" onclick="window.location.href='<?php echo base_url()?>index.php/laporan/penjualan'">&nbsp;&nbsp;&nbsp;
                                        <!--
                                        <input class="btn btn-primary" style="width:120px" type="button" value="Pembelian" onclick="window.location.href='<?php echo base_url()?>index.php/laporan/pembelian'">
                                    -->
                                    </div>
                                </div>
                                           
                                    <?php $this->load->view($detail_laporan); ?>

                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
