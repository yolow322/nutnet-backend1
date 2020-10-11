<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MusicPlate
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $music_author
 * @property string $album_name
 * @property string $genre_of_music
 * @property string $record_label
 * @property string $date_of_creation_album
 * @property string $created_by_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate query()
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereAlbumName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereAuthorOfMusicPlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereCreatedByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereDateOfCreationMusicPlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereGenreOfMusic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereRecordLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MusicPlate whereUserId($value)
 * @mixin \Eloquent
 */
class MusicPlate extends Model
{
    /**
     * @var string
     */
    protected $table = 'music_plates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'music_author',
        'album_name',
        'genre_of_music',
        'record_label',
        'date_of_creation_album',
        'created_by_user',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
