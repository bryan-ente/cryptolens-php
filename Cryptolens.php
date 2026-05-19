<?php
/**
 * Cryptolens_PHP_Client
 * 
 * Namespace for all classes implementing API endpoints
 */
namespace Cryptolens_PHP_Client {
    use Cryptolens_PHP_Client\Analytics;
    use Cryptolens_PHP_Client\Auth;
    use Cryptolens_PHP_Client\Customer;
    use Cryptolens_PHP_Client\Data;
    use Cryptolens_PHP_Client\Endpoints;
    use Cryptolens_PHP_Client\Key;
    use Cryptolens_PHP_Client\License;
    use Cryptolens_PHP_Client\LicenseTemplate;
    use Cryptolens_PHP_Client\Message;
    use Cryptolens_PHP_Client\PaymentForm;
    use Cryptolens_PHP_Client\Reseller;
    use Cryptolens_PHP_Client\Results;
    use Cryptolens_PHP_Client\Subscription;
    use Cryptolens_PHP_Client\User;
    /**
     * Cryptolens main class
     * This is the cryptolens main class containing an auto loader. It is also holding the sensitive login information needed for the API.
     * You can define the output to either JSON or Arrays (PHP)
     * 
     * @author Bryan Böhnke-Avan <bryan@openducks.org>
     * @license MIT
     * @since v0.1
     * @link https://app.cryptolens.io/docs/api/v3
     */
    class Cryptolens {


        public const CRYPTOLENS_OUTPUT_PHP = 1;

        public const CRYPTOLENS_OUTPUT_JSON = 2;

        public const CRYPTOLENS_KEY = "Key";

        public const CRYPTOLENS_AUTH = "Auth";

        public const CRYPTOLENS_PRODUCT = "Product";

        public const CRYPTOLENS_PAYMENTFORM = "PaymentForm";

        public const CRYPTOLENS_MESSAGE = "Message";

        public const CRYPTOLENS_RESELLER = "Reseller";

        public const CRYPTOLENS_SUBSCRIPTION = "Subscription";

        public const CRYPTOLENS_CUSTOMER = "Customer";

        public const CRYPTOLENS_ANALYTICS = "Analytics";

        public const CRYPTOLENS_LICENSE = "License";

        public const CRYPTOLENS_DATA = "Data";

        public const CRYPTOLENS_USER = "User";

        public const CRYPTOLENS_LICENSETEMPLATES = "LicenseTemplate";

        private string $token;

        private int $productId;

        public static int $output;

        private $analytics;
        private $auth;
        private $customer;
        private $data;
        private $endpoints;
        private $key;
        private $license;
        private $message;
        private $paymentForm;
        private $product;
        private $reseller;
        private $subscription;
        private $user;      
        private $licenseTemplate;

    
        /**
         * `setToken()` - Setter for API token
         * @param string $token The API token to set
         * @return void
         */
        private function setToken(string $token): void{
            $this->token = $token;
        }
        private function setProductId($product_id){
            $this->productId = $product_id;
        }

        /**
         * If $output equals CRYPTOLENS_OUTPUT_PHP you recieve arrays, if it's on CRYPTOLENS_OUTPUT_JSON you recieve json
         */
        public function __construct($token, $productid, $output = self::CRYPTOLENS_OUTPUT_PHP){
            self::$output = $output;
            $this->setToken($token);
            $this->setProductId($productid);
        }


        /**
         * `getToken()` - Getter for API token
         * @return string Returns the API Authentication token
         */
        public function getToken(){
            return $this->token;
        }

      /**
       * `getProductId()` - Getter for product ID
       * @return int Returns the product ID
       */
      public function getProductId(){
            return $this->productId;
        }

        /**
         * `setOutput()` - Setter for output mode, either `Cryptolens::CRYPTOLENS_OUTPUT_PHP` (1) or `Cryptolens::CRYPTOLENS_OUTPUT_JSON` (2)
         * @param mixed $output
         * @return void
         */
        public function setOutput($output){
            $this->output = $output;
        }

        /**
         * `loader()` - Loads all required sub classes
         * @return void `require_once`s the API classes
         */
        public static function loader(){
            require_once dirname(__FILE__) . "/classes/Helper.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Errors.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Key.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Endpoints.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Results.endpoints.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Auth.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Product.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/PaymentForm.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Data.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Message.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Reseller.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Subscription.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Customer.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/Analytics.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/User.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/License.cryptolens.php";
            require_once dirname(__FILE__) . "/classes/LicenseTemplate.cryptolens.php";

        }

        /**
         * `outputHelper` - Returns the corresponding data type, either JSON or an PHP array
         * @param mixed $data The data returned checked by `Helper::connection(...)`
         * @param int $error
         * @return array|bool|string
         */
        public static function outputHelper($data, int $error = 0){
            if(self::$output == self::CRYPTOLENS_OUTPUT_PHP){
                if($error == 1){
                    return [
                        "error" => "An error occurred!",
                        "message" => $data["message"]
                    ];
                    
                }
                return (array) $data;
            } elseif(self::$output == self::CRYPTOLENS_OUTPUT_JSON){
                if($error == 1){
                    return [
                        "error" => "An error occurred!",
                        "message" => $data["message"]
                    ];
                }
                return json_encode($data);
            }
            return (array) $data;
        }

        public function analytics(): Analytics {
            if(!$this->analytics) $this->analytics = new Analytics($this);
            return $this->analytics;
        }

        public function auth(): Auth {
            if(!$this->auth) $this->auth = new Auth($this);
            return $this->auth;
        }

        public function customer(): Customer {
            if(!$this->customer || $this->customer === null) $this->customer = new Customer($this);
            return $this->customer;
        }

        public function data(): Data{
            if(!$this->data) $this->data = new Data($this);
            return $this->data;
        }

        public function endpoints(): Endpoints {
            if(!$this->endpoints) $this->endpoints = new Endpoints;
            return $this->endpoints;
        }

        public function key(): Key {
            if(!$this->key) $this->key = new Key($this);
            return $this->key;
        }

        public function license(bool $publicKeyIsXMLFormat = false, ?string $publicKeyFile = null): License {
            if(!$this->license) $this->license = new License($publicKeyIsXMLFormat, $publicKeyFile);
            return $this->license;
        }

        public function message(?string $channel = null): Message {
            if(!$this->message) $this->message = new Message($this, $channel);
            return $this->message;
        }

        public function paymentForm(): PaymentForm {
            if(!$this->paymentForm) $this->paymentForm = new PaymentForm($this);
            return $this->paymentForm;
        }

        public function product(): Product {
            if(!$this->product) $this->product = new Product($this);
            return $this->product;
        }

        public function reseller(): Reseller {
            if(!$this->reseller) $this->reseller = new Reseller($this);
            return $this->reseller;
        }

        public function subscription(): Subscription {
            if(!$this->subscription) $this->subscription = new Subscription($this);
            return $this->subscription;
        }

        public function user(): User {
            if(!$this->user) $this->user = new User($this);
            return $this->user;
        }

        public function licenseTemplate(): LicenseTemplate {
            if(!$this->licenseTemplate) $this->licenseTemplate = new LicenseTemplate($this);
            return $this->licenseTemplate;
        }

    }
}
