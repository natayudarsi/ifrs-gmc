

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Obat</h2>
                                    <a href="<?php echo base_url();?>index.php/obat/addobat" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>add</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-lg-12">
                                      <div class="row">
            
        </div>
                                <!-- DATA TABLE-->
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                 
                                                foreach ($data->result() as $row) {
                                                    ?>                                 
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $row->id_obat;?></td>
                                                <td><?php echo $row->nama_obat;?></td>
                                                <td><?php echo $row->jenis;?></td>
                                                <td><?php echo $row->stok;?></td>
                                                <td><?php echo $row->letak;?></td>
                                                <td>
                                                    <a href="<?php echo base_url()?>index.php/obat/edit/<?php echo $row->id_obat; ?>"><span class="error"><span class="fas fa-pencil-square"></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="<?php echo base_url()?>index.php/obat/delete/<?php echo $row->id_obat; ?>"><span class="error"><span class="fas fa-eraser"></a>
                                                </td>
                                            </tr>                                       
                                        <?php }
                

                                       
                                         ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
