<?php

namespace App;

use App\ModelConcerns\HasFullName;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFullName;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [ 'full_name' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'username', 'password', 'birthdate', 'district_id', 'school_id', 'iep_id', 'ethnicity_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        // 'birthdate',
        'created_at',
        'updated_at'
    ];

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function iep()
    {
        return $this->belongsTo('App\Iep');
    }
    
    public function ethnicity()
    {
        return $this->belongsTo('App\Ethnicity');
    }

    public function school()
    {
        return $this->belongsTo('App\School');
    }
    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function mentor()
    {
        return $this->belongsTo('App\User', 'mentor_id');
    }

    public function monitoring_location_assignments()
    {
        return $this->hasMany('App\MonitoringLocationAssignment');
    }

    // Passport looks for an `email` field by default. We specify a handler for `username`
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
}
