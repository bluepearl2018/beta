<div id="sitemap-menu" class="collapse">
        <div class="bg-white container-fluid justify-content-around py-3">    
            <h1>@lang('interface.portalZones')</h1>
            <p class="lead">@lang('interface.portalZonesLead')</p>
        </div>
        <div class="d-flex row gutters bg-white container-fluid justify-content-around py-3">
            <div class="row d-flex">
                <div class="col-md-4 col-lg-3 mb-3">
                    @include('cards.zonesCardVendors')
                </div>
                <div class="col-md-4 col-lg-3 mb-3">
                    @include('cards.zonesCardSubscriptions')
                </div>
                <div class="col-md-4 col-lg-3 mb-3">
                    @include('cards.zonesCardBuyers')
                </div>
                <div class="col-md-4 col-lg-3 mb-3">
                    @include('cards.zonesCardPools')
                </div>
                <div class="col-md-4 col-lg-3 mb-3">
                    @include('cards.zonesCardNews')
                </div>
                <div class="col-md-4 col-lg-3 mb-3">
                    @include('cards.zonesCardToolbox')
                </div>
            </div>
        </div>
    </div>
</div>