
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">karyawan</h2>
                                    <a href="<?php echo base_url();?>index.php/karyawan/addkaryawan" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>add</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Karyawan</th>
                                                <th>nama Karyawan</th>
                                                <th>No Hp</th>
                                                <th>Alamat</th>
                                                <th>Jabatan</th>
                                                <th width="100px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                foreach ($data->result() as $row) {
                                                    ?>
                                                
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $row->id_karyawan;?></td>
                                                <td><?php echo $row->nama_karyawan;?></td>
                                                <td><?php echo $row->no_hp;?></td>
                                                <td><?php echo $row->alamat;?></td>
                                                <td><?php echo $row->jabatan;?></td>
                                                <td>
                                                    <a href="<?php echo base_url()?>index.php/karyawan/edit/<?php echo $row->id_karyawan; ?>"><span class="error"><span class="fas fa-pencil-square"></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="<?php echo base_url()?>index.php/karyawan/delete/<?php echo $row->id_karyawan; ?>"><span class="error"><span class="fas fa-eraser"></a>
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
