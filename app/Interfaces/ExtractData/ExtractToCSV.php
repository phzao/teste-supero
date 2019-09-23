<?php

namespace App\Interfaces\ExtractData;

use App\Services\Control\FileControl;
use App\Services\Control\StorageControl;

/**
 * Class ExtractToCSV
 *
 * @package App\Interfaces\ExtractData
 */
class ExtractToCSV implements ExtractDataStepInterface
{
    /**
     * @var FileControl
     */
    private $file;

    /**
     * @var StorageControl
     */
    private $storage;

    /**
     * ExtractToCSV constructor.
     *
     * @param FileControl    $file
     * @param StorageControl $storage
     */
    public function __construct(FileControl $file,
                                StorageControl $storage)
    {
        $this->file    = $file;
        $this->storage = $storage;
    }

    /**
     * @param $source
     * @param $action
     * @param $objectControl
     * @param $actions
     *
     * @return array|mixed
     * @throws \Exception
     */
    public function extract($source, $action, $objectControl, $actions)
    {
        $dataToSave = $this->getDataToFile($source, $objectControl, $action);

        $name = bin2hex(random_bytes(10));;
        $ext  = $action["email_sub_action_extension"];
        $full = $name.".".$ext;

        $multiple = $action["email_sub_action_multiple"]? true:false;

        $this->file->open($full);
        $this->file->writeCsv($dataToSave, $multiple);
        $this->file->close();

        return [
            "path"      => $this->file->getPath(),
            "extension" => $action["email_sub_action_extension"],
            "mime"      => $action["email_sub_action_mime_type"]
        ];
    }

    private function getDataToFile($source, $objectControl, $action)
    {
        if ($action["email_sub_action_search"]==="disable")
        {
            $model = $action["email_sub_action_access_by"];

            return $source[$model];
        }

        $model     = ucfirst($action["email_sub_action_access_by"]);
        $parameter = ["id" => $source["id"]];

        //tabela que vai fornecer os dados
        $repository = $objectControl->loadRepository($model, "App\Repositories\\");
        $entity     = $repository->findOneWithFilterAndTranslate($parameter);

        return $entity->toArray();
    }
}
