<?php
declare(strict_types=1);

namespace App\Models;

use App\Utils\Dates\DatetimeControlInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 */
class Task extends Model implements TaskInterface
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'done_at'
    ];

    /**
     * @param null $id
     *
     * @return array
     */
    public function rules($id = null): array
    {
        $id        = empty($id) ? "" : ",".$id;
        $sometimes = empty($id) ? "" : "sometimes|";

        $attributes = [
            'title'       => $sometimes."required|string|max:150|min:3",
            'description' => $sometimes."nullable|string|max:250",
            'done_at'     => $sometimes."nullable|date_format:Y-m-d H:i:s"
        ];

        return $attributes;
    }

    /**
     * @return array
     */
    public function getFullDetails(): array
    {
        return [
            'title'       => $this->name,
            'description' => $this->cpf,
            'updated_at'  => $this->updated_at,
            'created_at'  => $this->created_at,
            'done_at'     => $this->done_at,
            'deleted_at'  => $this->deleted_at,
        ];
    }

    public function setOpen()
    {
        $this->done_at = null;
    }

    /**
     * @param DatetimeControlInterface $datetimeControl
     */
    public function setDone(DatetimeControlInterface $datetimeControl)
    {
        $this->done_at = $datetimeControl->getNow();
    }
}
