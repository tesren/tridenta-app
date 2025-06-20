<?php

namespace App\Nova\Actions;

use App\Models\Section;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Http\Requests\NovaRequest;

class ChangeSection extends Action
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
            // Assuming the model has a 'section' attribute to change
            $model->section_id = $fields->section_id; // You need to define 'section' in the fields method
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
            Select::make('Section', 'section_id')
                ->options(function () {
                    $sections = Section::all();

                    $arrayOptions = [];
                    foreach ($sections as $section) {
                        $arrayOptions[$section->id] = $section->name.' '.$section->subtitle;
                    }

                    return $arrayOptions;
                })
                ->rules('required')
                ->displayUsingLabels()
                ->help('Select the section to change the model to.'),
        ];
    }
}
