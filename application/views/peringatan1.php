<div class="ex1 col-sm-12 col-lg-12">
                              <?php foreach($warning->result() as $warning) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo "Peringatan!!! Obat ", "<b>".$warning->nama_obat."</b>", " Tersisa ",$warning->stok," ",$warning->jenis; ?>
                                </div>
                              <?php } ?>
                            </div>