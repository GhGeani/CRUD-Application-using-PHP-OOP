<?php

    class Info 
    {
        private $name;
        private $text;
        private $date;
        private $image;

        public function __construct($name, $text, $date, $image) {
            $this->name = $name;
            $this->text = $text;
            $this->date = $date;
            $this->image = $image;
        }
    }

?>