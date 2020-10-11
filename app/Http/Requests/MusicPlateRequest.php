<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicPlateRequest extends FormRequest
{
    /**
     * {@inheritDoc}
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            'music_author' => 'required|max:100',
            'album_name' => 'required|max:100',
            'genre_of_music' => 'required|max:100',
            'record_label' => 'required|max:50',
            'date_of_creation_album' => 'required|date'
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function messages()
    {
        return [
            'music_author.required' => 'Поле автор(группа) музыкальной пластинки должно быть обязательным',
            'music_author.max' => 'Поле автор(группа) может содержать макс. 100 символов',
            'album_name.required' => 'Поле альбом должно быть обязательным',
            'album_name.max' => 'Поле альбом может содержать макс. 100 символов',
            'genre_of_music.required' => 'Поле жанр должно быть обязательным',
            'genre_of_music.max' => 'Поле жанр может содержать макс. 100 символов',
            'record_label.required' => 'Поле лейбл должно быть обязательным',
            'record_label.max' => 'Поле лейбл может содержать макс. 50 символов',
            'date_of_creation_album.required' => 'Поле дата записи должно быть обязательным',
            'date_of_creation_album.date' => 'Поле дата записи должно быть в формате даты',
        ];
    }
}
