
<div id="dataHeader">

  <?php
    if ($_GET['MenuACLakses'] =='Addaclakses') {
      require_once "proses.php";
    }
  ?>

  <form class="" action="" method="post">
    <table>
      <tr>
        <td colspan="2">
          <h1>Data Akses Menu ACL</h1>
        </td>
      </tr>

      <tr>
        <td>
          <a class="btn-link" href="?Akses-Menu-ACL&&header=Konfigurasi&&MenuACLakses=Addaclakses">
            <i class="fa fa-plus"></i> Tambah Akses Menu ACL
          </a>
        </td>
        <td>

    			<button type="submit" name="pencarian" class="cari">
    				<i class="fa fa-search"></i>
    			</button>
    			<select class="acount" name="search" style="width:30%;font-size:13px;">
    				<option value="">Filter Menu</option>
    				<?php
              $sql_a = "SELECT
                  a.*
                FROM t_role a
              ";
              $query_a=mysqli_query($koneksi,$sql_a);
    					while($dataa=mysqli_fetch_array($query_a))
    					{
    						echo "<option value='$dataa[0]'>$dataa[1] - $dataa[2]</option>";
    					}
    				?>
    			</select>

        </td>
      </tr>

    </table>
  </form>

</div>


<?php
  require_once "data.php";
?>
