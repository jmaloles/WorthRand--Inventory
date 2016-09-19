<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AfterMarket extends Model
{
    //

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function postAfterMarket($createAfterMarketRequest)
    {
        $after_market = new AfterMarket();
        $after_market->project_id = $createAfterMarketRequest->get('project_id');
        $after_market->name = ucwords($createAfterMarketRequest->get('name'), " ");
        $after_market->model = strtoupper($createAfterMarketRequest->get('model'));
        $after_market->part_number = strtoupper($createAfterMarketRequest->get('part_number'));
        $after_market->reference_number = strtoupper($createAfterMarketRequest->get('reference_number'));
        $after_market->material_number = strtoupper($createAfterMarketRequest->get('material_number'));
        $after_market->serial_number = strtoupper($createAfterMarketRequest->get('serial_number'));
        $after_market->tag_number = strtoupper($createAfterMarketRequest->get('tag_number'));
        $after_market->drawing_number = strtoupper($createAfterMarketRequest->get('drawing_number'));
        $after_market->ccn_number = strtoupper($createAfterMarketRequest->get('ccn_number'));

        if($after_market->save()) {
            return redirect()->back()->with('message', 'AfterMarket [' . $after_market->name . '] was successfully saved');
        }
    }
    
}
