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
      .arabics {
          font-family: 'Uthmani', serif;
          font-size: 40px;
          font-weight: bold;
      }
      .latin{
          font-family: serif;
          font-size: 14px;
          font-weight: normal;
          direction: ltr;
          padding: 0;
          margin: 0;
      }

      .arabic_number{
          font-size: 28px;
          font-weight: normal;
      }
    </style>
  </head>

  <body>
      <div class="container">
        <?php
            //panggil koneksi
            include "koneksi.php";

            //uji jika parameter surah dan nama surah tidak kosong
            if(isset($_GET['surah']) || isset($_GET['nama_surah'])) {
                $surah = $_GET['surah'];
                $nama_surah = $_GET['nama_surah'];

                echo '<a href="contoh.php">kembali ke halaman sebelumnya</a>';
                echo '<h3 class="text-center bg-success text-white arabics">' .$nama_surah. '</h3>';
                echo '<hr class="table table-success table-striped">';

                $tampil = mysqli_query($koneksi, "select
                                                         a.text as arabic,
                                                         b.text as indonesia
                                                        from
                                                        arabicquran a left outer join indonesianquran b
                                                        on a.index = b.index
                                                        where a.surah = $surah");
                                        
                $ayat = 1;
                while($data = mysqli_fetch_array($tampil)) {
                    $str = $data['arabic'];
                    echo '<p class = "arabic">'.$str .format_arabic_number($ayat). '</p>';
                    echo '<p class = "latin">' .'[' .$ayat. ']'.$data['indonesia'].'</p>';
                    echo '<hr>';
                    $ayat++;
                }
            }
        
            
            //function untuk nomor ayat
            function format_arabic_number($number)
            {
                $arabic_number = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
                $jum_karakter = strlen($number);
                $temp = "";

                for ($i = 0; $i < $jum_karakter; $i++) {
                    $char = substr($number, $i, 1);
                    $temp .= $arabic_number[$char];
                }

                return '<span class="arabic_number">' .$temp.  '</span>';
            }
        ?>
        
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>