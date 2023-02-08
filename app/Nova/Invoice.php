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
use Laravel\Nova\Fields\Boolean;
use App\Nova\Cards\MyHtmlCard;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Laravel\Nova\Fields\Select;
use Fourstacks\NovaCheckboxes\Checkboxes;


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
        'id','suppliers','company','date','invoice_n','due_date','description','amount','processed_bank','payment_date','wfa','approved','po',
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
            BelongsTo::make('Supplier'),
            BelongsTo::make('Company'),
            //Text::make('company')->rules('required'),
            Date::make('date')->rules('required'),
            Text::make('invoice_n')->rules('required'),
            Date::make('due_date')->rules('required'),
            Textarea::make('description')->rules('required'),
            Currency::make('amount')->rules('required'),
            Text::make('processed_bank')->rules('nullable'),
            Date::make('payment_date')->rules('required'),
            Text::make('wfa')->rules('required'),
            Text::make('approved')->rules('required'),
            Text::make('po')->rules('required'),
            Select::make('Status')->options([
                'Waiting' => 'Waiting',
                'Approved' => 'Approved',
                'Rejected' => 'Rejected',
            ])->hideFromIndex()->default('waiting'),
            Status::make('Status')
                ->loadingWhen(['waiting', 'Waiting'])
                ->failedWhen(['Rejected'])->sortable(),
            Boolean::make('payment_status')
                ->trueValue(1)
                ->falseValue(0),
           
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
