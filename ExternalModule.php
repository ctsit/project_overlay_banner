<?php

namespace POB\ExternalModule;

use ExternalModules\AbstractExternalModule;
use REDCap;

class ExternalModule extends AbstractExternalModule {

    function redcap_every_page_top($project_id) {
        $url = $_SERVER['REQUEST_URI'];
        // TODO: add additional text in EM config if admin override is on

        $this->displayBanner();
    }


    function displayBanner() {
        $this->includeJs('js/banner_inject.js');
        $this->includeCss('css/banner.css');

        $banner_text = json_encode(
                $this->fallbackParam('banner_text', 
                    "<p style='text-align: center;'><strong>You are in a test project. Be sure not to enter production data here.</strong></p>")
                );

        $banner_css = $this->fallbackParam('banner_css');

        echo "<style> #project-overlay-banner { " . $banner_css . " } </style>";
        echo "<script type='text/javascript'>var project_overlay_banner_text = $banner_text;</script>";
    }

    protected function fallbackParam($param_name, $param_default = "") {
    // Follow expected order of replacement in the event of a blank field
    // project -> admin -> default
        if ( $this->getSystemSetting("allow_project_" . $param_name) ) {
            $param = ($this->getProjectSetting("project_" . $param_name)) ?: $this->getSystemSetting("global_" . $param_name);
        } else {
            $param = $this->getSystemSetting("global_" . $param_name);
        }

        return ($param) ?: $param_default;
    }

    protected function includeCss($path) {
        echo '<link rel="stylesheet" href="' . $this->getUrl($path) . '">';
    }


    protected function includeJs($path) {
        echo '<script src="' . $this->getUrl($path) . '"></script>';
    }


}
