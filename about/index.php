<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Hotel</title>
    <?php include "../layout/bootsrap-link.php"?>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include "../layout/header.php"?>
    <main>
        <div class="p-2 container-fluid" >
            <h2 class="text-center m-4">About Kokoon Hotel</h2>
            <div class="container bg-light card grid-about gap-4 p-4">
                <video class="elementor-video" src="https://kokoonhotelsvillas.com/wp-content/uploads/2023/10/KHB_new.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload" poster="https://kokoonhotelsvillas.com/banyuwangi/wp-content/uploads/sites/3/2023/09/slidesatu.jpg" data-origwidth="0" data-origheight="0" style="width: 614px;"></video>
                <div>
                    <div class="card text-dark bg-light mb-3 w-full" >
                        <div class="card-header text-bold">Description</div>
                        <div class="card-body">
                            <?php 
                                include "../utils/file_util.php";
                
                                $about = new FileUtil("about.txt");
                                $about_text = $about->readTxtFile();

                                echo " $about_text";
                ?> 
                        </div>
                    </div>
                    <div class="card text-dark bg-light mb-3 w-full" >
                        <div class="card-header text-bold">Alamat Hotel</div>
                        <div class="card-body h-fit">
                            <p>Jl. Raya Jember No.KM. 7, Krajan, Dadapan, Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68461</p>
                        </div>
                    </div>
                    <div class="card text-dark bg-light mb-3 w-full" >
                        <div class="card-header text-bold">Telepone Hotel</div>
                        <div class="card-body h-fit">
                            <p>(+61) 333-338-6000</p>
                        </div>
                    </div>
                    <div class="card text-dark bg-light mb-3 w-full" >
                        <div class="card-header text-bold">Email Hotel</div>
                        <div class="card-body h-fit">
                            <p>contact-banyuwangi@kokoonhotelsvillas.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "../layout/footer.php"?>
</body>
</html>