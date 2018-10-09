<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use Validator;
use App\Http\Resources\Poll as PollResource;
use App\Http\Resources\QuestionCollection;

class PollController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/polls",
     *     @OA\Response(response="200", description="List of polls from database")
     * )
     */
    public function index()
    {
        $polls = Poll::with('questions')->get();
        $response['polls'] = $polls;
        $response['questions'] = $polls->pluck('questions');
        return response()->json($response, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/polls/{id}",
     * @OA\Parameter(
     *          name="id",
     *          description="Poll id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="Find poll by id")
     * )
     */
    public function store(Request $request)
    {
        // validation
        $rules=[
            'title' => 'required|min:10'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 404);
        }

        $poll = Poll::create($request->all());
        return response()->json($poll, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::find($id);
        if(is_null($poll)){
            return response()->json(null, 404);
        }

        return new PollResource($poll);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        $response = $poll->update($request->all());
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();
        return response()->json(null, 204);
    }

    public function listOfQuestions(Poll $poll){
        $questions = Poll::with('questions')->find($id)->questions;
        return new QuestionCollection($questions);
    }
}
