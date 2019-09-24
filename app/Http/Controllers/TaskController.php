<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\TaskRepositoryInterface;
use App\Services\Validation\ModelValidationService;
use App\Utils\Dates\DatetimeControlInterface;
use App\Utils\Dates\DatetimeService;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @var TaskRepositoryInterface
     */
    private $repository;

    /**
     * TaskController constructor.
     *
     * @param TaskRepositoryInterface $repository
     */
    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function index()
    {
        $registers = $this->repository->all([]);

        return $this->respond($registers);
    }

    /**
     * @return array
     */
    public function indexWithTrashed()
    {
        $registers = $this->repository->allWithTrashed();

        return $this->respond($registers);
    }

    /**
     * @param ModelValidationService $validationService
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function store(ModelValidationService $validationService)
    {
        try {
            $validationService->validateModel(new Task());

            $contentRequest = $validationService->getRequestData();
            $record         = $this->repository->create($contentRequest);

            return $this->respond($record);
        } catch (\Exception $e) {
            $this->setStatusCode(422);

            return $this->respondWithErrors($e->getMessage());
        }
    }

    /**
     * @param ModelValidationService $validationService
     * @param                        $id
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function show(ModelValidationService $validationService, $id)
    {
        try {
            $validationService->validateID($id);

            $result = $this->repository->getById($id);

            return $this->respond($result);
        } catch (\Exception $exception) {
            $this->setStatusCode(422);

            return $this->respondWithErrors($exception->getMessage());
        }
    }

    /**
     * @param ModelValidationService $validationService
     * @param string                 $id
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function update(ModelValidationService $validationService, string $id)
    {
        try {
            $validationService->validateID($id);
            $validationService->validateModel(new Task(), $id);

            $contentRequest = $validationService->getRequestData();
            $this->repository->update($id, $contentRequest);

            $this->setStatusCode(204);

            return $this->respond([]);
        } catch (\Exception $exception) {
            $this->setStatusCode(422);
            $message = $exception->getMessage();

            return $this->respondWithErrors($message);
        }
    }

    /**
     * @param ModelValidationService $validationService
     * @param string                 $id
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function setOpen(ModelValidationService $validationService, string $id)
    {
        try {
            $validationService->validateID($id);

            $this->repository->setOpen($id);

            $this->setStatusCode(204);

            return $this->respond([]);
        } catch (\Exception $exception) {
            $this->setStatusCode(422);
            $message = $exception->getMessage();

            return $this->respondWithErrors($message);
        }
    }

    /**
     * @param ModelValidationService $validationService
     * @param DatetimeService        $datetimeControl
     * @param string                 $id
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function setDone(ModelValidationService $validationService,
                            DatetimeService $datetimeControl,
                            string $id)
    {
        try {
            $validationService->validateID($id);
            $datetimeControl->isSetDatetime();

            $this->repository->setDone($datetimeControl, $id);

            $this->setStatusCode(204);

            return $this->respond([]);
        } catch (\Exception $exception) {
            $this->setStatusCode(422);
            $message = $exception->getMessage();

            return $this->respondWithErrors($message);
        }
    }

    /**
     * Remove user by id.
     *
     * @param ModelValidationService $validationService Service to validate inputs
     * @param string                 $id ID from user
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function destroy(ModelValidationService $validationService, string $id)
    {
        try {
            $validationService->validateID($id);

            $this->repository->delete($id);

            $this->setStatusCode(204);

            return $this->respond([]);
        } catch (\Exception $exception) {
            $this->setStatusCode(422);
            $message = $exception->getMessage();

            return $this->respondWithErrors($message, []);
        }
    }
}
