<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Section extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Section>
     */
    public static $model = \App\Models\Section::class;

    public function title(){
        if(isset($this->subtitle)){
            return ''.$this->name.' Nivel '.$this->subtitle;
        }
        else{
            return ''.$this->name;
        }
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
        return __('Sección');
    }

    public static function label()
    {
        return __('Secciones');
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
            Select::make('Vista', 'name')->sortable()->rules('required')->options(
                [
                    'Vista Sierra' => 'Vista Sierra',
                    'Vista Bahía'  => 'Vista Bahía',
                ]
            ),
            Text::make('Niveles', 'subtitle')->nullable(),
            Textarea::make('Puntos', 'points')/* ->rules('required') */->help('Puntos del polígono')->alwaysShow(),
            Number::make('Texto X', 'text_x')/* ->rules('required') */->help('Posición del texto en X')->min(0)->step(0.1),
            Number::make('Texto Y', 'text_y')/* ->rules('required') */->help('Posición del texto en Y')->min(0)->step(0.1),
            Image::make('Imagen', 'img_path')->disk('media'),
            Text::make('View Box', 'viewbox')/* ->rules('required') */->help('NO MODIFICAR, solo el administrador debería modificarlo.'),
            HasMany::make('Unidades', 'units', Unit::class),

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
