<?php

namespace App\Http\Resources;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'logo_url' => $this->logo_url?Storage::url($this->logo_url):null,
            'website' => $this->website,
            'updated_at' => $this->updated_at->format('d.m.Y H:i:s'),
            'usersCount' => User::where('company_id', $this->id)->count()
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
        $all = Company::all();

        foreach ($all as $one) {
            $arr[] = [
                'key' => $one->id,
                'value' => $one->name,
            ];
        }

        return $arr;
    }
}
