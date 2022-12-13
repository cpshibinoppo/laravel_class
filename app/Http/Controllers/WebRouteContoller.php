<?php

namespace App\Http\Controllers;

use App\Events\NewUserCreatedEvent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAge;
use Illuminate\Support\Facades\Mail;
use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\SheetCollection;
use Barryvdh\DomPDF\Facade\Pdf;

class WebRouteContoller extends Controller
{
    public function homePage()
    {
        $users = User::withTrashed()->paginate(5);

        // if(cache()->has('users')){
        //     $users = cache()->get('users');
        // }else{
        //     $users = User::withTrashed()->paginate(5);
        //     cache()->put('users', $users);
        // }
        // $color = collect([1,2,3,4,5,6]);
        // return $color->contains(function($value,$key){
        //     return $value >5;
        // });
        return view('welcome', compact('users'));
    }
    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        return route('blog');
    }
    public function adduserform()
    {
        return view('user.add-user');
    }
    public function adduser()
    {
        request()->validate([
            'name' => 'required',
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            "number" => request('number'),
            'address' => request('address'),
            'dob' => request('date_of_birth')
        ]);
        NewUserCreatedEvent::dispatch($user);
        // cache()->forget('users');
        return redirect('home')->with('message', 'User created successfully');
    }
    public function edituserform($userid)
    {
        $user = User::find(decrypt($userid));
        //    cache()->forget('users');
        return view('user.edit-user', compact('user'));
    }
    public function updateuser()
    {
        $user = User::find(decrypt(request('user_id')));
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            "number" => request('number'),
            'address' => request('address'),
            'dob' => request('date_of_birth')
        ]);
        return redirect('home')->with('message', 'User updated successfully');
    }
    public function deleteuser($userid)
    {
        User::find(decrypt($userid))->delete();
        // cache()->forget('users');

        return redirect('home')->with('message', 'User delete successfully');
    }
    public function restore($userid)
    {
        User::withTrashed()->find(decrypt($userid))->restore();
        // cache()->forget('users');
        return redirect('home')->with('message', 'User restore successfully');
    }
    public function view($userid)
    {
        // $age = UserAge::find(1);
        $user = User::find(decrypt($userid));
        return view('view', compact('user'));
    }
    public function export()
    {
        $user = User::all();
        //    return (new FastExcel($user))->download('users_export.csv',function($user){
        //     return [
        //         'name' => $user->name
        //     ];
        //    });
        return 'comments /* */';
    }
    public function pdf()
    {
        $users = User::get();
        $pdf = pdf::loadView('pdf.invoice', ['users' => $users]);
        return $pdf->download('invoice.pdf');
    }
}
