<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndentedProposalItem extends Model
{
    //
    protected $table = 'indented_proposal_item';

    protected $fillable =
        ['quantity', 'price', 'delivery'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'item_id');
    }


}
