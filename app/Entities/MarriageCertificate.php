<?php

namespace App\Entities;

use App\Util\TransactionLogModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MarriageCertificate.
 *
 * @package namespace App\Entities;
 */
class MarriageCertificate extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes, TransactionLogModelTrait;

    protected $fillable = ['no','date','branch_id','branch_non_local','groom','bride','who_blessed', 'who_signed', 'location'];

    protected $appends = ['can_print', 'can_update', 'can_delete'];
    
    public function grooms(){
        return $this->belongsTo('App\Entities\User','groom');
    }
    
    public function brides(){
        return $this->belongsTo('App\Entities\User','bride');
    }
    
    public function branch(){
        return $this->belongsTo('App\Entities\Branch','branch_id');
    }
    public function getCanPrintAttribute() {
        return $this->defaultCanPrintAttribute() && $this->no !== '000000';
    }
    public function getCanUpdateAttribute() {
        return $this->defaultCanUpdateAttribute();
    }
    public function getCanDeleteAttribute() {
        return $this->defaultCanDeleteAttribute() && $this->no !== '000000';
    }


}
