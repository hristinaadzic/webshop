<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $this->data['messages'] = Message::get();
        return view('admin.pages.messages', $this->data);
    }
}
