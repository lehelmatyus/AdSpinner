<?php

namespace AdSpinner\Service;

use AdSpinner\Model\AdSpinnerModel;

class AdSpinnerService {
    public static function renderAdHtml(AdSpinnerModel $ad) {
        $html = '<a href="' . $ad->link . '" target="_blank">';
        $html .= '<img src="' . $ad->image . '" alt="' . $ad->alt . '" width="' . $ad->width . '" height="' . $ad->height . '">';
        $html .= '</a>';
        return $html;
    }
}
