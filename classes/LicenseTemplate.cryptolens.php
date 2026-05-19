<?php
namespace Cryptolens_PHP_Client {
    /**
     * License Template
     * 
     * Allows the use of all LicenseTemplate endpoints
     * 
     * @author Bryan Böhnke-Avan <bryan@openducks.org
     * @license MIT
     * @since v1.0
     * @link https://app.cryptolens.io/docs/api/v3/GetLicenseTemplates
     */
    class LicenseTemplate {
        
        private Cryptolens $cryptolens;

        private string $group;

        public function __construct(Cryptolens $cryptolens){
            $this->cryptolens = $cryptolens;
            $this->group = CRYPTOLENS::CRYPTOLENS_LICENSETEMPLATES;
        }

        public function get_license_templates(){
            $params = Helper::build_params($this->cryptolens->getToken(), $this->cryptolens->getProductId());
            $c = Helper::connection($params, "getLicenseTemplates", $this->group);
            if($c == true && Helper::check_rm($c)){
                return Cryptolens::outputHelper($c);
            } else {
                return Cryptolens::outputHelper($c, 1);
            }
        }
    }
}