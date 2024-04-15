<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

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
        'id', 'name', 'email',
    ];

    /**
     * Get the text for the create resource button.
     *
     * @return string|null
     */
    public static function createButtonLabel()
    {
        return __('Crear Nuevo');
    }

    /**
     * Get the text for the update resource button.
     *
     * @return string|null
     */
    public static function updateButtonLabel()
    {
        return __('Guardar Cambios');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Usuario');
    }

    public static function label()
    {
        return __('Usuarios');
    }


    /**
     * Build an "index" query for the given resource.
     * 
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();

        //Al admin se le muestran todos los registros, a los demás solo los suyos
        if( $user->role == 'admin' or $user->role == 'superadmin' ){
            return $query;
        }
        else{
            return $query->where('agent_id', $request->user()->id)->orWhere('role', 'agent');
        }
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

            Gravatar::make()->maxWidth(50),

            Text::make('Nombre Completo', 'name')
                ->sortable()
                ->rules('required', 'max:255')
                ->showWhenPeeking(),

            Email::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')
                ->showWhenPeeking(),

            Number::make('Teléfono', 'phone')->hideFromIndex()->nullable()->min(0),

            Select::make('Lenguaje', 'lang')->options([
                'es' => 'Español',
                'en' => 'Inglés',
            ])->displayUsingLabels()->hideFromIndex()->default('es')->rules('required'),

            Country::make('País', 'country_code')->hideFromIndex()->searchable()->nullable(),

            Password::make('Contraseña', 'password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            Select::make('Rol', 'role')->options([
                'client' => 'Cliente',
                'agent' => 'Asesor Inmobiliario',
                'admin' => 'Administrador del sistema',
                'superadmin' => 'Super Admin',
            ])->displayUsingLabels()->filterable(),

            //Asesor
            BelongsTo::make('Asesor', 'agent', 'App\Nova\User')->exceptOnForms(),
            Select::make('Asesor', 'agent_id')->options(function(){

                $agents = User::where('role', 'agent')->get();
                $agentsArray = [];

                foreach($agents as $agent){
                    $agentsArray[$agent->id] = $agent->name;
                }

                return $agentsArray;

            })->displayUsingLabels()->onlyOnForms()->nullable()
            ->dependsOn(
                ['role'],
                function (Select $field, NovaRequest $request, FormData $formData) {
                    if ($formData->role == 'client') {
                        $field->show();
                    }
                    else{
                        $field->hide();
                    }
                }
            ),

            Tag::make('Unidades Guardadas', 'savedUnits', Unit::class)->withPreview()->hideFromIndex()
            ->showOnDetail(function (NovaRequest $request, $resource) {
                return $this->role === 'client';
            })->exceptOnForms(),

            HasMany::make('Mensajes', 'messages', PrivateMessage::class)->hideFromDetail(fn () => $this->messages->isEmpty()),

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
