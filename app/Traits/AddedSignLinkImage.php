<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

trait AddedSignLinkImage
{

    public static function boot()
    {
        parent::boot();

        static::retrieved(function (Model $model) {
            if ($model instanceof Image) {
                $model->applyAfterRetrieval();
            }
        });

        static::creating(function (Model $model) {
            if ($model instanceof Image) {
                $model->imageName = $model->image;
            }
        });

        static::updating(function (Model $model) {
            if ($model instanceof Image) {
                $model->imageName = $model->image;
            }
        });

    }

    protected function applyAfterRetrieval(): void
    {
        $url = URL::temporarySignedRoute('image.display', now()->addMinutes(60), ['filename' => $this->image]);
        $modifiedUrl = str_replace("http://api.barsms.ir/", "", $url);
        $this->image = $modifiedUrl;
    }

}
