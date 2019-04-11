<div id="warningsAndAlerts" aria-labelledby="warningsAndAlertsBtn" class="row container no-gutters mb-4 collapse">
    <div class="row border">
        <h2 class="m-3">
            @lang('profile.audit')
        </h2>
        @isset($userVAT)
            @if(is_null($userVAT) || empty($userVAT))
                <div class="col-md-12 mb-2">
                    <span class="fa fa-minus-circle text-danger"></span>
                    Mentionner <strong>votre numéro de TVA</strong> est essentiel dans les métiers 
                    de la traduction et linguistiques. Eutranet travaille exclusivement
                    avec les professionnels...
                </div>
                @else 
                check VAT
            @endif
        @endisset
        @isset($countLanguages)
            @if(($countLanguages) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-minus-circle text-danger"></span>
                    <strong>Aucune langue autre que votre langue maternelle</strong> 
                    n'est associée à votre profil. 
                </div>
            @elseif(($countLanguages) > 0)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-minus-circle text-success"></span>
                    <strong>Vous avez renseigné une autre langue que votre langue maternelle</strong>.
                </div>
            @endif
        @endisset
        @isset($countLanguagePairs)
            @if(($countLanguagePairs) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-minus-circle text-danger"></span>
                    <strong>Aucune combinaison linguistique</strong> n'est complétée ou activée dans votre profil. 
                    Eutranet ne publie aucun profil de traducteur ou linguiste sans combinaison
                    linguistique.
                </div>
                @elseif(($countLanguagePairs) == 1)
                <div class="col-md-12 mb-3">
                        <span class="fa fa-exclamation-triangle"></span>
                        Une seule combinaison linguistique est renseignée ou active.
                        Si vous avez plus d'une combinaison linguistique, vérifiez que 
                            vous n'avez pas omis d'activer la ou les autres combinaisons.
                </div>
            @endif
        @endisset
        @isset($countSocialmedias)
            @if(($countSocialmedias) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-exclamation-triangle text-warning"></span>
                    Aucun média social n'est renseigné ou activé dans votre profil.
                </div>
                @elseif(($countSocialmedias) == 1)
                <div class="col-md-12 mb-3">
                        <span class="fa fa-exclamation-triangle"></span>
                        Un média social est est renseigné ou active. Nous savons 
                        que beaucoup d'entreprises consultent régulièrement les 
                        médias sociaux. Renseigner un compte professionnel sur Facebook 
                        ou LinkedIn est essentiel pour accroître votre potentiel de 
                        réseautage via Eutranet.
                </div>
            @endif
        @endisset
        @isset($countTools)
            @if(($countTools) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-exclamation-triangle text-warning"></span>
                    Aucun outil professionnel n'est renseigné ou activé dans votre profil.
                </div>
            @endif
        @endisset
        @isset($countProgLang)
            @if(($countProgLang) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-exclamation-triangle text-warning"></span>
                    Vous n'avez renseigné aucune langue de programmation.
                </div>
            @endif
        @endisset
        @isset($countPools)
            @if(($countPools) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-minus-circle text-danger"></span>
                    Vous n'êtes encore affilié à <strong>aucun pool</strong>.
                    Le minimum est de une affiliation, sans quoi votre profil ne peut apparaître
                    dans le réseau.
                </div>
            @endif
        @endisset
        @isset($countOrganizations)
            @if(($countOrganizations) < 1)
                <div class="col-md-12 mb-2">
                    <span class="fa fa-exclamation-triangle text-warning"></span>
                    Vous n'êtes encore affilié à aucune organisation professionnelle. 
                    Dommage... Ces associations défendent les droits des professionnels. 
                </div>
            @endif
        @endisset
    </div>
</div>