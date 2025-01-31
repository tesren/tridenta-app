<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\FormData;

class UnitType extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\UnitType>
     */
    public static $model = \App\Models\UnitType::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title(){
        return $this->name.' - '.$this->const_total.' m2';
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
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Tipo de Unidad');
    }

    public static function label()
    {
        return __('Tipos de Unidades');
    }

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

            Text::make('Nombre', 'name')->rules('required', 'max:50')->sortable(),

            Number::make('Recámaras', 'bedrooms')->rules('required')->min(0)->max(15)->help('Dejar en 0 si es Loft o Studio')->sortable(),
            Number::make('Cuartos Flex', 'flexrooms')->rules('nullable')->min(0)->max(15)->sortable(),
            Number::make('Baños', 'bathrooms')->rules('required')->min(0)->max(15)->step(0.5)->sortable(),

            Panel::make('Medidas', $this->sizesFields()),

            Panel::make('Imágenes', $this->imageFields()),
        ];
    }

    /**
     * Get the sizes fields for the resource.
     *
     * @return array
     */
    protected function sizesFields()
    {
        return [
            Number::make('Interior', 'interior_const')->hideFromIndex()->placeholder('Metros cuadrados del interior')->min(0)->max(99999)->rules('required')->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Terraza', 'exterior_const')->hideFromIndex()->placeholder('Metros cuadrados de la terraza')->min(0)->max(99999)->rules('required')->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Descubierto', 'extra_exterior_const')->hideFromIndex()->placeholder('Metros cuadrados de la terraza descubierta')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Estacionamiento', 'parking_area')->hideFromIndex()->placeholder('Metros cuadrados del estacionamiento')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),
            Number::make('Bodega', 'storage_area')->hideFromIndex()->placeholder('Metros cuadrados del área de bodega')->min(0)->max(99999)->nullable()->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            ),

            Number::make('Const. Total', 'const_total')->sortable()->placeholder('Metros cuadrados totales')->min(0)->max(99999)->rules('required')->step(0.01)
            ->displayUsing(
                function($value){
                    return $value.' m²';
                }
            )->dependsOn(
                ['interior_const', 'exterior_const', 'parking_area', 'storage_area', 'extra_exterior_const'],
                function (Number $field, NovaRequest $request, FormData $formData) {
                    $total_meters = 0;

                    if ($formData->interior_const != null) {
                        $total_meters = $total_meters + $formData->interior_const;
                    }

                    if ($formData->exterior_const != null) {
                        $total_meters = $total_meters + $formData->exterior_const;
                    }

                    if ($formData->extra_exterior_const != null) {
                        $total_meters = $total_meters + $formData->extra_exterior_const;
                    }

                    if ($formData->parking_area != null) {
                        $total_meters = $total_meters + $formData->parking_area;
                    }

                    if ($formData->storage_area != null) {
                        $total_meters = $total_meters + $formData->storage_area;
                    }

                    $field->default(round($total_meters, 2));
                }
            ),
        ];
    }


    protected function imageFields() {

        return [
            Images::make('Planos', 'blueprints')->showStatistics()->singleImageRules('dimensions:max_width=2000, max:2048')
            ->setFileName(function($originalFilename, $extension, $model){

                // Eliminar caracteres especiales y acentos
                $limpio = preg_replace('/[^A-Za-z0-9\-]/', '', strtr(utf8_decode($originalFilename), utf8_decode('áéíóúüñÁÉÍÓÚÜÑ'), 'aeiouunAEIOUUN'));

                // Reemplazar espacios por guiones
                $limpio = str_replace(' ', '-', $limpio);

                // Convertir a minúsculas
                $limpio = strtolower($limpio);
                
                return $limpio . '.' . $extension;

            }),

            Images::make('Galería', 'gallery')->hideFromIndex()/*->rules('required')*/->enableExistingMedia()->showStatistics()
            ->singleImageRules('dimensions:max_width=2000, max:2048')
            ->setFileName(function($originalFilename, $extension, $model){

                // Eliminar caracteres especiales y acentos
                $limpio = preg_replace('/[^A-Za-z0-9\-]/', '', strtr(utf8_decode($originalFilename), utf8_decode('áéíóúüñÁÉÍÓÚÜÑ'), 'aeiouunAEIOUUN'));

                // Reemplazar espacios por guiones
                $limpio = str_replace(' ', '-', $limpio);

                // Convertir a minúsculas
                $limpio = strtolower($limpio);
                
                return $limpio . '.' . $extension;

            }),

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
