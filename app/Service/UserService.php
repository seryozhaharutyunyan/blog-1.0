<?php

namespace App\Service;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class UserService
{
    public function store($data){
        try{
            DB::beginTransaction();
            $password=Str::random(10);
            $data['password']=Hash::make($password);
            if(isset($data['img'])){
                $data['img']=Storage::disk('public')->put('/img/users', $data['img']);
            }else{
                $data['img']='/img/users/default.png';
            }
            $user=User::firstOrCreate(['email'=>$data['email']], $data);
            Mail::to($data['email'])->send(new PasswordMail($password));
            \event(new Registered($user));
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            \abort(500);
        }
    }
    /*public function update($data, $post){
        try {
            //dd($data);
            DB::beginTransaction();
            if(isset($data['tag_ids']) && !empty($data['tag_ids'])){
                $tagIds=$data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['preview_img']) && !empty($data['preview_img'])){
                $data['preview_img']=Storage::disk('public')->put('/img/post', $data['preview_img']);
            }
            if(isset($data['main_img']) && !empty($data['main_img'])){
                $data['main_img']=Storage::disk('public')->put('/img/post',  $data['main_img']);
            }
            $post->update($data);
            if(isset($tagIds)){
                $post->tags()->sync($tagIds);
            }else{
                $post->tags()->detach();
            }
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            \abort(500);
        }
        return $post;
    }*/
}
