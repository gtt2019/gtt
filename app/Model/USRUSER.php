<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class USRUSER extends Model
{
    protected $fillable = [
        'companyid',
        'active'
    ,'lastupdated'
    ,'usrid'
    ,'typeid'
    ,'roleid'
    ,'firstname'
    ,'lastname'
    ,'gender'
    ,'dob'
    ,'email'
    ,'mobile'
    ,'usrpassword'
    ,'deviceid'
    ,'notificationid'
    ,'otp'];    
}
