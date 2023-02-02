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
        
        <div class="border-t border-gray-200 w-1/3">
          <dl class="w-1/3">
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">KMT = KM TRANSPORT PTY LTD</dt>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">KMT = KM TRANSPORT PTY LTD</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">GTM = GOLD TIGER MAINTENANCE</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">$120,000</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">GTM = GOLD TIGER MAINTENANCE</dd>
            </div>
          </dl>
        </div>
        <div class="border-t border-gray-200 w-1/3	">
          <dl class="w-1/3"> 
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">KMT = KM TRANSPORT PTY LTD</dt>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">KMT = KM TRANSPORT PTY LTD</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">GTM = GOLD TIGER MAINTENANCE</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">$200,000</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">GTM = GOLD TIGER MAINTENANCE</dd>
          </div>
            
          </dl>
        </div>
        <div class="border-t border-gray-200 w-1/3	">
        <dl class="w-1/3"> 
          <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">KMT = KM TRANSPORT PTY LTD</dt>
          </div>
          <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">KMT = KM TRANSPORT PTY LTD</dd>
          </div>
          <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">GTM = GOLD TIGER MAINTENANCE</dd>
          </div>
          <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">$200,000</dd>
          </div>
          <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">GTM = GOLD TIGER MAINTENANCE</dd>
        </div>
          
        </dl>
      </div>
      </div>

      ';
     }
}
