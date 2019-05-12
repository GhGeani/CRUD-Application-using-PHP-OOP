<?php


    class Info
    {   
        private $information;
        private $date;

        public function __construct($information, $date) {
            $this->setInformation($information);
            $this->setDate($date);
        }

        public function setInformation($information) {
            $this->information = $information;
        }

        public function setDate($date) {
            $this->date = $date;
        }

        public function getInformation() {
            return $this->information;
        }
        public function getDate() {
            return $this->date;
        }

        public function toArray () {
            return [
                "i_text" => $this->getInformation(),
                "i_date" => $this->getDate()
            ];
        }
    }

?>


