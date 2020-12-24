<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'username',
        'password',
        'first_name',
        'last_name',
        'location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function statuses(){
        return $this->hasMany('App\Models\Status','user_id');
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getName()
    {
        if ($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }
        if ($this->first_name) {
            return $this->first_name;
        }
        return null;
    }
    public function getCountry(){
        return $this->location;
    }
    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }
    public function getFirstNameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }
    public function getAvaUrl(){
        return "https://www.gravatar.com/avatar/{{md5($this->email)?d=mm&s=40}}";
    }
    public function myFriends(){
        return $this->belongsToMany('App\Models\User','friends','user_id','friend_id');
    }
    public function friendOf(){
        return $this->belongsToMany('App\Models\User','friends','friend_id','user_id');
    }
    public function friends(){
        return $this->myFriends()->wherePivot('accepted',true)->get()
        ->merge($this->friendOf()->wherePivot('accepted',true)->get()
        );
    }
    public function friendRequest(){
        return $this->myFriends()->wherePivot('accepted',false)->get();
    }
    public function friendRequestWaiting(){
        return $this->friendOf()->wherePivot('accepted',false)->get();
    }
    public function hasFriendRequest(User $user){
        return(bool) $this->friendRequestWaiting()->where('id',$user->id)->count();
    }
    public function hasFriendRequestRec(User $user){
        return(bool) $this->friendRequest()->where('id',$user->id)->count();
    }

    public function addFriend(User $user){
        $this->friendOf()->attach($user->id);
    }
    public function deleteFriend(User $user){
        $this->friendOf()->detach($user->id);
        $this->myFriends()->detach($user->id);
    }
    public function acceptFriendReq(User $user){
        $this->friendRequest()->where('id',$user->id)->first()->pivot->update([
            'accepted'=>true
        ]);
    }
    public function friendsWith(User $user){
        return(bool) $this->friends()->where('id',$user->id)->count();
    }

    public function isAdmin(){
        return $this->admin;
    }
}
