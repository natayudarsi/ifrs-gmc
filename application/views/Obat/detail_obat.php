
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Obat</h2>

                                    <?php if ($this->session->userdata("user_level") == '3'): ?>
                                    <a href="<?php echo base_url()?>index.php/laporan/laporan_obat" target="_blank" class="au-btn au-btn-icon au-btn--blue"></i>Download</a>
                                    <?php endif ;?>

                                    <?php if ($this->session->userdata("user_level") == '1' || $this->session->userdata("user_level") == '2'): ?>
                                    <a href="<?php echo base_url();?>index.php/obat/addobat" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>add</a>
                                    <?php endif ;?>

                                
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-lg-12">
                                      <div class="row">
            
                                        </div>
                                <!-- DATA TABLE-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Search</span>
                                        <input type="text" name="search_text" id="search_text" placeholder="Cari Obat" class="form-control" />
                                    </div>
                                </div>
                                <div id="result"></div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                    <div style="clear:both"></div>
                </div>
            </div>
