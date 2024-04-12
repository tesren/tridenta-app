<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Unit extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The paymentPlans that belong to the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paymentPlans()
    {
        return $this->belongsToMany(PaymentPlan::class, 'payment_plan_unit', 'unit_id', 'payment_plan_id');
    }

    /**
     * Get the unitType that owns the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitType()
    {
        return $this->belongsTo(UnitType::class, 'unit_type_id');
    }

    /**
     * Get the shape associated with the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shape()
    {
        return $this->hasOne(Shape::class);
    }

    /**
     * Get the tower that owns the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }

    /**
     * Get the section that owns the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    /**
     * The savedUnits that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'unit_user');
    }

}