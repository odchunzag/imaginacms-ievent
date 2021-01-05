<?php

namespace Modules\Ievent\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Ihelpers\Transformers\BaseApiTransformer;
use Modules\Iprofile\Transformers\DepartmentTransformer;
use Modules\Iprofile\Transformers\UserTransformer;
use Modules\Iteam\Transformers\TeamTransformer;

class CommentTransformer extends JsonResource
{
  public function toArray($request)
  {

    return [
      'id' => $this->when($this->id, $this->id),
      'userId' => $this->when($this->user_id, $this->user_id),
      'user' => new UserTransformer($this->user),
      'eventId' => $this->when($this->event_id, $this->event_id),
      'message' => $this->when($this->message, $this->message),
      'createdAt' => $this->when($this->created_at, $this->created_at),
    ];

  }
}
