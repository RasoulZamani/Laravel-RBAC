<?php
namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait RecordsActivity
{
    public static function bootRecordsActivity(): void
    {
        static::created(function ($model) {
            $model->recordActivity('created');
        });

        static::updated(function ($model) {
            $model->recordActivity('updated');
        });

        static::deleted(function ($model) {
            $model->recordActivity('deleted');
        });
    }

    protected function recordActivity($event): void
    {
        Activity::query()->firstOrCreate([
            'type' => $event,
            'modelType' => get_class($this),
            'modelId' => $this->id,
            'personId' => Auth::id() ?? 0
        ]);
    }
}
