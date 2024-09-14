<?php
    namespace Darmasaktitravel\Carrent\Controller;

    use Darmasaktitravel\Carrent\App\View;
    use Darmasaktitravel\Carrent\Models\DashboardModel;

    class GaleriController {
        function index() {
            $dashboardModel = new DashboardModel();
            $getAllGaleri = $dashboardModel->getAllGaleri();

            $model = [
                'title' => 'Galeri Tour and Travel | Darma Sakti Tavel Bandung',
                'allGaleri' => $getAllGaleri['galeri']
            ];
            
            View::render('interface/galeri', $model);
        }
    }