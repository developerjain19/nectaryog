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

                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="">Image</label>
                                            <input class="form-control" type="file" name="image_file[]" multiple />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <button type="submit" class="btn  btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <section class="page-content container-fluid">
                    <div class="row">
                        <div class="col-md-12   mb-3 ">

                            <div class="col-lg-12 col-xl-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="bs4-table" class="table table-striped table-bordered" style="width: 100%">
                                                <tr>
                                                    <th>S No</th>
                                                    <th>Image</th>

                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                $i = 1;
                                                if (!empty($gallery)) {
                                                    foreach ($gallery as $row) {
                                                ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td>
                                                                    <img src="<?php echo base_url() . 'uploads/gallery/' . $row['image_file']; ?>" style="height: 200px;" />
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . 'admin_Dashboard/deletegallery/' . $row['id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <?php include('template/footer.php') ?>
                <?php include('template/footer_link.php'); ?>
                </body>

                </html>