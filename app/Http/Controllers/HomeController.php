<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function __invoke()
    {
        // $ip_data_json   = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $_SERVER['REMOTE_ADDR']));

        // Visitor::updateOrCreate([
        //     'user_agent'=> request()->userAgent(),
        //     'ip'        => $_SERVER['REMOTE_ADDR'],
        // ],[
        //     'continent_name'   => $ip_data_json->geoplugin_continentName ?? '',
        //     'country'   => $ip_data_json->geoplugin_countryName ?? '',
        //     'capital'   => $ip_data_json->geoplugin_city ?? '',
        //     'city'      => $ip_data_json->geoplugin_regionName ?? '',
        //     'timezone'  => $ip_data_json->geoplugin_timezone ?? '',
        //     'latitude'  => $ip_data_json->geoplugin_latitude ?? '',
        //     'longitude' => $ip_data_json->geoplugin_longitude ?? '',
        // ]);

        $user       = User::first();
        $about_me   = AboutMe::first();
        $services   = Service::all();
        $educations  = Education::where('status', true)->get();
        $experiences = Experience::where('status', true)->get();
        $portfolios = Portfolio::with('category')->get();
        $categories = Category::whereStatus(true)->get();

        return view('frontend.layouts.app', compact('user', 'about_me', 'services','educations','experiences','portfolios', 'categories'));
    }

    public function portfolioShow($id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        return view('frontend.portfolio.index', compact('portfolio'));
    }
}
