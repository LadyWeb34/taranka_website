<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Partner;
use App\Notifications\TelegramMsg;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index(){
        $gallery_full_count = Gallery::count();
        $galleries = Gallery::latest()->take(6)->get();
        $gallery_count = Gallery::latest()->take(6)->count();
        $partnerst = Partner::all();
        return view('home', compact('galleries','gallery_count','gallery_full_count', 'partnerst'));
    }
    public function question(){
        $questions = Question::all()->where('status', 'true');
        return view('question', compact('questions'));
    }
    public function news(){
        $news = News::all()->where('status', 'true');
        return view('news', compact('news'));
    }
    public function show($news){
        $recomented = News::where('slug', '!=', $news)->where('status', 'true')->get();
        $show = News::where('slug',$news)->first();
        return view('single', compact('show', 'recomented'));
    }
    public function menu(){
        $categories = Category::all();
        return view('menu', compact('categories'));
    }
    public function food($food){
        $category_name = Category::where('id', $food)->first();
        $foods = Food::all()->where('category_id', $food);
        return view('food', compact('foods','category_name'));
    }
    public function galleries(){
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));
    }
    public function sorry(){
        return view('sorry');
    }
    public function contact(){
        return view('contact');
    }
    public function toTelegram(Request $request){
        Notification::send($request, new TelegramMsg());
        return redirect()->route('front.contact')->with('success', 'Ваша заявка отправлена!');
    }
}
