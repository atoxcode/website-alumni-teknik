<!-- banner -->
<section class="inner-banner">
	<div class="container">
	</div>
</section>
<!-- //banner -->

<div class="container">
  </br></br>
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-md-12" align="center">
          <h1>Daftar Alumni Teknik Informatika</h1>
          <p class="lead">Fakultas Teknik - Universitas Malikussaleh</p>
          </br><br>
          
          <div class="col-md-4">
            <form method="post" action="<?php echo base_url().'index/alumni_informatika' ?>" enctype="multipart/form-data">
              <h5>Tahun Masuk:</h5>
              <select type="text" name="thn" placeholder="Menu Item Name" class="form-control" >
                <optgroup label="Pilih Tahun">
                  <?php 
                    $tahun1 = mysql_query("SELECT alumni_masuk FROM tbl_alumni GROUP BY alumni_masuk");
                    while($t1 = mysql_fetch_array($tahun1)) { ?>
                      <option <?php if($thn == $t1[0]) {echo "selected";} ?> value='<?php echo $t1[0]; ?>'><?php echo $t1[0]; ?></option>
                  <?php } ?>
                  ?>
                </optgroup>
              </select><br>
              <input type="submit" value="Tampilkan" class="btn btn-success">
            </form>
          </div><br><br>


          <div class="col-md-12">
            <?php foreach($alumni_informatika as $p){ ?>
            <table class="table table-primary" width="15%" style="background-color: #30C39E;">
              <tr style="background-color: #30C39E;">
                <th rowspan="6" width="15%">
                  <div class="card border-primary mb-3" style="height: 180px; width: 150px; ">
                        <?php if($p->alumni_foto != ""){
                              echo "<img style='height:220px' src='".base_url()."image/alumni/".$p->alumni_foto."'></img>";
                            }else{
                              echo "<img style='height:220px' src='".base_url()."image/system/dosen.png'></img>";
                            } ?>
                    </div>
                </th>
                <th scope="col" width="15%" >Nama</th>
                <th scope="col" ><?php echo $p->alumni_nama;  ?></th>
              </tr>
              <tr class="table-primary">
                <th scope="row" style="background-color: #30C39E;">NIM</th>
                <td style="background-color: #30C39E;"><?php echo $p->alumni_nim;  ?></td>
              </tr>
              <tr class="table-primary" >
                <th scope="row" style="background-color: #30C39E;">Skill</th>
                <td style="background-color: #30C39E;"><?php echo $p->alumni_skill;  ?></td>
              </tr>
              <tr class="table-primary" >
                <th scope="row" style="background-color: #30C39E;">Judul TGA</th>
                <td style="background-color: #30C39E;"><?php echo $p->alumni_tga;  ?></td>
              </tr>
            </table>
          <?php }?>
          </div>
        <div class="pagination" style="display: -webkit-box;" align="center">
            <?php 
              echo $this->pagination->create_links();
            ?> 
        </div>
	    </div>
	  </div>
	</div>
</div> 