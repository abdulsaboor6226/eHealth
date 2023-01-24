<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles,SoftDeletes,Notifiable;

    //TODO put correct status Ids
    protected $statusId = [1,2,3];
    /**
     * The attributes that are mass assignable.
     *
     * @var array+
     */
    protected $fillable = [
        'name', 'email','phone','password','status_id','meta','uuid','profile_image_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_by','updated_by','deleted_by','created_at','updated_at','deleted_at' , 'password', 'remember_token','email_verified_at'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'meta' => 'json'
    ];

    protected static function boot()
    {
        parent::boot();
        if (auth()->check()) {
            // updating created_by and updated_by when model is created
            static::creating(function ($model) {
                if (!$model->isDirty('created_by')) {
                    $model->created_by = auth()->user()->id;
                }
                if (!$model->isDirty('updated_by')) {
                    $model->updated_by = auth()->user()->id;
                }
            });

            // updating updated_by when model is updated
            static::updating(function ($model) {
                if (!$model->isDirty('updated_by')) {
                    $model->updated_by = auth()->user()->id;
                }
            });

            // deleting deleting_by when model is updated
            static::deleted(function ($model) {
                if (!$model->isDirty('deleted_by')) {
                    $model->deleted_by = auth()->user()->id;
                    $model->save();
                }
            });
        }
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getProfileImageUrlAttribute($value){
        return url(Storage::url($value));
    }

    public function scopeActive($query){
        return $query->where('status_id',$this->statusId[0]);
    }

    public function scopePending($query){
        return $query->where('status_id',$this->statusId[1]);
    }

    public function scopeBlock($query){
        return $query->where('status_id',$this->statusId[2]);
    }
    public function status(){
        return $this->belongsTo(Dictionary::class,'status_id')->withDefault(dictionaryDefault());
    }
}
