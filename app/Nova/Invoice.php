<?php

namespace App\Nova;
use App\Nova\Filters\DepotInvoices;
use App\Nova\Filters\DepotFilter;
use Laravel\Nova\Fields\Status;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Laravel\Nova\Fields\Select;
use Fourstacks\NovaCheckboxes\Checkboxes;
use App\Models\User;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Image;




class Invoice extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Invoice>
     */
    public static $model = \App\Models\Invoice::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return $this->invoice_n;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','invoice_n','description','amount','invoice_n','processed_bank','payment_date','po','status','payment_status','supplier_id','company_id',
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
            ID::make(),

                BelongsTo::make('Supplier')
                ->showOnCreating()
                ->showOnUpdating($request->user()->depot=='All'),
                BelongsTo::make('Supplier')                    
                ->sortable()
                ->hideWhenCreating()
                ->hideFromIndex()
                ->hideFromDetail()
                ->showOnUpdating($request->user()->depot!='All')
                ->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                }),
                Select::make('Company')->options([
                    'GTLS ' => 'GTLS ',
                    'GTL NSW ' => 'GTL NSW ',
                    'GTL SYD' => 'GTL SYD',
                    'GTL VIC ' => 'GTL VIC',
                    'GTL QLD ' => 'GTL QLD',
                    'LES  ' => 'LES ',
                    'SWT' => 'SWT',
                    'GTM  ' => 'GTM',
                ])
                        ->hideFromDetail()->default('GTLS')
                        ->hideFromIndex()
                        ->showOnUpdating(function (NovaRequest $request) 
                        {return $request->user()->depot=='All';})
                        ->showOnCreating(function (NovaRequest $request) 
                            {return $request->user()->depot=='All';})
                        ->readonly(function ($request) {
                                return $request->user()->depot!='All';
                            }),
                Select::make('Company','company')->options([
                        'GTL NSW ' => 'GTL NSW ',
                        'GTL SYD' => 'GTL SYD',
                        'SWT' => 'SWT',
                        'GTM  ' => 'GTM',
                ])

                        ->hideFromDetail()->default('GTLS')
                        ->hideFromIndex()
                        ->hideWhenUpdating()
                        ->showOnCreating(function (NovaRequest $request) 
                            {return $request->user()->depot=='Sydney';})
                        ->readonly(function ($request) {
                                return $request->user()->depot!='Sydney' ;
                            }),
                Select::make('Company','company')->options([
                            'GTL QLD ' => 'GTL QLD',
                        ])
                        ->hideFromDetail()->default('GTLS')
                        ->hideFromIndex()
                        ->hideWhenUpdating()
                        ->showOnCreating(function (NovaRequest $request) 
                            {return $request->user()->depot=='Queensland';})
                        ->readonly(function ($request) {
                                return $request->user()->depot!='Queensland';
                            }),
                Select::make('Company','company')->options([
                                'GTL VIC ' => 'GTL VIC',
                            ])
                            ->hideFromDetail()
                            ->hideFromIndex()
                            ->hideWhenUpdating()
                            ->showOnCreating(function (NovaRequest $request) 
                                {return $request->user()->depot=='Victoria';})
                            ->readonly(function ($request) {
                                    return $request->user()->depot!='Victoria';
                                }),
                                
                Text::make('Company','company')
                                ->readonly()
                                ->hideWhenCreating()
                                ->hideWhenUpdating(function (NovaRequest $request) 
                                {return $request->user()->depot=='All';}),
                //  BelongsTo::make('Company')->readonly(function ($request) {
                //     return $request->user()->depot!='all';
                // }),
                 Date::make('date','date')
                    ->showOnCreating()
                    ->hideWhenUpdating(),
                Date::make('date','date')->readonly(function ($request) {
                    return $request->user()->depot!='All';
                })
                    ->hideWhenCreating()
                    ->showOnUpdating()
                    ->hideFromIndex()
                    ->hideFromDetail(),
                 Text::make('Invoice NB','invoice_n')          
                    ->showOnCreating()
                    ->hideWhenUpdating()
                    ->sortable(),
                Text::make('Invoice NB','invoice_n')->readonly(function ($request) {
                    return $request->user()->depot!='All';
                })
                    ->sortable()
                    ->hideWhenCreating()
                    ->showOnUpdating()
                    ->hideFromIndex()
                    ->hideFromDetail(),
                Date::make('DUE DATE','due_date')          
                  ->showOnCreating()
                  ->hideWhenUpdating(),
                Date::make('DUE DATE','due_date')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                Text::make('category','category')
                ->showOnCreating()
                ->hideWhenUpdating(),
                Text::make('category','category')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })                
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                Textarea::make('description','description')
                ->showOnCreating()
                ->hideWhenUpdating(),
                Textarea::make('description','description')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                 Currency::make('amount','amount')
                ->showOnCreating()
                ->hideWhenUpdating(),
                Currency::make('amount','amount')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                Select::make('payment type','pod_required')->options([
                    'Cash' => 'cash',
                    'Credit' => 'credit',
                ])
                ->showOnCreating()
                ->hideWhenUpdating(),
                Text::make('payment type','pod_required')
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail()
                ->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                }),
                Text::make('PROCESSED BANK','processed_bank')                
                ->showOnCreating()
                ->hideWhenUpdating(),
                Text::make('PROCESSED BANK','processed_bank')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                DateTime::make('PAYMENT DATE','payment_date')->displayUsing(fn ($value) => $value ? $value->format('D d/m/Y, g:ia') : '')
                ->showOnCreating()
                ->hideWhenUpdating(),
                DateTime::make('PAYMENT DATE','payment_date')->displayUsing(fn ($value) => $value ? $value->format('D d/m/Y, g:ia') : '')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                Text::make('po')
                ->showOnCreating()
                ->hideWhenUpdating(),
                Text::make('po')->readonly(function ($request) {
                    return  $request->user()->depot!='All';
                })
                ->hideWhenCreating()
                ->showOnUpdating()
                ->hideFromIndex()
                ->hideFromDetail(),
                Boolean::make('POD Required','pod_required')
                    ->showOnCreating()
                    ->hideWhenUpdating(),
                Boolean::make('POD Required','pod_required')
                    ->hideWhenCreating()
                    ->showOnUpdating()
                    ->hideFromIndex()
                    ->hideFromDetail()
                    ->readonly(function ($request) {
                        return  $request->user()->depot!='All';
                    }),
                    Select::make('Status')->options([
                        'Waiting' => 'Waiting',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ])->hideFromIndex()->default(function (NovaRequest $request) { 
                        if($request->user()->role_id != 4)
                        return 'Approved';
                    else return'Waiting';})
                    // ->readonly(function ($request) {
                    //     // return  $request->user()->role_id==2 || $request->user()->role_id==4 || $request->user()->id==5;
                    //     return !$request->user()->role_id==1;
                    // }),
                    ->readonly(function($request){
                       if($request->user()->role_id!=1)
                       return true;
                    }),
            
            Status::make('Status','status')
                ->loadingWhen(['waiting', 'Waiting'])
                ->failedWhen(['Rejected'])->sortable()
                ->readonly()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            Boolean::make('PAYMENT STATUS','payment_status')
                ->trueValue(1)
                ->falseValue(0)
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            Image::make('Invoice Images')
                ->disk('public'),
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
        return [
            new DepotFilter
        ];
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
        return [
            ((new DownloadExcel)->withHeadings())->askForFilename('users-' . time() . '.xlsx'),
        ];
    }
}
