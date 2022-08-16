<?php

require "../functions.php";

$post = $_POST["query"];

$lists = query("SELECT * FROM list WHERE Type = '$post'");

?>
            <div class="container px-4 px-lg-5 mt-5">
<?php if( isset($kosong) ){ ?>
    <div class="text-center mb-5 card p-5 bg-secondary text-white fw-bolder">
        <h1 class="mb-5 fw-bolder"><i class="bi bi-folder-x"></i></h1>
        <h1><?= $kosong; ?></h1>
    </div>
<?php } ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php foreach( $lists as $list ) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/img/list/<?= $list["Gambar"]; ?>" alt="..." height="300"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $list["Type"]?></h5>
                                <?php if( isset($_SESSION["login"]) ){ ?>
                                    Rp. <?= $list["Harga"]; ?>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-target="#view<?= $list["ID"]; ?>" data-bs-toggle="modal">Beri Ratting</a></div>
                            </div>
                        </div>
                    </div>
        <div class="modal fade" id="view<?= $list["ID"]; ?>" tabindex="-1" aria-labelledby="view" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="search">Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="assets/img/list/<?= $list["Gambar"]; ?>" class="img-top mb-3" alt="<?= $list["Gambar"]; ?>" height="300"/>
                        <h3><?= $list["Type"]; ?></h3><hr/>
                        <div class="start rounded text-secondary mt-5">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <h3 class="text-warning">Beri ratting</h3>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>
                </div>
            </div>