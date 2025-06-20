<?php

namespace App\Nova\Actions;

use App\Models\UnitType;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Http\Requests\NovaRequest;

class ChangeUnitType extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        //
        foreach ($models as $model) {
            // Assuming $model is an instance of the Unit model
            $model->unit_type_id = $fields->unit_type;
            $model->save();
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Select::make(__('Tipo de unidad'), 'unit_type')
                ->options(function(){
                    $unitTypes = UnitType::all();
                    $options = [];
                    foreach ($unitTypes as $type) {
                        $options[$type->id] = $type->name.' '.$type->const_total;
                    }

                    return $options;
                })
                ->rules('required')
                ->help(__('Seleccione el tipo de unidad que desea asignar.')),
        ];
    }
}
