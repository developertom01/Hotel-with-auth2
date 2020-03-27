<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;
use App\Room;


class RoomController extends Controller
{
    public function index(){
        $rooms=Room::paginate(10);
        return RoomResource::collection($rooms);
    }
    public function show($id){
        $room= Room::findOrFail($id);
        return new RoomResource($room);
    }
    public function store(Request $request){
        $room= new Room();
        $room->id= $request->id;
        $room->image_url = $request->image_url;
        $room->type = $request->type;
        $room->description = $request->description;
        $room->is_available = $request->is_available;
        $room->save();


    }
    public function update(Request $request,$id ){
        $room = Room::findOrFail($id);
        $room= $request->all();
        $room->save();
    }
    public function delete($id){
        $room= Room::findOrFail($id);
        $room->delete();
    }


}
