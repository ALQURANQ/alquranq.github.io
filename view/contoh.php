<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Al-Quran Digital |Al-Quran-Q</title>
    <style>
      @font-face {
        font-family: Uthmani;
        src: url('../assets/font/UthmanicHafs1Ver09.otf') format('truetype');
      }

      .arabic{

        font-family: 'Uthmani', serif;
        font-size: 20px;
        font-weight: bold;
        direction: rtl;
        padding: 0 5px;
        margin: 0;
      }
    </style>
  </head>

  <body>
      <div class="container">
    <h3 class="text-center">Al-Quran Q</h3>
    <hr>
        <table class="table table-striped table-bordered">
          <tr>
            <th>No.</th>
            <th>Surah</th>
            <th>Arti</th>
            <th>Jumlah Ayat</th>
            <th>Tempat Turun</th>
            <th>Urutan Pewahyuan</th>
          </tr>
          <?php
            //panggil Koneksi
            include "koneksi.php";
            $tampil = mysqli_query($koneksi, "Select * from daftarsurah");
            while($data = mysqli_fetch_array($tampil)) :
          ?>
              <tr>
                  <td><?=$data['index']?></td>
                  <td>
                   <a class="arabic" href="detail.php?surah=<?=$data['index']?>&nama_surah=<?=$data['surah_arab']?>" style="text-decoration: none; color: black;"> (<?=$data['surah_arab']?>)</a><br> <span><?= $data['surah_indonesia']?></span></td>
                  <td><?=$data['arti']?></td>
                  <td><?=$data['jumlah_ayat']?></td>
                  <td><?=$data['tempat_turun']?></td>
                  <td><?=$data['urutan_pewahyuan']?></td>

              </tr>

          <?php
            endwhile;
          ?>
        </table>     
    </div>

      <!-- ICON BACK-->
    <div class='back-to-top'>
  <svg viewBox="0 0 20 20"><polyline points="4 13 10 7 16 13"></polyline></svg>
</div>
     <!-- SCRIPT ICON BACK -->
<script>
              var backToTop = document.querySelector('.back-to-top');

window.addEventListener('scroll', () => {
  if ( this.scrollY >= 500 ) {
    backToTop.classList.add('show');

    backToTop.addEventListener('click', () => {
      window.scrollTo({top: 0});
    })
  } else {
    backToTop.classList.remove('show');
  }
});
            </script>

            

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>