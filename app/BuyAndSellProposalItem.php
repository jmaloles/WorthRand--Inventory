<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyAndSellProposalItem extends Model
{
    protected $table = 'buy_and_sell_proposal_item';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
