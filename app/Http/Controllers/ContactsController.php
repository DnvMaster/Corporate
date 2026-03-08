<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class ContactsController extends CorporateController
{
    public function __construct()
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu()));
        $this->bar = 'left';
        $this->template = 'corporate.contacts';
    }

    public function index(Request $request)
    {
        $this->title = 'Контакты';
        $this->keywords = 'Сообщения, Контакты, Отправка';
        $this->description = 'Отправка сообщений.';

        if($request->isMethod('post')) {
            $message = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'email' => 'Поле :attribute содержать правильный Е-майл адрес',
            ];

            $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ]/*, $message*/);
            $data = $request->all();

            $result = Mail::send('corporate.email',['data'=>$data], function($m) use($data) {
                $mail_admin = env('MAIL_ADMIN');
                $m->from($data['email'],$data['name']);
                $m->to($mail_admin, 'Ув. Администратор')->subject('Тема письма');
            });
            if($result) {
                return redirect()->route('contacts')->with('status','Сообщение успешно отправлено');
            }
        }

        $content = view('corporate.contact_content')->render();
        $this->vars = Arr::add($this->vars,'content',$content);

        $this->contentLeftBar = view('corporate.contact_bar')->render();
        return $this->Output();
    }
}
