<?php

namespace App\Services\Automated;

use App\Services\Control\ExtractFromDateControl;
use App\Services\Control\ObjectControl;
use App\Services\Control\RequestControl;
use App\Services\Control\ResultControl;
use App\Services\Control\StorageControl;

/**
 * Class UploadAttachmentServices
 * @package App\Services\Automated
 */
class UploadAttachmentService extends ResultControl
{
    /**
     * UploadAttachmentService constructor.
     *
     * @param RequestControl         $request
     * @param ExtractFromDateControl $date_control
     * @param StorageControl         $upload
     * @param ObjectControl          $object
     * @param string                 $nameRequestFile
     *
     * @throws \ReflectionException
     */
    public function __construct(RequestControl $request,
                                ExtractFromDateControl $date_control,
                                StorageControl $upload,
                                ObjectControl $object,
                                $nameRequestFile = "file")
    {
        $model = $request->getField('model');
        $model_id = $request->getField('model_id');
        if (!$model || !$model_id) {
            return false;
        }

        $current_entity = $request->getClassName();
        $fileEntity     = $object->loadClass($current_entity);
        $repository     = $object->loadRepository("Save");
        $request->validation($fileEntity->rules());
        
        $pathRule = $fileEntity->getPathDefinitions();
        $path     = $date_control->$pathRule();
        
        $attachment      = $request->getFile($nameRequestFile);
        $detailsFromFile = $fileEntity->getImportantDetailsFromFile();
        
        $infoToFile = $request->getInfoFromFile($nameRequestFile,
                                                $detailsFromFile);
        $request->addToData($infoToFile);
        
        $upload->upload($attachment, $path);
        
        $request->addToData(["path" => $upload->getFullPath()]);
        
        $repository->setEntity($fileEntity);

        $attachment = $repository->create($request->getData());

        $attachment_model = "Attachment".$model;
        $attachment_model_entity     = $object->loadClass($attachment_model);
        $repository->setEntity($attachment_model_entity);

        $data = $attachment_model_entity->getDataToSave($model_id, $attachment->id);
        $this->result = $repository->create($data);
    }
}
