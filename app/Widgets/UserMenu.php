<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Model\UserMessage;

class UserMenu extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(UserMessage $userMessages)
    {
        $userMessage = $userMessages->where('user_id','=',\Auth::user()->id)
        							->where('message_type','=','in')
        							->where('confirmed','=',0)
        							->count();
       

        return view("widgets.user_menu", [
            'config' => $this->config,
        	'newMsgCount'=>$userMessage,
        ]);
    }
}