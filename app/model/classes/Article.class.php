<?php


    class Article
    {   
        private $title;
        private $text;
        private $date;
        private $image;

        public function __construct($title, $text, $date) {
            $this->setTitle($title);
            $this->setDate($date);
            $this->setText($text);
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function setDate($date) {
            $this->date = $date;
        }
        public function setText($text) {
            $this->text = $text;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function getTitle() {
            return $this->title;
        }
        public function getDate() {
            return $this->date;
        }

        public function getText() {
            return $this->text;
        }
        public function getImage() {
            return $this->image;
        }

        public function toArray () {
            return [
                "a_title" => $this->getTitle(),
                "a_text" => $this->getText(),
                "a_date" => $this->getDate()
            ];
        }
    }

?>


