<?php

namespace Indianic\MenuManagement\Nova\Resources;

use App\Models\Menu as ModelsMenu;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Menu extends Resource
{
    use HasSortableRows;

    public static $sortableCacheEnabled = false;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Indianic\MenuManagement\Models\Menu>
     */
    public static $model = \Indianic\MenuManagement\Models\Menu::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            Text::make('Name')
                ->rules('required'),

            Select::make('Group', 'parent_id')->options(
                ModelsMenu::where('parent_id', null)->get()
                    ->pluck('name', 'id')
            )
                ->placeholder('Select Group')
                ->displayUsingLabels(),

            Text::make('Display Name')
                ->readonly()
                ->dependsOn(
                    ['parent_id'],
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->parent_id > 0) {
                            $field->readonly(false)->rules('required');
                        }
                    }
                ),

            Text::make('Icon')
                ->help('You can check the icons here<a href="https://v1.heroicons.com/" target="_blank"> Heroicons </a>.')
                ->rules('required')
                ->dependsOn(
                    ['parent_id'],
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->parent_id > 0) {
                            $field->readonly(true);
                        }
                    }
                ),

            Boolean::make('External Url', 'is_external_url')
                ->withMeta(['value' => $this->is_external_url ?? true])
                ->hideFromIndex()
                ->readonly()
                ->dependsOn(
                    ['parent_id'],
                    function (Boolean $field, NovaRequest $request, FormData $formData) {
                        if ($formData->parent_id > 0) {
                            $field->readonly(false);
                        }
                    }
                ),

            Text::make('Url')
                ->help('Internal Url Ex. - "resources/users" and External Url Ex. - "https://nova.laravel.com"')
                ->hideFromIndex()
                ->readonly()
                ->dependsOn(
                    ['parent_id'],
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->parent_id > 0) {
                            $field->readonly(false)->rules('required');
                        }
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
