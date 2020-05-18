<?php
Class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('admin');
        $this->load->model('model_obat');
        $this->load->model('model_penjualan');
        $this->load->model('model_pembelian');
        
    }

    public function index()
    {
        if($this->admin->logged_id())
        {
        	$isi['namalogin'] = $this->admin->namalogin();
        	$isi['content'] = 'laporan/laporan';
        	$isi['detail_laporan']= 'laporan/_detail.php';
            $isi['search'] = 'kosong';
        	$this->load->view('home',$isi);
        }
        else{
            redirect('login');
        }
    }

    public function obat()
    {
    	$isi['namalogin'] = $this->admin->namalogin();
    	$isi['content'] = 'laporan/laporan';
    	$isi['detail_laporan']= 'laporan/_obat';
        $isi['search'] = 'kosong';
        $isi['data'] = $this->model_obat->daftarobat();
    	$this->load->view('home',$isi);
    }

    public function penjualan()
    {
    	$isi['namalogin'] = $this->admin->namalogin();
    	$isi['content'] = 'laporan/laporan';
    	$isi['detail_laporan'] = 'laporan/_penjualan';
        $isi['search'] = 'kosong';
        $isi['data'] = $this->model_penjualan->daftarpenjualan();
    	$this->load->view('home', $isi);
    }

    public function pembelian()
    {
    	$isi['namalogin'] = $this->admin->namalogin();
    	$isi['content'] = 'laporan/laporan';
    	$isi['detail_laporan'] = 'laporan/_pembelian';
        $isi['search'] = 'kosong';
        $isi['data'] = $this->model_pembelian->daftarpembelian();
    	$this->load->view('home', $isi);

    }

    public function laporan_penjualan()
    {
    	$date_dari = $this->input->post('date_dari');
    	$date_sampai = $this->input->post('date_sampai');	

    	$format_dari = date('d F Y', strtotime($date_dari ));
    	$format_sampai = date('d F Y', strtotime($date_sampai ));

    	$pdf = new FPDF('L','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'Laporan Penjualan Obat',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,6,'Instalasi Farmasi Rumah Sakit Gladish Medical Center',0,1,'C');
        $pdf->Cell(280,5,'Pesawaran',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->cell(280,4,$format_dari.' - '.$format_sampai,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(20,7,'',0,1);
        
        $no = 1;
        $obat = $this->db->query("select * from obat");

	        $pdf->Cell(280,0,'',1,1);
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(10,6,'No',0,0);
	        $pdf->Cell(50,6,'Nama',0,0,'C');
	        $pdf->Cell(30,6,'Jenis',0,0,'C');
	        $pdf->Cell(20,6,'Stok',0,0,'C');
            $pdf->Cell(30,6,'Barang',0,0,'C');
            $pdf->Cell(30,6,'Jumlah',0,0,'C');
            $pdf->Cell(30,6,'Sisa',0,0,'C');
            
            $pdf->Cell(30,6,'Harga',0,0,'C');
            $pdf->Cell(30,6,'Harga',0,1,'C');

            $pdf->Cell(280,0,'',0,1);
            
            $pdf->Cell(10,8,'',0,0);
            $pdf->Cell(50,8,'Barang',0,0,'C');
            $pdf->Cell(30,8,'Obat',0,0,'C');
            $pdf->Cell(20,8,'Awal',0,0,'C');
            $pdf->Cell(30,8,'Masuk',0,0,'C');
            $pdf->Cell(30,8,'Pemakaian',0,0,'C');
            $pdf->Cell(30,8,'Stok',0,0,'C');
            
            $pdf->Cell(30,8,'Beli',0,0,'C');
            $pdf->Cell(30,8,'Jual',0,1,'C');

	        $pdf->Cell(280,0,'',1,1);
	        $pdf->SetFont('Arial','',10);

	        foreach ($obat->result() as $row){

            $pdf->Cell(10,8,$no++,0,0);
            $pdf->Cell(50,8,$row->nama_obat,0,0);
            $pdf->Cell(30,8,$row->jenis,0,0,'C');

        $detail_penjualan = $this->db->query("SELECT obat.id_obat, obat.nama_obat, obat.jenis, obat.stok, obat.letak, obat.harga_beli, obat.harga_jual, penjualan.id_karyawan as karyawan_jual, penjualan.tgl_penjualan, SUM(detail_penjualan.jumlah) as jumlah, detail_penjualan.total_harga, detail_penjualan.proses from penjualan, detail_penjualan, obat where penjualan.no_penjualan = detail_penjualan.no_penjualan and detail_penjualan.id_obat = obat.id_obat and detail_penjualan.proses = '1' and obat.id_obat = '$row->id_obat' and (tgl_penjualan between '$date_dari' and '$date_sampai')");

        $detail_pembelian = $this->db->query("SELECT obat.id_obat, pembelian.nama_pbo, SUM(detail_pembelian.jumlah) as jumlah, detail_pembelian.total_harga, detail_pembelian.proses from obat, pembelian, detail_pembelian where pembelian.no_pembelian = detail_pembelian.no_pembelian and obat.id_obat = detail_pembelian.id_obat and detail_pembelian.proses ='1' and obat.id_obat='$row->id_obat' and (tgl_pengiriman between '$date_dari' and '$date_sampai')");

            foreach ($detail_penjualan->result() as $row1){

                foreach($detail_pembelian->result() as $row2) {

            $pdf->Cell(20,8,$row1->stok - $row2->jumlah + $row1->jumlah,0,0,'C');

            //barang masuk
            if(empty($row2->jumlah)) {
                $pdf->Cell(30,8,'0',0,0,'C');
            }
            else{
            $pdf->Cell(30,8,$row2->jumlah,0,0,'C');
            }

            //barang keluar
            if(empty($row1->jumlah)){
                $pdf->Cell(30,8,'0',0,0,'C');
            }
            else{
            $pdf->Cell(30,8,$row1->jumlah,0,0,'C');
            }

            $pdf->Cell(30,8,$row1->stok,0,0,'C');
            $pdf->Cell(30,8,$row1->harga_beli,0,0,'C');
            $pdf->Cell(30,8,$row1->harga_jual,0,1,'C');

                }
            }
    	}
        $pdf->Output();
    }

    public function laporan_pembelian()
    {
        $date_dari = $this->input->post('date_dari');
        $date_sampai = $this->input->post('date_sampai');   

        $format_dari = date('d F Y', strtotime($date_dari ));
        $format_sampai = date('d F Y', strtotime($date_sampai ));

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Pembelian Obat',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,'Instalasi Farmasi Rumah Sakit Gladish Medical Center',0,1,'C');
        $pdf->Cell(190,5,'Pesawaran',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->cell(190,4,$format_dari.' - '.$format_sampai,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(20,7,'',0,1);
        
        $obat = $this->db->query("select DISTINCT(lap_pembelian.id_obat), obat.nama_obat, obat.stok FROM lap_pembelian,obat WHERE obat.id_obat = lap_pembelian.id_obat and (tgl_pengiriman between '$date_dari' and '$date_sampai')");
        foreach ($obat->result() as $row){
       
            $pdf->Cell(150,8,$row->id_obat.' | '.$row->nama_obat,0,0);
            $pdf->Cell(49,8,'Stok : '.$row->stok,0,1);
            $pdf->Cell(190,0,'',1,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,8,'Tanggal',0,0);
            $pdf->Cell(100,8,'No Transaksi',0,0);
            $pdf->Cell(30,8,'Jenis',0,0);
            $pdf->Cell(30,8,'Masuk',0,1);
            $pdf->Cell(190,0,'',1,1);
            $pdf->SetFont('Arial','',10);

            $detail = $this->db->query("select * from lap_pembelian where id_obat = '$row->id_obat' and (tgl_pengiriman between '$date_dari' and '$date_sampai')");
            if($detail->num_rows() > 0)
            {
                foreach ($detail->result() as $row2){
                    $pdf->Cell(30,6,$row2->tgl_pengiriman,0,0);
                    $pdf->Cell(100,6,$row2->no_pembelian,0,0);
                    $pdf->Cell(30,6,$row2->jenis,0,0);
                    $pdf->Cell(30,6,$row2->jumlah,0,1); 
                }
                $pdf->Cell(190,0,'',1,1);
                $pdf->cell(160,8,'Total keluar',0,0);

                $total = $this->db->query("select SUM(detail_pembelian.jumlah) as total from pembelian,detail_pembelian where detail_pembelian.id_obat='$row->id_obat' and (tgl_pengiriman between '$date_dari' and '$date_sampai') and pembelian.no_pembelian = detail_pembelian.no_pembelian");
                foreach ($total->result() as $row3) {

                $pdf->cell(30,8,$row3->total,0,1);
                $pdf->Cell(190,0,'',1,1);
                $pdf->Cell(190,7,'',0,1);
                }
            }
            else{
                redirect('laporan/gagal');
            }
        }
        $pdf->Output();
    }

    public function laporan_obat()
    {

        $fpdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $fpdf->AddPage();
        // setting jenis font yang akan digunakan
        $fpdf->SetFont('Arial','B',16);
        // mencetak string 
        $fpdf->Cell(190,7,'Laporan Ketersediaan Obat',0,1,'C');
        $fpdf->SetFont('Arial','B',12);
        $fpdf->Cell(190,6,'Instalasi Farmasi Rumah Sakit Gladish Medical Center',0,1,'C');
        $fpdf->Cell(190,5,'Pesawaran',0,1,'C');
        $fpdf->SetFont('Arial','',10);
        
        // Memberikan space kebawah agar tidak terlalu rapat
        $fpdf->Cell(20,7,'',0,1);
       
           
            $fpdf->Cell(190,0,'',1,1);
            $fpdf->SetFont('Arial','B',10);
            $fpdf->Cell(20,8,'Id Obat',0,0);
            $fpdf->Cell(80,8,'Nama',0,0);
            $fpdf->Cell(30,8,'Jenis',0,0);
            $fpdf->Cell(30,8,'Stok',0,0);
            $fpdf->Cell(30,8,'Letak',0,1);
            $fpdf->Cell(190,0,'',1,1);
            $fpdf->SetFont('Arial','',10);

            $detail = $this->db->query("select * from obat");
            if($detail->num_rows() > 0)
            {
                foreach ($detail->result() as $row2){
                    $fpdf->Cell(20,6,$row2->id_obat,0,0);
                    $fpdf->Cell(80,6,$row2->nama_obat,0,0);
                    $fpdf->Cell(30,6,$row2->jenis,0,0);
                    $fpdf->Cell(30,6,$row2->stok,0,0);
                    $fpdf->Cell(30,6,$row2->letak,0,1); 
                }
                
                $fpdf->Cell(190,0,'',1,1);
                $fpdf->Cell(190,7,'',0,1);
                }
            
            else{
                redirect('laporan/gagal');
            }

        
        $fpdf->Output();
    }

    public function gagal()
    {
    	$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Penjualan Obat',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,'Instalasi Farmasi Rumah Sakit Gladish Medical Center',0,1,'C');
        $pdf->Cell(190,5,'Pesawaran',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->cell(190,4,'Bulan',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(20,7,'',0,1);

        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(190,6,'Data tidak tersedia',0,1,'C');
        $pdf->Output();
        
    }
}