 <?php
        $i = 1;
        if (!empty($getgallery)) {
          foreach ($getgallery as $row) {
        ?>

            <div class="col-lg-4 strategy img_loader_wrapper" >
                <div id="gallery" >
              <div class="sigma_portfolio-item img_loader">
                <img data-src="<?= base_url() ?>uploads/gallery/<?= $row['image_file'] ?>" alt="Nectar Yog" class="lazyload" />

              </div>
              </div>
            </div>

        <?php
            $i++;
          }
        }
        ?>