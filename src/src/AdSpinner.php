<?php

use AdSpinner\Model\AdSpinnerModel;
use AdSpinner\Service\AdSpinnerService;
use AdSpinner\Service\AdSpinnerTemplateService;

class AdSpinner {
    /**
     * @var AdSpinnerModel[]
     */
    private array $ads = [];

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

    /**
     * This method returns a 
     * @param int $number_of_ads
     * @param AdSpinnerTemplateService|null $TemplateService
     * @return string
     */
    public function spin($number_of_ads = 1, AdSpinnerTemplateService $TemplateService = null) {

        if ($number_of_ads < 1) {
            throw new InvalidArgumentException('Number of ads must be greater than 0');
        }
        if ($number_of_ads > count($this->ads)) {
            $number_of_ads = count($this->ads);
        }

        $selected_ads = [];
        $ads_copy = $this->ads;

        foreach (range(1, $number_of_ads) as $i) {
            /**
             * get random index
             */
            $random_index = array_rand($ads_copy);
            /**
             * get random ad
             */
            $ad_arr = array_splice($ads_copy, $random_index, 1);
            $ad = $ad_arr[0];
            $selected_ads[] = $ad;
        }

        $rendered_ads = array_map(function ($ad) use ($TemplateService) {
            return AdSpinnerService::renderAdHtml($ad, $TemplateService);
        }, $selected_ads);

        return implode("\n", $rendered_ads);
    }
}


/*
$ad_spinner = new AdSpinner($ads_json);
echo $ad_spinner->spin();
*/