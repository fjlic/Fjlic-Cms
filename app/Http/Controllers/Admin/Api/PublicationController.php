<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Services\Contracts\PublicationInterface;
use CoreConstants;
use Illuminate\Http\Request;
use Log;

class PublicationController extends Controller
{
    /**
     * @var PublicationInterface
     */
    private $publication;

    /**
     * Create a new instance
     *
     * @param PublicationInterface $publication
     * @return void
     */
    public function __construct(PublicationInterface $publication)
    {
        $this->publication = $publication;
    }

    /**
     * Get all items
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $result = $this->publication->getAllWithPaginate($request->all());

        return response()->json($result, !empty($result['status']) ? $result['status'] : CoreConstants::STATUS_CODE_SUCCESS);
    }

    /**
     * Store a new item
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $result = $this->publication->store($request->all());

        return response()->json($result, !empty($result['status']) ? $result['status'] : CoreConstants::STATUS_CODE_SUCCESS);
    }

    /**
     * Show the given new item
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $result = $this->publication->getById($id);

        return response()->json($result, !empty($result['status']) ? $result['status'] : CoreConstants::STATUS_CODE_SUCCESS);
    }

    /**
     * Update the given item
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $result = $this->publication->store($request->all());

        return response()->json($result, !empty($result['status']) ? $result['status'] : CoreConstants::STATUS_CODE_SUCCESS);
    }

    /**
     * Destroy the given items
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $result = $this->publication->deleteByIds($request->ids);

        return response()->json($result, !empty($result['status']) ? $result['status'] : CoreConstants::STATUS_CODE_SUCCESS);
    }
}
