<?php

namespace AdSpinner\Model;

class AdSpinnerModel {
    public $link;
    public $image;
    public $alt;
    public $width;
    public $height;

    public function __construct($data) {
        $this->link = $data['link'];
        $this->image = $data['image'];
        $this->alt = $data['alt'];
        $this->width = $data['width'];
        $this->height = $data['height'];
    }
}
