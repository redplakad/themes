<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PT BPR SERANG - Import Data Nominatif Kredit</title>
        <!-- Styles -->
        @include('partials.styles')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="boxed-size">
        @include('partials.preloader')
        @include('partials.sidebar')

        <div class="container-fluid">
			<div class="main-content d-flex flex-column">
				<!-- Start Header Area -->
				@include('partials.header')
				<!-- End Header Area -->

				<div class="main-content-container overflow-hidden">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                        <h3 class="mb-0">Import Data Nominatif Kredit</h3>

                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb align-items-center mb-0 lh-1">
                                <li class="breadcrumb-item">
                                    <a href="{{ ENV('APP_URL') }}" class="d-flex align-items-center text-decoration-none">
                                        <i class="ri-home-4-line fs-18 text-primary me-1"></i>
                                        <span class="text-secondary fw-medium hover">Dashboard</span>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span class="fw-medium">Import Kredit</span>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-lg-6">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="tab-content" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="preview2-tab-pane" role="tabpanel" aria-labelledby="preview2-tab" tabindex="0">
                                        <form action="{{ route('import-post') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Data Date</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-dark h-55" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="label text-dark fs-18">File Nominatif Kredit</label>
                                                <div class="form-control h-100 text-center position-relative p-4 p-lg-5">
                                                    <div class="product-upload">
                                                        <label for="file-upload" class="file-upload mb-0">
                                                            <span class="d-block text-body fs-14">Drag and drop a file or <span class="text-primary text-decoration-underline">Browse</span></span>
                                                        </label>
                                                        <input id="file-upload" type="file" name="csv-file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                
                                                <div class="alert alert-warning" role="alert">
                                                    <h4 class="alert-heading">Peringatan!</h4>
                                                    <p>Dengan mengupload file ini maka semua data nominatif kredit dengan tanggal data yang sama maka akan otomatis dihapus secara paksa.</p>
                                                    <hr>
                                                    <p class="mb-0">Pastikan anda sudah menginput Datadate yang betul, sehingga tidak menghapus data yang lain tanpa disengaja.</p>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Saya yakin dengan tindakan saya.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button type="submit" class="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4">Submit</button>
                                                <button type="submit" class="btn btn-danger bg-danger bg-opacity-10 text-danger border-0 fw-semibold py-2 px-4">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="code2-tab-pane" role="tabpanel" aria-labelledby="code2-tab" tabindex="0">
                                        <button class="btn btn-outline-primary bg-white btn-sm copy-btn position-absolute top-0 end-0" data-clipboard-target="#basicAlertsCode2">
                                            Copy
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="flex-grow-1"></div>

				<!-- Start Footer Area -->
				@include('partials.footer')
				<!-- End Footer Area -->
			</div>
		</div>

        
        @include('partials.theme_settings')
        @include('partials.scripts')
    </body>
</html>

                