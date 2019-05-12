<?php


    class Contact
    {   
        private $name;
        private $phone;

        public function __construct($name, $phone) {
            $this->setName($name);
            $this->setPhone($phone);
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function getName() {
            return $this->name;
        }
        public function getPhone() {
            return $this->phone;
        }

        public function toArray () {
            return [
                "c_name" => $this->getName(),
                "c_phone" => $this->getPhone()
            ];
        }
    }

?>


