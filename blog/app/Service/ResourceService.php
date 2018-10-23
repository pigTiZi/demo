<?php
namespace App\Service;

use App\Http\models\Resource;

class ResourceService
{
    public function resourceAdd($role_id,$menu_id)
    {
        $resource = new Resource();
        $result = $resource->resourceAdd($role_id,$menu_id);
        return $result;
    }
}