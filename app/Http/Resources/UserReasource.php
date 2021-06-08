<?php

namespace App\Http\Resources;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserReasource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'company_id' => $this->company_id,
            'company' => new CompanyResource(Company::find($this->company_id))
        ];
    }

    /**
     * 
     * 
     * @return array
     */
    public static function keyValue()
    {

        $arr = [];
        $all = User::all();

        foreach ($all as $one) {
            $arr[] = [
                'key' => $one->id,
                'value' => $one->firstname.' '.$one->lastname,
            ];
        }

        return $arr;
    }
}
