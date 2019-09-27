<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetRegistrationLink extends Model
{
	// protected $table = 'asset_registration_link_locations';
    protected $fillable = ['caption', 'description', 'type_id', 'token', 'expiry', 'added_by_id'];


    public function getLinkAttribute()
    {
        if($this->type_id == 1)
            return route('assets.register_via_closed_link', ['token' => $this->token]);
        return route('assets.register_via_closed_link', ['token' => $this->token]);
    }

    public function type()
    {           
        return $this->belongsTo('App\AssetRegistrationLinkType');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location', 'asset_reg_link_locations');
    }
}
