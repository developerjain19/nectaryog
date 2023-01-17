<?php include('template/header_link.php'); ?>
<div class="holder">


    <?php include('template/header.php'); ?>
    <?php $this->load->view('admin/template/sidebar'); ?>
    <main>
        <div class="container-fluid site-width">
            <div class="row">
                <div class="col-sm-10  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0"><?= $title ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2  align-self-center">
                    <a href="<?= base_url('admin_Dashboard/add_product') ?>" class="btn btn-primary align-left">Add Product</a>
                </div>

            </div>


            <section class="page-content container-fluid">
                <div class="row">
                    <div class="col-md-12   mb-3 ">
                        <?php if ($msg = $this->session->flashdata('msg')) :
                            $msg_class = $this->session->flashdata('msg_class') ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                </div>
                            </div>
                        <?php
                            $this->session->unset_userdata('msg');
                        endif; ?>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="bs4-table" class="table table-striped table-bordered" style="width: 100%">
                                    <tr>
                                        <th>S No</th>
                                        <!-- <th>Category/Subcategory Name</th> -->
                                        <th>Product Name</th>
                                        <th>price</th>
                                        <th>Cal. Price</th>
                                        <th>Product Image</th>
                                        <th>Disable</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($products as $fetchrow) {
                                            // $obj = json_decode($fetchrow['categories'], true);
                                            // print_r($obj);

                                            // $cat = getRowById('category', 'id', $obj[0]);

                                            // $subcat = getRowById('category', 'id', $obj[1]);
                                            $imgcount = getNumRows('product_images', array('id' => $fetchrow['id']));

                                        ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <!-- <td>
                                                    <?= $cat[0]['name']; ?>/ <?= (($subcat != '') ? $subcat[0]['name'] : '') ?>
                                                </td> -->
                                                <td><?php echo wordwrap($fetchrow['name'], 10, '<br>'); ?></td>

                                                <td>$ <?php echo $fetchrow['price']; ?></td>
                                                <td>$ <?php echo $fetchrow['calculated_price']; ?></td>

                                                <td>
                                                    <a href="<?php echo base_url() . 'admin_Dashboard/edit_productsimg/' . $fetchrow['id']; ?>" class="btn btn-info edit"><i class="fa fa-file-image"></i> (<?= $imgcount ?>)</a>
                                                </td>
                                                <td> <a href="<?php echo base_url() . 'admin_Dashboard/disable/' . $fetchrow['id'] . '/products/' . (($fetchrow['is_visible'] == '1') ? '0' : '1'); ?>" class="btn btn-light"><?php if ($fetchrow['is_visible'] == '1') { ?><i class="fas fa-eye"></i><?php } else { ?> <i class="fas fa-eye-slash"></i><?php } ?></a></td>
                                                <td>


                                                    <a href="<?php echo base_url() . 'admin_Dashboard/edit_products/' . $fetchrow['id']; ?>" class="btn btn-success edit"><i class="fas fa-pencil-alt"></i></a>

                                                    <a href="<?php echo base_url() . 'admin_Dashboard/deleteproducts/' . $fetchrow['id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>


                                                </td>

                                            </tr>

                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>

            <?php include('template/footer.php') ?>
            <?php include('template/footer_link.php'); ?>
            </body>

            </html>
            <script>
                $('.salehm').change(function() {

                    var pid = $(this).data('id');
                    var sale = $('#sale' + pid).val();
                    // console.log(df);
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('admin_Dashboard/productOnSale') ?>",
                        data: {
                            sale: sale,
                            pid: pid
                        },
                        success: function(response) {
                            $('#featuredmsg').html('');
                            $('#salemsg').html('Product is on Sale Now');
                        }
                    });
                });
                $('.featuredhm').change(function() {

                    var pid = $(this).data('id');
                    var featured = $('#featured' + pid).val();
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('admin_Dashboard/featuredProduct') ?>",
                        data: {
                            featured: featured,
                            pid: pid
                        },
                        success: function(response) {
                            $('#salemsg').html('');
                            $('#featuredmsg').html('Product is featured Now');
                        }
                    });
                });
                $('.fonts').change(function() {

                    var pid = $(this).data('id');
                    var fonts = $('#fonts' + pid).val();
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('admin_Dashboard/fontProduct') ?>",
                        data: {
                            fonts: fonts,
                            pid: pid
                        },
                        success: function(response) {
                            $('#salemsg').html('');
                            $('#featuredmsg').html('Product is featured Now');
                        }
                    });
                });
            </script>
            </body>

            </html>