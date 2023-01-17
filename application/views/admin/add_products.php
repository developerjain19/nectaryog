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
                    <a href="<?= base_url('admin_Dashboard/products') ?>" class="btn btn-primary align-left">Products List</a>
                </div>

            </div>

            <section class="page-content container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="row">

                                                <div class="form-group col-md-12">
                                                    <label class="">Product Category</label>
                                                    <br>
                                                    <?php
                                                    $i = 0;
                                                    if ($category != '') {
                                                        foreach ($category as $row) {
                                                            $i = $i + 1;
                                                    ?>

                                                            <input type="checkbox" class="common_selector category" id="cate<?= $row['id'] ?>" name="cate[]" value="<?= $row['id'] ?>" data-id="<?= $row['id'] ?>">
                                                            <label for="cate<?= $i ?>"> <?= $row['name'] ?> </label><br>


                                                            <div class="ml-4">

                                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                                <label for="vehicle1"> I have a bike</label>

                                                            </div>

                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="">Product Name</label>
                                                    <input class="form-control" required="" type="text" name="pro_name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="">SKU</label>
                                                    <input class="form-control" required="" type="text" name="sku">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label class="">Price</label>
                                                    <input class="form-control" required="" type="text" name="price">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="">Product Description</label>
                                                    <textarea cols="60" class="form-control" id="editor1" name="description" rows="5"></textarea>
                                                </div>

                                                <div class="form-group col-md-12">

                                                    <button type="submit" class="btn  btn-primary ">Submit</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        </div>

        </section>
        <?php include('template/footer.php') ?>
        <?php include('template/footer_link.php'); ?>
        </body>

        </html>
        <script>
            filter_data();

            function filter_data() {
                $('#Subcate').html('<div id="loading" style="" ></div>');
                var pid = $(this).val();
                var action = 'fetch_data';
                var category = $('#cate' + pid).val();
                console.log(pid);
                $.ajax({
                    url: "<?= base_url('admin_Dashboard/filterData') ?>",
                    method: "POST",
                    data: {
                        category: category
                    },
                    success: function(data) {
                        console.log(data);
                        $('#Subcate' + pid).html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });


            // $('#category_id').change(function() {
            //     var category_id = $('#category_id').val();
            //     console.log(category_id);
            //     $.ajax({
            //         method: "POST",
            //         url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
            //         data: {
            //             category_id: category_id
            //         },
            //         success: function(response) {
            //             $('#sub_category_id').html(response);
            //         }
            //     });
            // });
        </script>