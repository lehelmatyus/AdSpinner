<?php

namespace AdSpinner\Service;

use AdSpinner\Model\AdSpinnerModel;

class AdSpinnerTemplateService {

    private string $template;

    public function __construct() {
    }

    public function getTemplate() {
        return $this->template;
    }

    public function setTemplate(string $template) {
        $this->template = $this->sanitizeTemplate($template);
    }

    private function sanitizeTemplate($template) {
        // Sanitize HTML string

        $sanitized_template = str_replace('script', '', $template);
        $sanitized_template = str_replace('iframe', '', $sanitized_template);
        $sanitized_template = str_replace('object', '', $sanitized_template);
        $sanitized_template = str_replace('embed', '', $sanitized_template);
        $sanitized_template = str_replace('applet', '', $sanitized_template);
        $sanitized_template = str_replace('meta', '', $sanitized_template);
        $sanitized_template = str_replace('link', '', $sanitized_template);

        return $sanitized_template;
    }

    /**
     * Renders the default ad HTML
     * @param AdSpinnerModel $ad
     */
    public static function renderDefaultAdHtml(AdSpinnerModel $ad) {
        $html = '<a href="' . $ad->link . '" target="_blank">';
        $html .= '<img src="' . $ad->image . '" alt="' . $ad->alt . '" width="' . $ad->width . '" height="' . $ad->height . '">';
        $html .= '</a>';
        return $html;
    }

    /**
     * Replaces Patterns in the template with the ad data
     * @param AdSpinnerModel $ad
     * @return string
     */
    public function renderAdHtml(AdSpinnerModel $ad) {
        $template = $this->getTemplate();

        $template = str_replace('%link%', $ad->link, $template);
        $template = str_replace('%image%', $ad->image, $template);
        $template = str_replace('%alt%', $ad->alt, $template);
        $template = str_replace('%width%', $ad->width, $template);
        $template = str_replace('%height%', $ad->height, $template);

        return $template;
    }
}
