<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/internal/favicon.jpg" type="image/x-icon" type="image/x-icon">
    <title>Dashboard Tour and Travel</title>

    <!-- Tailwindcss CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CDN -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- AOS JS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <style>
        ::-webkit-scrollbar {
            width: 0;
        }

        .bg-overlay {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9));
        }

        .image-container:hover .image {
            transform: scale(1.1);
            /* Zoom effect */
        }

        .image-container:hover .overlay {
            opacity: 1;
            /* Show overlay */
        }

        .image-container:hover .icon {
            opacity: 1;
            /* Show icon */
        }

        .image {
            transition: transform 0.3s ease;
        }

        .overlay {
            transition: opacity 0.3s ease;
        }

        .icon {
            transition: opacity 0.3s ease;
            opacity: 0;
            /* Initially hidden */
        }

        .testimonial-card {
            border: 1px solid #e5e7eb;
            /* border color */
            border-radius: 8px;
            /* border radius */
            padding: 16px;
            /* padding */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* shadow effect */
            background-color: #ffffff;
            /* background color */
        }

        .testimonial-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* hover shadow effect */
        }

        /* .gallery {
            column-count: 3;
            column-gap: 5px;
        } */

        .gallery-item {
            break-inside: avoid;
            margin-bottom: 8px;
        }
    </style>
</head>

