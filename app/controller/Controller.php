<?php 

    include_once 'app/controller/classes/Info.php';
    include_once 'app/controller/classes/Contacts.php';
    include_once 'app/controller/classes/Services.php';

    class Controller {

        private $request;
        public $infoController;
        public $contactController;
        public $serviceController;

        public function __construct() {
            $this->infoController = new InfoController();
            $this->contactController = new ContactController();
            $this->serviceController = new ServiceController();
        }

        public function route() {


            $this->request = $_SERVER['REQUEST_URI'];
            switch ($this->request) {
                case '/admin-panel':
                    if(isset($_POST['submit_info'])) {
                        $info = new Info($_POST['i_text'], $_POST['i_date']);
                        $this->infoController->save($info->toArray());
                        header('Location: /admin-panel');
                        exit();
                    }

                    if(isset($_POST['submit_contact'])) {
                        $contact = new Contact($_POST['c_name'], $_POST['c_phone']);
                        $this->contactController->save($contact->toArray());
                        header('Location: /admin-panel');
                        exit();
                    }

                    if(isset($_POST['submit_service'])) {
                        $service = new Service($_POST['s_name']);
                        $this->serviceController->save($service->toArray());
                        header('Location: /admin-panel');
                        exit();
                    }

                    if(isset($_POST['delete'])){
                        switch ($_POST['delete']) {
                            case 'manage-services_delete':
                                $id = $_POST['id'];
                                $this->serviceController->deleteInfo($id);
                                header('Location: /admin-panel');
                                exit();
                                break;
                            case 'manage-infos_delete':
                                $id = $_POST['id'];
                                $this->infoController->deleteInfo($id);
                                header('Location: /admin-panel');
                                exit();
                                break;
                            
                            default:
                                header('Location: /admin-panel');
                                exit();
                                break;
                        }
                       
                    }

                    if(isset($_POST['update_info'])){
                        $id = $_POST['id'];
                        $updatedinfo = new Info($_POST['i_text'], $_POST['i_date']);
                        $this->infoController->updateInfo($updatedinfo->toArray(), $id);
                        header('Location: /admin-panel');
                        exit();
                    }

                    if(isset($_POST['update_service'])){
                        $id = $_POST['id'];
                        $updatedService = new Service($_POST['s_name']);
                        $this->serviceController->updateInfo($updatedService->toArray(), $id);
                        header('Location: /admin-panel');
                        exit();
                    }
                    require 'admin-index.php';
                    break;
                case '/servicii':
                    require 'app/view/services.php';
                    break;
                case '/':
                    require 'app/view/services.php';
                    break;
                case '/vanzari':
                    require 'app/view/sales.php';
                    break;
                default:
                        echo '404 -PAGE NOT FOUND';
                    break;
            }
        } 
    }

?>