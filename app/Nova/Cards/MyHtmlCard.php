<?php

namespace App\Nova\Cards;

use Abordage\HtmlCard\HtmlCard;

class MyHtmlCard extends HtmlCard
{
    /**
     * Name of the card (optional, remove if not needed)
     */
    public string $title = 'Legend';

    /**
     * The width of the card (1/2, 1/3, 1/4 or full).
     */
    public $width = 'full';

    /**
     * The height strategy of the card (fixed or dynamic).
     */
    public $height = 'dynamic';

    /**
     * Align content to the center of the card.
     */
    public bool $center = false;

    /**
     * Html content
     */
    public function content(): string
     {
        return '
        <div class="overflow-hidden bg-white shadow sm:rounded-lg flex w-full	">
        
        <div class="border-t border-gray-200" style="width:33%">
          <dl class="w-1/3">
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-900"><span class="text-red-600">KMT</span> = KM TRANSPORT PTY LTD</dt>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">GTM</span> = GOLD TIGER MAINTENANCE</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">GTL NSW</span> = GOLD TIGER LOGISTICS NSW</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">GTLS NSW</span> = GOLD TIGER LOGISTICS SOLUTIONS NSW </dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">NSWASS</span> = NSW ASSETS </dd>
            </div>
          </dl>
        </div>
        <div class="border-t border-gray-200 w-1/3"style="width:33%">
          <dl class="w-1/3"> 
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-900"><span class="text-red-600">GTL QLD</span>= GOLD TIGER LOGISTICS QLD</dt>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">GTL SYD</span> = GOLD TIGER LOGISTICS VICTORIA</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">GTL VIC</span> = GOLD TIGER LOGISTICS SYDNEY </dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">DIN</span> = DINEXUS DEVELOPMENT </dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">QLDASS</span> = QLD ASSETS</dd>
          </div>
            
          </dl>
        </div>
        <div class="border-t border-gray-200 w-1/3" style="width:33%">
        <dl class="w-1/3 " > 
          <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-900"><span class="text-red-600">LES</span> - LINEHAUL EXPRESS SERVICES</dt>
          </div>
          <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">MAS</span> = MASRI INVESTMENTS GROUP</dd>
          </div>
          <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">SWT</span> = SOUTH WEST TRANSPORT</dd>
          </div>
          <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><span class="text-red-600">VICASS</span> = VIC ASSETS</dd>
          </div>
          <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"></dd>
        </div>
        </div>
          
        </dl>
      </div>
      </div>

      ';
     }
}