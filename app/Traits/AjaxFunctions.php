<?php

namespace App\Traits;

use App\Models\Appoientment;
use App\Models\City;
use App\Models\Client;
use App\Models\Company;
use App\Models\Workinghour;

trait AjaxFunctions
{
    /************************
     *     Workinghours     *
     ************************/

    /**
     *Workinghours---Create.blade
     * get cities that selected company supported
     * &&&&&&&&
     * Workinghours---Edit.blade
     * OnChange Company ---> get cities that selected company supported
     */
    public function getSupportedCityAjax($id)
    {
        $cities = Company::findOrFail($id)->cities;
        $data = '<option selected disabled>' . trans('cities.html.choose-city') . '</option>';
        foreach ($cities as $city) {
            $data .= "<option value ='" . $city->id . "'>" . $city->name . "</option>";
        }

        return $data;
    }

    /**
     *Workinghours---Edit.blade --- Full Form With Element Records
     * get all cities that Element's company supporting and select the Element City
     */

    public function getWorkinghourCompanyCitiesAjax($id)
    {
        $workinghour = Workinghour::findOrFail($id);
        $cities = $workinghour->company->cities;
        $data = '<option disabled>' . trans('cities.html.choose-city') . '</option>';
        foreach ($cities as $city) {
            if ($workinghour->city_id == $city->id) {
                $data .= "<option selected value ='" . $city->id . "'>" . $city->name . "</option>";
            } else {
                $data .= "<option value ='" . $city->id . "'>" . $city->name . "</option>";
            }

        }

        return $data;
    }

    /************************
     *     Appoientments    *
     ************************/

    /**
     *Appoientments---Create.blade
     * On Client select get city
     */

    public function getClientCityAjax($id)
    {
        $city = Client::findOrFail($id)->city;
        return response()->json($city);
    }

    /**
     *Appoientments---Create.blade
     * On Client select get companies that supporting client's company
     */

    public function getSupportedCompaniesAjax($id)
    {
        $client = Client::findOrFail($id);
        $companies = $client->city->companies;

        if ($companies->count() > 0) {
            $data = '<option selected disabled>' . trans('companies.html.choose-company') . '</option>';
            foreach ($companies as $company) {
                $data .= "<option value ='" . $company->id . "'>" . $company->name . "</option>";
            }

        } else {
            $data = '<option selected disabled>' . trans('companies.html.no-company') . '</option>';
        }

        return $data;
    }

    /**
     *Appoientments---Create.blade
     * On Company select get Dates that company made for client's city
     */

    public function getAvailableDatesAjax($id, $c_id)
    {
        $dates = Company::findOrFail($id)->availableDatesForCity($c_id);
        $data = "<option selected disabled>" . trans('workinghours.html.choose-date') . "</option>";

        if (count($dates) > 0) {
            foreach ($dates as $date) {
                $data .= "<option value ='" . $date->id . "'>" . $date->date . "</option>";
            }
        } else {
            $data = '<option selected disabled>' . trans('workinghours.html.all-reserved') . '</option>';
        }


        return $data;
    }

    /**
     *Appoientments---Create.blade
     * On Company select get Services that selecting Company support it
     */

    public function getSupportingServicesAjax($id)
    {
        $services = Company::findOrFail($id)->services;

        $data = "";
        foreach ($services as $service) {
            $data .= "<option value ='" . $service->id . "'>" . $service->name . "</option>";
        }

        return $data;
    }

    /**
     *Appoientments---Create.blade
     * On Date select get AvailableTime
     */

    public function getAvailableTimesAjax($id)
    {
        $workinghour = Workinghour::findOrFail($id);
        $times = $workinghour->times()->AvailableTime()->get();
        $data = '<option disabled>' . trans('times.html.choose-time') . '</option>';
        foreach ($times as $time) {
            $data .= "<option  value ='" . $time->id . "'>" . $time->time . "</option>";
        }

        return $data;
    }


    /**
     *Appoientments---Edit.blade
     * Fill Form With Element records
     */


    public function getSupportedCityCompanyAjax($id, $c_id)
    {
        $appoientment = Appoientment::findOrFail($id);
        $companies = City::findOrFail($c_id)->companies;
        if ($companies->count() > 0) {
            $data = '<option selected disabled>' . trans('companies.html.choose-company') . '</option>';
            foreach ($companies as $company) {
                if ($company->id == $appoientment->company_id) {
                    $data .= "<option selected value ='" . $company->id . "'>" . $company->name . "</option>";
                } else {
                    $data .= "<option value ='" . $company->id . "'>" . $company->name . "</option>";
                }
            }

        } else {
            $data = '<option selected disabled>' . trans('companies.html.no-company') . '</option>';
        }
        return $data;
    }

    public function getAvailableCompanyDatesAjax($id, $c_id, $com_id)
    {
        $appoientment = Appoientment::findOrFail($id);
        $dates = Company::findOrFail($com_id)->availableDatesForCity($c_id);
        $data = "<option selected disabled>" . trans('workinghours.html.choose-date') . "</option>";

        if (count($dates) > 0) {
            foreach ($dates as $date) {
                if ($date->id == $appoientment->workinghour_id) {
                    $data .= "<option selected value ='" . $date->id . "'>" . $date->date . "</option>";
                } else {
                    $data .= "<option value ='" . $date->id . "'>" . $date->date . "</option>";
                }
            }
        } else {
            $data = '<option selected disabled>' . trans('workinghours.html.all-reserved') . '</option>';
        }


        return $data;
    }

    public function getDateAvailableTimesAjax($id, $d_id)
    {

        $appoientment = Appoientment::findOrFail($id);
        $times = Workinghour::findOrFail($d_id)->times;
        $data = '<option disabled>' . trans('times.html.choose-time') . '</option>';
        foreach ($times as $time) {
            if ($time->reserved == 1 && $time->id == $appoientment->time_id) {
                $data .= "<option selected value ='" . $time->id . "'>" . $time->time . "</option>";
            } else if ($time->reserved == 0) {
                $data .= "<option  value ='" . $time->id . "'>" . $time->time . "</option>";
            }
        }
        return $data;

    }

    public function getAvailableCompanyServicesAjax($id, $com_id)
    {
        $appointment = Appoientment::findOrFail($id);
        $services = Company::findOrFail($com_id)->services;

        $data = "";
        foreach ($services as $service) {
            foreach ($appointment->services as $app_service) {
                if ($service->id == $app_service->id) {
                    $data .= "<option selected value ='" . $service->id . "'>" . $service->name . "</option>";
                    break;
                } else {
                    $data .= "<option value ='" . $service->id . "'>" . $service->name . "</option>";
                }
            }
        }

        return $data;
    }
}
