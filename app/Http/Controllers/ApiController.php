<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function index(): Collection {
        return Device::all();
    }

    public function store(Request $request) : Response {
        try{
            if(intval($request->model)){
                Device::create([
                    'name' => $request->name,
                    'color' => $request->color,
                    'model' => $request->model,
                    'type' => $request->type,
                    'brand' => $request->brand,
                ]);
    
                return response([
                    'status' => '200',
                    'message' => 'Data has been saved successfully!',
                ]);
            } else {
                return response([
                    'status' => '400',
                    'message' => 'Device model must be the corresponding year in which the device was launched!',
                ]);
            }
        } catch (QueryException $e) {
            return response([
                'status' => '400',
                'message' => 'Device model must only be the device launch year!',
            ]);
        }
    }

    public function update(Request $request, $id) : Response {
        try{
            $device = Device::findORFail($id);
            if(intval($request->model)){
                $device->update([
                    'name' => $request->name,
                    'color' => $request->color,
                    'type' => $request->type,
                    'model' => $request->model,
                    'brand' => $request->brand,
                ]);

                return response([
                    'status' => '200',
                    'message' => 'Device has been updated successfully!'
                ]);
            } else {
                return response([
                    'status' => '400',
                    'message' => 'Device model must be the corresponding year in which the device was launched!',
                ]);
            }

        } catch (QueryException $e) {
            return response([
                'status' => '400',
                'message' => 'Device model must only be the device launch year!',
            ]);
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => '404',
                'message' => 'The device was not found with the provided id!',
            ]);
        }
    }

    public function destroy($id) : Response {
        try{
            Device::findOrFail($id)->delete();
            return response([
                'status' => '200',
                'message' => 'The device has been deleted successfully!',
            ]);
        } catch (ModelNotFoundException $e) {
            return response([
                'status' => '404',
                'message' => 'The device was not found with the provided id!',
            ]);
        }
    }
}
