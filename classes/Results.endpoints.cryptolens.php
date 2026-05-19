<?php
namespace Cryptolens_PHP_Client {
    /**
     * Results
     * 
     * Internal class to return the allowed keys for an endpoint
     * 
     * @author Bryan Böhnke-Avan <bryan@openducks.org>
     * @license MIT
     * @since v0.1
     */
    class Results extends Endpoints {
        /**
         * `$results` An array containing each returned key for given endpoint group and name
         * @var array
         */
        public static array $results = [
            "Key" => [
                "activate" => [
                    "LicenseKey",
                    "Signature",
                    "Result",
                    "Message"
                ],
                "deactivate" => [
                    "Result",
                    "Message"
                ],
                "createKey" => [
                    "Key",
                    "CustomerId",
                    "Result",
                    "Message"
                ],
                "createTrialKey" => [
                    "Key",
                    "Result",
                    "Message"
                ],
                "createKeyFromTemplate" => [
                    "Result",
                    "Key",
                    "RawResponse",
                    "Message"
                ],
                "getKey" => [
                    "LicenseKey",
                    "Signature",
                    "Metadata",
                    "Result",
                    "Message"
                ],
                "addFeature" => [
                    "Result",
                    "Message"
                ],
                "blockKey" => [
                    "Result",
                    "Message"
                ],
                "extendLicense" => [
                    "Result",
                    "Message"
                ],
                "removeFeature" => [
                    "Result",
                    "Message"
                ],
                "unblockKey" => [
                    "Result",
                    "Message"
                ],
                "machineLockLimit" => [
                    "Result",
                    "Message"
                ],
                "changeNotes" => [
                    "Result",
                    "Message"
                ],
                "changeReseller" => [
                    "Result",
                    "Message"
                ],
                "changeCustomer" => [
                    "Result",
                    "Message"
                ],
                "trialActivation" => [
                    "Result",
                    "Message",
                ],

            ],
            "Auth" => [
                "keyLock" => [
                    "Keyid",
                    "Token",
                    "Result",
                    "Message"
                ]
                ],
            "Product" => [
                "getKeys" => [
                    "LicenseKeys",
                    "Returned",
                    "Total",
                    "PageCount",
                    "Result",
                    "Message"
                ],
                "getProducts" => [
                    "Products",
                    "Result",
                    "Message"
                ]
            ],
            "PaymentForm" => [
                "createSession" => [
                    "SessionId",
                    "Result",
                    "Message"
                ]
            ],
            "Message" => [
                "createMessage" => [
                    "MessageId",
                    "Result",
                    "Message"
                ],
                "removeMessage" => [
                    "Result",
                    "Message"
                ],
                "getMessages" => [
                    "Messages",
                    "Result",
                    "Message"
                ]
            ],
            "Reseller" => [
                "addReseller" => [
                    "ResellerId",
                    "Result",
                    "Message"
                ],
                "editReseller" => [
                    "Result",
                    "Message"
                ],
                "removeReseller" => [
                    "Result",
                    "Message"
                ],
                "getResellers" => [
                    "Resellers",
                    "Result",
                    "Message"
                ],
                "getResellerCustomers" => [
                    "Customers",
                    "Result",
                    "Message"
                ]
            ],
            "Subscription" => [
                "recordUsage" => [
                    "Result",
                    "Message"
                ]
            ],
            "Customer" => [
                "addCustomer" => [
                    "CustomerId",
                    "PortalLink",
                    "Secret",
                    "Result",
                    "Message"
                ],
                "editCustomer" => [
                    "CustomerId",
                    "Result",
                    "Message"
                ],
                "removeCustomer" => [
                    "Result",
                    "Message"
                ],
                "getCustomerLicenses" => [
                    "LicenseKeys",
                    "Metadata",
                    "Result",
                    "Message"
                ],
                "getCustomerLicensesBySecret" => [
                    "LicenseKeys",
                    "Metadata",
                    "Result",
                    "Message"
                    ]
                ],
                "Data" => [
                    "addDataObject" => [
                        "Result",
                        "Message",
                        "Id"
                    ],
                    "incrementIntValue" => [
                        "Result",
                        "Message"
                    ],
                    "decrementIntValue" => [
                        "Result",
                        "Message"
                    ],
                    "setStringValue" => [
                        "Result",
                        "Message"
                    ],
                    "setIntValue" => [
                        "Result",
                        "Message"
                    ],
                    "removeDataObject" => [
                        "Result",
                        "Message"
                    ],
                    "uploadValues" => [
                        "Result",
                        "Message"
                    ]
                ],
                "User" =>  [
                    "login" => [
                        "Result",
                        "Message"
                    ],
                    "register" => [
                        "Result",
                        "Message"
                    ],
                    "associate" => [
                        "Result",
                        "Message"
                    ],
                    "dissociate" => [
                        "Result",
                        "Message"
                    ],
                    "getUsers" => [
                        "Users",
                        "Result",
                        "Message"
                    ],
                    "changePassword" => [
                        "Result",
                        "Message"
                    ],
                    "removeUser" => [
                        "Result",
                        "Message"
                    ]
                ],
                "LicenseTemplate" => [
                    "getLicenseTemplates" => [
                        "LicenseTemplates",
                        "Result",
                        "Message"
                    ]
                ]

        ];

        /**
         * `get_results` Returns the `Results::$results` array
         * @return array
         */
        public static function get_results(){
            return self::$results;
        }
    }
}
