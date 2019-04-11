<?php

namespace Modules\UiTables\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class LanguagePairController extends Controller
{
    public function ajaxLangPairSelector($sourceLang_id){
        /**
         * Returns a different target language according selected source language 
         * Language codes MUST be different in a language pair :-)
         */
        $targetLanguages = \Modules\UiTables\Entities\Targetlanguage::where('id', '!=', $sourceLang_id)->get();
        // dd($targetLanguages);
        return json_encode($targetLanguages);
    }
    
}
