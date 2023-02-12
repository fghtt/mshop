<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param $id
     */
    public function __invoke(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->service->update($id, $data);
        return redirect()->route('admin.order.index');
    }
}
