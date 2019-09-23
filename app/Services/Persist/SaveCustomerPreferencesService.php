<?php

namespace App\Services\Persist;

use App\Models\CustomerPreferences;
use App\Models\Enums\CustomerPreferencesEnum;
use App\Repositories\CustomerPreferenceRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\Superclass\SaveRepository;

/**
 * Class SaveCustomerPreferencesService
 *
 * @package App\Services\Persist
 */
class SaveCustomerPreferencesService
{
    /**
     * SaveCustomerPreferencesService constructor.
     *
     * @param CustomerRepository           $repository
     * @param CustomerPreferenceRepository $preferences
     * @param SaveRepository               $save
     */
    public function __construct(CustomerRepository $repository,
                                CustomerPreferenceRepository $preferences,
                                SaveRepository $save)
    {
        $customers = $repository->findAll();

        $typePreferences = CustomerPreferencesEnum::getDefaultValues();
        //$preferenceList  = $preferences->findAll();
        $customerPreferences = new CustomerPreferences();
        $save->setEntity($customerPreferences);
//        "customer_id",
//        "customer_preference_description",
//        "customer_preference_set",
//        "customer_preference_status"
        $data = [
            "customer_preference_description" =>"",
            "customer_preference_set"=>"",
            "customer_id"=>""

        ];
        foreach ($customers as $customer)
        {
            foreach ($typePreferences as $key=>$item) {
                $data["customer_preference_description"] = $key;
                $data["customer_preference_set"] = $item;
                $data["customer_id"] = $customer->id;
                $save->create($data);
            }
        }
    }
}
