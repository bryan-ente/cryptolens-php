<?php
namespace Cryptolens_PHP_Client {
    /**
     * Endpoints
     * 
     * Internal class to return the corresponding API URL for given endpoint
     * 
     * @author Bryan Böhnke-Avan <bryan@openducks.org>
     * @license MIT
     * @since v0.1
     */
    class Endpoints {

        /**
         * `$endpoints` Variable containing all supported endpoints
         * @var array
         */
        public static array $endpoints = [
            # Keys
            "activate" => "https://api.cryptolens.io/api/key/activate",
            "deactivate" => "https://api.cryptolens.io/api/key/deactivate",
            "createKey" => "https://api.cryptolens.io/api/key/createkey",
            "createTrialKey" => "https://api.cryptolens.io/api/key/createtrialkey",
            "createKeyFromTemplate" => "https://api.cryptolens.io/api/key/createkeyfromtemplate",
            "getKey" => "https://api.cryptolens.io/api/key/getkey",
            "addFeature" => "https://api.cryptolens.io/api/key/addfeature",
            "blockKey" => "https://api.cryptolens.io/api/key/blockkey",
            "extendLicense" => "https://api.cryptolens.io/api/key/extendlicense",
            "removeFeature" => "https://api.cryptolens.io/api/key/removefeature",
            "unblockKey" => "https://api.cryptolens.io/api/key/unblockkey",
            "machineLockLimit" => "https://api.cryptolens.io/api/key/machinelocklimit",
            "changeNotes" => "https://api.cryptolens.io/api/key/changenotes",
            "changeReseller" => "https://api.cryptolens.io/api/key/changereseller",
            "changeCustomer" => "https://api.cryptolens.io/api/key/changecustomer",
            "trialActivation" => "https://api.cryptolens.io/api/key/trialactivation",
            # Auth
            "keyLock" => "https://api.cryptolens.io/api/auth/keylock",
            # Products
            "getKeys" => "https://api.cryptolens.io/api/product/getkeys",
            "getProducts" => "https://api.cryptolens.io/api/product/getproducts",
            # PaymentForm
            "createSession" => "https://api.cryptolens.io/api/paymentform/CreateSession",
            # Message
            "createMessage" => "https://api.cryptolens.io/api/message/CreateMessage",
            "removeMessage" => "https://api.cryptolens.io/api/message/RemoveMessage",
            "getMessages" => "https://api.cryptolens.io/api/message/GetMessages",
            # Reseller
            "addReseller" => "https://api.cryptolens.io/api/reseller/AddReseller",
            "editReseller" => "https://api.cryptolens.io/api/reseller/EditReseller",
            "removeReseller" => "https://api.cryptolens.io/api/reseller/RemoveReseller",
            "getResellers" => "https://api.cryptolens.io/api/reseller/GetResellers",
            "getResellerCustomers" => "https://api.cryptolens.io/api/reseller/GetResellerCustomers",
            # Subscription
            "recordUsage" => "https://api.cryptolens.io/api/subscription/RecordUsage",
            # Customer
            "addCustomer" => "https://api.cryptolens.io/api/customer/AddCustomer",
            "editCustomer" => "https://api.cryptolens.io/api/customer/EditCustomer",
            "removeCustomer" => "https://api.cryptolens.io/api/customer/RemoveCustomer",
            "getCustomerLicenses" => "https://api.cryptolens.io/api/customer/GetCustomerLicenses",
            "getCustomerLicensesBySecret" => "https://api.cryptolens.io/api/customer/GetCustomerLicensesBySecret",
            "getCustomers" => "https://api.cryptolens.io/api/customer/GetCustomers",
            # Analytics
            "registerEvent" => "https://api.cryptolens.io/api/ai/RegisterEvent",
            "registerEvents" => "https://api.cryptolens.io/api/ai/RegisterEvents",
            "getEvents" => "https://api.cryptolens.io/api/ai/GetEvents",
            "getObjectLog" => "https://api.cryptolens.io/api/ai/GetObjectLog",
            "getWebAPILog" => "https://api.cryptolens.io/api/ai/GetWebAPILog",
            # Data
            "addDataObject" => "https://api.cryptolens.io/api/data/AddDataObject",
            "listDataObjects" => "https://api.cryptolens.io/api/data/ListDataObjects",
            "incrementIntValue" => "https://api.cryptolens.io/api/data/IncrementIntValue",
            "decrementIntValue" => "https://api.cryptolens.io/api/data/decrementIntValue",
            "setStringValue" => "https://api.cryptolens.io/api/data/SetStringValue",
            "setIntValue" => "https://api.cryptolens.io/api/data/SetIntValue",
            "removeDataObject" => "https://api.cryptolens.io/api/data/RemoveDataObject",
            "uploadValues" => "https://api.cryptolens.io/api/data/UploadValuesToKey",
            # User
            "login" => "https://api.cryptolens.io/api/userauth/Login",
            "register" => "https://api.cryptolens.io/api/userauth/Register",
            "associate" => "https://api.cryptolens.io/api/userauth/Associate",
            "dissociate" => "https://api.cryptolens.io/api/userauth/Dissociate",
            "getUsers" => "https://api.cryptolens.io/api/userauth/GetUsers",
            "changePassword" => "https://api.cryptolens.io/api/userauth/ChangePassword",
            "resetPasswordToken" => "https://api.cryptolens.io/api/userauth/ResetPasswordToken",
            "removeUser" => "https://api.cryptolens.io/api/userauth/RemoveUser",
            # License Template
            "getLicenseTemplates" => "https://api.cryptolens.io/api/licensetemplate/getlicensetemplates"
        ];

        /**
         * `$no_response_check` Variable containing endpoint names which should be excluded from being checked by `Helper::check_response`,
         * as these endpoints return lists or generally differ from the values at `Results::$results`
         * @var array
         */
        public static array $no_response_check = [
            "createKey",
            "getKeys",
            "getProducts",
            "getMessages",
            "getResellers",
            "getResellerCustomers",
            "getCustomerLicenses",
            "getCustomerLicensesBySecret",
            "getUsers",
            "getCustomers",
            "getEvents",
            "getWebAPILog",
            "getObjectsLog",
            "listDataObjects"
        ];

        /**
         * `getEndpoint()` Returns the API URL for given endpoint name
         * @param mixed $function_name Name of the endpoint
         * @return null|string Either the API URL or null if not found
         */
        public static function get_endpoint($function_name){
            if(array_search($function_name, array_flip(self::$endpoints))){
                return self::$endpoints[$function_name];
            }
        }
    }
}
