<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetRegistrationLink extends Model
{
	// protected $table = 'asset_registration_link_locations';
    protected $fillable = ['caption', 'description', 'type_id', 'token', 'expiry', 'added_by_id'];

    public function type()
    {           
        return $this->belongsTo('App\AssetRegistrationLinkType');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location', 'asset_reg_link_locations');
    }
}
