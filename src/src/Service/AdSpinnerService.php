<?php

namespace AdSpinner\Service;

use AdSpinner\Model\AdSpinnerModel;

class AdSpinnerService {

    public static function renderAdHtml(AdSpinnerModel $ad, AdSpinnerTemplateService $templateService = null) {
        if ($templateService === null) {
            return AdSpinnerTemplateService::renderDefaultAdHtml($ad);
        }
        return $templateService->renderAdHtml($ad);
    }
}
