<?php

namespace App\Models;

use App\Enums\DataBaseEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'description',
        'is_approved',
        'is_active',
        'sponsor',
        'type',
        'image',
        'price',
        'wait_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['from', 'to'];

    protected $with = ['reservationTimes'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_users', 'doctor_id', 'category_id');
    }

    public function reservations()
    {
        return $this->belongsToMany(ReservationTime::class, 'reservations', 'user_id', 'reservation_time_id')
            ->withPivot('is_approved', 'doctor_id', 'price');
    }

    public function doctorReservations()
    {
        return $this->hasMany(Reservation::class, 'doctor_id', 'id');
    }

    public function reservationTimes()
    {
        return $this->hasMany(ReservationTime::class, 'doctor_id', 'id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function scopeDoctor($query)
    {
        return $query->where('type', DataBaseEnum::DOCTOR);
    }

    public function scopePatient($query)
    {
        return $query->where('type', DataBaseEnum::PATIENT);
    }

    public function scopeShadowTeacher($query)
    {
        return $query->where('type', DataBaseEnum::SHADOW_TEACHER);
    }

    public function scopeIsApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function testScores()
    {
        return $this->hasMany(TestScore::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'doctor_id', 'id');
    }
}
