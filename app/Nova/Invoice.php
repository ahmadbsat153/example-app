<?php

namespace App\Nova;
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

                BelongsTo::make('Supplier')->readonly(function ($request) {
                    return $request->user()->role_id==3;
                }),
                 BelongsTo::make('Company')->readonly(function ($request) {
                    return $request->user()->role_id==3;
                }),
                 Date::make('date')->readonly(function ($request) {
                    return $request->user()->role_id==3;
                }),
                 Text::make('invoice_n')->readonly(function ($request) {
                    return $request->user()->role_id==3;
                })->sortable(),
                 Date::make('due_date')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),
                Text::make('category')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),

                 Textarea::make('description')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),
                 Currency::make('amount')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),
                Select::make('payment type')->options([
                    'Cash' => 'cash',
                    'Credit' => 'credit',
                ])
                ->readonly(function ($request) {
                    return  $request->user()->role_id==2 || $request->user()->role_id==4 ;
                }),
                 Text::make('processed_bank')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),
                DateTime::make('payment_date')->displayUsing(fn ($value) => $value ? $value->format('D d/m/Y, g:ia') : '')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),
                
                Text::make('po')->readonly(function ($request) {
                    return  $request->user()->role_id==3;
                }),
                Boolean::make('POD Required'),
            Select::make('Status')->options([
                'Waiting' => 'Waiting',
                'Approved' => 'Approved',
                'Rejected' => 'Rejected',
            ])->hideFromIndex()->default(function (NovaRequest $request) { 
                if($request->user()->id==2)
                return 'Approved';
            else return'Waiting';})
            ->readonly(function ($request) {
                return  $request->user()->role_id==2 || $request->user()->role_id==4 ;
            }),
            Status::make('Status')
                ->loadingWhen(['waiting', 'Waiting'])
                ->failedWhen(['Rejected'])->sortable(),
            Boolean::make('payment_status')
                ->trueValue(1)
                ->falseValue(0)
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            // Image::make('Invoice Images')
            //     ->disk('local')
            //     ->maxWidth(500),
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
        return [
            ((new DownloadExcel)->withHeadings())->askForFilename('users-' . time() . '.xlsx'),
        ];
    }
}
