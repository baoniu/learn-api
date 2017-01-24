<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonsTransformer;
use Illuminate\Http\Request;

/**
 * Class LessonsController
 * @package App\Http\Controllers
 */
class LessonsController extends ApiController
{
    /**
     * @var LessonsTransformer
     */
    protected $lessonsTransformer;

    /**
     * LessonsController constructor.
     * @param $lessonsTransformer
     */
    public function __construct(LessonsTransformer $lessonsTransformer)
    {
        $this->lessonsTransformer = $lessonsTransformer;
        $this->middleware('auth.basic', ['only'=>['store', 'update']]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $lessons = Lesson::all();
        return $this->response([
            'status'=>'success',
            'data'  =>$this->lessonsTransformer->transformCollection($lessons->toArray())
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson) {
            return $this->responseNotFound('Lesson Not Found');
        }
        return $this->response([
            'status'=>'success',
            'data'  =>$this->lessonsTransformer->transform($lesson)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if(! $request->get('title') or ! $request->get('body')) {
            return $this->setCode(422)->responseError('validate fails');
        }
        Lesson::create($request->all());
        return $this->setCode(201)->response([
            'status'=>'success',
            'message'=>'lesson created'
        ]);
    }
}
