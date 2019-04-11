<?php

namespace Modules\Profile\Repositories;

use \App\Models\UserWidget;
use \App\Models\User;

class UserWidgetRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'widget_title',
        'widget_embed_code',
        'visibility_id',
        'status_id',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserWidget::class;
    }
    
    public function getWidgetsForCurrentUser($user_id)
    {
        return UserWidget::where('user_id', $user_id)->get();
    }

    public function getActiveWidgetsForCurrentUser($user_id)
    {
        return UserWidget::where('user_id', $user_id)
        ->where('status_id', '1')
        ->get();
    }

    /** GENERAL STATISTICS */
    public function countWidgetsForCurrentUser($user_id)
    {
        return count(UserWidget::where('user_id', $user_id)->get());
    }
    
    /** FOR PUBLIC PROFILE */
    public function getVisibleWidgetsForCurrentUser($user_id)
    {
        return UserWidget::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')
        ->get();
    }

    public function countVisibleWidgetsForCurrentUser($user_id)
    {
        return count(UserWidget::where('user_id', $user_id)
        ->where('status_id', '1')
        ->where('visibility_id', '1')->get());
    }

    /** FOR PRIVATE PROFILE */

    public function countActiveWidgetsForCurrentUser($user_id)
    {
        return count(UserWidget::where('user_id', $user_id)
        ->where('status_id', '=', '1')
        ->get());
    }

    public function getWidgetStatus($user)
    {
        $countWidgets = count(UserWidget::where('user_id', $user)->get());
        $WidgetStatus['WidgetStatus'] = array();
        if($countWidgets < 1){
            $widgetStatus = array('WidgetStatus' => 'danger');
        }
        elseif($countWidgets >= 1){
            $widgetStatus = array('WidgetStatus' => 'success');
        }
        $WidgetStatus = array_merge($widgetStatus);
        // dd($WidgetStatus);
        return $WidgetStatus;
    }
}
