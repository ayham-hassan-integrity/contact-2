<?php

namespace App\Domains\Person\Http\Controllers\Api\Person;

use App\Http\Controllers\Controller;
use App\Domains\Person\Models\Person;
use Illuminate\Http\Request;

/**
 * Class PersonController.
 */
class PersonController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/person",
     * summary="Get All Persons",
     * description="Show All Persons",
     * operationId="getAllPersons",
     * tags={"Person"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Person are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function index()
    {
        return Person::all();
    }



    /**
     * @OA\Get(
     * path="/api/person/{id}",
     * summary="Get Person by id",
     * description="Show one Person by id",
     * operationId="getOnePersons",
     * tags={"person"},
     * @OA\Parameter(
     *    description="ID of person",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when person id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Person is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Person $person)
    {
        return $person;
    }

    /**
     * @OA\Post (
     * path="/api/person",
     * summary="Create New Person",
     * description="Create One Person",
     * operationId="postOnePersons",
     * tags={"person"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Person fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when name or description deos'nt o the RequestBody ",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="name and description field are required"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Person has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return response()->json($person, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/person/{id}",
     * summary="Edit one Person by id",
     * description="update One Person by id",
     * operationId="postOnePersons",
     * tags={"person"},
     * @OA\Parameter(
     *    description="ID of person",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Person fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Person has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Person $person)
    {
        $person->update($request->all());

        return response()->json($person, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/person/{id}",
     * summary="delete Person by id",
     * description="delete one Person by id",
     * operationId="deleteOnePersons",
     * tags={"person"},
     * @OA\Parameter(
     *    description="ID of person",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when person id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Persons are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="increments", example="1"),
     *       @OA\Property(property="name with type string", type="string", example="1"),
     *       @OA\Property(property="description", type="string", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Person $person)
    {
        $person->delete();

        return response()->json($person, 200);
    }
}