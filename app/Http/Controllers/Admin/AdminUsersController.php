<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Models\Locality;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    protected function generatorPass($length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }
        return $result;
    }
    protected function translit($firstname, $surname)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

            'А' => 'a',    'Б' => 'b',    'В' => 'v',    'Г' => 'g',    'Д' => 'd',
            'Е' => 'e',    'Ё' => 'e',    'Ж' => 'zh',   'З' => 'z',    'И' => 'i',
            'Й' => 'y',    'К' => 'k',    'Л' => 'l',    'М' => 'm',    'Н' => 'n',
            'О' => 'o',    'П' => 'p',    'Р' => 'r',    'С' => 's',    'Т' => 't',
            'У' => 'u',    'Ф' => 'f',    'Х' => 'h',    'Ц' => 'c',    'Ч' => 'ch',
            'Ш' => 'sh',   'Щ' => 'sch',  'Ь' => '',     'Ы' => 'y',    'Ъ' => '',
            'Э' => 'e',    'Ю' => 'yu',   'Я' => 'ya',
        );
        $firstname = strtr($firstname, $converter);
        $surname = strtr($surname, $converter);
        $value = substr($firstname, -1);
        $chars = '0123456789';
        $count = mb_strlen($chars);
        for ($i = 0, $result = ''; $i < 2; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }
        $value = $value . '.' . $surname . $result;
        return $value;
    }

    public function showUsers()
    {
        return view('admin.page.users', ['users' => User::all(), 'locality' => Locality::all()]);
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'first_name' => ['required', 'string', 'max:255'],
    //         'surname' => ['required', 'string', 'max:255'],
    //         'patronymic' => ['string', 'max:255'],
    //         'municipality' => ['required', 'string'],
    //         'locality' => ['required', 'string'],
    //         'school' => ['required', 'string'],
    //         'balance' => ['integer', 'default:0'],
    //         'mili' => ['integer', 'default:0'],
    //         'login' => ['required','string'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    protected function createUser(Request $request)
    {
        $login = $this->translit($request['first_name'], $request['surname']);
        $password = $this->generatorPass(9);
        User::create([
            'first_name' => $request['first_name'],
            'surname' => $request['surname'],
            'patronymic' => $request['patronymic'],
            'municipality' => $request['municipality'],
            'locality' => $request['locality'],
            'school' => $request['school'],
            'balance' => 0,
            'mili' => 0,
            'login' => $login,
            'email' => $request['email'],
            'password' => Hash::make($password),
        ]);
        session(['user' => [$login, $password, $request['first_name'], $request['surname']]]);
        // dd(session('user'));
        // session()->keep('user');

        return redirect(route("showUsers"))->withSuccess('Вы успешно добавили пользователя');
    }

    public function editUser(Request $request)
    {
        $userId = User::find($request->id);
        $user = User::all();
        // dd($user);
        return view('admin.page.edit_users', ['users' => $user, 'edit_user' => $userId, 'localities' => Locality::all()]);
    }
    public function postEditUser(Request $request)
    {
        User::find($request->id)->update(
            [
                'first_name' => $request->first_name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'municipality' => $request->municipality,
                'locality' => $request->locality,
                'school' => $request->school,
                'login' => $request->login,
                'email' => $request->email,
            ]
        );

        return redirect(route("showUsers"))->withSuccess('Вы успешно отредактировали пользователя');
    }

    protected function regeneratePassword(Request $request)
    {
        $password = $this->generatorPass(9);
        User::where('id', $request->id)->update([
            'password' => Hash::make($password),
        ]);
        return response($password);
    }

    public function deleteUser(Request $request)
    {
        User::find($request->id)->delete();
        return redirect(route("showUsers"))->withSuccess('Вы удалили пользователя');
    }


    /* Excel-import */
    // public function fileImportExport()
    // {
    //     return view('file-import');
    // }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return redirect(route('showUsers'))->with('success', 'Пользователи импортированы');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
