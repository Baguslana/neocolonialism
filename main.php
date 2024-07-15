<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Krisis Energi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
</head>

<body>
    <div class="row flex justify-content-center m-0 bg-light-subtle">
        <div class="col-lg-6 col-sm-6 shadow py-3 px-4 bg-light">
            <div class="text-center mb-3">
                <h1 class="fw-bold">Neo Kolonialisme</h1>
                <p class="mb-1">Bagus Nurlana | 2206700015</p>
                <a href="#" class="text-decoration-none fw-bold text-primary fs-5 me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-decoration-none fw-bold text-primary fs-5 me-3"><i class="bi bi-github"></i></a>
                <a href="#" class="text-decoration-none fw-bold text-primary fs-5 me-3"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="border-top py-4">
                <p class="mb-2" style="text-align: justify;">Neo-kolonialisme adalah konsep yang mengacu pada dominasi ekonomi, politik, dan budaya yang dilakukan oleh negara-negara maju terhadap negara-negara berkembang, meskipun bentuknya tidak seperti kolonialisme langsung di masa lalu. Neo-kolonialisme sering terlihat dalam bentuk ketergantungan ekonomi, di mana negara berkembang menjadi sangat bergantung pada negara maju atau perusahaan multinasional dari negara maju untuk sumber daya, teknologi, dan investasi.</p>
                <a href="#" class="text-decoration-none fw-bold text-primary">Selengkapnya</a>
            </div>

            <!-- data table -->
            <div class="border-top py-4" id="dataTable">
                <h3 class="fw-bold">Table Data</h3>
                <!-- <a aria-current="page" href="SumberEnergi" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'SumberEnergi') ? 'btn btn-primary btn-sm' : 'text-decoration-none text-primary' ?>">Sumber Energi</a>
                    <a aria-current="page" href="KrisisEnergi" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'KrisisEnergi' || !isset($_GET['page'])) ? 'btn btn-primary btn-sm' : 'text-decoration-none text-primary' ?> ms-1">Krisis Energi</a> -->
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'SumberEnergi') ? 'active' : 'text-primary' ?>" aria-current="true" href="SumberEnergi">Sumber Daya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'KrisisEnergi') ? 'active' : 'text-primary' ?>" aria-current="true" href="KrisisEnergi">Ekonomi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'DampakKrisis') ? 'active' : 'text-primary' ?>" aria-current="true" href="DampakKrisis">Sosial Lingkungan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'ViewKeputusan') ? 'active' : 'text-primary' ?>" aria-current="true" href="ViewKeputusan">View</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <?php include $page; ?>
                    </div>
                </div>

            </div>

            <div class="border-top py-4" id="rataRata">
                <h3 class="fw-bold">Data View Keputusan</h3>
                <?php include 'page/view_keputusan.php'; ?>
            </div>
            <div class="border-top text-center pt-4">
                <p>© 2023. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>