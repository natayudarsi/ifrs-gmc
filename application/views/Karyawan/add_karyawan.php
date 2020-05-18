<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">                                            
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Tambah Karyawan                                              
                                    </div>
                                    <div class="card-body card-block">
                                        <?php echo $this->session->flashdata('message');?>                                                                              
                                        <form action="<?php echo base_url();?>index.php/karyawan/simpan" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Id Karyawan</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="id_karyawan" name="id_karyawan" placeholder="Id Karyawan" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama Karyawan</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">No Hp</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="no_hp" name="no_hp" placeholder="No hp" class="form-control">
                                                </div>
                                            </div>      
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Jabatan</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <select name="jabatan" id="jabatan" class="form-control">
                                                        <option value="">-Pilih-</option>
                                                        <option value="Kepala IFRS">Kepala IFRS</option>
                                                        <option value="Karyawan IFRS">Karyawan IFRS</option>
                                                        <option value="Kepala RS">Kepala RS</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Alamat</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <textarea name="alamat" id="alamat" rows="9" placeholder="Alamat" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class="form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class="form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <select name="level" id="level" class="form-control">
                                                        <option value="">-Pilih-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Keterangan</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <select name="keterangan" id="keterangan" class="form-control">
                                                        <option value="">-Pilih-</option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                        <option value="Kepala RS">Kepala RS</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--                                                       
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="disabledSelect" class=" form-control-label">Disabled Select</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            --> 
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
          
