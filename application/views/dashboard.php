<style>
div.ex1 {

  background-color: ;
  width: 900px;
  height: 150px;
  overflow: auto;
}
</style>

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                      
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">

                          <?php if($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '3'): ?>  
                          <?php $this->load->view($peringatan); ?>
                        <?php endif;?>
                            


                            
                          <!--
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-calendar"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php //foreach($totaluser->result() as $row) { echo $row->jumlah; }?></h2>
                                                <span>User</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id=""></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php //foreach($penjualan->result() as $row) { echo $row->jumlah; }?></h2>
                                                <h4><?php //foreach($penjualan->result() as $row) { echo $row->nama_obat; }?></h4>
                                                <span>Penjualan Obat Terbanyak</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id=""></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          -->
                            
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php foreach($total_obatkeluar->result() as $row) { echo $row->jumlah; }?></h2>
                                                <span>Total Penjualan Bulan Ini</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id=""></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php foreach($totalpembelian->result() as $row) { echo $row->jumlah; }?></h2>
                                                <span>Total Pembelian Bulan Ini</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id=""></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div> 

                        <?php if($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '3'): ?>
                        <div class="col-sm-12 col-lg-12">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-view-list-alt"></i><h3>Obat Terlaris Bulan Ini</h3>
                                            </div>
                                            <div >
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endif ; ?>
                       <!--  <div class="row">
                           <div class="col-lg-6">
                               <div class="au-card recent-report">
                                   <div class="au-card-inner">
                                       <h3 class="title-2">recent reports</h3>
                                       <div class="chart-info">
                                           <div class="chart-info__left">
                                               <div class="chart-note">
                                                   <span class="dot dot--blue"></span>
                                                   <span>products</span>
                                               </div>
                                               <div class="chart-note mr-0">
                                                   <span class="dot dot--green"></span>
                                                   <span>services</span>
                                               </div>
                                           </div>
                                           <div class="chart-info__right">
                                               <div class="chart-statis">
                                                   <span class="index incre">
                                                       <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                   <span class="label">products</span>
                                               </div>
                                               <div class="chart-statis mr-0">
                                                   <span class="index decre">
                                                       <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                   <span class="label">services</span>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="recent-report__chart">
                                           <canvas id="recent-rep-chart"></canvas>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="au-card chart-percent-card">
                                   <div class="au-card-inner">
                                       <h3 class="title-2 tm-b-5">char by %</h3>
                                       <div class="row no-gutters">
                                           <div class="col-xl-6">
                                               <div class="chart-note-wrap">
                                                   <div class="chart-note mr-0 d-block">
                                                       <span class="dot dot--blue"></span>
                                                       <span>products</span>
                                                   </div>
                                                   <div class="chart-note mr-0 d-block">
                                                       <span class="dot dot--red"></span>
                                                       <span>services</span>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-xl-6">
                                               <div class="percent-chart">
                                                   <canvas id="percent-chart"></canvas>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div> -->
                    
                  
                       
                    </div>
                </div>
            </div>