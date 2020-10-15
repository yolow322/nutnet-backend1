<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicPlateRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\MusicPlate;

class MusicPlateController extends Controller
{
    public function showMusicPlates()
    {
        return view('home.home', [
            'musicPlates' => MusicPlate::orderBy('id')->simplePaginate(3)
        ]);
    }

    public function createMusicPlate(MusicPlateRequest $request)
    {
        $musicPlate = new MusicPlate();
        $musicPlate->user_id = Auth::id();
        $musicPlate->music_author = $request->music_author;
        $musicPlate->album_name = $request->album_name;
        $musicPlate->genre_of_music = $request->genre_of_music;
        $musicPlate->record_label = $request->record_label;
        $musicPlate->date_of_creation_album = $request->date_of_creation_album;
        $musicPlate->created_by_user = Auth::user()->getLogin();
        $musicPlate->save();
        return redirect()->route('create-music-plate')
            ->with('success', 'Данные из формы успешно добавлены в БД');
    }


    public function showUpdateForm($id)
    {
        $musicPlate = MusicPlate::findOrFail($id);
        $response = Gate::inspect('update', $musicPlate);
        if ($response->allowed()) {
            return view('home.music_plate.changing_music_plate', [
                'musicPlate' => $musicPlate
            ]);
        }
        return redirect('home')->withErrors([
            'error' => 'Данную запись может редактировать только её создатель'
        ]);
    }

    public function updateMusicPlate($id, MusicPlateRequest $request)
    {
        $musicPlate = MusicPlate::findOrFail($id);
        $musicPlate->music_author = $request->music_author;
        $musicPlate->album_name = $request->album_name;
        $musicPlate->genre_of_music = $request->genre_of_music;
        $musicPlate->record_label = $request->record_label;
        $musicPlate->date_of_creation_album = $request->date_of_creation_album;
        $musicPlate->save();
        return redirect()->route('change-music-plate')
            ->with('success', 'Данные записи успешно обновлены');
    }

    public function deleteMusicPlate($id)
    {
        $musicPlate = MusicPlate::findOrFail($id);
        $response = Gate::inspect('delete', $musicPlate);
        if ($response->allowed()) {
            try {
                $musicPlate->delete();
            } catch (\Exception $e) {
                throw $e;
            }
            return redirect('home')
                ->with('success', 'Запись успешно удалена');
        }
        return redirect('home')->withErrors([
            'error' => 'Данную запись может удалить только её создатель'
        ]);
    }
}
