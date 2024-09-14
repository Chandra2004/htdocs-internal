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
    <?php if (isset($_GET['status-create-galeri-limit']) || isset($_GET['name-car-found']) || isset($_GET['status-update-photo-size']) || isset($_GET['status-update-photo-extension']) || isset($_GET['status-create-galeri']) || isset($_GET['status-create-galeri-photo-require']) || isset($_GET['status-create-galeri-photo-size']) || isset($_GET['status-create-galeri-photo-status']) || isset($_GET['status-update-galeri']) || isset($_GET['status-delete-galeri']) || isset($_GET['status-create-mobil']) || isset($_GET['status-update-mobil']) || isset($_GET['status-delete-mobil']) || isset($_GET['status-delete-testimonial'])) : ?>
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
            } elseif (isset($_GET['status-create-galeri-limit'])) {
                $status = $_GET['status-create-galeri-limit'];
                $message = $status == "success" ? "Berhasil" : "1000 Gambar Sudah Diupload Mohon Dipahus Beberapa Foto";
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
        <div class="grid grid-cols-1 md:grid-cols-1 gap-3">






            <div id="accordion-arrow-icon" data-accordion="open">
                <!-- Upload Gallery -->
                <div>
                    <div>
                        <div class="mt-3">
                            <div class="p-5 bg-blue-500 rounded-lg">
                                <div>
                                    <h1 class="font-bold text-white mb-3">Upload Foto</h1>
                                    <div class="bg-white text-center font-bold text-blue-500 p-3 rounded-md">
                                        <span>Setiap Foto Kurang dari 3MB (Bisa Upload 10 Foto Sekaligus)</span>
                                    </div>
                                    <form action="<?= BASE_URL ?>/dashboard/galeri/create" method="POST" enctype="multipart/form-data" id="galeriUpload">
                                        <div class="mb-4">
                                            <input id="foto_gallery" name="foto_gallery[]" type="file" class="block w-full mt-2 rounded-md border-zinc-900 border" accept=".jpg,.png" multiple>
                                        </div>
                                        <div id="fotoForms" class="grid grid-cols-2 gap-2"></div>
                                        <button type="submit" name="uploadFoto" class="px-4 py-2 bg-white text-blue-600 w-full rounded-md font-semibold">Submit Foto Baru</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Include Quill library -->
                    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    <script>
                        document.getElementById('foto_gallery').addEventListener('change', function(event) {
                            const fotoForms = document.getElementById('fotoForms');
                            fotoForms.innerHTML = ''; // Clear existing forms
                            const files = event.target.files;
                            const previewContainer = document.createElement('div');
                            previewContainer.classList.add('mb-6');

                            for (let i = 0; i < files.length; i++) {
                                const file = files[i];
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const form = document.createElement('div');
                                    form.classList.add('mb-6');
                                    form.innerHTML = `
                                    <div>
                                        <div>
                                            <h2 class="font-semibold text-white mb-2">Foto ${i + 1}</h2>
                                            <div class="mb-4">
                                                <img src="${e.target.result}" alt="Preview Foto ${i + 1}" class="w-full h-auto rounded-md">
                                            </div>
                                            <div class="mb-4">
                                                <input name="judul_foto[]" type="text" class="block w-full mt-2 border-gray-300 rounded-md" placeholder="Nama Foto ${i + 1}">
                                            </div>
                                            <div class="mb-4">
                                                <div class="p-2 bg-white rounded-md h-full">
                                                    <div id="editor-container-photo-${i}" class="border text-sm rounded-md h-32"></div>
                                                    <input type="hidden" name="deskripsi_photo[]" id="content-description-photo-${i}">
                                                </div>
                                            </div>
                                            <hr class="mb-4">
                                        </div>
                                    </div>
                                `;
                                    fotoForms.appendChild(form);

                                    // Initialize Quill editor for each photo description
                                    const quillPhoto = new Quill(`#editor-container-photo-${i}`, {
                                        modules: {
                                            toolbar: [
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
                                            ]
                                        },
                                        placeholder: 'Berikan Deskripsi Untuk Foto ' + (i + 1) + '...',
                                        theme: 'snow'
                                    });

                                    document.querySelector('#galeriUpload').onsubmit = function() {
                                        const content = document.querySelector(`#content-description-photo-${i}`);
                                        content.value = quillPhoto.root.innerHTML.trim();
                                    };
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>
                </div>

                <div>
                    <h2 id="accordion-list-gallery">
                        <button type="button" class="mt-3 flex items-center justify-between w-full p-5 font-medium rtl:text-right rounded-lg gap-3 bg-blue-500 text-white focus:text-white" data-accordion-target="#accordion-body-list-gallery" aria-expanded="false" aria-controls="accordion-body-list-gallery">
                            <span class="text-white">List Galeri | <?= $model['countGaleri'] ?>/1000 Gambar</span>
                            <svg data-accordion-icon class="text-white w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-body-list-gallery" class="hidden" aria-labelledby="accordion-list-gallery">
                        <!-- List Gallery -->
                        <div>
                            <div class="bg-blue-500 p-6 rounded-lg mt-3 shadow-md h-[1000px]">
                                <div>
                                    <div class="overflow-auto h-[950px] rounded-md">
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
                    </div>
                </div>

                <!-- Upload Mobil -->
                <div>
                    <div>
                        <div class="p-5 bg-yellow-500 rounded-lg mt-3">
                            <div>
                                <h1 class="font-bold text-white mb-3">Upload Mobil Baru</h1>
                                <div>
                                    <div class="bg-white text-center font-bold text blue-500 p-3 rounded-md">
                                        <span>Foto Kurang dari 3MB <br> Ukuran 1920x1080</span>
                                    </div>
                                    <form action="<?= BASE_URL ?>/dashboard/mobil/create" method="POST" enctype="multipart/form-data" id="addNewCars">
                                        <!-- Preview Image Section -->
                                        <div class="mb-2">
                                            <img id="preview" src="#" alt="" class="mt-2 w-full h-auto rounded-md border-gray-300">
                                        </div>
                                        <div class="mb-2">
                                            <input name="foto_mobil" type="file" class="block w-full mt-2 rounded-md shadow-sm border-zinc-900 border" id="foto_mobil">
                                        </div>
                                        <div class="mb-2 grid grid-cols-2 gap-2">
                                            <input name="harga_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Harga Mobil" value="Harga None (Tidak Ditampilkan)" readonly>
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
                                            <script>
                                                document.getElementById('foto_mobil').addEventListener('change', function(event) {
                                                    const input = event.target;
                                                    const preview = document.getElementById('preview');

                                                    if (input.files && input.files[0]) {
                                                        const reader = new FileReader();

                                                        reader.onload = function(e) {
                                                            preview.src = e.target.result;
                                                        };

                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                });
                                            </script>
                                        </div>
                                        <button type="submit" name="uploadMobil" class="px-4 py-2 bg-white text-yellow-600 w-full rounded-md font-semibold">Submit Mobil Baru</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 id="accordion-list-mobil" class="mt-3">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right rounded-lg gap-3 bg-yellow-500 text-white focus:text-white" data-accordion-target="#accordion-body-list-mobil" aria-expanded="false" aria-controls="accordion-body-list-mobil">
                            <span class="text-white">List Mobil</span>
                            <svg data-accordion-icon class="text-white w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-body-list-mobil" class="hidden" aria-labelledby="accordion-list-mobil">
                        <!-- List Mobil -->
                        <div>
                            <div class="bg-yellow-500 p-6 rounded-lg shadow-md h-96 overflow-auto mt-3">
                                <h2 class="text-lg font-semibold mb-4 text-white">List Mobil</h2>
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
                </div>

                <!-- Upload Gallery Cars -->
                <div>
                    <div>
                        <div class="p-5 bg-cyan-500 rounded-lg h-auto mt-3">
                            <div>
                                <h1 class="font-bold text-white mb-3">Upload Galeri Mobil</h1>
                                <div class="bg-white text-center font-bold text-cyan-500 p-3 rounded-md">
                                    <span>Upload Foto Mobil dengan Deskripsi Spesifikasinya (Bisa Upload 10 Gambar Sekaligus)</span>
                                </div>
                                <form action="<?= BASE_URL ?>/dashboard/galeri/spesifikasi/create" method="POST" enctype="multipart/form-data" id="galeriSpesifikasiUpload">
                                    <div class="mb-4">
                                        <input id="foto_spesifikasi" name="foto_spesifikasi[]" type="file" class="block w-full mt-2 rounded-md border-zinc-900 border" multiple accept=".jpg,.png">
                                    </div>
                                    <div id="form-spesifikasi-container" class="grid grid-cols-2 gap-2">
                                        <!-- Form deskripsi spesifikasi akan muncul di sini -->
                                    </div>
                                    <button type="submit" name="uploadSpesifikasi" class="px-4 py-2 bg-white text-cyan-600 w-full rounded-md font-semibold">Submit Spesifikasi Mobil</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Script untuk menambahkan input form sesuai jumlah foto -->
                    <script>
                        document.getElementById('foto_spesifikasi').addEventListener('change', function(e) {
                            const formSpesifikasiContainer = document.getElementById('form-spesifikasi-container');
                            formSpesifikasiContainer.innerHTML = ''; // Kosongkan form sebelumnya

                            Array.from(e.target.files).forEach((file, index) => {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const form = document.createElement('div');
                                    form.classList.add('mb-6');
                                    form.innerHTML = `
                                    <h2 class="font-semibold text-white mb-2">Foto ${index + 1}</h2>
                                    <div class="mb-4">
                                        <img src="${e.target.result}" alt="Preview Foto ${index + 1}" class="w-full h-auto rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <select id="judulSpesifikasi" name="judul_spesifikasi[]" class="block w-full border-gray-300 rounded-md p-2" required>
                                            <option value="" disabled selected>(Pilih Ini) Ini Foto Mobil Apa?</option>
                                            <?php foreach ($model['allMobil'] as $mobil) : ?>
                                                <option value="<?= $mobil['nama_mobil'] ?>"><?= $mobil['nama_mobil'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <div class="p-2 bg-white rounded-md h-full">
                                            <div id="editor-container-spesifikasi-${index}" class="border text-sm rounded-md h-32"></div>
                                            <input type="hidden" name="deskripsi_spesifikasi[]" id="content-description-spesifikasi-${index}">
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                `;

                                    formSpesifikasiContainer.appendChild(form);

                                    // Inisialisasi Quill untuk setiap editor
                                    const quillSpesifikasi = new Quill(`#editor-container-spesifikasi-${index}`, {
                                        modules: {
                                            toolbar: [
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
                                            ]
                                        },
                                        placeholder: 'Berikan Deskripsi Spesifikasi Mobil...',
                                        theme: 'snow'
                                    });

                                    // Simpan deskripsi ke dalam input hidden saat submit
                                    document.querySelector('#galeriSpesifikasiUpload').onsubmit = function() {
                                        const content = document.querySelector(`#content-description-spesifikasi-${index}`);
                                        content.value = quillSpesifikasi.root.innerHTML.trim();
                                    };
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>
                </div>

                <div>
                    <h2 id="accordion-list-mobil-spesifikasi" class="mt-3">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right rounded-lg gap-3 bg-cyan-500 text-white focus:text-white" data-accordion-target="#accordion-body-list-mobil-spesifikasi" aria-expanded="false" aria-controls="accordion-body-list-mobil-spesifikasi">
                            <span class="text-white">List Gallery Cars | <?= $model['countGaleriSpesifikasi'] ?>/1000 Gambar</span>
                            <svg data-accordion-icon class="text-white w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-body-list-mobil-spesifikasi" class="hidden" aria-labelledby="accordion-list-mobil-spesifikasi">
                        <!-- List Gallery Cars -->
                        <div>
                            <div class="bg-cyan-500 p-6 rounded-lg shadow-md h-96 mt-3">
                                <div>
                                    <div class="overflow-auto h-[330px] rounded-md">
                                        <div class="container mx-auto">
                                            <div class="columns-2 md:columns-3 gap-2">
                                                <?php foreach ($model['allGaleriSpesifikasi'] as $galeriSpesifikasi) : ?>
                                                    <div class="gallery-item">
                                                        <div>
                                                            <div class="relative overflow-hidden rounded-lg image-container">
                                                                <img class="image w-full h-auto object-cover" src="<?= BASE_URL ?>/assets/cars-gallery/<?= $galeriSpesifikasi['photo'] ?>" alt="<?= $galeriSpesifikasi['nama'] ?>">
                                                                <div class="absolute inset-0 bg-black/35 opacity-0 overlay"></div>
                                                                <div class="absolute inset-0 flex items-center justify-center gap-2 icon">
                                                                    <form action="<?= BASE_URL ?>/dashboard/galeri/spesifikasi/delete" method="POST">
                                                                        <input type="hidden" name="id" value="<?= $galeriSpesifikasi['id'] ?>">
                                                                        <button type="submit" name="deleteGaleriSpesifikasi" onclick="return confirm('Apakah Anda yakin ingin menghapus Foto Dari Mobil <?= $galeriSpesifikasi['nama'] ?> ini?')" class="hover:bg-red-500 rounded-md bg-black/50 border border-white px-6 py-3 inline-flex hover:cursor-pointer">
                                                                            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                    <span class="hover:bg-green-500 rounded-md bg-black/50 border border-white px-6 py-3 inline-flex hover:cursor-pointer" data-modal-target="edit-modal-gallery-<?= $galeriSpesifikasi['id'] ?>" data-modal-toggle="edit-modal-gallery-<?= $galeriSpesifikasi['id'] ?>">
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
                                                    <input type="hidden" name="id" value="<?= $testi['id'] ?>" readonly>
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
                                <div class="w-full flex justify-center items-center font-medium p-3 mb-3 text-sm rounded-md text-zinc-800 bg-yellow-300">
                                    <ul class="">
                                        <li>Maks. Ukuran gambar 3MB</li>
                                    </ul>
                                </div>
                                <div class="w-full mb-3">
                                    <img src="<?= BASE_URL ?>/assets/gallery/<?= $galeri['photo'] ?>" alt="<?= $galeri['nama'] ?>" class="rounded-md overflow-hidden">
                                </div>
                                <div class="w-full mb-3">
                                    <div>
                                        <svg class="w-6 h-6 text-white text-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                                        </svg>
                                        <img id="previewImg<?= $galeri['id'] ?>" class="rounded-md overflow-hidden mt-3" style="display: none;" />
                                    </div>
                                    <input id="fileInput<?= $galeri['id'] ?>" type="file" name="update_foto" class="border border-gray-500 text-white w-full rounded-lg mt-3" placeholder="">
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

                                            // Menangani pratinjau gambar
                                            var fileInput<?= $galeri['id'] ?> = document.querySelector('#fileInput<?= $galeri['id'] ?>');
                                            var previewImg<?= $galeri['id'] ?> = document.querySelector('#previewImg<?= $galeri['id'] ?>');

                                            fileInput<?= $galeri['id'] ?>.addEventListener('change', function(event) {
                                                var file = event.target.files[0];
                                                if (file) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        previewImg<?= $galeri['id'] ?>.src = e.target.result;
                                                        previewImg<?= $galeri['id'] ?>.style.display = 'block';
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="updateFoto" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white">Update Foto Ini</button>
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
                            <div class="text-zinc-800 bg-yellow-300 text-center font-bold text blue-500 p-3 rounded-md">
                                <span>Foto Kurang dari 3MB <br> Ukuran 1920x1080</span>
                            </div>
                            <form action="<?= BASE_URL ?>/dashboard/mobil/update" method="POST" id="updateFoto<?= $mobil['id'] ?>" enctype="multipart/form-data">
                                <div class="w-full mb-3">
                                    <input name="id" value="<?= $mobil['id'] ?>" type="hidden" id="id" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" readonly>
                                </div>
                                <div class="w-full mb-3">
                                    <img src="<?= BASE_URL ?>/assets/cars/<?= $mobil['photo'] ?>" alt="<?= $mobil['nama_mobil'] ?>" class="rounded-md overflow-hidden">
                                </div>
                                <div class="w-full">
                                    <div>
                                        <svg class="w-6 h-6 text-white text-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                                        </svg>
                                        <img id="preview_<?= $mobil['id'] ?>" src="<?= $mobil['photo'] ?>" alt="" class="mt-3 w-full h-auto rounded-md" style="display: <?= !empty($mobil['photo']) ? 'block' : 'none' ?>;">
                                    </div>
                                    <input name="foto_mobil" type="file" class="mb-3 block w-full mt-2 rounded-md shadow-sm border-zinc-900 border" id="foto_mobil_<?= $mobil['id'] ?>" onchange="previewImage(<?= $mobil['id'] ?>)">
                                </div>
                                <div class="mb-2 grid grid-cols-2 gap-2">
                                    <input name="harga_mobil" type="text" class="block w-full border-gray-300 rounded-md" placeholder="Harga Mobil" value="Harga None (Tidak Ditampilkan)" readonly>
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

                                    <script>
                                        function previewImage(id) {
                                            var file = document.querySelector('#foto_mobil_' + id).files[0];
                                            var reader = new FileReader();

                                            reader.onloadend = function() {
                                                var preview = document.querySelector('#preview_' + id);
                                                preview.src = reader.result;
                                                preview.style.display = 'block'; // Menampilkan gambar pratinjau
                                            };

                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                var preview = document.querySelector('#preview_' + id);
                                                preview.src = ''; // Menghapus gambar pratinjau jika tidak ada file
                                                preview.style.display = 'none';
                                            }
                                        }
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


        <!-- Edit Modal Gallery Spesifikasi -->
        <?php foreach ($model['allGaleriSpesifikasi'] as $galeriSpesifikasi) : ?>
            <div id="edit-modal-gallery-<?= $galeriSpesifikasi['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-zinc-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Edit : <?= $galeriSpesifikasi['nama'] ?>
                            </h3>
                            <button type="button" class="end-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="edit-modal-gallery-<?= $galeriSpesifikasi['id'] ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="<?= BASE_URL ?>/dashboard/galeri/spesifikasi/update" method="POST" id="updateFoto<?= $galeriSpesifikasi['id'] ?>" enctype="multipart/form-data">
                                <div class="w-full mb-3">
                                    <input value="<?= $galeriSpesifikasi['id'] ?>" type="hidden" id="id" name="id_foto" class="shadow-sm border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" readonly>
                                </div>
                                <div class="w-full flex justify-center items-center font-medium p-3 mb-3 text-sm rounded-lg text-zinc-800 bg-yellow-300">
                                    <ul class="">
                                        <li>Maks. Ukuran gambar 3MB</li>
                                    </ul>
                                </div>


                                <div class="w-full mb-3">
                                    <img src="<?= BASE_URL ?>/assets/cars-gallery/<?= $galeriSpesifikasi['photo'] ?>" alt="<?= $galeriSpesifikasi['nama'] ?>" class="rounded-md overflow-hidden">
                                </div>
                                <div class="w-full">
                                    <div>
                                        <svg class="w-6 h-6 text-white text-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                                        </svg>
                                        <img id="preview<?= $galeriSpesifikasi['id'] ?>" src="" alt="" class="my-3 w-full h-auto rounded-md">
                                    </div>
                                    <input id="file-input<?= $galeriSpesifikasi['id'] ?>" type="file" name="update_foto" class="mb-3 border border-gray-500 text-white w-full rounded-lg" placeholder="" accept="image/jpeg, image/png, image/jpg">
                                </div>
                                <div class="w-full mb-3">
                                    <select id="updateSpesifikasi" name="nama_foto" class="block w-full border-gray-300 rounded-md p-2" required>
                                        <option value="" disabled selected>Pilih Mobil</option>
                                        <?php foreach ($model['allMobil'] as $mobil) : ?>
                                            <option value="<?= $mobil['nama_mobil'] ?>"><?= $mobil['nama_mobil'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="w-full mb-3">
                                    <div class="p-2 bg-white rounded-md">
                                        <div id="editor-container-update<?= $galeriSpesifikasi['id'] ?>" class="shadow-sm border text-sm rounded-md h-[500px]"></div>
                                        <input type="hidden" name="deskripsi_foto" id="content_description_update<?= $galeriSpesifikasi['id'] ?>">
                                    </div>
                                    <!-- Ensure Quill.js script is included here -->
                                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var toolbarOptions<?= $galeriSpesifikasi['id'] ?> = [
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

                                            var quill<?= $galeriSpesifikasi['id'] ?> = new Quill('#editor-container-update<?= $galeriSpesifikasi['id'] ?>', {
                                                modules: {
                                                    toolbar: toolbarOptions<?= $galeriSpesifikasi['id'] ?>
                                                },
                                                placeholder: 'Berikan Deskripsi Yang Jelas...',
                                                theme: 'snow'
                                            });

                                            var existingContent<?= $galeriSpesifikasi['id'] ?> = <?= json_encode($galeriSpesifikasi['deskripsi'] ?? ''); ?>;
                                            if (existingContent<?= $galeriSpesifikasi['id'] ?>) {
                                                quill<?= $galeriSpesifikasi['id'] ?>.root.innerHTML = existingContent<?= $galeriSpesifikasi['id'] ?>;
                                            }

                                            document.querySelector('#updateFoto<?= $galeriSpesifikasi['id'] ?>').onsubmit = function() {
                                                var content<?= $galeriSpesifikasi['id'] ?> = document.querySelector('#content_description_update<?= $galeriSpesifikasi['id'] ?>');
                                                content<?= $galeriSpesifikasi['id'] ?>.value = quill<?= $galeriSpesifikasi['id'] ?>.root.innerHTML.trim();
                                            };

                                            // Image preview script
                                            document.querySelector('#file-input<?= $galeriSpesifikasi['id'] ?>').addEventListener('change', function(event) {
                                                var file = event.target.files[0];
                                                var preview = document.querySelector('#preview<?= $galeriSpesifikasi['id'] ?>');
                                                var reader = new FileReader();

                                                reader.onload = function(e) {
                                                    preview.src = e.target.result;
                                                    preview.classList.remove('hidden');
                                                };

                                                if (file) {
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    preview.classList.add('hidden');
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="w-full mb-3">
                                    <button type="submit" name="updateGaleriSpesifikasi" class="font-bold text-sm rounded-lg block w-full p-2.5 bg-green-600 text-white ">Update Galeri Spesifikasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Edit Modal -->

        <a href="<?= BASE_URL ?>/logout" class="w-full p-3 bg-red-500 text-white rounded-md mt-3 block text-center" onclick="return confirm('Apakah Anda yakin ingin logout?')">LogOut</a>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>