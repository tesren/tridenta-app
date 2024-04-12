<?php

namespace App\Nova;

use App\Nova\View;
use App\Nova\Shape;
use Laravel\Nova\Panel;
use App\Nova\PaymentPlan;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\FormData;
use App\Nova\Actions\ChangeStatus;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Actions\ChangeUnitView;
use Laravel\Nova\Fields\BelongsToMany;
use App\Nova\Actions\AssignPaymentPlan;
use Laravel\Nova\Http\Requests\NovaRequest;

class Unit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Unit::class;

    public function title(){
        return $this->name;
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Unidad');
    }

    public static function label()
    {
        return __('Unidades');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hideFromDetail()->hideFromIndex(),

            Text::make('Unidad', 'name')->rules('required', 'max:50', 'regex:/^[A-Za-z0-9\s]+$/')->sortable()->placeholder('Nombre o número de la unidad')->showOnPreview(),

            BelongsTo::make('Tipo de Unidad', 'unitType', UnitType::class)->withoutTrashed()->rules('required')->filterable()->showOnPreview(),

            BelongsTo::make('Torre', 'tower', Tower::class)->withoutTrashed()->rules('required')->filterable(),

            BelongsTo::make('Sección', 'section', Section::class)->withoutTrashed()->nullable()->filterable(),

            Number::make('Piso', 'floor')->rules('required')->min(0)->max(35)->sortable(),

            Number::make('Precio', 'price')->rules('required')->min(0)->step(0.01)->sortable()->showOnPreview()
            ->displayUsing(
                function($value){
                    return '$'.number_format($value,2).' '.$this->currency;
                }
            ),

            Select::make('Moneda', 'currency')->options([
                'USD' => 'USD',
                'MXN' => 'MXN',
            ])->rules('required')->default('MXN')->onlyOnForms(),

            Select::make('Estatus', 'status')->options([
                'Disponible' => 'Disponible',
                'Apartada' => 'Apartada',
                'Vendida' => 'Vendida',
            ])->rules('required')->default('Disponible')->onlyOnForms()->filterable(),

            Badge::make('Estatus', 'status')->map([
                'Vendida' => 'danger',
                'Disponible' => 'success',
                'Apartada' => 'warning',
            ])->sortable()->showOnPreview(),

            Tag::make('Planes de pago', 'paymentPlans', PaymentPlan::class)->hideFromIndex(),

            HasMany::make('Clientes que Guardaron esta Unidad', 'users', User::class),

            HasOne::make('Polígono', 'shape', Shape::class),
     ];
    }

    


    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            new AssignPaymentPlan,
            new ChangeStatus,
        ];
    }
}
