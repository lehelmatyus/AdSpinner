<?php

namespace AdSpinner\Service;

use AdSpinner\Model\AdSpnrModel;

class AdSpnrService {
    public static function renderAdHtml(AdSpnrModel $ad) {
        $html = '<a href="' . $ad->link . '" target="_blank">';
        $html .= '<img src="' . $ad->image . '" alt="' . $ad->alt . '" width="' . $ad->width . '" height="' . $ad->height . '">';
        $html .= '</a>';
        return $html;
    }
}
