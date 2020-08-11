                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/default.png') ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. In voluptatum provident illum molestias repellat? In soluta atque perspiciatis commodi expedita eum. Voluptate veritatis mollitia nobis enim accusantium eaque dignissimos deleniti?</p>
                                    <p class="card-text"><small class="text-muted">Berhabung sejak <?= date('d F Y', $date_created['date_created']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->