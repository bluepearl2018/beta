<div class="container-fluid m-0 px-0 py-3">
    @include('flash::message')
    <h1>
        <i class="fa fa-tachometer-alt"></i>
        @lang('interface.welcomeContributions')
    </h1>
    <p class="lead">
        @lang('interface.welcomeContributionsLead')
        Nous vous proposons de contribuer à la traduction de la plateforme Eutranet
        vers toutes les langues européennes à partir du français dans un premier temps.
        <strong>Les fonctionnalités contributives sont 
        réservées aux traducteurs certifiés (affilités à une organisation 
        reconnue par la FIT / FIT Europe). Plus vous traduisez, plus vous montez 
        en responsabilité au sein du réseau. /atlang+([@[A-Z('A-Z].)\w+.+'./g </strong>
    </p>
    <div class="card-deck">
        @include('contributions::interface.interfaceTranslationCard')
        @include('contributions::news.newsTranslationCard')
        <div class="d-sm-inline-block d-lg-none w-100 clearfix"></div>
        <div class="d-none d-md-inline-block d-lg-none w-100 clearfix"></div>
        @include('contributions::pages.pagesTranslationCard')
    </div>
</div>
