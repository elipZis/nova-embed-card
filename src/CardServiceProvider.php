<?php

namespace Elipzis\NovaEmbedCard;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

/**
 */
class CardServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Nova::serving(static function(ServingNova $event) {
            Nova::script('nova-embed-card', __DIR__ . '/../dist/js/card.js');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
