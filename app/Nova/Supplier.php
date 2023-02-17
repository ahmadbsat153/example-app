<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Greg0x46\MaskedField\MaskedField;
use Codebykyle\CalculatedField\BroadcasterField;
use Codebykyle\CalculatedField\ListenerField;
use Laravel\Nova\Fields\BelongsTo;


class Supplier extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Supplier>
     */
    public static $model = \App\Models\Supplier::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'supp_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','supp_name','supplier_nb','services_id','supplier_land',
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
            Text::make('Supplier Name','supp_name'),
            MaskedField::make('ABN','supplier_abn')
            ->mask('## ### ### ###')
            ->required(),
            // Text::make('Phone Number','supplier_nb'),
            Text::make('Email','supplier_email'),
            MaskedField::make('Mobile Number','supplier_nb')
            ->mask('#### ### ###'),
            MaskedField::make('Land Line','supplier_land')
            ->mask('## #### ####'),
            BelongsTo::make('service'),
            new Panel('Address Information', $this->addressFields()),

        ];
    }
    protected function addressFields()
    {
        return [
            Text::make('Street Number','street_nb'),
            Text::make('City','city'),
            Text::make('State','state'),
            Text::make('Zip Code','zip_code'),
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
