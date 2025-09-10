

<style media="screen">
.a-tb {
 color: #999;
}

.a-tb:hover {
 color: rgb(0, 103, 244);
}
</style>

                <div role="main" class="main">
                <section class="page-header">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="breadcrumb">
                          <li>
                            <a href="<?=base_url() ?>" class="a-tb">
                                    <i class="fa fa-home"></i> Home
                                  </a>
                          </li>
                          <li class="active">Media Informasi</li>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h1>
                                FREQUENTLY ASKED QUESTIONS (FAQ)
                              </h1>
                      </div>
                    </div>
                  </div>
                </section>


        <!-- xxxxxxx -->
        <div class="container">

					<div class="row">
						<div class="col-md-12">

							<div class="toggle toggle-primary" data-plugin-toggle>

                <?php
                    $no=1;
                    foreach($faq as $key=>$faqx){
                        if($key == 0){
                            $in = 'active';
                        }else{
                            $in = '';
                        }
                ?>

								<section class="toggle <?=$in ?>">
									<label> <i class="fa fa-file-text-o"></i> <?php echo $faqx->pertanyaan;?></label>

                  <?php
                  // if (!empty($faqx->jawaban)) {
                    ?>
									  <p>
                      <?php echo $faqx->jawaban;?> <br>
                      <a class="btn-sm btn-success" href="<?=base_url().'sertifikasi/detail_faq/'.$faqx->id?>">Diskusi FAQ</a>
                    </p>
                  <?php
                // }else{echo "";}
                ?>
								</section>

                <?php $no++; } ?>
							</div>

						</div>

					</div>

				</div>
        <!-- xxxxxxxx -->

      </div>
        <!-- </div> -->