<body class="bg-gray-900">

    <!-- Push Notification -->
    <?php if (isset($_GET['name-car-found']) || isset($_GET['status-update-photo-size']) || isset($_GET['status-update-photo-extension']) || isset($_GET['status-create-galeri']) || isset($_GET['status-create-galeri-photo-require']) || isset($_GET['status-create-galeri-photo-size']) || isset($_GET['status-create-galeri-photo-status']) || isset($_GET['status-update-galeri']) || isset($_GET['status-delete-galeri']) || isset($_GET['status-create-mobil']) || isset($_GET['status-update-mobil']) || isset($_GET['status-delete-mobil']) || isset($_GET['status-delete-testimonial'])) : ?>
        <div id="toast-success" class="fixed top-10 right-5 z-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert" data-aos="fade-left">
            <?php
            $status = "";
            $message = "";

            if (isset($_GET['status-create-galeri'])) {
                $status = $_GET['status-create-galeri'];
                $message = $status == "success" ? "Foto Berhasil di Upload" : "Foto Gagal di Upload";
            } elseif (isset($_GET['status-create-galeri-photo-require'])) {
                $status = $_GET['status-create-galeri-photo-require'];
                $message = $status == "success" ? "Berhasil" : "Setidaknya Anda Mengirimkan 1 Foto";
            } elseif (isset($_GET['status-create-galeri-photo-size'])) {
                $status = $_GET['status-create-galeri-photo-size'];
                $message = $status == "success" ? "Berhasil" : "Mohon Maaf Gambar Hanya berukuran 1MB Kebawah";
            } elseif (isset($_GET['status-create-galeri-photo-status'])) {
                $status = $_GET['status-create-galeri-photo-status'];
                $message = $status == "success" ? "Berhasil" : "Gambar Gagal Tersimpan";
            } elseif (isset($_GET['status-update-galeri'])) {
                $status = $_GET['status-update-galeri'];
                $message = $status == "success" ? "Foto Berhasil di Update" : "Foto Gagal di Update";
            } elseif (isset($_GET['status-update-photo-extension'])) {
                $status = $_GET['status-update-photo-extension'];
                $message = $status == "success" ? "Berhasil" : "Bukan Gambar yang anda kirimkan 'JPG PNG yang bisa'";
            } elseif (isset($_GET['status-update-photo-size'])) {
                $status = $_GET['status-update-photo-size'];
                $message = $status == "success" ? "Berhasil" : "Ukuran Gambar Terlalu Besar Mohon dibawa 1MB";
            } elseif (isset($_GET['status-delete-galeri'])) {
                $status = $_GET['status-delete-galeri'];
                $message = $status == "success" ? "Foto Berhasil di Delete" : "Foto Gagal di Delete";
            } elseif (isset($_GET['status-create-mobil'])) {
                $status = $_GET['status-create-mobil'];
                $message = $status == "success" ? "Mobil Baru Berhasil di Upload" : "Mobil Baru Gagal di Upload";
            } elseif (isset($_GET['status-update-mobil'])) {
                $status = $_GET['status-update-mobil'];
                $message = $status == "success" ? "Mobil Berhasil di Update" : "Mobil Gagal di Update";
            } elseif (isset($_GET['name-car-found'])) {
                $status = $_GET['name-car-found'];
                $message = $status == "success" ? "Berhasil" : "Nama Mobil Sudah Ada";
            } elseif (isset($_GET['status-delete-mobil'])) {
                $status = $_GET['status-delete-mobil'];
                $message = $status == "success" ? "Mobil Berhasil di Delete" : "Mobil Gagal di Delete";
            } elseif (isset($_GET['status-delete-testimonial'])) {
                $status = $_GET['status-delete-testimonial'];
                $message = $status == "success" ? "Testimonial Berhasil di Delete" : "Testimonial Gagal di Delete";
            }

            if ($status == "success") : ?>
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
            <?php else : ?>
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
            <?php endif; ?>
            <div class="ms-3 text-sm font-normal"><?php echo $message; ?></div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    <?php endif; ?>

    <div class="container mx-auto p-4">

        <div class="md:grid grid-cols-1 md:grid-cols-2 gap-3 hidden">
            <!-- Gallery Dropdown -->
            <div>
                <div class="w-full">
                    <div>
                        <div class="p-6 bg-blue-500 rounded-t-lg">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-white">Galeri</h2>
                            </div>
                            <div class="grid grid-cols-4 gap-2">
                                <!-- Gambar-gambar gallery -->
                                <div class="h-16 bg-white rounded"></div>
                                <div class="h-16 bg-white rounded"></div>
                                <div class="h-16 bg-white rounded"></div>
                                <div class="h-16 bg-white rounded"></div>
                            </div>
                        </div>
                        <div id="accordion-open" data-accordion="open">
                            <h2 id="accordion-open-heading-1">
                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right rounded-b-lg gap-3 bg-blue-500" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                    <span class="flex items-center text-white"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                        </svg>1000 Foto</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <!-- Product Dropdown -->
                <div class="w-full">
                    <div>
                        <div class="p-6 bg-yellow-500 rounded-t-lg">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-white">Mobil</h2>
                            </div>
                            <div class="grid grid-cols-4 gap-2">
                                <!-- Gambar-gambar Product -->
                                <div class="h-16 bg-white rounded"></div>
                                <div class="h-16 bg-white rounded"></div>
                                <div class="h-16 bg-white rounded"></div>
                                <div class="h-16 bg-white rounded"></div>
                            </div>
                        </div>
                        <div id="accordion-open" data-accordion="open">
                            <h2 id="accordion-open-heading-2">
                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right rounded-b-lg gap-3 bg-yellow-500" data-accordion-target="#accordion-open-body-2" aria-expanded="true" aria-controls="accordion-open-body-2">
                                    <span class="flex items-center text-white"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                        </svg>1000 Cars</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <!-- Upload Gallery -->
            <div>
                <div id="accordion-open-body-1" class="hidden mt-3" aria-labelledby="accordion-open-heading-1">
                    <div class="p-5 bg-blue-500 rounded-lg h-[440px]">
                        <div>
                            <h1 class="font-bold text-white mb-3">Upload Foto</h1>
                            <div class="bg-white text-center font-bold text blue-500 p-3 rounded-md">
                                <span>Foto Kurang dari 1MB</span>
                            </div>
                            <form action="<?= BASE_URL ?>/dashboard/galeri/create" method="POST" enctype="multipart/form-data" id="galeriUpload">
                                <div class="mb-4">
                                    <input name="foto_gallery" type="file" class="block w-full mt-2 rounded-md border-zinc-900 border">
                                </div>
                                <div class="mb-4">
                                    <input name="judul_foto" type="text" class="block w-full mt-2 border-gray-300 rounded-md" placeholder="Nama Foto">
                                </div>
                                <div class="mb-4">
                                    <div class="p-2 bg-white rounded-md h-full">
                                        <div id="editor-container-photo" class="border text-sm rounded-md h-96"></div>
                                        <input type="hidden" name="deskripsi_photo" id="content-description-photo">
                                    </div>

                                    <!-- Include Quill library -->
                                    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                                    <script>
                                        var toolbarOptions = [
                                            ['bold', 'italic', 'underline', 'strike'],
                                            [{
                                                'header': 1
                                            }, {
                                                'header': 2
                                            }],
                                            [{
                                                'list': 'ordered'
                                            }, {
                                                'list': 'bullet'
                                            }],
                                            [{
                                                'indent': '-1'
                                            }, {
                                                'indent': '+1'
                                            }],
                                            [{
                                                'size': ['small', false, 'large', 'huge']
                                            }],
                                            [{
                                                'header': [1, 2, 3, 4, 5, 6, false]
                                            }],
                                            [{
                                                'align': []
                                            }],
                                            ['link']
                                        ];

                                        var quillPhoto = new Quill('#editor-container-photo', {
                                            modules: {
                                                toolbar: toolbarOptions
                                            },
                                            placeholder: 'Berikan Deskripsi Yang Jelas...',
                                            theme: 'snow'
                                        });

                                        document.querySelector('#galeriUpload').onsubmit = function() {
                                            var content = document.querySelector('#content-description-photo');
                                            content.value = quillPhoto.root.innerHTML.trim();
                                        };
                                    </script>
                                </div>
                                <button type="submit" name="uploadFoto" class="px-4 py-2 bg-white text-blue-600 w-full rounded-md font-semibold">Submit Foto Baru</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upload Mobil -->
            <div>
                <div id="accordion-open-body-2" class="hidden mt-3" aria-labelledby="accordion-open-heading-2">
                    <div class="p-5 bg-yellow-500 rounded-lg h-[440px]">
                        <div>
                            <h1 class="font-bold text-white mb-3">Upload Mobil Baru</h1>
                            <div class="overflow-auto h-[360px] rounded-md">
                                <div class="bg-white text-center font-bold text blue-500 p-3 rounded-md">
                                    <span>Foto Kurang dari 1MB <br> Ukuran 1920x1080</span>
                                </div>
                                <form action="<?= BASE_URL ?>/dashboard/mobil/create" method="POST" enctype="multipart/form-data" id="addNewCars">
                                    <div class="mb-2">
                                        <input name="foto_mobil" type="file" class="block w-full mt-2 rounded-md shadow-sm border-zinc-900 border">
                                    </div>
                                    <div class="mb-2 grid grid-cols-2 gap-2">
                                        <input name="harga_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Harga Mobil">
                                        <input name="nama_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Nama Mobil">
                                        <input name="merk_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Merk Mobil">
                                        <input name="kilometer" type="text" class="block w-full border-gray-300 rounded-md" placeholder="kilometer">
                                        <select id="transmisi" name="transmisi" class="block w-full border-gray-300 rounded-md p-2">
                                            <option value="" disabled selected>Pilih Transmisi</option>
                                            <option value="Manual">Manual</option>
                                            <option value="Otomatis">Otomatis</option>
                                        </select>
                                        <input name="kursi" type="text" class="block w-full border-gray-300 rounded-md" placeholder="kursi">
                                        <input name="bagasi" type="text" class="block w-full border-gray-300 rounded-md" placeholder="bagasi">
                                        <select id="jenisBensin" name="jenis_bensin" class="block w-full border-gray-300 rounded-md p-2">
                                            <option value="" disabled selected>Jenis Bensin</option>
                                            <option value="premium">Premium</option>
                                            <option value="pertalite">Pertalite</option>
                                            <option value="pertamax">Pertamax</option>
                                            <option value="pertamaxTurbo">Pertamax Turbo</option>
                                            <option value="dexlite">Dexlite</option>
                                            <option value="pertaminaDex">Pertamina Dex</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <div class="p-2 bg-white rounded-md h-full">
                                            <div id="editor-container-mobil" class="shadow-sm border text-sm rounded-md h-96"></div>
                                            <input type="hidden" name="deskripsi_mobil" id="content_description_mobil">
                                        </div>

                                        <!-- Include Quill library -->
                                        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                                        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                                        <script>
                                            var toolbarOptions = [
                                                ['bold', 'italic', 'underline', 'strike'],
                                                [{
                                                    'header': 1
                                                }, {
                                                    'header': 2
                                                }],
                                                [{
                                                    'list': 'ordered'
                                                }, {
                                                    'list': 'bullet'
                                                }],
                                                [{
                                                    'indent': '-1'
                                                }, {
                                                    'indent': '+1'
                                                }],
                                                [{
                                                    'size': ['small', false, 'large', 'huge']
                                                }],
                                                [{
                                                    'header': [1, 2, 3, 4, 5, 6, false]
                                                }],
                                                [{
                                                    'align': []
                                                }],
                                                ['link']
                                            ];

                                            var quillMobil = new Quill('#editor-container-mobil', {
                                                modules: {
                                                    toolbar: toolbarOptions
                                                },
                                                placeholder: 'Berikan Deskripsi Yang Jelas...',
                                                theme: 'snow'
                                            });

                                            document.querySelector('#addNewCars').onsubmit = function() {
                                                var content = document.querySelector('#content_description_mobil');
                                                content.value = quillMobil.root.innerHTML.trim();
                                            };
                                        </script>
                                    </div>
                                    <button type="submit" name="uploadMobil" class="px-4 py-2 bg-white text-yellow-600 w-full rounded-md font-semibold">Submit Mobil Baru</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List Gallery -->
            <div>
                <div class="bg-blue-500 p-6 rounded-lg shadow-md h-96">
                    <h2 class="text-lg font-semibold mb-4 text-white">List Gallery</h2>
                    <div>
                        <div class="overflow-auto h-[300px] rounded-md">
                            <div class="container mx-auto">
                                <div class="columns-2 md:columns-3 gap-2">
                                    <?php foreach ($model['allGaleri'] as $galeri) : ?>
                                        <div class="gallery-item">
                                            <div>
                                                <div class="relative overflow-hidden rounded-lg image-container">
                                                    <img class="image w-full h-auto object-cover" src="<?= BASE_URL ?>/assets/gallery/<?= $galeri['photo'] ?>" alt="<?= $galeri['nama'] ?>">
                                                    <div class="absolute inset-0 bg-black/35 opacity-0 overlay"></div>
                                                    <div class="absolute inset-0 flex items-center justify-center gap-2 icon">
                                                        <form action="<?= BASE_URL ?>/dashboard/galeri/delete" method="POST">
                                                            <input type="hidden" name="id" value="<?= $galeri['id'] ?>">
                                                            <button type="submit" name="deleteFoto" onclick="return confirm('Apakah Anda yakin ingin menghapus Foto <?= $galeri['nama'] ?> ini?')" class="hover:bg-red-500 rounded-md bg-black/50 border border-white px-6 py-3 inline-flex hover:cursor-pointer">
                                                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <span class="hover:bg-green-500 rounded-md bg-black/50 border border-white px-6 py-3 inline-flex hover:cursor-pointer" data-modal-target="edit-modal-gallery-<?= $galeri['id'] ?>" data-modal-toggle="edit-modal-gallery-<?= $galeri['id'] ?>">
                                                            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                                                                <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List Mobil -->
            <div>
                <div class="bg-yellow-500 p-6 rounded-lg shadow-md h-96 overflow-auto">
                    <h2 class="text-lg font-semibold mb-4 text-white">List Gallery</h2>
                    <div class="overflow-auto h-[300px] rounded-md">
                        <table class="min-w-full">
                            <thead class=" bg-yellow-800 sticky top-0">
                                <tr class="uppercase">
                                    <th class="px-4 border border-yellow-500 text-white py-2 text-center">NO</th>
                                    <th class="px-4 border border-yellow-500 text-white py-2 text-center">Picture</th>
                                    <th class="px-4 border border-yellow-500 text-white py-2 text-center">Nama Mobil</th>
                                    <th class="px-4 border border-yellow-500 text-white py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-yellow-600">
                                <?php $i = 1; ?>
                                <?php foreach ($model['allMobil'] as $mobil) : ?>
                                    <tr>
                                        <td class="px-4 border border-yellow-500 text-white py-1 text-center"><?= $i; ?></td>
                                        <td class="px-4 border border-yellow-500 text-white py-1 text-center"><img width="100px" class="mx-auto" src="<?= BASE_URL ?>/assets/cars/<?= $mobil['photo'] ?>" alt="<?= $mobil['nama_mobil'] ?>"></td>
                                        <td class="px-4 border border-yellow-500 text-white py-1 text-center text-sm font-medium"><?= $mobil['nama_mobil'] ?></td>
                                        <td class="px-4 border border-yellow-500 text-white py-1 text-center">
                                            <div class="flex gap-2 justify-center items-center">
                                                <form action="<?= BASE_URL ?>/dashboard/mobil/delete" method="POST">
                                                    <input type="hidden" name="id" value="<?= $mobil['id'] ?>">
                                                    <button type="submit" name="deleteMobil" onclick="return confirm('Apakah Anda yakin ingin menghapus Mobil <?= $mobil['nama_mobil'] ?> | <?= $mobil['merk_mobil'] ?> ini?')" class="hover:bg-red-500 rounded-md bg-black/50 border border-white px-4 py-2 inline-flex">
                                                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <span class="hover:bg-green-500 rounded-md bg-black/50 border border-white px-4 py-2 inline-flex" data-modal-target="edit-modal-mobil-<?= $mobil['id'] ?>" data-modal-toggle="edit-modal-mobil-<?= $mobil['id'] ?>">
                                                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                                                        <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                    ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div>
            <div class="bg-green-500 p-3 rounded-md h-96 mt-3">
                <h1 class="font-bold text-white mb-3">Testimonials</h1>
                <div class="overflow-auto h-80 rounded-md grid gap-2">
                    <?php foreach ($model['allTestimonial'] as $testi) : ?>
                        <div class="w-full">
                            <div class="testimonial-card">
                                <figure>
                                    <blockquote>
                                        <p class="text-lg font-semibold text-gray-900">"<?= $testi['deskripsi_testi'] ?>"</p>
                                    </blockquote>
                                    <figcaption class="flex items-center mt-6 space-x-3">
                                        <div class="flex items-center divide-x-2 divide-gray-300">
                                            <cite class="pe-3 font-medium text-gray-900"><?= $testi['nama_testi'] ?></cite>
                                            <cite class="ps-3 pe-3 text-sm text-gray-500"><?= $testi['posisi_testi'] ?></cite>
                                            <cite class="ps-3 pe-3 flex justify-center items-center">
                                                <svg class="w-4 h-4 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                                </svg>
                                                <?= $testi['rating_testi'] ?>
                                            </cite>
                                            <cite class="ps-3">
                                                <form action="<?= BASE_URL ?>/dashboard/testimonial/delete" method="POST">
                                                    <input type="text" name="id" value="<?= $testi['id'] ?>" readonly>
                                                    <button onclick="return confirm('Apakah Anda yakin ingin menghapus Testimoni Untuk : <?= $testi['nama_testi'] ?> ini?')" type="submit" name="testiDelete" class="ml-auto text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                                </form>
                                            </cite>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <!-- Edit Modal Gallery -->
        <?php foreach ($model['allGaleri'] as $galeri) : ?>
            <div id="edit-modal-gallery-<?= $galeri['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-zinc-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Edit : <?= $galeri['nama'] ?>
                            </h3>
                            <button type="button" class="end-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="edit-modal-gallery-<?= $galeri['id'] ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="<?= BASE_URL ?>/dashboard/galeri/update" method="POST" id="updateFoto<?= $galeri['id'] ?>" enctype="multipart/form-data">
                                <div class="w-full mb-3">
                                    <input value="<?= $galeri['id'] ?>" type="hidden" id="id" name="id_foto" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" readonly>
                                </div>
                                <div class="w-full flex justify-center items-center font-medium h-20 mb-3 text-sm rounded-lg text-zinc-800 bg-yellow-300">
                                    <ul class="">
                                        <li>Maks. Ukuran gambar 1MB</li>
                                    </ul>
                                </div>
                                <div class="w-full mb-3">
                                    <input id="" type="file" name="update_foto" class="border border-gray-500 text-white w-full rounded-lg" placeholder="">
                                </div>
                                <div class="w-full mb-3">
                                    <input value="<?= $galeri['nama'] ?>" type="text" id="" name="nama_foto" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light">
                                </div>
                                <div class="w-full mb-3">
                                    <div class="p-2 bg-white rounded-md">
                                        <div id="editor-container-update<?= $galeri['id'] ?>" class="shadow-sm border text-sm rounded-md h-[500px]"></div>
                                        <input type="hidden" name="deskripsi_foto" id="content_description_update<?= $galeri['id'] ?>">
                                    </div>
                                    <!-- Ensure Quill.js script is included here -->
                                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var toolbarOptions<?= $galeri['id'] ?> = [
                                                ['bold', 'italic', 'underline', 'strike'],
                                                [{
                                                    'header': 1
                                                }, {
                                                    'header': 2
                                                }],
                                                [{
                                                    'list': 'ordered'
                                                }, {
                                                    'list': 'bullet'
                                                }],
                                                [{
                                                    'indent': '-1'
                                                }, {
                                                    'indent': '+1'
                                                }],
                                                [{
                                                    'size': ['small', false, 'large', 'huge']
                                                }],
                                                [{
                                                    'header': [1, 2, 3, 4, 5, 6, false]
                                                }],
                                                [{
                                                    'align': []
                                                }],
                                                ['link']
                                            ];

                                            var quill<?= $galeri['id'] ?> = new Quill('#editor-container-update<?= $galeri['id'] ?>', {
                                                modules: {
                                                    toolbar: toolbarOptions<?= $galeri['id'] ?>
                                                },
                                                placeholder: 'Berikan Deskripsi Yang Jelas...',
                                                theme: 'snow'
                                            });

                                            var existingContent<?= $galeri['id'] ?> = <?= json_encode($galeri['deskripsi'] ?? ''); ?>;
                                            if (existingContent<?= $galeri['id'] ?>) {
                                                quill<?= $galeri['id'] ?>.root.innerHTML = existingContent<?= $galeri['id'] ?>;
                                            }

                                            document.querySelector('#updateFoto<?= $galeri['id'] ?>').onsubmit = function() {
                                                var content<?= $galeri['id'] ?> = document.querySelector('#content_description_update<?= $galeri['id'] ?>');
                                                content<?= $galeri['id'] ?>.value = quill<?= $galeri['id'] ?>.root.innerHTML.trim();
                                            };
                                        });
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="updateFoto" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white ">Update Foto Ini</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Edit Modal -->

        <!-- Edit Modal Mobil -->
        <?php foreach ($model['allMobil'] as $mobil) : ?>
            <div id="edit-modal-mobil-<?= $mobil['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-zinc-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Edit : <?= $mobil['nama_mobil'] ?> | <?= $mobil['merk_mobil'] ?>
                            </h3>
                            <button type="button" class="end-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="edit-modal-mobil-<?= $mobil['id'] ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <div class="bg-white text-center font-bold text blue-500 p-3 rounded-md">
                                <span>Foto Kurang dari 1MB <br> Ukuran 1920x1080</span>
                            </div>
                            <form action="<?= BASE_URL ?>/dashboard/mobil/update" method="POST" id="updateFoto<?= $mobil['id'] ?>" enctype="multipart/form-data">
                                <div class="w-full mb-3">
                                    <input name="id" value="<?= $mobil['id'] ?>" type="hidden" id="id" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" readonly>
                                </div>
                                <div class="mb-2">
                                    <input name="foto_mobil" type="file" class="block w-full mt-2 rounded-md shadow-sm border-zinc-900 border" value="<?= $mobil['photo'] ?>">
                                </div>
                                <div class="mb-2 grid grid-cols-2 gap-2">
                                    <input name="harga_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Harga Mobil" value="<?= $mobil['harga_mobil'] ?>">
                                    <input name="nama_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Nama Mobil" value="<?= $mobil['nama_mobil'] ?>">
                                    <input name="merk_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Merk Mobil" value="<?= $mobil['merk_mobil'] ?>">
                                    <input name="kilometer" type="text" class="block w-full border-gray-300 rounded-md" placeholder="kilometer" value="<?= $mobil['kilometer_mobil'] ?>">
                                    <select id="transmisi" name="transmisi" class="block w-full border-gray-300 rounded-md p-2">
                                        <option value="" disabled <?= empty($mobil['transmisi_mobil']) ? 'selected' : '' ?>>Pilih Transmisi</option>
                                        <option value="Manual" <?= $mobil['transmisi_mobil'] == 'Manual' ? 'selected' : '' ?>>Manual</option>
                                        <option value="Otomatis" <?= $mobil['transmisi_mobil'] == 'Otomatis' ? 'selected' : '' ?>>Otomatis</option>
                                    </select>
                                    <input name="kursi" type="text" class="block w-full border-gray-300 rounded-md" placeholder="kursi" value="<?= $mobil['kursi_mobil'] ?>">
                                    <input name="bagasi" type="text" class="block w-full border-gray-300 rounded-md" placeholder="bagasi" value="<?= $mobil['bagasi_mobil'] ?>">
                                    <select id="jenisBensin" name="jenis_bensin" class="block w-full border-gray-300 rounded-md p-2">
                                        <option value="" disabled <?= empty($mobil['jenis_mobil']) ? 'selected' : '' ?>>Jenis Bensin</option>
                                        <option value="premium" <?= $mobil['jenis_mobil'] == 'premium' ? 'selected' : '' ?>>Premium</option>
                                        <option value="pertalite" <?= $mobil['jenis_mobil'] == 'pertalite' ? 'selected' : '' ?>>Pertalite</option>
                                        <option value="pertamax" <?= $mobil['jenis_mobil'] == 'pertamax' ? 'selected' : '' ?>>Pertamax</option>
                                        <option value="pertamaxTurbo" <?= $mobil['jenis_mobil'] == 'pertamaxTurbo' ? 'selected' : '' ?>>Pertamax Turbo</option>
                                        <option value="dexlite" <?= $mobil['jenis_mobil'] == 'dexlite' ? 'selected' : '' ?>>Dexlite</option>
                                        <option value="pertaminaDex" <?= $mobil['jenis_mobil'] == 'pertaminaDex' ? 'selected' : '' ?>>Pertamina Dex</option>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <div class="p-2 bg-white rounded-md">
                                        <div id="editor-container-update<?= $mobil['id'] ?>-mobil" class="shadow-sm border text-sm rounded-md h-[500px]"></div>
                                        <input type="hidden" name="deskripsi_mobil" id="content_description_update<?= $mobil['id'] ?>mobil">
                                    </div>
                                    <!-- Ensure Quill.js script is included here -->
                                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var toolbarOptionsMobil<?= $mobil['id'] ?> = [
                                                ['bold', 'italic', 'underline', 'strike'],
                                                [{
                                                    'header': 1
                                                }, {
                                                    'header': 2
                                                }],
                                                [{
                                                    'list': 'ordered'
                                                }, {
                                                    'list': 'bullet'
                                                }],
                                                [{
                                                    'indent': '-1'
                                                }, {
                                                    'indent': '+1'
                                                }],
                                                [{
                                                    'size': ['small', false, 'large', 'huge']
                                                }],
                                                [{
                                                    'header': [1, 2, 3, 4, 5, 6, false]
                                                }],
                                                [{
                                                    'align': []
                                                }],
                                                ['link']
                                            ];

                                            var quillMobil<?= $mobil['id'] ?> = new Quill('#editor-container-update<?= $mobil['id'] ?>-mobil', {
                                                modules: {
                                                    toolbar: toolbarOptionsMobil<?= $mobil['id'] ?>
                                                },
                                                placeholder: 'Berikan Deskripsi Yang Jelas...',
                                                theme: 'snow'
                                            });

                                            var existingContentMobil<?= $mobil['id'] ?> = <?= json_encode($mobil['deskripsi_mobil'] ?? ''); ?>;
                                            if (existingContentMobil<?= $mobil['id'] ?>) {
                                                quillMobil<?= $mobil['id'] ?>.root.innerHTML = existingContentMobil<?= $mobil['id'] ?>;
                                            }

                                            document.querySelector('#updateFoto<?= $mobil['id'] ?>').onsubmit = function() {
                                                var contentMobil<?= $mobil['id'] ?> = document.querySelector('#content_description_update<?= $mobil['id'] ?>mobil');
                                                contentMobil<?= $mobil['id'] ?>.value = quillMobil<?= $mobil['id'] ?>.root.innerHTML.trim();
                                            };
                                        });
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="updateMobil" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white">Update Mobil Ini</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Edit Modal -->

        <a href="<?= BASE_URL ?>/logout"
            class="w-full p-3 bg-red-500 text-white rounded-md mt-3 block text-center"
            onclick="return confirm('Apakah Anda yakin ingin logout?')">LogOut</a>

























































    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>