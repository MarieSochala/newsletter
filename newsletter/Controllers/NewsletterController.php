<?php

namespace Newsletter\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Michelf\Markdown;


class NewsletterController extends Controller
{
    public function getIndex() {
    	return view('newsletter::newsletterform');
    }

    public function postIndex(Request $request) {
        $data = $request->all();
        $id = $this->markdownToHtml($request->input('content'));
        
        return redirect('/newsletters/preview/' . $id);
    }

    private function markdownToHtml($content) {
        $contentHtml = Markdown::defaultTransform($content);
        $v = View::make('newsletter::templatemail', ['contentHtml' => $contentHtml]);

        return $this->dumpMailTemplate($v->render());
    }
    private function dumpMailTemplate($view){
        $html = $view;
        return $this->generateMail($html);
    }
    private function generateMail($html){

        $path = public_path() . "/css/style.css";

        $css = file_get_contents($path);

        $emogrifier = new \Pelago\Emogrifier($html, $css);
        $mergeHtml = $emogrifier->emogrify();
        $preview = new \App\Preview;
        $preview->title = \Request::input('title');
        $preview->content = \Request::input('content');
        $preview->processed = $mergeHtml;
        $preview->save();

        return $preview->id;
    }
    public function getPreview($id) {
        dd(\App\Preview::findOrFail($id)->toArray());
    }
}
