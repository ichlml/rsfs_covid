<section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user-tag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Suspect Covid</h4>
                  </div>
                  <div class="card-body">
                    <?= $suspect?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user-injured"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Confirm Covid</h4>
                  </div>
                  <div class="card-body">
                  <?= $confirm?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user-shield"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pasien Sembuh</h4>
                  </div>
                  <div class="card-body">
                  <?= $sembuh?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pasien Covid</h4>
                  </div>
                  <div class="card-body">
                  <?= $total?>
                  </div>
                </div>
              </div>
            </div>

            
            
          
        
          <!-- info kamar -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <a href="<?= base_url('dashboard/lt4')?>">
                    <i class="fas fa-procedures"></i>
                  </a>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>LANTAI 4</h4>
                  </div>
                  <div class="card-body">
                      <div class="text-small text-muted"> <?= $trlt4?> TERISI</div> 
                      <div class="text-small text-muted"><?= $kslt4?> KOSONG</div> 
                  </div>
                </div>
              </div>

            
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <a href="<?= base_url('dashboard/igd')?>">
                    <i class="fas fa-procedures"></i>
                  </a>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>LANTAI 5</h4>
                  </div>
                  <div class="card-body">
                      <div class="text-small text-muted"> <?= $trigd?> TERISI</div> 
                      <div class="text-small text-muted"><?= $ksigd?> KOSONG</div> 
                  </div>
                </div>
              </div>
            
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <a href="<?= base_url('dashboard/tbd')?>">
                    <i class="fas fa-procedures"></i>
                  </a>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>LANTAI 1</h4>
                  </div>
                  <div class="card-body">
                      <div class="text-small text-muted"> <?= $trtb?> TERISI</div> 
                      <div class="text-small text-muted"><?= $kstb?> KOSONG</div> 
                  </div>
                </div>
              </div>

        </div>
        <!-- DETAIL -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-primary">
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                <li class="media">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small"></div></div>
                    <div class="media-title"><b>LANTAI 1</b></div>
                    <?php 
                      $pers1 = ($trtb / $kstb) * 100;
                    ?>
                    <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="<?=$pers1 ?>%"> </div>
                            <div class="budget-price-label"><?=number_format($pers1, 2) ?> %</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small"></div></div>
                    <div class="media-title"><b>LANTAI 4</b></div>
                    <?php 
                      $pers4 = ($trlt4 / $kslt4) * 100;
                    ?>
                    <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="<?=$pers4 ?>%"> </div>
                            <div class="budget-price-label"><?=number_format($pers4, 2) ?> %</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small"></div></div>
                    <div class="media-title"><b>LANTAI 5</b></div>
                    <?php 
                      $pers5 = ($trigd / $ksigd) * 100;
                    ?>
                    <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="<?=$pers5 ?>%"> </div>
                            <div class="budget-price-label"><?=number_format($pers5, 2) ?> %</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body">
                    <div class="float-right"><div class="font-weight-600 text-muted text-small"></div></div>
                    <div class="media-title"><b>TOTAL</b></div>
                    <?php 
                      $a = $trigd + $trlt4 + $trtb ;
                      $b = $ksigd + $kslt4 + $kstb;

                      $persbed = ($a/$b) * 100;
                    ?>
                    <div class="mt-1">
                        <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="<?=$persbed ?>%"> </div>
                            <div class="budget-price-label"><?=number_format($persbed, 2) ?> %</div>
                        </div>
                    </div>
                  </div>
                </li>
                
            </ul>
          </div>

          </div>
        </div>
        <!-- batas row           -->
    </div>
</section>