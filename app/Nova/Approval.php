<?php

namespace App\Nova;
use App\Nova\Filters\InvoiceToBeApproved;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Integer;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use App\Models\User;
class Approval extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Approval>
     */
    public static $model = \App\Models\Invoice::class;

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
                //  ID::make()->sortable(),
                  //Select::make('invoice_id')
                    //  ->options(\App\Models\Invoice::get()->pluck('invoice_n','id')),
               //   Text::make('company_name')
                  //    ->autofill('company'),
                  //Text::make('supplier_name'),
                  BelongsTo::make('Supplier')                      
                  ->withMeta(['extraAttributes' => [
                    'readonly' => true
                     ]]),
                  BelongsTo::make('Company')
                  ->withMeta(['extraAttributes' => [
                    'readonly' => true
                     ]]),           //Text::make('company')->rules('required'),
                  Text::make('invoice_n')
                      ->withMeta(['extraAttributes' => [
                      'readonly' => true
                       ]]),
                  Currency::make('amount')
                      ->withMeta(['extraAttributes' => [
                      'readonly' => true
                       ]]),
                  Text::make('po')
                  ->withMeta(['extraAttributes' => [
                      'readonly' => true
                       ]]),
                Select::make('Status')->options([
                        'Waiting' => 'Waiting',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ])->hideFromIndex()
                    ->default('waiting')
                    ->showOnUpdating(function (NovaRequest $request) 
                        {return $request->user()->id==2||$request->user()->id==1;}),
                  Status::make('Status')
                       ->loadingWhen(['waiting', 'Waiting'])
                       ->failedWhen(['Rejected']),
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
        return [ new InvoiceToBeApproved];
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
