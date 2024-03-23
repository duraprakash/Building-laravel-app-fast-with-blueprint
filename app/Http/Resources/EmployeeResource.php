<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'identifiacation' => $this->identifiacation,
            'birth' => $this->birth,
            'salary' => $this->salary,
            'marital_status' => $this->marital_status,
            'bonus' => $this->bonus,
            'order' => $this->order,
            'department_id' => $this->department_id,
            'projects' => ProjectCollection::make($this->whenLoaded('projects')),
            'contactInfo' => ContactInfoResource::make($this->whenLoaded('contactInfo')),
        ];
    }
}
