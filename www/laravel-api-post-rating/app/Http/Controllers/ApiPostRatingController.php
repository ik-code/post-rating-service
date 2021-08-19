<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PostRating;

/**
 * Class ApiPostRatingController
 *
 * @package App\Http\Controllers
 *
 * Author: Ihor Khaletskyi
 * Author URI: https://sitepro4web.com/
 */
class ApiPostRatingController extends Controller
{

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * Author: Ihor Khaletskyi
     * Author URI: https://sitepro4web.com/
     */
    public function api(Request $request)
    {
        if (isset($_GET['post_id']) && !empty($_GET['post_id']) && isset($_GET['post_title']) && !empty($_GET['post_title']) && isset($_GET['user_rating']) && !empty($_GET['user_rating'])) {

            $params = $request->query();

            $post_rating = new PostRating(
                [
                    'post_id'     => $params['post_id'],
                    'post_title'  => $params['post_title'],
                    'user_rating' => $params['user_rating'] <= 5 ? $params['user_rating'] : 0 ,
                ]
            );

            $post_rating->save();

            $avg_rating = DB::table('post_ratings')
                            ->where('post_id', '=', $params['post_id'])
                            ->where('post_title', '=', $params['post_title'])
                            ->avg('user_rating');

            $data = ['avg_rating' => $avg_rating];

            return response()->json($data, 200);
        }

        $data = ['avg_rating' => ''];

        return response()->json($data, 200);
    }

}
