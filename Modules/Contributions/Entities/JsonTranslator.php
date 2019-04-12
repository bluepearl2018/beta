<?php

namespace Modules\Contributions\Entities;

use Illuminate\Support\Facades\Log;
use Illuminate\Translation\Translator as BaseTranslator;
use Spatie\TranslationLoader\LanguageLine;

/**
 * Class JsonTranslator
 * @package App\Translator */

class JsonTranslator extends BaseTranslator

{
    /**
     * @param string $key 
     * @param array $replace
     * @param null $locale
     * @param bool $fallback
     *
     * @return array|null|string|void
     */

    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        /**
         * Retrieve translatable strings as they load
         * Check if any unique group/key exists 
         * Store into language lines table Spatie Translation Loader
         */
        $translation = parent::get($key, $replace, $locale, $fallback);

        if ($translation === $key) {
            
            $array = preg_split('/[\s.]+/', $key);
            if(count($array) == 2){
                $check = LanguageLine::where('group', $array[0])->where('key', $array[1])->first();
                if(!$check){
                    $langLine = LanguageLine::firstOrNew([
                        'group' => $array[0],
                        'key' => $array[1],
                        'text' => ['en' => $key]
                    ]);
                    $langLine->save();
                }
            }
            
            // Log::channel('missingtranslations')->warning([
            //    'language' => $locale ?? config('app.locale'),
            //    'id' => $key,
            //    'url' => config('app.url')
            // ]);
        }
        return $translation;
    }
}