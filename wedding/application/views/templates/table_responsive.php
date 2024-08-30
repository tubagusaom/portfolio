<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$aplikasi->singkatan_unit?></title>

	<link rel="shortcut icon" href="<?=base_url()?>assets/icon-pendaftaran.png" type="image/x-icon" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Main Style Css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/_tera_byte/table-responsive.css"/>

</head>

<body>

<div class="p-5">
  <div class="pb-4 px-0 px-lg-4 row">
    <div class="col-12">
      <h2 class="text-primary">Modern Way of HTML Responsive Table</h2>
      <hr>
      <h3 class="text-success d-none d-md-block mb-3">Desktop View</h3>
      <h3 class="text-danger d-md-none mb-3">Mobile View</h3>
      <div class="border cm-scrollbar cm-table-w-scroll table-responsive">
        <table class="table table-borderless table-sm table-bordered">
          <thead>
            <tr class="bg-primary">
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Date of Birth</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Occupation</th>
              <th>Company</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-title="#">1</td>
              <td data-title="First Name">Joseph</td>
              <td data-title="Last Name">Thompson</td>
              <td data-title="Date of Birth">20/09/1983</td>
              <td data-title="Email"> joseph@gmail.com </td>
              <td data-title="Phone"> 815-398-#### </td>
              <td data-title="Occupation"> Foundry mold and coremaker </td>
              <td data-title="Company"> Desert Garden Help </td>
            </tr>
            <tr>
              <td data-title="#">2</td>
              <td data-title="First Name">Lynn</td>
              <td data-title="Last Name">Rodman</td>
              <td data-title="Date of Birth">20/09/1988</td>
              <td data-title="Email"> lynn.rodman@dayrep.com </td>
              <td data-title="Phone"> 972-763-#### </td>
              <td data-title="Occupation"> Geotechnical engineer </td>
              <td data-title="Company"> New World Realty </td>
            </tr>
            <tr>
              <td data-title="#">3</td>
              <td data-title="First Name">Monica</td>
              <td data-title="Last Name">Yocum</td>
              <td data-title="Date of Birth">18/03/1964</td>
              <td data-title="Email"> contact@monica.com </td>
              <td data-title="Phone"> 586-350-#### </td>
              <td data-title="Occupation"> Assistant editor </td>
              <td data-title="Company"> Happy Family </td>
            </tr>
            <tr>
              <td data-title="#">4</td>
              <td data-title="First Name">Brett</td>
              <td data-title="Last Name">Garcia</td>
              <td data-title="Date of Birth">20/09/1997</td>
              <td data-title="Email"> brett.garcia@sambos.com </td>
              <td data-title="Phone"> 574-735-#### </td>
              <td data-title="Occupation"> Polisher </td>
              <td data-title="Company"> Sambo's </td>
            </tr>
            <tr>
              <td data-title="#">5</td>
              <td data-title="First Name">Billy</td>
              <td data-title="Last Name">Mitcham</td>
              <td data-title="Date of Birth">10/05/1994</td>
              <td data-title="Email"> billy.mitcham@teleworm.us</td>
              <td data-title="Phone"> 818-723-#### </td>
              <td data-title="Occupation"> Product designer </td>
              <td data-title="Company"> Audio Visions </td>
            </tr>
            <tr>
              <td data-title="#">6</td>
              <td data-title="First Name">Thomas</td>
              <td data-title="Last Name">Duerr</td>
              <td data-title="Date of Birth">20/09/1997</td>
              <td data-title="Email"> thomas-duerr@jourrapide.com</td>
              <td data-title="Phone"> 715-578-#### </td>
              <td data-title="Occupation">Service technician</td>
              <td data-title="Company">Destiny Realty</td>
            </tr>
            <tr>
              <td data-title="#">7</td>
              <td data-title="First Name">Patricia</td>
              <td data-title="Last Name">McCranie</td>
              <td data-title="Date of Birth">30/11/1999</td>
              <td data-title="Email"> patricia239@mccranie.com </td>
              <td data-title="Phone">440-266-####</td>
              <td data-title="Occupation">Risk manager</td>
              <td data-title="Company">Herman's World</td>
            </tr>
            <tr>
              <td data-title="#">8</td>
              <td data-title="First Name">James</td>
              <td data-title="Last Name"> Wood</td>
              <td data-title="Date of Birth">15/08/1996</td>
              <td data-title="Email"> james-wood@shareorbuy.com </td>
              <td data-title="Phone"> 574-735-#### </td>
              <td data-title="Occupation"> Power tool repairer </td>
              <td data-title="Company"> Shareor Buy </td>
            </tr>
            <tr>
              <td data-title="#">9</td>
              <td data-title="First Name">Sidney</td>
              <td data-title="Last Name">Cannon</td>
              <td data-title="Date of Birth">05/07/1988</td>
              <td data-title="Email"> s-cannon@alp.com </td>
              <td data-title="Phone"> 615-424-#### </td>
              <td data-title="Occupation"> Pesticide sprayer </td>
              <td data-title="Company"> A. L. Price </td>
            </tr>
            <tr>
              <td data-title="#">10</td>
              <td data-title="First Name">Michele </td>
              <td data-title="Last Name">McNichols</td>
              <td data-title="Date of Birth">13/05/1994</td>
              <td data-title="Email"> michele@record-town.com </td>
              <td data-title="Phone"> 615-896-#### </td>
              <td data-title="Occupation"> Otorhinolaryngology nurse </td>
              <td data-title="Company"> Record Town </td>
            </tr>
            <tr>
              <td data-title="#">11</td>
              <td data-title="First Name">Catherine</td>
              <td data-title="Last Name">Glaser</td>
              <td data-title="Date of Birth">31/03/1995</td>
              <td data-title="Email"> catherine@play-town.com </td>
              <td data-title="Phone"> 410-219-#### </td>
              <td data-title="Occupation"> Resort desk clerk </td>
              <td data-title="Company"> Play Town </td>
            </tr>
            <tr>
              <td data-title="#">12</td>
              <td data-title="First Name">Shaun</td>
              <td data-title="Last Name">Birnbaum</td>
              <td data-title="Date of Birth">27/02/1987</td>
              <td data-title="Email">shaun@caltereo.com</td>
              <td data-title="Phone">248-304-####</td>
              <td data-title="Occupation">Terrazzo worker</td>
              <td data-title="Company"> Cal Stereo </td>
            </tr>
            <tr>
              <td data-title="#">13</td>
              <td data-title="First Name">Jose</td>
              <td data-title="Last Name">Thorn</td>
              <td data-title="Date of Birth">04/06/1993</td>
              <td data-title="Email"> jose@star-interior-design.com </td>
              <td data-title="Phone"> 972-919-#### </td>
              <td data-title="Occupation"> Construction engineer </td>
              <td data-title="Company"> Star Interior Design </td>
            </tr>
            <tr>
              <td data-title="#">14</td>
              <td data-title="First Name">Kimberly</td>
              <td data-title="Last Name">Horne</td>
              <td data-title="Date of Birth">12/04/1997</td>
              <td data-title="Email"> kimberly@pennfruit.com </td>
              <td data-title="Phone"> 615-483-#### </td>
              <td data-title="Occupation"> Children's librarian</td>
              <td data-title="Company"> Penn Fruit </td>
            </tr>
            <tr>
              <td data-title="#">15</td>
              <td data-title="First Name">Mario</td>
              <td data-title="Last Name">Potter</td>
              <td data-title="Date of Birth">09/12/1996</td>
              <td data-title="Email"> mario-p@clemensmarkets.com </td>
              <td data-title="Phone"> 615-896-#### </td>
              <td data-title="Occupation"> Local controller </td>
              <td data-title="Company"> Clemens Markets </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="8" class="bg-white text-center"> <span class="text-danger">*</span>We have used this data for demo purposes only. </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
