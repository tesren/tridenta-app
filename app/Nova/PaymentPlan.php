<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class PaymentPlan extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\PaymentPlan::class;

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Plan de pagos');
    }

    public static function label()
    {
        return __('Planes de pagos');
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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
            ID::make()->sortable(),

            Text::make('Nombre', 'name')->rules('required', 'max:255'),
            Text::make('Name', 'name_en')->rules('required', 'max:255')->help('Nombre traducido al Inglés')->hideFromIndex(),

            Number::make('Descuento', 'discount')->min(0)->max(100)->sortable()->placeholder('Porcentaje de descuento')->displayUsing(
                function($value){
                    if($value != null){
                        return $value.'%';
                    }else{
                        return $value;
                    }
                }
            ),

            Number::make('Descuento adicional', 'additional_discount')->nullable()->min(0)->max(100)->hideFromIndex()->placeholder('Se descuenta al precio que ya tiene descuento')->displayUsing(
                function($value){
                    if($value != null){
                        return $value.'%';
                    }else{
                        return $value;
                    }
                }
            ),

            Number::make('Enganche', 'down_payment')->min(0)->max(100)->rules('required')->placeholder('Porcentaje de enganche')->sortable()->displayUsing(
                function($value){
                    return $value.'%';
                }
            ),

            Number::make('Pago al inicio de la construcción', 'starting_const')->min(0)->max(100)->placeholder('Porcentaje del pago')->hideFromIndex()->displayUsing(
                function($value){
                    return $value.'%';
                }
            ),

            Number::make('Segundo Pago', 'second_payment')->sortable()->min(0)->max(100)->displayUsing(
                function($value){
                    if($value == null){
                        return $value;
                    }else{
                        return $value.'%';
                    }
                }
            ),

            Number::make('Momento del segundo pago', 'second_payment_months')->min(0)->max(100)->help('Cuantos meses después de la firma del contrato se hace el segundo pago')->hideFromIndex(),

            Boolean::make('Pagos durante la construcción', 'second_payment_const')->hideFromIndex()->help('Si se hacen los pagos después de que se inicia la construcción o después de la firma del contrato'),

            Number::make('Tercer Pago', 'third_payment')->sortable()->min(0)->max(100)->displayUsing(
                function($value){
                    if($value == null){
                        return $value;
                    }else{
                        return $value.'%';
                    }
                }
            ),

            Number::make('Momento del tercer pago', 'third_payment_months')->min(0)->max(100)->help('Cuantos meses después de la firma del contrato se hace el tercer pago')->hideFromIndex(),
            Boolean::make('Pagos durante la construcción', 'third_payment_const')->hideFromIndex()->help('Si se hacen los pagos después de que se inicia la construcción o después de la firma del contrato'),


            Number::make('% Total de los Pagos Mensuales', 'months_percent')->min(0)->max(100)->help('Porcentaje total de los pagos mensuales')->sortable()->displayUsing(
                function($value){
                    if($value == null){
                        return $value;
                    }else{
                        return $value.'%';
                    }
                }
            ),

            Number::make('# Mensualidades', 'monthly_payments')->min(0)->max(200)->sortable()->nullable()->help('Cantidad de pagos mensuales'),

            Boolean::make('Pagos durante la construcción', 'months_during_const')->hideFromIndex()->help('Marcar si los pagos mensuales se hacen durante la construcción'),

            Number::make('Pago final', 'closing_payment')->min(0)->max(100)->placeholder('Porcentaje del Pago final')->rules('required')->sortable()->displayUsing(
                function($value){
                    return $value.'%';
                }
            ),
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
        return [];
    }
}
