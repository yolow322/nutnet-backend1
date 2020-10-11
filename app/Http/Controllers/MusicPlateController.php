<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicPlateRequest;
use App\Models\MusicPlate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class MusicPlateController extends Controller
{
    public function showMusicPlates()
    {
        if (MusicPlate::select('id')->count() == 0) {
            return view('home.home', [
                'musicPlatesMessage' => 'В данный момент в БД нет пластинок'
            ]);
        } else {
            return view('home.home', [
                'musicPlates' => MusicPlate::orderBy('id')->simplePaginate(3)
            ]);
        }
    }

    public function createMusicPlate(MusicPlateRequest $request)
    {
        if (MusicPlate::where('music_author', '=', $request->music_author)->where('album_name', '=', $request->album_name)->first()) {
            return redirect('/home/music-plate')->withErrors([
                'error' => 'Данная запись уже существует'
            ]);
        }
        $musicPlate = new MusicPlate();
        $musicPlate->user_id = Auth::id();
        $musicPlate->music_author = $request->music_author;
        $musicPlate->album_name = $request->album_name;
        $musicPlate->genre_of_music = $request->genre_of_music;
        $musicPlate->record_label = $request->record_label;
        $musicPlate->date_of_creation_album = $request->date_of_creation_album;
        $musicPlate->created_by_user = Auth::user()->getLogin();
        $musicPlate->save();
        return redirect('/home/music-plate')
            ->with('success', 'Данные из формы успешно добавлены в БД');
    }

    public function changeMusicPlate($id, MusicPlateRequest $request)
    {
        $id = $request->id;
        $musicPlate = MusicPlate::find($id);
        $response = Gate::inspect('update', $musicPlate);
        if ($response->allowed()) {
            if (MusicPlate::where('music_author', '=', $request->music_author)
                ->where('album_name', '=', $request->album_name)->first()) {
                return redirect('home')->withErrors([
                    'error' => 'Данная запись уже существует'
                ]);
            }
            $musicPlate->music_author = $request->music_author;
            $musicPlate->album_name = $request->album_name;
            $musicPlate->genre_of_music = $request->genre_of_music;
            $musicPlate->record_label = $request->record_label;
            $musicPlate->date_of_creation_album = $request->date_of_creation_album;
            $musicPlate->save();
            return redirect('home')
                ->with('success', 'Данные записи успешно обновлены');
        }
        return redirect('home')->withErrors([
            'error' => 'Данную запись может редактировать только её создатель'
        ]);
    }

    public function deleteMusicPlateById($id)
    {
        if (MusicPlate::find($id)) {
            $musicPlate = MusicPlate::find($id);
            $response = Gate::inspect('delete', $musicPlate);
            if ($response->allowed()) {
                $musicPlate->delete();
                return redirect('home')
                    ->with('success', 'Запись успешно удалена');
            }
            return redirect('home')->withErrors([
                'error' => 'Данную запись может удалить только её создатель'
            ]);
        } else {
            return redirect('home')->withErrors([
                'error' => 'Данной пластинки нет в БД'
            ]);
        }
    }
}
