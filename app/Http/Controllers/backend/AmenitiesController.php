<?php

namespace App\Http\Controllers\backend;

use App\Models\Amenities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenitiesController extends Controller
{

    public function AllAmenities()
    {
        $allAmenities = Amenities::latest()->get();
        return view('backend.amenitie.all_amenities', compact('allAmenities'));
    }

    public function AddAmenities()
    {
        return view('backend.amenitie.add_amenities');
    }

    public function StoreAmenities(Request $request)
    {
        $request->validate(
            [
                'amenities_name' => 'required|max:200'
            ]
        );


        Amenities::insert([
            'amenitis_name' => $request->amenities_name
        ]);



        $notification = array(
            'message' => 'Amenities Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);

    }

    public function DeleteAmenities($id)
    {
        Amenities::findOrFail($id)->delete();
        $notification = array(
            [
                'message' => 'Amenities Deleted Successfully',
                'alert-type' => 'success'
            ]
        );

        return redirect()->back()->with($notification);
    }

    public function EditAmenities($id)
    {
        $allAmenities = Amenities::findOrFail($id);
        return view('backend.amenitie.edit_amenities', compact('allAmenities'));
    }


    public function UpdateAmenities(Request $request, $id)
    {
        $request->validate(
            [
                'amenities_name' => 'required|max:200'
            ]
        );


        Amenities::findOrFail($id)->update([
            'amenitis_name' => $request->amenities_name
        ]);



        $notification = array(
            'message' => 'Amenities Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    }

}
