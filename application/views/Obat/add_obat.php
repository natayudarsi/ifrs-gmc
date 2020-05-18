<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">                                            
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Tambah Obat                                           
                                    </div>
                                    <div class="card-body card-block">
                                        <?php echo $this->session->flashdata('message');?>                                                                              
                                        <form action="<?php echo base_url();?>index.php/obat/simpan" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Id Obat</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="id_obat" name="id_obat" placeholder="Id Obat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama Obat</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="nama_obat" name="nama_obat" placeholder="Nama Obat" class="form-control">
                                                </div>
                                            </div>                    
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Jenis</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <select name="jenis" id="jenis" class="form-control">
                                                        <option value="">-Pilih-</option>
                                                        <option value="Cair">Cair</option>
                                                        <option value="Tablet">Tablet</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class="form-control-label">Letak</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="letak" id="letak" placeholder="Letak" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class="form-control-label">Stok</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="stok" id="stok" placeholder="Stok" class="form-control">
                                                </div>
                                            </div>
                                           
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                                            </div>       
                                        </form>

                                    </div>
                               
                                </div>
                            </div>

                            </div>
                         
                        </div>
                       
                    </div>
                </div>
          
