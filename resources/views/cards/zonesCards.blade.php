<h1>@lang('interface.portalZones')</h1>
    <p class="lead">@lang('interface.portalZonesLead')</p>
    <div class="row no-gutters">
    <div class="d-lg-flex flex-lg-column col-lg-4">
        <div class="card">
            @component('zones.zones_card_vendors')@endcomponent
        </div>
        <div class="card">
            @component('zones.zones_card_subscriptions')@endcomponent
        </div>
    </div>
    <div class="d-lg-flex flex-lg-column col-lg-4">
        <div class="card">
        @component('zones.zones_card_buyers')@endcomponent
        </div>
        <div class="card">
        @component('zones.zones_card_pools')@endcomponent
        </div>
    </div>
    <div class="d-lg-flex flex-lg-column col-lg-4">
        <div class="card">
        @component('zones.zones_card_news')@endcomponent
        </div>
        <div class="card">
        @component('zones.zones_card_toolbox')@endcomponent
        </div>
    </div>
</div>