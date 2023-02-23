<?php

namespace Indianic\MenuManagement\Nova\Resources;

use Indianic\MenuManagement\Models\Menu as ModelsMenu;
use App\Nova\Resource;
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
                ->hideWhenUpdating($this->parent_id == null ? true : false)
                ->placeholder('Select Group')
                ->displayUsingLabels()
                ->withMeta(['value' => $this->parent_id ?? 'Parent']),

            Text::make('Display Name')
                ->hideWhenUpdating($this->parent_id == null ? true : false)
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
                ->hideWhenUpdating($this->parent_id == null ? false : true)
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

            Text::make('Url')
                ->help('You can put only external url here. Ex. - "https://nova.laravel.com"')
                ->hideFromIndex()
                ->hideWhenUpdating(($this->is_external_url && $this->parent_id != null ? false : true))
                ->placeholder('https://nova.laravel.com')
                ->readonly()
                ->dependsOn(
                    ['parent_id'],
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->parent_id > 0) {
                            $field->readonly(false)->rules('required');
                        }
                    }
                ),
            HasMany::make('menus')->hideFromDetail($this->parent_id > null ? true : false)
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
