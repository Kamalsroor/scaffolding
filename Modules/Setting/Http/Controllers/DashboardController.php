<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Modules\CommonData\Entities\ContactUs;
use Modules\CommonData\Entities\Service;
use Modules\CommonData\Entities\Slider;
use Modules\CommonData\Entities\Sponser;
use Modules\CommonData\Entities\Subscribe;
use Modules\News\Entities\Category;
use Modules\News\Entities\News;
use Modules\News\Entities\Tag;
use Modules\Product\Entities\Product;

class DashboardController extends BaseController
{

    public function overviewData()
    {
      $sponsers_count = Sponser::count();
      $services_count = Service::count();
      $subscription_count = Subscribe::count();
      $contact_us_count = ContactUs::count();
      $sliders_count = Slider::count();
      $products_count = Product::count();
      $news_count = News::count();
      $categories_count = Category::count();
      $tags_count = Tag::count();

      $data = [
        'total_sponsers' => $sponsers_count,
        'total_services' => $services_count,
        'total_subscription' => $subscription_count,
        'total_contact_us' => $contact_us_count,
        'total_sliders' => $sliders_count,
        'total_products' => $products_count,
        'total_news' => $news_count,
        'total_categories' => $categories_count,
        'total_tags' => $tags_count,


      ];


      return response()->success('success',  $data );

    }


}
