<?php
    namespace Darmasaktitravel\Carrent\Controller;

    use Darmasaktitravel\Carrent\App\View;
    use Darmasaktitravel\Carrent\Models\DashboardModel;

    class TentangController {
        function index() {
            $dashboardModel = new DashboardModel();
            $getAllTestimonial = $dashboardModel->getAllTestimonial();
            $model = [
                'title' => 'Tentang Tour and Travel | Darma Sakti Tavel Bandung',
                'allTestimonial' => $getAllTestimonial['testimonial']
            ];
            
            View::render('interface/tentang', $model);
        }
    }