<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndentedProposalItem extends Model
{
    //
    protected $table = 'indented_proposal_item';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
