<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Advert;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdvertsResource;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class AdvertController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */


    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        $adverts = Advert::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('admin_id')
            ->get();

        // $advert = $adverts->first();
        // dd($advert->user->first_name);
        return view('adverts.index', compact('yearname', 'year', 'adverts'));
        // return redirect()->route('adverts', ['yearname' => $yearname, 'adverts' => $adverts]);
    }
    // public function adminIndex()
    // {
    //     $adverts = Advert::all()->where('admin_id', '=', Auth::user()->id);

    //     return
    //         AdvertsResource::collection(
    //             $adverts
    //             // Season::where('season_id', Auth::user()->id)->get()
    //         ); // get seasons thats seasons are authenticated
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        return view('adverts.add', compact('year', 'yearname'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertRequest $request, $yearname)
    {
        $user = Auth::user();
        $request->validated($request->all());

        if ($user->hasRole('manager')) {
            $advert = Advert::create([
                // 'user_id' => Auth::user()->id,

                'title' => $request->title,
                'body' => $request->body,
                'admin_role' =>  "مدير",
                'target' => $request->target,

                'admin_id' => Auth::user()->id,
            ]);
        } else // موجه
        {
            $advert = Advert::create([
                // 'user_id' => Auth::user()->id,

                'title' => $request->title,
                'body' => $request->body,
                'admin_role' =>  "موجه",
                'target' => $request->target,

                'admin_id' => Auth::user()->id,
            ]);
        }
        $year = Year::where('name', $yearname)->first();
        $adverts = Advert::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('admin_id')
            ->get();
        // return view('Adverts.index', compact('yearname', 'year'));
        return redirect()->route('adverts', ['yearname' => $yearname, 'adverts' => $adverts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert, $yearname, $advert_id)
    {

        $year = Year::where('name', $yearname)->first();

        $advert = Advert::where('id', $advert_id)->first();

        return view("adverts.show", compact('yearname', 'year', 'advert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert, $yearname, $advert_id)
    {
        $year = Year::where('name', $yearname)->first();
        $advert = Advert::where('id', $advert_id)->first();
        return view(
            'adverts.edit',
            compact(['year', 'yearname', 'advert'])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertRequest $request, Advert $advert, $yearname, $advert_id)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {

        $user = Auth::user();
        $year = Year::where('name', $yearname)->first();
        $advert = Advert::where('id', $advert_id)->first();

        if ($user->hasRole('manager')) {

            $advert->update([
                'title' => $request->title,
                'body' => $request->body,
                'target' => $request->target,

                'admin_id' => Auth::user()->id,
                'admin_role' => "مدير",
            ]);
        } else // موجه
        {
            $advert->update([
                'title' => $request->title,
                'body' => $request->body,
                'target' => $request->target,

                'admin_id' => Auth::user()->id,
                'admin_role' => "موجه",
            ]);
        }


        $advert->save();

        return redirect()->route('adverts', ['yearname' => $yearname, 'year' => $year, 'advert' => $advert, 'advert_id' => $advert_id]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert, $yearname, $advert_id)
    {
        $year = Year::where('name', $yearname)->first();
        $advert = Advert::where('id', $advert_id)->first();

        // dd($advert);


        if ($advert->admin_id == Auth::user()->id || Auth::user()->roles()->first()->name == 'manager') {

            $advert->delete();

            $adverts = Advert::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                ->whereNotNull('admin_id')
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('adverts', ['yearname' => $yearname, 'adverts' => $adverts]);
        } else {

            $adverts = Advert::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                ->whereNotNull('admin_id')
                ->get();

            echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             أنت غير قادر على حذف هذا الإعلان لأنك لست  مدير المدرسة ولست ناشر هذا الإعلان أيضاً</h1>";
            echo "<br>";
        }

        // way 1 :
        // $advert->delete();
        // return $this->success('Advert was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($advert) ? $this->isNotAuthorized($advert) : $advert->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($advert)
    {
        if (Auth::user()->id !== $advert->advert_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
