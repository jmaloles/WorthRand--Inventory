<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AfterMarket extends Model
{
    //

    public static function postAfterMarket($createAfterMarketRequest)
    {
        $after_market = new AfterMarket();
        $after_market->project_id = $createAfterMarketRequest->get('project_id');
        $after_market->name = $createAfterMarketRequest->get('name');
        $after_market->model = $createAfterMarketRequest->get('model');
        $after_market->part_number = $createAfterMarketRequest->get('part_number');
        $after_market->reference_number = $createAfterMarketRequest->get('reference_number');
        $after_market->material_number = $createAfterMarketRequest->get('material_number');
        $after_market->serial_number = $createAfterMarketRequest->get('serial_number');
        $after_market->tag_number = $createAfterMarketRequest->get('tag_number');
        $after_market->drawing_number = $createAfterMarketRequest->get('drawing_number');
        $after_market->ccn_number = $createAfterMarketRequest->get('ccn_number');

        if($after_market->save()) {
            return redirect()->back()->with('message', 'After Market [' . $after_market->name . '] was successfully saved');
        }
    }
}
