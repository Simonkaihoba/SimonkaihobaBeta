<?php
  include("header.php");
  ?>
<!--baca status terakhir kontrol-->
<?php 
  //include koneksi
  include "koneksi.php";

  $sql = mysqli_query($koneksi, "SELECT * FROM tb_sensor");
  $data = mysqli_fetch_array($sql);
  //ambil status kontrol
  $kontrol = $data['kontrol'];

 ?>
 <h2 align="center">PANEL MONITORING</h2>
      <script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- load otomatis/realtime-->
    <script type="text/javascript">

      $(document).ready(function() {
        
        setInterval(function() {
          $("#suhu").load('suhu.php');
          $("#pH").load('pH.php');
          $("#kekeruhan").load('kekeruhan.php');
        }, 1000 );

      } );

      function ubahstatus(value)
      {
        if(value==true) value="Aktif";
        else value= "Non Aktif";
        document.getElementById('status').innerHTML = value;

        //ajax untuk merubah nilai status relay
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            //ambil respon dari web setelah berhasil merubah nilai
            document.getElementById('status').innerHTML = xmlhttp.responseText;
          }
        }
        //eksekusi file PHP untuk merubah nilai di database
        xmlhttp.open("GET", "kontrol.php?status=" + value, true);
        xmlhttp.send();
      }
    </script> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><span id = "suhu">0</span><sup style="font-size: 20px">&degC</sup></h3>

                <p>Suhu</p>
              </div>
              <div class="icon">
                <i class="ion ion-thermometer"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><span id = "pH">0</span></h3>

                <p>pH</p>
              </div>
              <div class="icon">
              <i class="ion ion-erlenmeyer-flask"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><span id = "kekeruhan">0</span><sup style="font-size: 20px">NTU</sup></h3>

                <p>Tingkat Kekeruhan</p>
              </div>
              <div class="icon">
                <i class="ion ion-waterdrop"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

      <!-- Kontrol -->
      <div class="card text-bg-primary mb-3" style="width:100%;     margin-top: 50px">
        <div class="card-header" style="font-size:30px; text-align: center; background: red; color: black; ">Emergency!!</div>
        <div class="card-body">
        <!-- switch -->
          <div class="form-check form-switch" style="font-size: 25px; text-align:center;">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onchange="ubahstatus(this.checked)" <?php if($kontrol==1) echo "checked"; ?> >
            <label class="form-check-label" for="flexSwitchCheckChecked"><span id="status"><?php if($kontrol==1) echo "Aktif"; else echo "Non Aktif";?></span></label>
          </div>
          <!-- akhir switch-->
        </div>
        </div>
      <!-- Akhir Kontrol --> 

      <!-- scrollbar -->
          <div class="col-lg-4 col-8">
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable">

          </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        <!-- akhir scrollbar -->
      </div><!-- /.container-fluid -->
    </section>
<?php
  include("footer.php");
  ?> 