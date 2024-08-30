<?php $this->load->view('templates/bootstraps/header'); ?>
<div class="mainContent">
    <section id="welcomeSite" class="container">
        <div class="col-sm-8 content">
        <h3 style="padding-bottom: 10px;"><b>Frequently asked questions(FAQ)</b></h3>
            <div class="panel-group" id="accordion">
        	<?php
        	    $no = 0;
        	    foreach ($value as $hsl){
        		$no++;
        		if ($no == 1){
        		    echo '
        		    <div class="panel panel-default">
        			<div class="panel-heading">
        			    <h4 class="panel-title">
        				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$hsl->id.'"><b>'.$no.'. '.$hsl->pertanyaan.'</b></a>
        			    </h4>
        			</div>
        			<div id="collapse'.$hsl->id.'" class="panel-collapse collapse out">
        			    <div class="panel-body">
        				'.$hsl->jawaban.'
        			    </div>
        			</div>
        		    </div>
        		    ';
        		}else{
        		    echo '
        		    <div class="panel panel-default">
        			<div class="panel-heading">
        			    <h4 class="panel-title">
        				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$hsl->id.'"><b>'.$no.'. '.$hsl->pertanyaan.'</b></a>
        			    </h4>
        			</div>
        			<div id="collapse'.$hsl->id.'" class="panel-collapse collapse out">
        			    <div class="panel-body">
        				'.$hsl->jawaban.'
        			    </div>
        			</div>
        		    </div>
        		    ';
        		}
        	    }
        	?>
            </div>
        </div>
        <div class="col-sm-4 content">
            <?php $this->load->view('templates/bootstraps/sidebar'); ?>
        </div>
    </section>

    <section id="contactUs" class="container-fluid">
      <div class="row greyOverlayBox">
        <h3 class="text-center">CONTACT US</h3>
          <p class="text-center">Rukan Gading Bukit Indah Blok U No.7</p>
          <p class="text-center">Jl. Bukit Gading Raya, DKI Jakarta</p>

          <form class="form-horizontal container" style="width:70%;margin-top:30px;">
            <div class="form-group">
              <div class="col-sm-6">
                <input type="name" class="form-control" placeholder="Full Name"/>
              </div>
              <div class="col-sm-6">
                <input type="address" class="form-control" placeholder="Home Address"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <input type="email" class="form-control" placeholder="Email"/>
              </div>
              <div class="col-sm-6">
                <input type="phone" class="form-control" placeholder="Phone Number"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <textarea type="message" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btnSubmit">SEND MESSAGE</button>
              </div>
            </div>
          </form>
      </div>
    </section>
</div>
<?php $this->load->view('templates/bootstraps/footer'); ?>
