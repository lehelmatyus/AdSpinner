<?php

use AdSpinner\Model\AdSpinnerModel;
use AdSpinner\Service\AdSpinnerService;

class AdSpinner {
    private $ads = [];

    public function __construct(string $ads_json) {
        $ads_data = json_decode($ads_json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('Invalid JSON data provided');
        }

        foreach ($ads_data['ads'] as $ad_data) {
            $this->ads[] = new AdSpinnerModel($ad_data);

            if (!$this->ads[count($this->ads) - 1] instanceof AdSpinnerModel) {
                throw new RuntimeException('Failed to create AdSpinnerModel instance');
            }
        }
    }

    public function spin() {
        $random_index = array_rand($this->ads);
        $ad = $this->ads[$random_index];
        return AdSpinnerService::renderAdHtml($ad);
    }
}


/*
$ad_spinner = new AdSpinner($ads_json);
echo $ad_spinner->spin();
*/