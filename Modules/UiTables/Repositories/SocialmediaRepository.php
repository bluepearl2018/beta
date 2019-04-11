<?php

namespace Modules\UiTables\Repositories;

use Modules\UiTables\Entities\Socialmedia;

/**
 * Class SocialmediaRepository
 * @package App\Repositories
 * @version December 3, 2018, 9:24 am UTC
 *
 * @method Socialmedia findWithoutFail($id, $columns = ['*'])
 * @method Socialmedia find($id, $columns = ['*'])
 * @method Socialmedia first($columns = ['*'])
*/
class SocialmediaRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'helper',
        'url',
        'sourcelanguage_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Socialmedia::class;
    }

    public function countSocialMedias()
    {
        return sizeof(Socialmedia::all());
    }
}
