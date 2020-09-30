<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;
use App\Events\NotificationEvent;
use phpDocumentor\Reflection\Types\True_;


class NotificationController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:administrator-permission', ['only' => ['index','create','store','edit','update','destroy']]);
    }

   /**
   * init function.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      $data = new Notification;
      $data->channel = ['notification-channel'];
      $data->title = 'Alert';
      $data->message = 'Go okay ma?';
      $data->url = 'http://google.com';
      $data->icon = 'mid mid-bar';

      $res = event(new NotificationEvent($data));
      return $res;
    }

}