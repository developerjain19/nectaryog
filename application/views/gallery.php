<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery || Nectar Yog - Kalapgram Gurukulam</title>
  <?php include 'includes/header-link.php'; ?>
 <script src="//cdn.jsdelivr.net/g/lazysizes@3.0.0" async=""></script>  <script>
               $(function() {
                 document.getElementById('gallery').toggleClass = 'expand';
                });
  </script>
</head>

<body>

  <?php include 'header.php'; ?>


  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg)">

    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1>Our Gallery</h1>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Gallery</li>
          </ol>

        </nav>
      </div>
    </div>

  </div>


  <!-- Puja Start -->
  <div class="section section-padding light-bg" data-aos="fade-up">
    <div class="container">



      <div class="portfolio-filter row" id="loadgallery">
       
      </div>

    </div>
  </div>
  <!-- Puja End -->


  <?php include 'footer.php'; ?>


  <script>
  
  
  $(document).ready(function(){
      fetch_data();
  });
  
  
  function fetch_data() {
      $.ajax({
        url: "<?= base_url('Home/selectgallery') ?>",
        method: "POST",
        dataType: "text",
        success: function(data) {

          $('#loadgallery').html(data);
        },
        beforeSend: function() {
          $('#loadgallery').html("<img src='assets/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
        },

        error: function(xhr, status, err) {
          console.log(xhr.responseText);
        }
      });
    }
 


 
    // Show loading image

 </script>


</body>



</html>